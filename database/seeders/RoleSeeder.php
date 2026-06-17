<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define roles to be seeded
        $roles = [
            ['name' => 'Super Admin', 'slug' => 'super-admin', 'description' => 'Administrator with full access'],
            ['name' => 'Admin', 'slug' => 'admin', 'description' => 'Administrator with limited access'],
            ['name' => 'customer', 'slug' => 'customer', 'description' => 'Regular buyer with basic access'],
            ['name' => 'user', 'slug' => 'user', 'description' => 'Regular user with regular access'],
        ];
        // Create roles using the factory
        foreach ($roles as $role) {
            \App\Models\Role::create($role);
        }
    }
}
