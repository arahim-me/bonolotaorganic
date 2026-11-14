<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define statuses to be seeded
        $statuses = [
            ['name' => 'Active', 'slug' => 'active', 'icon' => 'fa-solid fa-check-circle'],
            ['name' => 'Inactive', 'slug' => 'inactive', 'icon' => 'fa-solid fa-times-circle'],
            ['name' => 'Out of Stock', 'slug' => 'out-of-stock', 'icon' => 'fa-solid fa-exclamation-triangle'],
            ['name' => 'Pending', 'slug' => 'pending', 'icon' => 'fa-solid fa-clock'],
            ['name' => 'Cancelled', 'slug' => 'cancelled', 'icon' => 'fa-solid fa-ban'],
            ['name' => 'Completed', 'slug' => 'completed', 'icon' => 'fa-solid fa-check'],
            ['name' => 'Processing', 'slug' => 'processing', 'icon' => 'fa-solid fa-cogs'],
            ['name' => 'On Hold', 'slug' => 'on-hold', 'icon' => 'fa-solid fa-pause'],
            ['name' => 'Deleted', 'slug' => 'deleted', 'icon' => 'fa-solid fa-trash'],
            ['name' => 'Draft', 'slug' => 'draft', 'icon' => 'fa-solid fa-pen'],
            ['name' => 'Published', 'slug' => 'published', 'icon' => 'fa-solid fa-paper-plane'],
            ['name' => 'Approved', 'slug' => 'approved', 'icon' => 'fa-solid fa-check'],
            ['name' => 'Rejected', 'slug' => 'rejected', 'icon' => 'fa-solid fa-times'],
            ['name' => 'Expired', 'slug' => 'expired', 'icon' => 'fa-solid fa-hourglass-end'],
            ['name' => 'Failed', 'slug' => 'failed', 'icon' => 'fa-solid fa-times-circle'],
        ];

        // Create statuses using the factory
        foreach ($statuses as $status) {
            Status::create($status);
        }
    }
}
