<?php

namespace App\Services\Courier\Fraud;

class RedXFraudService
{
    public function check(string $phone): array
    {
        return [
            'courier' => 'redx',
            'available' => false,
            'message' => 'RedX customer fraud-history API endpoint is not verified for this merchant account.',
            'data' => null,
        ];
    }
}
