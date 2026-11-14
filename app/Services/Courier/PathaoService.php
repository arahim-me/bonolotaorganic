<?php
namespace App\Services\Courier;

use App\Models\CourierSetting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Exception;

class PathaoService
{
    protected CourierSetting $setting;

    protected string $baseUrl;

    public function __construct()
    {
        $this->setting = CourierSetting::firstOrCreate(
            ['courier' => 'pathao'],
            [
                'name' => 'Pathao',
                'base_url' => 'https://api-hermes.pathao.com',
            ]
        );

        $this->baseUrl = rtrim($this->setting->base_url, '/');
    }

    /**
     * Authenticate with Pathao.
     */
    public function authenticate(): string
    {
        $response = Http::acceptJson()
            ->timeout(20)
            ->post($this->baseUrl . '/aladdin/api/v1/issue-token', [
                'client_id' => $this->setting->client_id,
                'client_secret' => $this->setting->client_secret,
                'username' => $this->setting->username,
                'password' => $this->setting->password,
                'grant_type' => 'password',
            ]);

        if (!$response->successful()) {
            throw new Exception('Pathao authentication failed.');
        }

        $token = $response->json('access_token');

        if (!$token) {
            throw new Exception('Pathao access token missing.');
        }

        return $token;
    }

    /**
     * Get cached access token.
     */
    protected function getAccessToken(): string
    {
        return Cache::remember(
            'pathao_access_token',
            now()->addHours(4),
            fn() => $this->authenticate()
        );
    }

    /**
     * Test API connection.
     */
    public function testConnection(): array
    {
        $token = $this->authenticate();

        return [
            'success' => true,
            'message' => 'Pathao authentication successful.',
        ];
    }

    /**
     * Create parcel.
     */
    public function createOrder(array $data): array
    {
        $response = Http::withToken($this->getAccessToken())
            ->acceptJson()
            ->timeout(30)
            ->post(
                $this->baseUrl . '/aladdin/api/v1/orders',
                $data
            );

        if (!$response->successful()) {
            throw new Exception('Pathao order booking failed.');
        }

        return $response->json();
    }

    /**
     * Track parcel.
     */
    public function trackOrder(string $consignmentId): array
    {
        $response = Http::withToken($this->getAccessToken())
            ->acceptJson()
            ->timeout(30)
            ->get(
                $this->baseUrl .
                '/aladdin/api/v1/orders/' .
                urlencode($consignmentId) .
                '/info'
            );

        if (!$response->successful()) {
            throw new Exception('Pathao tracking failed.');
        }

        return $response->json();
    }
}
