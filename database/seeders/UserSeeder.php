<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define users to be seeded
        $users = [
            ['name' => 'Super Admin', 'role_id' => 1, 'email' => 'super-admin@gmail.com'],
            ['name' => 'Admin', 'role_id' => 2, 'email' => 'admin@gmail.com'],
            ['name' => 'customer', 'role_id' => 3, 'email' => 'customer@gmail.com'],
            ['name' => 'user', 'role_id' => 4, 'email' => 'user@gmail.com'],

        ];
        // Create users using the factory
        foreach ($users as $user) {
            \App\Models\User::create([
                'name' => $user['name'],
                'role_id' => $user['role_id'],
                'email' => $user['email'],
                'password' => Hash::make(12345678), // Default password for all users
            ]);
        }
    }
}