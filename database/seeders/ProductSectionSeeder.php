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
                'name' => 'Service Section',
                'slug' => 'service',
                'description' => 'Information will be displayed about our services on the homepage.',
                'position' => 1,
                'is_published' => true,
            ],
            [
                'name' => 'Hero Section',
                'slug' => 'hero',
                'description' => 'Items will be displayed with a Slider in the hero section of the homepage.',
                'position' => 1,
                'is_published' => true,
            ],
            [
                'name' => 'Category Section',
                'slug' => 'category',
                'description' => 'All items of this section will be displayed in the category section of the homepage which is active.',
                'position' => 2,
                'is_published' => true,
            ],
            [
                'name' => 'Brand Section',
                'slug' => 'brand',
                'description' => 'Brands will be displayed in the homepage.',
                'position' => 10,
                'is_published' => false,

            ],
            [
                'name' => 'Trending Section',
                'slug' => 'trending',
                'description' => 'Trending products will be displayed in the homepage.',
                'position' => 3,
                'is_published' => true,
            ],
            [
                'name' => 'Deal Section',
                'slug' => 'deal',
                'description' => 'Special deals will be displayed in the homepage.',
                'position' => 4,
                'is_published' => false,

            ],
            [
                'name' => 'Featured Section',
                'slug' => 'featured',
                'description' => 'Featured products will be displayed in the homepage.',
                'position' => 5,
                'is_published' => true,
            ],
            [
                'name' => 'NewsLetter Section',
                'slug' => 'newsletter',
                'description' => 'Newsletter subscription will be displayed in the homepage.',
                'position' => 9,
                'is_published' => false,

            ],
            [
                'name' => 'Testimonial Section',
                'slug' => 'testimonial',
                'description' => 'Customer testimonials will be displayed in the homepage.',
                'position' => 6,
                'is_published' => false,

            ],
            [
                'name' => 'New Product Section',
                'slug' => 'new',
                'description' => 'New products will be displayed in the homepage.',
                'position' => 8,
                'is_published' => true,

            ],
            [
                'name' => 'Blog Section',
                'slug' => 'blog',
                'description' => 'Latest blog posts will be displayed in the homepage.',
                'position' => 7,
                'is_published' => false,

            ],
            [
                'name' => 'Best Match Product Section',
                'slug' => 'match',
                'description' => 'Best match products will be displayed in the homepage.',
                'position' => 11,
                'is_published' => true,

            ],
        ];

        foreach ($sections as $section) {
            ProductSection::create($section);
        }
    }
}
