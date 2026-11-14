<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('courier_settings', function (Blueprint $table) {
            $table->id();

            $table->string('courier')->unique();

            $table->string('name');
            $table->string('base_url')->nullable();

            // Pathao credentials
            $table->text('client_id')->nullable();
            $table->text('client_secret')->nullable();
            $table->text('username')->nullable();
            $table->text('password')->nullable();
            $table->string('store_id')->nullable();

            // Steadfast credentials
            $table->text('api_key')->nullable();
            $table->text('secret_key')->nullable();
            $table->text('access_token')->nullable();

            $table->boolean('is_active')->default(false);

            $table->timestamp('last_tested_at')->nullable();
            $table->string('connection_status')->default('untested');
            $table->text('last_error')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courier_settings');
    }
};
