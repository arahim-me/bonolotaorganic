<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('courier_settings', function (Blueprint $table) {
            $table->id();

            $table->string('courier')->unique(); // pathao, steadfast, redx
            $table->string('name');
            $table->string('base_url')->nullable();

            // API credentials will be encrypted by Eloquent cast
            $table->longText('credentials')->nullable();

            $table->boolean('is_active')->default(false);
            $table->boolean('is_default')->default(false);

            $table->string('connection_status')
                ->default('untested'); // untested, connected, failed

            $table->timestamp('last_tested_at')->nullable();
            $table->text('last_error')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courier_settings');
    }
};
