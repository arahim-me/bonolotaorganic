<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payment_gwateways', function (Blueprint $table) {
            $table->id();
            $table->foreignId('provider_id');
            $table->string('api_key')->nullable();
            $table->string('client_id')->nullable();
            $table->string('client_secret')->nullable();
            $table->string('mode')->nullable();
            $table->string('merchant_id')->nullable();
            $table->string('merchant_number')->nullable();
            $table->string('merchant_name')->nullable();
            $table->foreignId('status_id')->default(2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_gwateways');
    }
};
