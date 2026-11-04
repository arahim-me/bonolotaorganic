<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Smartphone',
                'slug' => 'smartphone',
                'description' => 'A high-end smartphone with a sleek design.',
                'price' => 699.99,
                'category_id' => 1, // Assuming category_id 1 corresponds to Electronics
            ],
            [
                'name' => 'Running Shoes',
                'slug' => 'running-shoes',
                'description' => 'Comfortable running shoes for daily workouts.',
                'price' => 89.99,
                'category_id' => 2, // Assuming category_id 2 corresponds to Fashion
            ],
            [
                'name' => 'Blender',
                'slug' => 'blender',
                'description' => 'A powerful blender for smoothies and shakes.',
                'price' => 49.99,
                'category_id' => 3, // Assuming category_id 3 corresponds to Home & Kitchen
            ],
            [
                'name' => 'Novel Book',
                'slug' => 'novel-book',
                'description' => 'An engaging novel for leisure reading.',
                'price' => 14.99,
                'category_id' => 4, // Assuming category_id 4 corresponds to Books
            ],
            [
                'name' => 'Yoga Mat',
                'slug' => 'yoga-mat',
                'description' => 'A non-slip yoga mat for your daily practice.',
                'price' => 29.99,
                'category_id' => 5, // Assuming category_id 5 corresponds to Sports & Outdoors
            ],
        ];

        foreach ($products as $product) {
            \App\Models\Product::create($product);
        }
    }
}
