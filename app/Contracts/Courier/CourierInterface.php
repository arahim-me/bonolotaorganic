<?php

namespace App\Contracts\Courier;

interface CourierInterface
{
    public function testConnection(): array;

    public function createShipment(array $data): array;

    public function trackShipment(string $trackingCode): array;

    public function cancelShipment(string $trackingCode): array;

    public function getBalance(): array;
}
