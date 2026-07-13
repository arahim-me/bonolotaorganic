<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\UploadedFile;

it('stores thumbnails and gallery images in the public uploads folders', function () {
    $user = User::factory()->create(['role_id' => 1]);

    $this->actingAs($user);

    $thumbnail = UploadedFile::fake()->image('thumb.jpg', 1200, 900);
    $galleryImage = UploadedFile::fake()->image('gallery.jpg', 1200, 900);

    $response = $this->post(route('products.store'), [
        'name' => 'Test Product',
        'price' => 99.99,
        'stock' => 10,
        'thumbnail' => $thumbnail,
        'images' => [$galleryImage],
    ]);

    $response->assertRedirect(route('products.index'));
    $response->assertSessionHas('success');

    $product = Product::latest('id')->first();

    expect($product)->not->toBeNull()
        ->and($product->thumbnail)->toBeString()
        ->and($product->images)->toBeArray()
        ->and($product->images[0])->toBeString();

    expect(file_exists(public_path('uploads/products/thumbnails/' . $product->thumbnail)))->toBeTrue();
    expect(file_exists(public_path('uploads/products/images/' . $product->images[0])))->toBeTrue();
});
