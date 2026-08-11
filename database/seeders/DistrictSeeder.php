<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // District data
        $districts = [
            ['division_id' => 1, 'name' => 'কুষ্টিয়া'],
            ['division_id' => 1, 'name' => 'খুলনা'],
            ['division_id' => 1, 'name' => 'চুয়াডাঙ্গা'],
            ['division_id' => 1, 'name' => 'ঝিনাইদহ'],
            ['division_id' => 1, 'name' => 'নড়াইল'],
            ['division_id' => 1, 'name' => 'বাগেরহাট'],
            ['division_id' => 1, 'name' => 'মাগুরা'],
            ['division_id' => 1, 'name' => 'মেহেরপুর'],
            ['division_id' => 1, 'name' => 'যশোর'],
            ['division_id' => 1, 'name' => 'সাতক্ষীরা'],
            ['division_id' => 2, 'name' => 'চট্টগ্রাম'],
            ['division_id' => 2, 'name' => 'কক্সবাজার'],
            ['division_id' => 2, 'name' => 'ব্রাহ্মণবাড়িয়া'],
            ['division_id' => 2, 'name' => 'বান্দরবান'],
            ['division_id' => 2, 'name' => 'খাগড়াছড়ি'],
            ['division_id' => 2, 'name' => 'রাঙ্গামাটি'],
            ['division_id' => 2, 'name' => 'নোয়াখালী'],
            ['division_id' => 2, 'name' => 'লক্ষ্মীপুর'],
            ['division_id' => 2, 'name' => 'ফেনী'],
            ['division_id' => 2, 'name' => 'কুমিল্লা'],
            ['division_id' => 2, 'name' => 'চাঁদপুর'],
            ['division_id' => 3, 'name' => 'কিশোরগঞ্জ'],
            ['division_id' => 3, 'name' => 'গাজীপুর'],
            ['division_id' => 3, 'name' => 'গোপালগঞ্জ'],
            ['division_id' => 3, 'name' => 'টাঙ্গাইল'],
            ['division_id' => 3, 'name' => 'ঢাকা'],
            ['division_id' => 3, 'name' => 'নরসিংদী'],
            ['division_id' => 3, 'name' => 'নারায়ণগঞ্জ'],
            ['division_id' => 3, 'name' => 'ফরিদপুর'],
            ['division_id' => 3, 'name' => 'মাদারীপুর'],
            ['division_id' => 3, 'name' => 'মানিকগঞ্জ'],
            ['division_id' => 3, 'name' => 'মুন্সীগঞ্জ'],
            ['division_id' => 3, 'name' => 'রাজবাড়ী'],
            ['division_id' => 3, 'name' => 'শরীয়তপুর'],
            ['division_id' => 4, 'name' => 'বরিশাল'],
            ['division_id' => 4, 'name' => 'ভোলা'],
            ['division_id' => 4, 'name' => 'ঝালকাঠি'],
            ['division_id' => 4, 'name' => 'পটুয়াখালী'],
            ['division_id' => 4, 'name' => 'পিরোজপুর'],
            ['division_id' => 4, 'name' => 'বরগুনা'],
            ['division_id' => 5, 'name' => 'ময়মনসিংহ'],
            ['division_id' => 5, 'name' => 'জামালপুর'],
            ['division_id' => 5, 'name' => 'নেত্রকোণা'],
            ['division_id' => 5, 'name' => 'শেরপুর'],
            ['division_id' => 6, 'name' => 'কুড়িগ্রাম'],
            ['division_id' => 6, 'name' => 'গাইবান্ধা'],
            ['division_id' => 6, 'name' => 'ঠাকুরগাঁও'],
            ['division_id' => 6, 'name' => 'দিনাজপুর'],
            ['division_id' => 6, 'name' => 'নীলফামারী'],
            ['division_id' => 6, 'name' => 'পঞ্চগড়'],
            ['division_id' => 6, 'name' => 'রংপুর'],
            ['division_id' => 6, 'name' => 'লালমনিরহাট'],
            ['division_id' => 7, 'name' => 'চাঁপাইনবাবগঞ্জ'],
            ['division_id' => 7, 'name' => 'জয়পুরহাট'],
            ['division_id' => 7, 'name' => 'নওগাঁ'],
            ['division_id' => 7, 'name' => 'নাটোর'],
            ['division_id' => 7, 'name' => 'পাবনা'],
            ['division_id' => 7, 'name' => 'বগুড়া'],
            ['division_id' => 7, 'name' => 'রাজশাহী'],
            ['division_id' => 7, 'name' => 'সিরাজগঞ্জ'],
            ['division_id' => 8, 'name' => 'মৌলভীবাজার'],
            ['division_id' => 8, 'name' => 'সিলেট'],
            ['division_id' => 8, 'name' => 'সুনামগঞ্জ'],
            ['division_id' => 8, 'name' => 'হবিগঞ্জ'],
        ];

        // Insert districts into the database
        foreach ($districts as $district) {
            District::create($district);
        }
    }
}
