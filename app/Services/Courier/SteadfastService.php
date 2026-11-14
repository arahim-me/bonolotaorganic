<?php
namespace App\Services\Courier;

use App\Models\CourierSetting;
use Illuminate\Support\Facades\Http;
use Exception;

class SteadfastService
{
    protected CourierSetting $setting;

    protected string $baseUrl;

    public function __construct()
    {
        $this->setting = CourierSetting::firstOrCreate(
            ['courier' => 'steadfast'],
            [
                'name' => 'Steadfast',
                'base_url' => 'https://portal.packzy.com/api/v1',
            ]
        );

        $this->baseUrl = rtrim($this->setting->base_url, '/');
    }

    protected function request()
    {
        return Http::withHeaders([
            'Api-Key' => $this->setting->api_key,
            'Secret-Key' => $this->setting->secret_key,
            'Content-Type' => 'application/json',
        ])
            ->acceptJson()
            ->timeout(30);
    }

    /**
     * Test API connection using balance endpoint.
     */
    public function testConnection(): array
    {
        $response = $this->request()
            ->get($this->baseUrl . '/get_balance');

        if (!$response->successful()) {
            throw new Exception('Steadfast authentication failed.');
        }

        return $response->json();
    }

    /**
     * Create parcel.
     */
    public function createOrder(array $data): array
    {
        $response = $this->request()
            ->post($this->baseUrl . '/create_order', $data);

        if (!$response->successful()) {
            throw new Exception('Steadfast booking failed.');
        }

        return $response->json();
    }

    /**
     * Track by consignment ID.
     */
    public function trackByConsignment(string $id): array
    {
        $response = $this->request()
            ->get(
                $this->baseUrl .
                '/status_by_cid/' .
                urlencode($id)
            );

        if (!$response->successful()) {
            throw new Exception('Steadfast tracking failed.');
        }

        return $response->json();
    }

    /**
     * Track by invoice.
     */
    public function trackOrder(string $invoice): array
    {
        $response = $this->request()
            ->get(
                $this->baseUrl .
                '/status_by_invoice/' .
                urlencode($invoice)
            );

        if (!$response->successful()) {
            throw new Exception('Steadfast tracking failed.');
        }

        return $response->json();
    }
}
