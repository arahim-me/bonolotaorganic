<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Color;
use App\Models\Size;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Smartphone',
                'slug' => 'smartphone',
                'description' => 'A high-end smartphone with a sleek design.',
                'price' => 699.99,
                'category_id' => 1,
            ],
            [
                'name' => 'Running Shoes',
                'slug' => 'running-shoes',
                'description' => 'Comfortable running shoes for daily workouts.',
                'price' => 89.99,
                'category_id' => 2,
            ],
            [
                'name' => 'Blender',
                'slug' => 'blender',
                'description' => 'A powerful blender for smoothies and shakes.',
                'price' => 49.99,
                'category_id' => 3,
            ],
            [
                'name' => 'Novel Book',
                'slug' => 'novel-book',
                'description' => 'An engaging novel for leisure reading.',
                'price' => 14.99,
                'category_id' => 4,
            ],
            [
                'name' => 'Yoga Mat',
                'slug' => 'yoga-mat',
                'description' => 'A non-slip yoga mat for your daily practice.',
                'price' => 29.99,
                'category_id' => 5,
            ],
        ];

        $sizes = ['S', 'M', 'L', 'XL', 'XXL'];

        $colors = [
            'Red',
            'Green',
            'Blue',
            'Black',
            'White',
        ];

        DB::transaction(function () use ($products, $sizes, $colors) {

            foreach ($products as $productData) {

                // Create Product
                $product = Product::create($productData);

                // Create Product Colors
                foreach ($colors as $color) {
                    $product->colors()->create([
                        'color' => $color,
                    ]);
                }

                // Create Product Sizes
                foreach ($sizes as $size) {
                    $product->sizes()->create([
                        'size' => $size,
                    ]);
                }
            }

        });
    }
}
