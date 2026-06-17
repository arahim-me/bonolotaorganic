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
            StatusSeeder::class
        ]);
        // Seed the Roles
        $this->call([
            RoleSeeder::class
        ]);
        // Seed the Users
        $this->call([
            UserSeeder::class
        ]);
        // Seed the Payment Gateways
        $this->call([
            PaymentGatewaySeeder::class
        ]);
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
