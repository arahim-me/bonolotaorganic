<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Seed the reviews table with some sample data
        $reviews = [
            ['user_id' => 6,
            'product_id' => 1,
            'comment' => 'Great product!',
            'rating' => 5,
            'is_approved' => true,
            'approved_by' => 1,
            'approved_at' => now(),],
            ['user_id' => 5,
            'product_id' => 2,
            'comment' => 'Not bad, but could be better.',
            'rating' => 3,
            'is_approved' => true,
            'approved_by' => 2,
            'approved_at' => now(),],
            ['user_id' => 6,
            'product_id' => 3,
            'comment' => 'I love it! Highly recommend.',
            'rating' => 5,
            'is_approved' => true,
            'approved_by' => 3,
            'approved_at' => now(),],
            ['user_id' => 5,
            'product_id' => 4,
            'comment' => 'It broke after a week of use.',
            'rating' => 1,
            'is_approved' => true,
            'approved_by' => 4,
            'approved_at' => now(),],
            ['user_id' => 6,
            'product_id' => 5,
            'comment' => 'Decent quality for the price.',
            'rating' => 4,
            'is_approved' => true,
            'approved_by' => 1,
            'approved_at' => now(),],
        ];

        foreach ($reviews as $review) {
            \App\Models\Review::create($review);
        }
    }
}
