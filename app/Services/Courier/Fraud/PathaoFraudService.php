<?php

namespace App\Services\Courier\Fraud;

use App\Models\CourierSetting;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use RuntimeException;

class PathaoFraudService
{
    private function setting()
    {
        return CourierSetting::where('courier', 'pathao')
            ->firstOrFail();
    }

    private function token(): string
    {
        $setting = $this->setting();
        $credentials = $setting->credentials ?? [];

        return Cache::remember(
            'pathao_fraud_access_token',
            now()->addMinutes(50),
            function () use ($setting, $credentials) {

                $response = Http::post(
                    rtrim($setting->base_url, '/') .
                    '/aladdin/api/v1/issue-token',
                    [
                        'client_id' => $credentials['client_id'],
                        'client_secret' => $credentials['client_secret'],
                        'username' => $credentials['username'],
                        'password' => $credentials['password'],
                        'grant_type' => 'password',
                    ]
                );

                if (!$response->successful()) {
                    throw new RuntimeException(
                        'Pathao authentication failed.'
                    );
                }

                return $response->json('access_token');
            }
        );
    }

    public function check(string $phone): array
    {
        $setting = $this->setting();

        $response = Http::withToken($this->token())
            ->acceptJson()
            ->timeout(30)
            ->post(
                rtrim($setting->base_url, '/') .
                '/aladdin/api/v1/user/success-rate',
                [
                    'phone' => $phone,
                ]
            );

        if (!$response->successful()) {
            if ($response->status() === 401) {
                Cache::forget('pathao_fraud_access_token');
            }

            throw new RuntimeException(
                'Pathao fraud lookup failed: ' . $response->status()
            );
        }

        return [
            'courier' => 'pathao',
            'available' => true,
            'data' => $response->json(),
        ];
    }
}
