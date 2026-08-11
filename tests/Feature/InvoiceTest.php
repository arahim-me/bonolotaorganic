<?php

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;

it('renders a printable invoice for an order', function () {
    $admin = User::factory()->create(['role_id' => 1]);

    $order = Order::create([
        'user_id' => $admin->id,
        'order_number' => 'INV-1001',
        'status' => 'pending',
        'total' => 125.50,
        'shipping_address' => "123 Main St\nDhaka",
        'payment_method' => 'Cash on Delivery',
        'placed_at' => now(),
    ]);

    OrderItem::create([
        'order_id' => $order->id,
        'product_id' => null,
        'quantity' => 2,
        'price' => 50.00,
        'total' => 100.00,
    ]);

    $response = $this->actingAs($admin)->get(route('orders.invoice', $order));

    $response->assertOk();
    $response->assertSee('Invoice');
    $response->assertSee($order->order_number);
    $response->assertSee('Cash on Delivery');
});
