<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('courier_shipments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('courier_setting_id')
                ->nullable()
                ->constrained('courier_settings')
                ->nullOnDelete();

            $table->string('courier'); // pathao, steadfast, redx

            $table->string('merchant_invoice')->nullable();
            $table->string('consignment_id')->nullable();
            $table->string('tracking_code')->nullable();

            $table->string('status')->default('pending');

            $table->decimal('cod_amount', 10, 2)->default(0);
            $table->decimal('delivery_charge', 10, 2)->default(0);

            // Courier-specific location and booking information
            $table->json('booking_data')->nullable();

            // API request/response for debugging and audit
            $table->json('request_payload')->nullable();
            $table->json('response_payload')->nullable();

            $table->text('failure_reason')->nullable();

            $table->timestamp('booked_at')->nullable();
            $table->timestamp('delivered_at')->nullable();
            $table->timestamp('returned_at')->nullable();

            $table->timestamps();

            $table->index(['order_id', 'courier']);
            $table->index(['courier', 'status']);
            $table->index('tracking_code');
            $table->index('consignment_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('courier_shipments');
    }
};
