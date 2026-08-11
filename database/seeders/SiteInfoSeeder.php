<?php

namespace Database\Seeders;

use App\Models\SiteInfo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $social_links = [
            [
                'name' => 'Facebook',
                'url' => 'https://facebook.com',
                'icon' => 'fab fa-facebook',
            ],
            [
                'name' => 'Twitter',
                'url' => 'https://twitter.com',
                'icon' => 'fab fa-twitter',
            ],
            [
                'name' => 'Instagram',
                'url' => 'https://instagram.com',
                'icon' => 'fab fa-instagram',
            ],
        ];
        SiteInfo::create([
            'name' => 'My E-commerce Site',
            'email' => ['example@example.com'],
            'phone' => ['01712345678'],
            'socials' => $social_links,
            'address' => ['123 Main Street, City, Country'],
        ]);
    }
}


