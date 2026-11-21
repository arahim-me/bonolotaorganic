<?php

namespace App\Services\Courier;

use App\Models\CourierSetting;
use App\Models\Order;
use App\Models\CourierShipment;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use RuntimeException;

class PathaoCourierService
{
    protected string $baseUrl;
    protected array $credentials;

    public function __construct(?CourierSetting $setting = null)
    {
        $setting ??= CourierSetting::where('courier', 'pathao')
            ->where('is_active', true)
            ->first();

        if (!$setting) {
            throw new RuntimeException('Pathao credentials not configured.');
        }

        $this->baseUrl = rtrim(
            $setting->base_url ?: 'https://api-hermes.pathao.com',
            '/'
        );

        $this->credentials = [
            'client_id' => $setting->client_id,
            'client_secret' => $setting->client_secret,
            'username' => $setting->username,
            'password' => $setting->password,
            'store_id' => $setting->store_id,
        ];
    }

    protected function token(): string
    {
        $key = 'pathao_token_' . md5(
            $this->credentials['client_id'] .
            $this->credentials['username']
        );

        return Cache::remember($key, now()->addHours(4), function () {

            $response = Http::timeout(30)
                ->post($this->baseUrl . '/aladdin/api/v1/issue-token', [
                    'client_id' => $this->credentials['client_id'],
                    'client_secret' => $this->credentials['client_secret'],
                    'grant_type' => 'password',
                    'username' => $this->credentials['username'],
                    'password' => $this->credentials['password'],
                ])->throw()->json();

            if (empty($response['access_token'])) {
                throw new RuntimeException('Pathao authentication failed.');
            }

            return $response['access_token'];
        });
    }

    protected function request()
    {
        return Http::timeout(30)
            ->acceptJson()
            ->asJson()
            ->withToken($this->token());
    }

    public function testConnection(): array
    {
        $response = $this->getStores();

        return [
            'success' => true,
            'message' => 'Pathao connection successful.',
            'data' => $response,
        ];
    }

    public function getStores(): array
    {
        return $this->request()
            ->get($this->baseUrl . '/aladdin/api/v1/stores')
            ->throw()->json();
    }

    public function createStore(array $data): array
    {
        return $this->request()
            ->post($this->baseUrl . '/aladdin/api/v1/stores', $data)
            ->throw()->json();
    }

    public function createShipment(Order $order, array $data = []): array
    {
        $payload = array_merge([
            'store_id' => $this->credentials['store_id'],
            'merchant_order_id' => $order->order_number,
            'recipient_name' => $order->shipping_name,
            'recipient_phone' => $order->shipping_phone,
            'recipient_address' => $order->shipping_address,
            'recipient_city' => $data['city_id'] ?? null,
            'recipient_zone' => $data['zone_id'] ?? null,
            'recipient_area' => $data['area_id'] ?? null,
            'delivery_type' => $data['delivery_type'] ?? 48,
            'item_type' => $data['item_type'] ?? 2,
            'special_instruction' => $data['note'] ?? '',
            'item_quantity' => $data['quantity'] ?? 1,
            'item_weight' => $data['weight'] ?? 0.5,
            'amount_to_collect' => $data['cod_amount'] ?? 0,
        ], $data);

        $response = $this->request()
            ->post($this->baseUrl . '/aladdin/api/v1/orders', $payload)
            ->throw()->json();

        return $response;
    }

    public function trackShipment(CourierShipment $shipment): array
    {
        if (!$shipment->consignment_id) {
            throw new RuntimeException('Pathao consignment ID missing.');
        }

        return $this->request()
            ->get(
                $this->baseUrl . '/aladdin/api/v1/orders/' .
                $shipment->consignment_id . '/info'
            )->throw()->json();
    }

    public function cancelShipment(CourierShipment $shipment): array
    {
        throw new RuntimeException(
            'Pathao cancellation requires the supported merchant cancellation API.'
        );
    }

    public function getCities(): array
    {
        return $this->request()
            ->get($this->baseUrl . '/aladdin/api/v1/city-list')
            ->throw()->json();
    }

    public function getZones(int $cityId): array
    {
        return $this->request()
            ->get($this->baseUrl . "/aladdin/api/v1/cities/{$cityId}/zone-list")
            ->throw()->json();
    }

    public function getAreas(int $zoneId): array
    {
        return $this->request()
            ->get($this->baseUrl . "/aladdin/api/v1/zones/{$zoneId}/area-list")
            ->throw()->json();
    }

    public function calculatePrice(array $data): array
    {
        return $this->request()
            ->post(
                $this->baseUrl . '/aladdin/api/v1/merchant/price-plan',
                $data
            )->throw()->json();
    }

    public function getBalance(): array
    {
        throw new RuntimeException(
            'Pathao balance endpoint is not configured in this adapter.'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Pathao Customer Fraud Check
    |--------------------------------------------------------------------------
    */

    public function checkCustomerFraud(string $phone): array
    {
        $phone = preg_replace('/\D/', '', $phone);

        try {
            $response = $this->request()
                ->post(
                    $this->baseUrl . '/aladdin/api/v1/user/success-rate',
                    [
                        'phone' => $phone,
                    ]
                )
                ->throw()
                ->json();

            return [
                'courier' => 'pathao',
                'available' => true,
                'success' => true,
                'phone' => $phone,
                'data' => $response,
            ];

        } catch (\Throwable $e) {

            report($e);

            return [
                'courier' => 'pathao',
                'available' => false,
                'success' => false,
                'phone' => $phone,
                'message' => 'Pathao fraud check failed.',
            ];
        }
    }

}
