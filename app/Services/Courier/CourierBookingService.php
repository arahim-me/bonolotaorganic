<?php

namespace App\Services\Courier;

use App\Models\Order;
use App\Models\CourierSetting;
use App\Models\CourierShipment;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use RuntimeException;
use Throwable;

class CourierBookingService
{

    public function book(
        Order $order,
        string $courier,
        array $data
    ): CourierShipment {

        $courier = strtolower($courier);

        if (!in_array($courier, ['pathao', 'steadfast', 'redx'], true)) {
            throw new RuntimeException('Invalid courier selected.');
        }

        // Create shipment and prevent duplicate active booking
        $shipment = DB::transaction(function () use ($order, $courier, $data) {

            $lockedOrder = Order::whereKey($order->id)
                ->lockForUpdate()
                ->firstOrFail();

            $existing = $lockedOrder->courierShipments()
                ->whereNotIn('status', ['failed', 'cancelled'])
                ->latest()
                ->first();

            if ($existing) {
                throw new RuntimeException(
                    'This order already has an active courier booking.'
                );
            }

            $setting = CourierSetting::where('courier', $courier)
                ->where('is_active', true)
                ->first();

            if (!$setting) {
                throw new RuntimeException(
                    ucfirst($courier) . ' courier is not active.'
                );
            }

            return CourierShipment::create([
                'order_id' => $lockedOrder->id,
                'courier_setting_id' => $setting->id,
                'courier' => $courier,

                'merchant_invoice' => $lockedOrder->order_number
                    ?: 'ORDER-' . $lockedOrder->id,

                'status' => 'processing',

                'cod_amount' => $lockedOrder->payment_status
                    ? 0
                    : (
                        (float) $lockedOrder->grand_total
                        + (float) $lockedOrder->shipping_fee
                    ),

                'delivery_charge' => $lockedOrder->shipping_fee,

                'booking_data' => $data,
            ]);
        });

        try {

            $order->loadMissing([
                'user',
                'items.product',
            ]);

            $setting = $shipment->courierSetting;

            if (!$setting) {
                throw new RuntimeException('Courier setting not found.');
            }

            $credentials = $setting->credentials ?? [];

            $payload = $this->makePayload(
                $order,
                $courier,
                $data,
                $credentials
            );

            $shipment->update([
                'request_payload' => $payload,
            ]);

            $response = match ($courier) {
                'pathao' => $this->bookPathao($setting, $payload),
                'steadfast' => $this->bookSteadfast($setting, $payload),
                'redx' => $this->bookRedx($setting, $payload),
            };

            $shipment->update([
                'status' => 'booked',
                'consignment_id' => $response['consignment_id'] ?? null,
                'tracking_code' => $response['tracking_code'] ?? null,
                'response_payload' => $response,
                'failure_reason' => null,
                'booked_at' => now(),
            ]);

            return $shipment->fresh();

        } catch (Throwable $e) {

            $shipment->update([
                'status' => 'failed',
                'failure_reason' => Str::limit($e->getMessage(), 2000),
            ]);

            throw $e;
        }
    }


    private function makePayload(
        Order $order,
        string $courier,
        array $data,
        array $credentials
    ): array {
        $phone = $this->normalizePhone($order->shipping_phone);

        if (!$order->user) {
            throw new RuntimeException('Order customer not found.');
        }

        if (!$phone || !$order->shipping_address) {
            throw new RuntimeException('Customer phone or address is missing.');
        }

        $items = $order->items;

        if ($items->isEmpty()) {
            throw new RuntimeException('Order has no products.');
        }

        $description = $items->map(function ($item) {
            return ($item->product?->name ?? 'Product')
                . ' x ' . $item->quantity;
        })->implode(', ');

        $cod = $order->payment_status
            ? 0
            : (float) $order->grand_total + (float) $order->shipping_fee;

        $common = [
            'customer_name' => $order->user->name,
            'customer_phone' => $phone,
            'customer_address' => $order->shipping_address,
            'invoice' => $order->order_number ?: 'ORDER-' . $order->id,
            'cod_amount' => $cod,
            'item_description' => $description,
            'item_quantity' => (int) $items->sum('quantity'),
        ];

        return match ($courier) {
            'pathao' => array_merge($common, [
                'store_id' => $data['store_id'] ?? $credentials['store_id'] ?? null,
                'sender_name' => $credentials['sender_name'] ?? null,
                'sender_phone' => $credentials['sender_phone'] ?? null,
                'recipient_city' => $data['recipient_city'] ?? null,
                'recipient_zone' => $data['recipient_zone'] ?? null,
                'recipient_area' => $data['recipient_area'] ?? null,
                'delivery_type' => $data['delivery_type'] ?? 48,
                'item_type' => $data['item_type'] ?? 2,
                'item_weight' => $data['item_weight'] ?? 0.5,
                'special_instruction' => $data['special_instruction'] ?? '',
            ]),

            'steadfast' => [
                'invoice' => $common['invoice'],
                'recipient_name' => $common['customer_name'],
                'recipient_phone' => $phone,
                'recipient_address' => $common['customer_address'],
                'cod_amount' => $cod,
                'note' => $data['note'] ?? '',
                'item_description' => $description,
                'total_lot' => $common['item_quantity'],
                'delivery_type' => $data['delivery_type'] ?? 0,
            ],

            'redx' => [
                'customer_name' => $common['customer_name'],
                'customer_phone' => $phone,
                'customer_address' => $common['customer_address'],
                'delivery_area' => $data['delivery_area'] ?? null,
                'delivery_area_id' => $data['delivery_area_id'] ?? null,
                'pickup_store_id' => $data['pickup_store_id']
                    ?? $credentials['pickup_store_id'] ?? null,
                'cash_collection_amount' => $cod,
                'parcel_weight' => $data['parcel_weight'] ?? 0.5,
                'value' => (float) $order->grand_total,
                'merchant_invoice' => $common['invoice'],
                'instruction' => $data['instruction'] ?? '',
            ],
        };
    }


