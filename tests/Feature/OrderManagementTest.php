<?php

use App\Models\Order;
use App\Models\PaymentMethod;
use App\Models\Product;
use App\Models\Status;
use App\Models\User;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;

test('admin can view the order creation form', function () {
    $admin = User::factory()->create(['role_id' => 1]);
    $pending = Status::create(['name' => 'Pending', 'slug' => 'pending']);
    PaymentMethod::create([
        'name' => 'Cash on Delivery',
        'type' => 2,
        'is_active' => true,
        'status_id' => $pending->id,
    ]);
    $product = Product::create([
        'name' => 'Test Product',
        'slug' => 'test-product',
        'price' => 25.50,
        'stock' => 5,
    ]);

    $response = $this->actingAs($admin)->get(route('orders.create'));

    $response
        ->assertOk()
        ->assertSee('Order Information')
        ->assertSee('Order Items')
        ->assertSee($product->name)
        ->assertSee('Shipping Address');
});

test('admin can create an order and its items using product prices', function () {
    $this->withoutMiddleware(ValidateCsrfToken::class);

    $admin = User::factory()->create(['role_id' => 1]);
    $pending = Status::create(['name' => 'Pending', 'slug' => 'pending']);
    $paymentMethod = PaymentMethod::create([
        'name' => 'Cash on Delivery',
        'type' => 2,
        'is_active' => true,
        'status_id' => $pending->id,
    ]);
    $firstProduct = Product::create([
        'name' => 'First Product',
        'slug' => 'first-product',
        'price' => 25.50,
        'stock' => 5,
    ]);
    $secondProduct = Product::create([
        'name' => 'Second Product',
        'slug' => 'second-product',
        'price' => 10,
        'stock' => 8,
    ]);

    $response = $this->actingAs($admin)->post(route('orders.store'), [
        'user_id' => $admin->id,
        'status_id' => $pending->id,
        'payment_method' => $paymentMethod->id,
        'payment_status' => '0',
        'shipping_address' => '12 Example Street, Dhaka',
        'shipping_phone' => '01700000000',
        'grand_total' => '0.01',
        'items' => [
            ['product_id' => $firstProduct->id, 'quantity' => 2],
            ['product_id' => $secondProduct->id, 'quantity' => 3],
        ],
    ]);

    $response->assertSessionHasNoErrors();
    $response->assertRedirect();
    expect($response->getTargetUrl())->toBe(route('orders.show', 1));

    $order = Order::with('items')->firstOrFail();

    expect($order->order_number)->toStartWith('ORD-')
        ->and((float) $order->grand_total)->toBe(81.0)
        ->and($order->payment_status)->toBeFalse()
        ->and($order->items)->toHaveCount(2);

    $this->assertDatabaseHas('order_items', [
        'order_id' => $order->id,
        'product_id' => $firstProduct->id,
        'quantity' => 2,
        'price' => '25.50',
        'total' => '51.00',
    ]);
    $this->assertDatabaseHas('order_items', [
        'order_id' => $order->id,
        'product_id' => $secondProduct->id,
        'quantity' => 3,
        'price' => '10.00',
        'total' => '30.00',
    ]);
});
