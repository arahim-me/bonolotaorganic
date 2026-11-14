<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {

        $pendingStatusId = DB::table('statuses')->where('name', 'Pending')->value('id');
        $codpaymentMethodId = DB::table('payment_methods')->where('name', 'Cash on Delivery')->value('id');

        Schema::create('orders', function (Blueprint $table) use ($pendingStatusId, $codpaymentMethodId) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('order_number')->unique()->nullable();
            $table->decimal('grand_total', 10, 2);
            $table->foreignId('status_id')->constrained()->default($pendingStatusId);
            $table->boolean('is_accept')->default(false);
            $table->foreignId('payment_method')->constrained()->default($codpaymentMethodId);
            $table->boolean('payment_status')->default(false);
            $table->integer('shipping_fee')->default(150);
            $table->string('shipping_address')->nullable();
            $table->string('shipping_phone')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
