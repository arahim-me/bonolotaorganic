<?php

namespace App\Services\Courier;

use App\Models\Order;
use App\Models\CourierSetting;
use App\Models\CourierShipment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
use RuntimeException;
use Throwable;

class CourierBookingService
{
    public function __construct(
        protected CourierManager $manager
    ) {
    }

    public function book(
        Order $order,
        string $courier,
        array $data = []
    ): CourierShipment {

        return Cache::lock('courier-booking-' . $order->id, 30)
            ->block(10, function () use ($order, $courier, $data) {

                $existing = CourierShipment::where('order_id', $order->id)
                    ->where('courier', $courier)
                    ->first();

                if ($existing && $existing->consignment_id) {
                    throw new RuntimeException(
                        'This order is already booked with this courier.'
                    );
                }

                $setting = CourierSetting::where('courier', $courier)
                    ->where('is_active', true)
                    ->firstOrFail();

                $service = match ($courier) {
                    'pathao' => new PathaoCourierService($setting),
                    'steadfast' => new SteadfastCourierService($setting),
                    'redx' => new RedxCourierService($setting),
                    default => throw new RuntimeException('Invalid courier.')
                };

                try {
                    $response = $service->createShipment($order, $data);

                    $consignmentId =
                        data_get($response, 'data.consignment_id')
                        ?? data_get($response, 'consignment_id');

                    $trackingCode =
                        data_get($response, 'data.tracking_code')
                        ?? data_get($response, 'tracking_code')
                        ?? data_get($response, 'tracking_id');

                    if (!$consignmentId && !$trackingCode) {
                        throw new RuntimeException(
                            'Courier booking response does not contain tracking information.'
                        );
                    }

                    return DB::transaction(function () use ($order, $setting, $courier, $response, $consignmentId, $trackingCode, $data, $existing) {
                        $shipment = $existing ?? new CourierShipment();

                        $shipment->fill([
                            'order_id' => $order->id,
                            'courier_setting_id' => $setting->id,
                            'courier' => $courier,
                            'invoice' => $order->order_number,
                            'consignment_id' => $consignmentId,
                            'tracking_code' => $trackingCode,
                            'recipient_name' => $order->shipping_name,
                            'recipient_phone' => $order->shipping_phone,
                            'recipient_address' => $order->shipping_address,
                            'cod_amount' => $data['cod_amount'] ?? 0,
                            'delivery_charge' => $data['delivery_charge'] ?? 0,
                            'status' => data_get($response, 'data.status')
                                ?? data_get($response, 'status')
                                ?? 'booked',
                            'booking_response' => $response,
                        ]);

                        $shipment->save();

                        return $shipment;
                    });

                } catch (Throwable $e) {

                    report($e);

                    throw $e;
                }
            });
    }
}
