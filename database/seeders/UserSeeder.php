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
            ['name' => 'Super Admin', 'role_id' => 1, 'email' => 'super-admin@gmail.com', 'phone' => '01700000000'],
            ['name' => 'Admin', 'role_id' => 2, 'email' => 'admin@gmail.com', 'phone' => '01700000001'],
            ['name' => 'Manager', 'role_id' => 3, 'email' => 'manager@gmail.com', 'phone' => '01700000002'],
            ['name' => 'Customer Support', 'role_id' => 4, 'email' => 'support@gmail.com', 'phone' => '01700000003'],
            ['name' => 'customer', 'role_id' => 5, 'email' => 'customer@gmail.com', 'phone' => '01700000004'],
            ['name' => 'user', 'role_id' => 6, 'email' => 'user@gmail.com', 'phone' => '01700000005'],

        ];
        // Create users using the factory
        foreach ($users as $user) {
            \App\Models\User::create([
                'name' => $user['name'],
                'role_id' => $user['role_id'],
                'email' => $user['email'],
                'phone' => $user['phone'],
                'password' => Hash::make(12345678), // Default password for all users
            ]);
        }
    }
}
