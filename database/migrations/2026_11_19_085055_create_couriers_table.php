<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('couriers', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('slug')->unique();

            // API Credentials
            $table->text('api_key')->nullable();
            $table->text('secret_key')->nullable();
            $table->text('client_id')->nullable();
            $table->text('client_secret')->nullable();
            $table->text('username')->nullable();
            $table->text('password')->nullable();

            // Additional Configuration
            $table->string('base_url')->nullable();
            $table->string('store_id')->nullable();

            // Status
            $table->boolean('is_active')->default(false);
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('couriers');
    }
};
