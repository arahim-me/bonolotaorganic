<?php

namespace App\Contracts\Courier;

use App\Models\Order;
use App\Models\CourierShipment;

interface CourierInterface
{
    public function testConnection(): array;

    public function createShipment(
        Order $order,
        array $data = []
    ): array;

    public function trackShipment(
        CourierShipment $shipment
    ): array;

    public function cancelShipment(
        CourierShipment $shipment
    ): array;

    public function getBalance(): array;
}
