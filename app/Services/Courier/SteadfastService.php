<?php

namespace App\Services\Courier;

use App\Models\CourierSetting;
use App\Contracts\Courier\CourierInterface;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class SteadfastService implements CourierInterface
{
    protected $setting;
    protected string $baseUrl;

    public function __construct()
    {
        $this->setting = CourierSetting::where(
            'courier',
            'steadfast'
        )->firstOrFail();

        $this->baseUrl = rtrim(
            $this->setting->base_url
            ?: 'https://portal.packzy.com/api/v1',
            '/'
        );
    }

    private function request()
    {
        $credentials = $this->setting->credentials ?? [];

        if (
            empty($credentials['api_key']) ||
            empty($credentials['secret_key'])
        ) {
            throw new RuntimeException('Steadfast credentials missing.');
        }

        return Http::acceptJson()
            ->withHeaders([
                'Api-Key' => $credentials['api_key'],
                'Secret-Key' => $credentials['secret_key'],
            ])
            ->timeout(30);
    }

    public function testConnection(): array
    {
        return $this->send(
            $this->request()->get($this->baseUrl . '/get_balance')
        );
    }

    public function getBalance(): array
    {
        return $this->testConnection();
    }

    public function createShipment(array $data): array
    {
        return $this->send(
            $this->request()->post(
                $this->baseUrl . '/create_order',
                [
                    'invoice' => $data['invoice'],
                    'recipient_name' => $data['recipient_name'],
                    'recipient_phone' => $data['recipient_phone'],
                    'recipient_address' => $data['recipient_address'],
                    'cod_amount' => $data['cod_amount'],
                    'note' => $data['note'] ?? '',
                    'item_description' => $data['item_description'] ?? '',
                    'delivery_type' => $data['delivery_type'] ?? 0,
                ]
            )
        );
    }

    public function trackShipment(string $trackingCode): array
    {
        return $this->send(
            $this->request()->get(
                $this->baseUrl . '/status_by_trackingcode/' .
                urlencode($trackingCode)
            )
        );
    }

    public function cancelShipment(string $trackingCode): array
    {
        throw new RuntimeException(
            'Cancellation is not enabled. Use the supported return/cancellation workflow.'
        );
    }

    private function send($response): array
    {
        if (!$response->successful()) {
            throw new RuntimeException(
                'Steadfast API Error: ' . $response->body()
            );
        }

        return $response->json() ?? [];
    }
}
