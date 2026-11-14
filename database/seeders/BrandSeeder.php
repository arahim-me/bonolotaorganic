<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Brands
        $brands = [
            [
                'name' => 'Aarong',
                'slug' => 'aarong',
                'description' => 'A pioneering lifestyle brand in Bangladesh famous for celebrating traditional heritage, ethnic wear, artisan textiles, and handcrafted goods.',
                'is_published' => true,
            ],
            [
                'name' => 'Yellow',
                'slug' => 'yellow',
                'description' => 'A premier contemporary fashion house offering modern, minimalist, and trendy western and fusion wear for urban lifestyles.',
                'is_published' => true,
            ],
            [
                'name' => 'Sailor',
                'slug' => 'sailor',
                'description' => 'A popular choice for fashion-forward youth, delivering a vibrant mix of fusion-deshi, street styles, and seasonal collections.',
                'is_published' => true,
            ],
            [
                'name' => 'Rang Bangladesh',
                'slug' => 'rang-bangladesh',
                'description' => 'A cultural boutique brand celebrated for theme-based ethnic clothing, local fabrics, block prints, and festive attire.',
                'is_published' => true,
            ],
            [
                'name' => 'Le Reve',
                'slug' => 'le-reve',
                'description' => 'A leading fashion label providing value-conscious, comfortable, and trendy everyday wear for men, women, and children.',
                'is_published' => true,
            ],
        ];

        //Seeding the brands
        foreach ($brands as $brand) {
            Brand::create($brand);
        }

    }
}
