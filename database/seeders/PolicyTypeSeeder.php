<?php

namespace Database\Seeders;

use App\Models\Policy_type;
use Illuminate\Database\Seeder;

class PolicyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $policyTypes = [
            ['name' => 'FAQs', 'slug' => 'faqs', 'description' => 'Frequently Asked Questions'],
            ['name' => 'Product Information', 'slug' => 'product-information', 'description' => 'Details about our products and their features'],
            ['name' => 'Terms of Service', 'slug' => 'terms-of-service', 'description' => 'Terms and conditions for using the service'],
            ['name' => 'Privacy Policy', 'slug' => 'privacy-policy', 'description' => 'How we collect, use, and protect your personal information'],
            ['name' => 'Return Policy', 'slug' => 'return-policy', 'description' => 'Guidelines for returning products and requesting refunds'],
            ['name' => 'Shipping Policy', 'slug' => 'shipping-policy', 'description' => 'Information about shipping methods, costs, and delivery times'],
            ['name' => 'Cookie Policy', 'slug' => 'cookie-policy', 'description' => 'Details about the use of cookies on our website'],
            ['name' => 'Disclaimer', 'slug' => 'disclaimer', 'description' => 'Legal disclaimers and limitations of liability'],
            ['name' => 'Accessibility Statement', 'slug' => 'accessibility-statement', 'description' => 'Information about our commitment to web accessibility'],
            ['name' => 'Community Guidelines', 'slug' => 'community-guidelines', 'description' => 'Rules and expectations for user behavior in our community'],
            ['name' => 'Copyright Policy', 'slug' => 'copyright-policy', 'description' => 'Information about copyright infringement and how to report it'],
        ];
        foreach ($policyTypes as $policyType) {
            Policy_type::create($policyType);
        }
    }
}
