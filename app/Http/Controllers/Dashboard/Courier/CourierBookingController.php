<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Services\Courier\CourierBookingService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Throwable;

class CourierBookingController extends Controller
{
    public function store(
        Request $request,
        Order $order,
        CourierBookingService $bookingService
    ) {
        $validated = $request->validate([
            'courier' => 'required|in:pathao,steadfast,redx',

            // Common fields
            'weight' => 'nullable|numeric|min:0.5',
            'instruction' => 'nullable|string|max:500',

            // Pathao
            'store_id' => 'nullable|string',
            'recipient_city' => 'nullable|integer',
            'recipient_zone' => 'nullable|integer',
            'recipient_area' => 'nullable|integer',

            // Steadfast
            'note' => 'nullable|string|max:500',

            // RedX
            'delivery_area' => 'nullable|string',
            'delivery_area_id' => 'nullable|integer',
            'pickup_store_id' => 'nullable|string',
        ]);

        try {
            $shipment = $bookingService->book(
                $order,
                $validated['courier'],
                $validated
            );

            return redirect()
                ->back()
                ->with('success', 'Courier booking successful.');

        } catch (Throwable $e) {

            Log::error('Courier booking failed', [
                'order_id' => $order->id,
                'courier' => $validated['courier'],
                'error' => $e->getMessage(),
            ]);

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Courier booking failed. Please check courier settings and try again.');
        }
    }
}
