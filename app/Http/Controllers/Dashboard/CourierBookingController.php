<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Status;
use App\Services\PathaoCourierService;
use Illuminate\Http\Request;

class CourierBookingController extends Controller
{
    public function bookCourier(Request $request, $order_id)
    {

        $request->validate(['courier' => ['required']]);

        $order = Order::findOrFail($order_id);

        if ($request->courier == 'pathao') {

            $inCourierStatus = Status::where('slug', 'in-courier')->first();
            $pathao = new PathaoCourierService();
            // return $pathao->getStores();
            $response = $pathao->placeOrder([
                'store_id' => 44,        // required  | integer  | Your merchant store ID (sets pickup location)
                'merchant_order_id' => $order->order_number,    // nullable  | string   | Your own order tracking ID
                'recipient_name' => $order->user->name,   // required  | string   | 3–100 characters
                'recipient_phone' => $order->user->phone,// required  | string   | Must be 11 characters
                // 'recipient_secondary_phone' => '015XXXXXXXX',// nullable  | string   | Must be 11 characters
                'recipient_address' => 'House 123, Road 4, Sector 10, Uttara, Dhaka-1230, Bangladesh', // required | string | 10–220 characters
                // 'recipient_city' => null,            // nullable  | integer  | city_id from getCities(); auto-detected if omitted
                // 'recipient_zone' => null,          // nullable  | integer  | zone_id from getZones(); auto-detected if omitted
                // 'recipient_area' => null,           // nullable  | integer  | area_id from getAreas(); auto-detected if omitted
                'delivery_type' => 48,           // required  | integer  | 48 = Normal Delivery, 12 = On Demand Delivery
                'item_type' => 2,            // required  | integer  | 1 = Document, 2 = Parcel
                'item_quantity' => 1,            // required  | integer  | Number of parcels
                'item_weight' => 0.5,          // required  | float    | Min: 0.5 kg — Max: 10 kg
                'amount_to_collect' => (int) $order->grand_total + $order->shipping_fee,          // required  | integer  | COD amount; use 0 for non-COD orders
                'item_description' => 'Clothing item', // nullable | string | Brief description of the parcel
                'special_instruction' => 'Handle with care',         // nullable | string | Delivery instructions for the courier
            ]);

            $data = $response['data'] ?? [];

            $order->courier = 'pathao';
            $order->status_id = $inCourierStatus->id;
            $order->tracking_number = $data['consignment_id'] ?? null;
            $order->courier_status = $data['order_status'] ?? null;

            $order->save();
            return redirect()->route('dashboard.orders.index')->with('success', 'Courier boking successful!');

        }

    }
    public function checkCourierStatus($request)
    {
        // return $request;
        $order = Order::findOrFail($request);
        $pathao = new PathaoCourierService();
        $response = $pathao->getOrderInfo($order->tracking_number);
        $data = $response['data'] ?? [];
        $order->courier_status = $data['order_status'] ?? null;
        $order->save();
        return redirect()->back()->with('success', 'Courier Status Checked Successfull!');
    }
}
