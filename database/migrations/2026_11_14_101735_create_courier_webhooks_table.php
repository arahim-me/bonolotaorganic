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
        Schema::create('courier_webhooks', function (Blueprint $table) {
            $table->id();

            $table->string('courier');
            $table->string('event_id')->nullable();
            $table->string('tracking_code')->nullable();

            $table->json('payload');

            $table->boolean('is_processed')->default(false);
            $table->text('processing_error')->nullable();

            $table->timestamp('processed_at')->nullable();

            $table->timestamps();

            $table->unique(['courier', 'event_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courier_webhooks');
    }
};
