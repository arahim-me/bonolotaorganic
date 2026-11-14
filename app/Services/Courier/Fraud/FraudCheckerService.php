<?php

namespace App\Services\Courier\Fraud;

use Illuminate\Support\Facades\Log;

class FraudCheckerService
{
    public function check(string $phone): array
    {
        $phone = $this->normalizePhone($phone);

        $services = [
            'pathao' => app(PathaoFraudService::class),
            'steadfast' => app(SteadfastFraudService::class),
            'redx' => app(RedXFraudService::class),
        ];

        $results = [];

        foreach ($services as $name => $service) {

            try {
                $results[$name] = $service->check($phone);

            } catch (\Throwable $e) {

                Log::warning('Courier fraud lookup failed', [
                    'courier' => $name,
                    'error' => $e->getMessage(),
                ]);

                $results[$name] = [
                    'courier' => $name,
                    'available' => false,
                    'message' => 'Provider lookup failed.',
                    'data' => null,
                ];
            }
        }

        return [
            'phone' => $phone,
            'couriers' => $results,
        ];
    }

    private function normalizePhone(string $phone): string
    {
        $phone = preg_replace('/\D+/', '', $phone);

        if (str_starts_with($phone, '880')) {
            $phone = '0' . substr($phone, 3);
        }

        if (!preg_match('/^01[3-9]\d{8}$/', $phone)) {
            throw new \InvalidArgumentException(
                'Invalid Bangladesh mobile number.'
            );
        }

        return $phone;
    }
}
