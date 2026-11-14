<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courier_logs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('courier_shipment_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('courier', 30);
            $table->string('action', 50);
            $table->string('status', 30)->default('success');

            $table->json('request_data')->nullable();
            $table->json('response_data')->nullable();

            $table->text('error_message')->nullable();

            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courier_logs');
    }
};
