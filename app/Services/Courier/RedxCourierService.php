<?php

namespace App\Services\Courier;

use App\Models\CourierSetting;
use App\Models\Order;
use App\Models\CourierShipment;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class RedxCourierService
{
    protected string $baseUrl;
    protected string $accessToken;

    public function __construct(?CourierSetting $setting = null)
    {
        $setting ??= CourierSetting::where('courier', 'redx')
            ->where('is_active', true)
            ->first();

        if (!$setting) {
            throw new RuntimeException('RedX credentials not configured.');
        }

        $this->baseUrl = rtrim(
            $setting->base_url ?: 'https://openapi.redx.com.bd/v1.0.0-beta',
            '/'
        );

        $this->accessToken = $setting->access_token;
    }

    protected function request()
    {
        return Http::timeout(30)
            ->acceptJson()
            ->asJson()
            ->withHeaders([
                'API-ACCESS-TOKEN' => 'Bearer ' . $this->accessToken,
            ]);
    }

    public function testConnection(): array
    {
        $stores = $this->getPickupStores();

        return [
            'success' => true,
            'message' => 'RedX connection successful.',
            'data' => $stores,
        ];
    }

    public function getPickupStores(): array
    {
        return $this->request()
            ->get($this->baseUrl . '/pickup/stores')
            ->throw()->json();
    }

    public function createShipment(Order $order, array $data = []): array
    {
        $payload = [
            'customer_name' => $order->shipping_name,
            'customer_phone' => $order->shipping_phone,
            'delivery_area' => $data['delivery_area'] ?? null,
            'delivery_area_id' => $data['delivery_area_id'] ?? null,
            'customer_address' => $order->shipping_address,
            'merchant_invoice_id' => $order->order_number,
            'cash_collection_amount' => $data['cod_amount'] ?? 0,
            'parcel_weight' => $data['weight'] ?? 500,
            'instruction' => $data['note'] ?? '',
            'pickup_store_id' => $data['pickup_store_id'] ?? null,
        ];

        return $this->request()
            ->post($this->baseUrl . '/parcel', $payload)
            ->throw()->json();
    }

    public function trackShipment(CourierShipment $shipment): array
    {
        if (!$shipment->tracking_code) {
            throw new RuntimeException('RedX tracking ID missing.');
        }

        return $this->request()
            ->get(
                $this->baseUrl . '/parcel/track/' .
                urlencode($shipment->tracking_code)
            )->throw()->json();
    }

    public function cancelShipment(CourierShipment $shipment): array
    {
        throw new RuntimeException(
            'RedX cancellation endpoint must be verified against your merchant API access.'
        );
    }

    public function getAreas(): array
    {
        return $this->request()
            ->get($this->baseUrl . '/areas')
            ->throw()->json();
    }

    public function getBalance(): array
    {
        throw new RuntimeException(
            'RedX balance endpoint is not configured in this adapter.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | RedX Customer Fraud Check
    |--------------------------------------------------------------------------
    */

    public function checkCustomerFraud(string $phone): array
    {
        return [
            'courier' => 'redx',
            'available' => false,
            'success' => false,
            'phone' => preg_replace('/\D/', '', $phone),
            'message' => 'RedX does not have a verified phone fraud endpoint configured.',
        ];
    }

}
