<?php

use App\Models\Product;
use App\Models\Review;
use App\Models\User;

test('admin can view the reviews management index', function () {
    $admin = User::factory()->create(['role_id' => 1]);
    $product = Product::create([
        'name' => 'Test Product',
        'slug' => 'test-product',
        'price' => 99.99,
        'stock' => 10,
    ]);
    $review = Review::create([
        'user_id' => $admin->id,
        'product_id' => $product->id,
        'title' => 'Great product',
        'description' => 'Very solid experience',
        'rating' => 5,
        'status_id' => 1,
    ]);

    $response = $this
        ->actingAs($admin)
        ->get('/dashboard/reviews');

    $response
        ->assertOk()
        ->assertSee($review->title);
});

test('admin can create a review', function () {
    $admin = User::factory()->create(['role_id' => 1]);
    $product = Product::create([
        'name' => 'New Product',
        'slug' => 'new-product',
        'price' => 29.99,
        'stock' => 5,
    ]);

    $response = $this
        ->actingAs($admin)
        ->post('/dashboard/reviews', [
            'user_id' => $admin->id,
            'product_id' => $product->id,
            'title' => 'Lovely item',
            'description' => 'The quality is excellent',
            'rating' => 4,
            'status_id' => 1,
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect('/dashboard/reviews');

    $this->assertDatabaseHas('reviews', [
        'title' => 'Lovely item',
        'product_id' => $product->id,
    ]);
});
