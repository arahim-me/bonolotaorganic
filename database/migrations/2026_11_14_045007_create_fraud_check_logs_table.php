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
        Schema::create('fraud_check_logs', function (Blueprint $table) {
            $table->id();

            $table->string('phone', 20)->index();

            $table->unsignedInteger('own_total_orders')->default(0);
            $table->unsignedInteger('own_delivered_orders')->default(0);
            $table->unsignedInteger('own_cancelled_orders')->default(0);

            $table->json('pathao_result')->nullable();
            $table->json('steadfast_result')->nullable();
            $table->json('redx_result')->nullable();

            $table->string('risk_level', 30)->nullable();

            $table->foreignId('checked_by')
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
        Schema::dropIfExists('fraud_check_logs');
    }
};
