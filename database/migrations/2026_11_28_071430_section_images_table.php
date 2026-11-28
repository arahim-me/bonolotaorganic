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
        Schema::create('section_images', function (Blueprint $table) {
            $table->id();

            $table->foreignId('section_id')->constrained('product_sections')->cascadeOnDelete();
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->string('sub_title')->nullable();
            $table->text('description')->nullable();
            $table->string('button')->nullable();
            $table->string('image')->nullable();
            $table->string('return_url')->nullable();
            $table->boolean('is_published')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('section_images');
    }
};
