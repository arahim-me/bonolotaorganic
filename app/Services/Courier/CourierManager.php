<?php

namespace App\Services\Courier;

use InvalidArgumentException;

class CourierManager
{
    public function driver(string $courier): object
    {
        return match (strtolower($courier)) {
            'pathao' => app(PathaoCourierService::class),
            'steadfast' => app(SteadfastCourierService::class),
            'redx' => app(RedxCourierService::class),

            default => throw new InvalidArgumentException(
                "Unsupported courier: {$courier}"
            ),
        };
    }
}
