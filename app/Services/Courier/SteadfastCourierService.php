<?php

namespace App\Services\Courier;

use App\Models\CourierSetting;
use App\Models\Order;
use App\Models\CourierShipment;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class SteadfastCourierService
{
    protected string $baseUrl;
    protected array $credentials;

    public function __construct(?CourierSetting $setting = null)
    {
        $setting ??= CourierSetting::where('courier', 'steadfast')
            ->where('is_active', true)
            ->first();

        if (!$setting) {
            throw new RuntimeException('Steadfast credentials not configured.');
        }

        $this->baseUrl = rtrim(
            $setting->base_url ?: 'https://portal.packzy.com/api/v1',
            '/'
        );

        $this->credentials = [
            'api_key' => $setting->api_key,
            'secret_key' => $setting->secret_key,
        ];
    }

    protected function request()
    {
        return Http::timeout(30)
            ->acceptJson()
            ->asJson()
            ->withHeaders([
                'Api-Key' => $this->credentials['api_key'],
                'Secret-Key' => $this->credentials['secret_key'],
            ]);
    }

    public function testConnection(): array
    {
        $response = $this->getBalance();

        return [
            'success' => true,
            'message' => 'Steadfast connection successful.',
            'data' => $response,
        ];
    }

    public function createShipment(Order $order, array $data = []): array
    {
        $payload = [
            'invoice' => $order->order_number,
            'recipient_name' => $order->shipping_name,
            'recipient_phone' => $order->shipping_phone,
            'recipient_address' => $order->shipping_address,
            'cod_amount' => $data['cod_amount'] ?? 0,
            'note' => $data['note'] ?? '',
            'alternative_phone' => $data['alternative_phone'] ?? null,
            'item_description' => $data['item_description'] ?? '',
        ];

        return $this->request()
            ->post($this->baseUrl . '/create_order', $payload)
            ->throw()->json();
    }

    public function trackShipment(CourierShipment $shipment): array
    {
        if (!$shipment->consignment_id) {
            throw new RuntimeException('Steadfast consignment ID missing.');
        }

        return $this->request()
            ->get(
                $this->baseUrl . '/status_by_cid/' .
                $shipment->consignment_id
            )->throw()->json();
    }

    public function trackByInvoice(string $invoice): array
    {
        return $this->request()
            ->get($this->baseUrl . '/status_by_invoice/' . urlencode($invoice))
            ->throw()->json();
    }

    public function trackByTrackingCode(string $code): array
    {
        return $this->request()
            ->get($this->baseUrl . '/status_by_trackingcode/' . urlencode($code))
            ->throw()->json();
    }

    public function getTrackingHistory(string $invoice): array
    {
        return $this->request()
            ->get($this->baseUrl . '/trackings_by_invoice/' . urlencode($invoice))
            ->throw()->json();
    }

    public function cancelShipment(CourierShipment $shipment): array
    {
        throw new RuntimeException(
            'Use the Steadfast return request API for return processing. Cancellation is not implemented here.'
        );
    }

    public function createReturnRequest(CourierShipment $shipment, ?string $reason = null): array
    {
        return $this->request()
            ->post($this->baseUrl . '/create_return_request', [
                'consignment_id' => $shipment->consignment_id,
                'reason' => $reason,
            ])->throw()->json();
    }

    public function getBalance(): array
    {
        return $this->request()
            ->get($this->baseUrl . '/get_balance')
            ->throw()->json();
    }

    public function getPoliceStations(): array
    {
        return $this->request()
            ->get($this->baseUrl . '/police_stations')
            ->throw()->json();
    }

    // public function fraudCheck(string $phone): array
    // {
    //     return $this->request()
    //         ->get($this->baseUrl . '/fraud_check/score/' . urlencode($phone))
    //         ->throw()->json();
    // }


    /*
    |--------------------------------------------------------------------------
    | Steadfast Customer Fraud Check
    |--------------------------------------------------------------------------
    */

    public function checkCustomerFraud(string $phone): array
    {
        $phone = preg_replace('/\D/', '', $phone);

        try {

            $response = $this->request()
                ->get(
                    $this->baseUrl . '/fraud_check/score/' . urlencode($phone)
                )
                ->throw()
                ->json();

            return [
                'courier' => 'steadfast',
                'available' => true,
                'success' => true,
                'phone' => $phone,
                'data' => $response,
            ];

        } catch (\Throwable $e) {

            report($e);

            return [
                'courier' => 'steadfast',
                'available' => false,
                'success' => false,
                'phone' => $phone,
                'message' => 'Steadfast fraud check failed.',
            ];
        }
    }


}
