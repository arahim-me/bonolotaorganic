<?php

namespace Database\Seeders;

use App\Models\ShippingFee;
use Illuminate\Database\Seeder;

class ShippingFeeSeeder extends Seeder
{
    public function run(): void
    {
        $shippingFees = [
            [
                'title' => 'Inside Dhaka',
                'slug' => 'inside-dhaka',
                'description' => 'Delivery charge inside Dhaka city.',
                'fee' => 60,
            ],
            [
                'title' => 'Outside Dhaka',
                'slug' => 'outside-dhaka',
                'description' => 'Delivery charge outside Dhaka city.',
                'fee' => 120,
            ],
            [
                'title' => 'Express Delivery',
                'slug' => 'express-delivery',
                'description' => 'Express delivery service.',
                'fee' => 150,
            ],
        ];

        foreach ($shippingFees as $shippingFee) {
            ShippingFee::create($shippingFee);
        }
    }
}
