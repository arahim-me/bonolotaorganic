<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\ShippingFee;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
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
        $shippingFees = ShippingFee::where('is_published', true)->latest()->get();
        $users = User::orderBy('name')->get(['id', 'name', 'phone']);
        $products = Product::orderBy('name')->get(['id', 'name', 'price']);
        $statuses = Status::whereIn('name', ['Pending', 'Processing', 'In Progress', 'Completed', 'Cancelled', 'On Hold'])
            ->orderBy('id')
            ->get(['id', 'name']);
        $paymentMethods = PaymentMethod::orderBy('name')->get(['id', 'name']);
        $defaultStatusId = $statuses->firstWhere('name', 'Pending')?->id ?? $statuses->first()?->id;
        $searchedCustomer = null;

        if (request()->filled('customer_phone')) {
            $searchedCustomer = User::where(
                'phone',
                request('customer_phone')
            )->first();
        }
        return view('dashboard.orders.create', compact(
            'title',
            'users',
            'products',
            'statuses',
            'paymentMethods',
            'defaultStatusId',
            'shippingFees',
            'searchedCustomer'
        ));
    }


    public function customerLookup(Request $request)
    {
        $request->validate([
            'customer_phone' => ['required', 'string'],
        ]);

        $user = User::where('phone', $request->customer_phone)->first();

        if ($user) {
            return redirect()->back()
                ->withInput()
                ->with('searchedCustomer', $user)
                ->with('customerSearched', true);
        }

        return redirect()->back()
            ->withInput()
            ->with('searchedCustomer', null)
            ->with('customerSearched', true)
            ->with('error', 'Customer not found.');
    }



    public function customerFix(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => [
                'required',
                'string',
                'max:20',
                Rule::unique('users', 'phone')->ignore($request->user_id),
            ],
            'email' => [
                'nullable',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($request->user_id),
            ],
            'address' => ['required', 'string', 'max:500'],
        ]);

        // return $validated;

        if ($request->user_id) {
            $user = User::findOrFail($request->user_id);
            $user->update($validated);
            return redirect()->back()
                ->withInput()
                ->with('searchedCustomer', $user)
                ->with('customerSearched', $user->phone);
        } else {
            $user = User::create($validated);
            return redirect()->back()
                ->withInput()
                ->with('searchedCustomer', $user)
                ->with('customerSearched', $user->phone);
        }
    }


    public function store(StoreOrderRequest $request)
    {

        $validated = $request->validated();
        $order = DB::transaction(function () use ($validated) {
            $onHoldStatusId = Status::where('slug', 'on-hold')->first()?->id;
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
                'order_number' => null,
                'grand_total' => $grandTotal,
                'status_id' => $onHoldStatusId,
                'shipping_fee' => $validated['shipping_fee'],
                'payment_method' => $validated['payment_method'],
                'payment_status' => (bool) $validated['payment_status'],
            ]);

            $orderNumber = $order->update([
                'order_number' => 'ORD-' . $order->created_at->format('Ymd') . '-' . $order->id
            ]);

            $order->items()->createMany($orderItems);
            $admins = [1, 2, 3, 4, 5];
            foreach ($admins as $admin) {
                Notification::create([
                    'user_id' => $admin,
                    'type' => 'order_created',
                    'title' => 'New Order Received',
                    'content' => 'You have received a new order #' . $order->order_number,
                    'return_url' => route('dashboard.orders.show', $order->id),
                ]);
            }
            return $order;
        });

        return redirect()->route('dashboard.orders.show', $order)->with('success', 'Order created successfully.');
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id);
        $title = 'Edit Order | ' . $order->order_number;
        $shippingFees = ShippingFee::where('is_published', true)->latest()->get();
        $user = User::orderBy('name')->get(['id', 'name', 'phone']);
        $products = Product::orderBy('name')->get(['id', 'name', 'price']);
        $statuses = Status::whereIn('name', ['Pending', 'Processing', 'In Progress', 'Completed', 'Cancelled', 'On Hold'])
            ->orderBy('id')
            ->get(['id', 'name']);
        $paymentMethods = PaymentMethod::orderBy('name')->get(['id', 'name']);
        $defaultStatusId = $statuses->firstWhere('name', 'Pending')?->id ?? $statuses->first()?->id;
        $searchedCustomer = null;

        if (request()->filled('customer_phone')) {
            $searchedCustomer = User::where(
                'phone',
                request('customer_phone')
            )->first();
        }
        return view('dashboard.orders.edit', compact(
            'title',
            'user',
            'order',
            'products',
            'statuses',
            'paymentMethods',
            'defaultStatusId',
            'shippingFees',
        ));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'payment_method' => ['required', 'exists:payment_methods,id'],
            'payment_status' => ['required', 'in:0,1'],
            'shipping_fee_id' => ['required', 'numeric', 'min:0'],

            'items' => ['required', 'array', 'min:1'],
            'items.*.product_id' => ['required', 'exists:products,id'],
            'items.*.quantity' => ['required', 'integer', 'min:1'],
        ]);

        DB::transaction(function () use ($validated, $order) {

            $subtotal = 0;
            $orderItems = [];

            foreach ($validated['items'] as $item) {

                $product = Product::findOrFail($item['product_id']);

                $quantity = (int) $item['quantity'];
                $price = (float) $product->price;

                $lineTotal = $price * $quantity;

                $subtotal += $lineTotal;

                $orderItems[] = [
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'price' => $price,
                    'total' => $lineTotal,
                ];
            }

            $shippingFee = (float) $validated['shipping_fee_id'];

            // Update Order
            $order->update([
                'payment_method' => $validated['payment_method'],
                'payment_status' => $validated['payment_status'],
                'shipping_fee' => $shippingFee,
                'subtotal' => $subtotal,
                'grand_total' => $subtotal + $shippingFee,
            ]);

            // Replace Existing Order Items
            $order->items()->delete();

            foreach ($orderItems as $item) {
                $order->items()->create($item);
            }

        });

        return redirect()
            ->route('dashboard.orders.index')
            ->with('success', 'Order updated successfully!');
    }


    public function show(Order $order)
    {
        $order->load(['user', 'status', 'paymentMethod', 'items.product']);
        // return $order->grand_total;
        return view('dashboard.orders.show', compact('order'));
    }

    public function accept($order_id)
    {
        $acceptedStatus = Status::where('slug', 'accepted')->first();
        $order = Order::findOrFail($order_id);
        $order->update(['is_accept' => true, 'status_id' => $acceptedStatus->id]);
        return redirect()->back()->with('success', 'Order successfully accepted!');

    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('dashboard.orders.index')->with('success', 'Order deleted');
    }
}
