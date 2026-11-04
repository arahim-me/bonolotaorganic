<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed the Status
        $this->call([
            StatusSeeder::class,
        ]);
        // Seed the Roles
        $this->call([
            RoleSeeder::class,
        ]);
        // Seed the Users
        $this->call([
            UserSeeder::class,
        ]);
        // Seed the Payment Gateways
        $this->call([
            PaymentGatewaySeeder::class,
        ]);
        // Seed the Product Sections
        $this->call([
            ProductSectionSeeder::class,
        ]);

        // Seed the Policy Types
        $this->call([
            PolicyTypeSeeder::class,
        ]);

        // Seed the Site Info
        $this->call([
            SiteInfoSeeder::class,
        ]);

        // Seed the Divisions
        // $this->call([
        //     DivisionSeeder::class,
        // ]);
        // Seed the Districts
        // $this->call([
        //     DistrictSeeder::class,
        // ]);
        // Seed the Upozilas
        // $this->call([
        //     UpozilaSeeder::class,
        // ]);
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