    private function bookPathao(
        CourierSetting $setting,
        array $payload
    ): array {
        $credentials = $setting->credentials ?? [];

        $baseUrl = rtrim(
            $setting->base_url ?: 'https://api-hermes.pathao.com',
            '/'
        );

        // Generate Access Token
        $token = Cache::remember(
            'pathao_token_' . $setting->id,
            now()->addMinutes(50),
            function () use ($credentials, $baseUrl) {

                $response = Http::acceptJson()
                    ->post($baseUrl . '/aladdin/api/v1/issue-token', [
                        'client_id' => $credentials['client_id'] ?? '',
                        'client_secret' => $credentials['client_secret'] ?? '',
                        'username' => $credentials['username'] ?? '',
                        'password' => $credentials['password'] ?? '',
                        'grant_type' => 'password',
                    ]);

                $response->throw();

                return $response->json('access_token')
                    ?? throw new RuntimeException(
                        'Pathao access token missing.'
                    );
            }
        );

        // Validate Store ID
        if (empty($payload['store_id'])) {
            throw new RuntimeException('Pathao Store ID is required.');
        }

        // Create Pathao Order
        $response = Http::acceptJson()
            ->withToken($token)
            ->post($baseUrl . '/aladdin/api/v1/orders', [

                'store_id' => (int) $payload['store_id'],

                'merchant_order_id' => $payload['invoice'],

                'sender_name' => $payload['sender_name'],

                'sender_phone' => $payload['sender_phone'],

                'recipient_name' => $payload['customer_name'],

                'recipient_phone' => $payload['customer_phone'],

                'recipient_address' => $payload['customer_address'],

                'delivery_type' => (int) $payload['delivery_type'],

                'item_type' => (int) $payload['item_type'],

                'special_instruction' => $payload['special_instruction'],

                'item_quantity' => (int) $payload['item_quantity'],

                'item_weight' => (float) $payload['item_weight'],

                'amount_to_collect' => (float) $payload['cod_amount'],

                'item_description' => $payload['item_description'],
            ]);

        // Handle expired token
        if ($response->status() === 401) {
            Cache::forget('pathao_token_' . $setting->id);

            throw new RuntimeException(
                'Pathao token expired. Please try booking again.'
            );
        }

        $response->throw();

        $json = $response->json();

        $result = $json['data'] ?? $json;

        if (empty($result['consignment_id'])) {
            throw new RuntimeException(
                $json['message'] ?? 'Pathao booking failed.'
            );
        }

        return [
            'consignment_id' => $result['consignment_id'],
            'tracking_code' => $result['consignment_id'],
            'raw' => $json,
        ];
    }


    private function bookSteadfast(
        CourierSetting $setting,
        array $payload
    ): array {
        $credentials = $setting->credentials ?? [];
        $baseUrl = rtrim(
            $setting->base_url ?: 'https://portal.packzy.com/api/v1',
            '/'
        );

        $response = Http::acceptJson()
            ->withHeaders([
                'Api-Key' => $credentials['api_key'] ?? '',
                'Secret-Key' => $credentials['secret_key'] ?? '',
            ])
            ->post($baseUrl . '/create_order', $payload);

        $response->throw();

        $json = $response->json();
        $consignment = $json['consignment'] ?? $json;

        if (empty($consignment['consignment_id'])) {
            throw new RuntimeException(
                $json['message'] ?? 'Steadfast booking failed.'
            );
        }

        return [
            'consignment_id' => $consignment['consignment_id'],
            'tracking_code' => $consignment['tracking_code'] ?? null,
            'raw' => $json,
        ];
    }

    private function bookRedx(
        CourierSetting $setting,
        array $payload
    ): array {
        $credentials = $setting->credentials ?? [];
        $baseUrl = rtrim(
            $setting->base_url ?: 'https://openapi.redx.com.bd/v1.0.0-beta',
            '/'
        );

        if (
            empty($payload['pickup_store_id']) ||
            empty($payload['delivery_area_id'])
        ) {
            throw new RuntimeException(
                'RedX pickup store and delivery area are required.'
            );
        }

        $response = Http::acceptJson()
            ->withHeaders([
                'API-ACCESS-TOKEN' => 'Bearer '
                    . ($credentials['access_token'] ?? ''),
            ])
            ->post($baseUrl . '/parcel', $payload);

        $response->throw();

        $json = $response->json();

        $tracking = $json['tracking_id']
            ?? $json['data']['tracking_id']
            ?? null;

        if (!$tracking) {
            throw new RuntimeException(
                $json['message'] ?? 'RedX tracking ID was not returned.'
            );
        }

        return [
            'consignment_id' => $tracking,
            'tracking_code' => $tracking,
            'raw' => $json,
        ];
    }

    private function normalizePhone(?string $phone): ?string
    {
        if (!$phone) {
            return null;
        }

        // Remove spaces, +, -, brackets and other characters
        $phone = preg_replace('/\D+/', '', $phone);

        // Convert 8801XXXXXXXXX to 01XXXXXXXXX
        if (str_starts_with($phone, '880')) {
            $phone = substr($phone, 2);
        }

        // Convert 1XXXXXXXXX to 01XXXXXXXXX
        if (strlen($phone) === 10 && str_starts_with($phone, '1')) {
            $phone = '0' . $phone;
        }

        // Bangladesh mobile number validation
        return preg_match('/^01[3-9]\d{8}$/', $phone)
            ? $phone
            : null;
    }
}
