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
            ['name' => 'New', 'slug' => 'new', 'icon' => 'fa-solid fa-plus-circle'],
            ['name' => 'Featured', 'slug' => 'featured', 'icon' => 'fa-solid fa-star'],
            ['name' => 'Trending', 'slug' => 'trending', 'icon' => 'fa-solid fa-fire'],
            ['name' => 'Sale', 'slug' => 'sale', 'icon' => 'fa-solid fa-tags'],
            ['name' => 'Out of Stock', 'slug' => 'out-of-stock', 'icon' => 'fa-solid fa-exclamation-triangle'],
            ['name' => 'Pending', 'slug' => 'pending', 'icon' => 'fa-solid fa-clock'],
            ['name' => 'Cancelled', 'slug' => 'cancelled', 'icon' => 'fa-solid fa-ban'],
            ['name' => 'Completed', 'slug' => 'completed', 'icon' => 'fa-solid fa-check'],
            ['name' => 'Processing', 'slug' => 'processing', 'icon' => 'fa-solid fa-cogs'],
            ['name' => 'Scheduled', 'slug' => 'scheduled', 'icon' => 'fa-solid fa-calendar'],
            ['name' => 'On Hold', 'slug' => 'on-hold', 'icon' => 'fa-solid fa-pause'],
            ['name' => 'Archived', 'slug' => 'archived', 'icon' => 'fa-solid fa-box'],
            ['name' => 'Deleted', 'slug' => 'deleted', 'icon' => 'fa-solid fa-trash'],
            ['name' => 'Draft', 'slug' => 'draft', 'icon' => 'fa-solid fa-pen'],
            ['name' => 'Published', 'slug' => 'published', 'icon' => 'fa-solid fa-paper-plane'],
            ['name' => 'In Progress', 'slug' => 'in-progress', 'icon' => 'fa-solid fa-spinner'],
            ['name' => 'Approved', 'slug' => 'approved', 'icon' => 'fa-solid fa-check'],
            ['name' => 'Rejected', 'slug' => 'rejected', 'icon' => 'fa-solid fa-times'],
            ['name' => 'Denied', 'slug' => 'denied', 'icon' => 'fa-solid fa-times'],
            ['name' => 'Resolved', 'slug' => 'resolved', 'icon' => 'fa-solid fa-flag'],
            ['name' => 'Expired', 'slug' => 'expired', 'icon' => 'fa-solid fa-hourglass-end'],
            ['name' => 'Failed', 'slug' => 'failed', 'icon' => 'fa-solid fa-times-circle'],
            ['name' => 'Suspended', 'slug' => 'suspended', 'icon' => 'fa-solid fa-user-slash'],
            ['name' => 'Verified', 'slug' => 'verified', 'icon' => 'fa-solid fa-badge-check'],
            ['name' => 'Unverified', 'slug' => 'unverified', 'icon' => 'fa-solid fa-exclamation-triangle'],
            ['name' => 'Warning', 'slug' => 'warning', 'icon' => 'fa-solid fa-exclamation-circle'],
            ['name' => 'Error', 'slug' => 'error', 'icon' => 'fa-solid fa-times-circle'],
            ['name' => 'Success', 'slug' => 'success', 'icon' => 'fa-solid fa-check-circle'],
            ['name' => 'Info', 'slug' => 'info', 'icon' => 'fa-solid fa-info-circle'],
        ];

        // Create statuses using the factory
        foreach ($statuses as $status) {
            Status::create($status);
        }
    }
}
