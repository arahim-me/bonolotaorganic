<?php

namespace App\Services\Courier\Fraud;

use App\Models\CourierSetting;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class SteadfastFraudService
{
    public function check(string $phone): array
    {
        $setting = CourierSetting::where(
            'courier',
            'steadfast'
        )->firstOrFail();

        $credentials = $setting->credentials ?? [];

        $baseUrl = rtrim(
            $setting->base_url ?: 'https://api.steadfast.com.bd/api/v1',
            '/'
        );

        $response = Http::withHeaders([
            'Api-Key' => $credentials['api_key'],
            'Secret-Key' => $credentials['secret_key'],
        ])
            ->acceptJson()
            ->timeout(30)
            ->get(
                $baseUrl . '/fraud_check/' . urlencode($phone)
            );

        if (!$response->successful()) {
            throw new RuntimeException(
                'Steadfast fraud check failed: ' . $response->status()
            );
        }

        return [
            'courier' => 'steadfast',
            'available' => true,
            'data' => $response->json(),
        ];
    }
}
