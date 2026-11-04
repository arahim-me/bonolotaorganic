<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\Status;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class OrderController extends Controller
{
    public function index()
    {
        $title = 'Orders';
        $orders = Order::with(['user', 'status'])->latest()->paginate(15);

        return view('dashboard.orders.index', compact('orders', 'title'));
    }

    public function create()
    {
        $title = 'Create Order';
        $users = User::orderBy('name')->get(['id', 'name', 'phone']);
        $products = Product::orderBy('name')->get(['id', 'name', 'price']);
        $statuses = Status::whereIn('name', ['Pending', 'Processing', 'Completed', 'Cancelled', 'On Hold'])
            ->orderBy('id')
            ->get(['id', 'name']);
        $paymentMethods = PaymentMethod::orderBy('name')->get(['id', 'name']);
        $defaultStatusId = $statuses->firstWhere('name', 'Pending')?->id ?? $statuses->first()?->id;

        return view('dashboard.orders.create', compact(
            'title',
            'users',
            'products',
            'statuses',
            'paymentMethods',
            'defaultStatusId'
        ));
    }

    public function store(StoreOrderRequest $request)
    {
        $validated = $request->validated();
        $order = DB::transaction(function () use ($validated) {
            $requestedItems = collect($validated['items']);
            $productIds = $requestedItems->pluck('product_id')->unique()->values();
            $products = Product::whereKey($productIds)
                ->lockForUpdate()
                ->get()
                ->keyBy('id');

            if ($products->count() !== $productIds->count()) {
                throw ValidationException::withMessages([
                    'items' => 'A selected product is no longer available. Please review the order items.',
                ]);
            }

            $grandTotal = 0;
            $orderItems = $requestedItems->map(function (array $item) use ($products, &$grandTotal) {
                $price = (float) $products->get($item['product_id'])->price;
                $total = round($price * (int) $item['quantity'], 2);
                $grandTotal = round($grandTotal + $total, 2);

                return [
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $price,
                    'total' => $total,
                ];
            })->all();

            $order = Order::create([
                'user_id' => $validated['user_id'],
                'order_number' => 'ORD-'.Str::upper((string) Str::uuid()),
                'grand_total' => $grandTotal,
                'status_id' => $validated['status_id'],
                'payment_method' => $validated['payment_method'],
                'payment_status' => (bool) $validated['payment_status'],
                'shipping_address' => $validated['shipping_address'],
                'shipping_phone' => $validated['shipping_phone'],
            ]);

            $order->items()->createMany($orderItems);

            return $order;
        });

        return redirect()->route('orders.show', $order)->with('success', 'Order created successfully.');
    }

    public function show(Order $order)
    {
        $order->load(['user', 'status', 'paymentMethod', 'items.product']);

        return view('dashboard.orders.show', compact('order'));
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('orders.index')->with('success', 'Order deleted');
    }
}
