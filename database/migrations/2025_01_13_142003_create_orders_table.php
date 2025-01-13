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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(
                table: 'users',
                indexName: 'orders_users_id'
            );
            $table->decimal('total_amount', total: 10, places: 0);
            $table->enum('payment_method', ['bank_transfer', 'qr', 'cod']);
            $table->enum('payment_status', ['pending', 'paid', 'failed']);
            $table->enum('order_status', ['pending', 'processed', 'shipped', 'completed', 'canceled']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
