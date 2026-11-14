<?php

namespace App\Services\Courier;

use App\Contracts\Courier\CourierInterface;
use InvalidArgumentException;

class CourierManager
{
    public function driver(string $courier): CourierInterface
    {
        return match ($courier) {
            'pathao' => app(PathaoService::class),
            'steadfast' => app(SteadfastService::class),
            'redx' => app(RedXService::class),

            default => throw new InvalidArgumentException(
                "Courier [{$courier}] is not supported."
            ),
        };
    }
}
