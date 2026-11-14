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
        Schema::create('courier_fraud_checks', function (Blueprint $table) {
            $table->id();

            $table->string('phone', 20)->index();

            $table->string('provider')->nullable();

            $table->unsignedInteger('total_parcel')->default(0);
            $table->unsignedInteger('total_delivered')->default(0);
            $table->unsignedInteger('total_cancelled')->default(0);

            $table->decimal('success_rate', 5, 2)->default(0);
            $table->decimal('cancel_rate', 5, 2)->default(0);

            $table->string('risk_level')->default('unknown');

            $table->json('result')->nullable();

            $table->timestamp('checked_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courier_fraud_checks');
    }
};
