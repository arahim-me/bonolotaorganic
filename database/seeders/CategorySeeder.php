<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Electronics', 'slug' => 'electronics', 'description' => 'Electronic devices and gadgets.'],
            ['name' => 'Fashion', 'slug' => 'fashion', 'description' => 'Clothing, shoes, and accessories.'],
            ['name' => 'Home & Kitchen', 'slug' => 'home-kitchen', 'description' => 'Home appliances and kitchenware.'],
            ['name' => 'Books', 'slug' => 'books', 'description' => 'Books and literature.'],
            ['name' => 'Sports & Outdoors', 'slug' => 'sports-outdoors', 'description' => 'Sports equipment and outdoor gear.'],
        ];

        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
