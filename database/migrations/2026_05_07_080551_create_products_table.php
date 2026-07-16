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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('type')->nullable();
            $table->foreignId('brand_id')->nullable();
            $table->foreignId('model_id')->nullable();
            $table->json('colors')->nullable();
            $table->json('sizes')->nullable();
            $table->string('pack_size')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->string('old_price')->nullable();
            $table->string('discount')->default('%');
            $table->string('highlight')->nullable();
            $table->decimal('price', 10, 2)->default(0.00);
            $table->integer('stock')->default(0);
            $table->string('thumbnail')->nullable();
            $table->json('images')->nullable();
            $table->integer('views')->default(0);
            $table->integer('sales')->default(0);
            $table->foreignId('status_id')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
