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
        Schema::create('courier_shipments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('order_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('courier', 30);
            $table->string('consignment_id')->nullable();
            $table->string('tracking_code')->nullable();

            $table->enum('status', [
                'pending',
                'booked',
                'picked_up',
                'in_transit',
                'delivered',
                'cancel_requested',
                'cancelled',
                'failed',
                'returned',
            ])->default('pending');

            $table->decimal('delivery_charge', 10, 2)->default(0);
            $table->decimal('cod_amount', 10, 2)->default(0);

            $table->json('booking_response')->nullable();
            $table->json('cancel_response')->nullable();

            $table->timestamp('booked_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();

            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamps();

            $table->index(['order_id', 'courier']);
            $table->index(['tracking_code']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courier_shipments');
    }
};
