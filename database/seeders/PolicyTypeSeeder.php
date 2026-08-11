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
        ];
        foreach ($policyTypes as $policyType) {
            Policy_type::create($policyType);
        }
    }
}
