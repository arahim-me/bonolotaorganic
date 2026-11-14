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
        Schema::create('courier_trackings', function (Blueprint $table) {
            $table->id();

            $table->foreignId('courier_shipment_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('status');
            $table->string('status_code')->nullable();
            $table->text('description')->nullable();

            $table->json('response_data')->nullable();

            $table->timestamp('tracked_at')->nullable();

            $table->timestamps();

            $table->index(['courier_shipment_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courier_trackings');
    }
};
