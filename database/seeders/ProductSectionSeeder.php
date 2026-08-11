<?php

namespace Database\Seeders;

use App\Models\ProductSection;
use Illuminate\Database\Seeder;

class ProductSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            [
                'user_id' => 1,
                'name' => 'Hero Section',
                'slug' => 'hero',
                'description' => 'Items will be displayed with a Slider in the hero section of the homepage.',
                'position' => 1,
                'status_id' => 2,
            ],
            [
                'user_id' => 1,
                'name' => 'Category Section',
                'slug' => 'category',
                'description' => 'All items of this section will be displayed in the category section of the homepage which is active.',
                'position' => 2,
                'status_id' => 2,
            ],
            [
                'user_id' => 1,
                'name' => 'Trending Section',
                'slug' => 'trending',
                'description' => 'Trending products will be displayed in the homepage.',
                'position' => 3,
                'status_id' => 2,
            ],
            [
                'user_id' => 1,
                'name' => 'Deal Section',
                'slug' => 'deal',
                'description' => 'Special deals will be displayed in the homepage.',
                'position' => 4,
                'status_id' => 2,
            ],
            [
                'user_id' => 1,
                'name' => 'Featured Section',
                'slug' => 'featured',
                'description' => 'Featured products will be displayed in the homepage.',
                'position' => 5,
                'status_id' => 2,
            ],
            [
                'user_id' => 1,
                'name' => 'Testimonial Section',
                'slug' => 'testimonial',
                'description' => 'Customer testimonials will be displayed in the homepage.',
                'position' => 6,
                'status_id' => 2,
            ],
            [
                'user_id' => 1,
                'name' => 'Blog Section',
                'slug' => 'blog',
                'description' => 'Latest blog posts will be displayed in the homepage.',
                'position' => 7,
                'status_id' => 2,
            ],
            [
                'user_id' => 1,
                'name' => 'New Product Section',
                'slug' => 'new',
                'description' => 'New products will be displayed in the homepage.',
                'position' => 8,
                'status_id' => 2,
            ],
            [
                'user_id' => 1,
                'name' => 'NewsLetter Section',
                'slug' => 'newsletter',
                'description' => 'Newsletter subscription will be displayed in the homepage.',
                'position' => 9,
                'status_id' => 2,
            ],
            [
                'user_id' => 1,
                'name' => 'Brand Section',
                'slug' => 'brand',
                'description' => 'Brands will be displayed in the homepage.',
                'position' => 10,
                'status_id' => 2,
            ],
            [
                'user_id' => 1,
                'name' => 'Best Match Product Section',
                'slug' => 'match',
                'description' => 'Best match products will be displayed in the homepage.',
                'position' => 11,
                'status_id' => 2,
            ],
        ];

        foreach ($sections as $section) {
            ProductSection::create($section);
        }
    }
}
