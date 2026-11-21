<?php

namespace App\Services\Courier;

use App\Models\CourierShipment;
use Illuminate\Support\Facades\DB;

class CourierTrackingService
{
    public function __construct(
        protected CourierManager $manager
    ) {
    }

    public function track(CourierShipment $shipment): array
    {
        $service = match ($shipment->courier) {
            'pathao' => app(PathaoCourierService::class),
            'steadfast' => app(SteadfastCourierService::class),
            'redx' => app(RedxCourierService::class),
            default => throw new \RuntimeException('Invalid courier.')
        };

        $response = $service->trackShipment($shipment);

        $status =
            data_get($response, 'data.delivery_status')
            ?? data_get($response, 'delivery_status')
            ?? data_get($response, 'data.status')
            ?? data_get($response, 'status');

        DB::transaction(function () use ($shipment, $response, $status) {

            if ($status) {
                $shipment->status = $status;
            }

            $shipment->tracking_response = $response;
            $shipment->last_tracked_at = now();

            $shipment->save();
        });

        return $response;
    }
}
