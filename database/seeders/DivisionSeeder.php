<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisions = [
            'খুলনা',
            'চট্টগ্রাম',
            'ঢাকা',
            'বরিশাল',
            'ময়মনসিংহ',
            'রংপুর',
            'রাজশাহী',
            'সিলেট',
        ];

        foreach ($divisions as $division) {
            Division::create(['name' => $division]);
        }
    }
}
