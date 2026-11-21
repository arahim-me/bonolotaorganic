<?php

namespace Database\Seeders;

use App\Models\Courier;
use Illuminate\Database\Seeder;

class CourierSeeder extends Seeder
{
    public function run(): void
    {
        $couriers = [
            [
                'name' => 'Pathao',
                'slug' => 'pathao',
                'base_url' => 'https://api-hermes.pathao.com',
            ],
            [
                'name' => 'Steadfast',
                'slug' => 'steadfast',
                'base_url' => 'https://portal.packzy.com/api/v1',
            ],
            [
                'name' => 'RedX',
                'slug' => 'redx',
                'base_url' => 'https://openapi.redx.com.bd/v1.0.0-beta',
            ],
        ];

        foreach ($couriers as $courier) {
            Courier::updateOrCreate(
                ['slug' => $courier['slug']],
                $courier
            );
        }
    }
}
