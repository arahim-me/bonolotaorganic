<?php

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

test('admin can create a category with an image', function () {
    $admin = User::factory()->create(['role_id' => 1]);
    $token = Str::random(40);
    $image = UploadedFile::fake()->createWithContent(
        'category.png',
        base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAADUlEQVR4nGP4z8AAAAMBAQDJ/pLvAAAAAElFTkSuQmCC', true),
    );

    $response = $this
        ->actingAs($admin)
        ->withSession(['_token' => $token])
        ->post(route('categories.store'), [
            '_token' => $token,
            'name' => 'Fresh Produce',
            'description' => 'Fresh fruits and vegetables',
            'image' => $image,
        ]);

    $response
        ->assertSessionHasNoErrors()
        ->assertRedirect(route('categories.index'));

    $category = Category::where('name', 'Fresh Produce')->firstOrFail();
    $imagePath = public_path('uploads/categories/'.$category->image);

    expect($category->image)->not->toBeEmpty()
        ->and(file_exists($imagePath))->toBeTrue();

    unlink($imagePath);
});

test('updating a category image deletes the previous image', function () {
    $admin = User::factory()->create(['role_id' => 1]);
    $token = Str::random(40);
    $previousImage = 'old-category-'.uniqid().'.png';
    $previousImagePath = public_path('uploads/categories/'.$previousImage);
    file_put_contents($previousImagePath, 'previous image');

    $category = Category::create([
        'name' => 'Seasonal Produce',
        'slug' => 'seasonal-produce',
        'image' => $previousImage,
    ]);

    $replacementImage = UploadedFile::fake()->createWithContent(
        'replacement.png',
        base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAIAAACQd1PeAAAADUlEQVR4nGP4z8AAAAMBAQDJ/pLvAAAAAElFTkSuQmCC', true),
    );

    try {
        $response = $this
            ->actingAs($admin)
            ->withSession(['_token' => $token])
            ->put(route('categories.update', $category), [
                '_token' => $token,
                'name' => 'Seasonal Produce',
                'image' => $replacementImage,
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect(route('categories.index'));

        $category->refresh();
        $newImagePath = public_path('uploads/categories/'.$category->image);

        expect($category->image)->not->toBe($previousImage)
            ->and(file_exists($newImagePath))->toBeTrue()
            ->and(file_exists($previousImagePath))->toBeFalse();
    } finally {
        if (is_file($previousImagePath)) {
            unlink($previousImagePath);
        }

        if (isset($newImagePath) && is_file($newImagePath)) {
            unlink($newImagePath);
        }
    }
});
