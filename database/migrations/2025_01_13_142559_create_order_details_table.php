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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained(
                table: 'orders',
                indexName: 'orderDetails_orders_id'
            );
            $table->foreignId('product_id')->constrained(
                table: 'products',
                indexName: 'orderDetails_products_id'
            );
            $table->integer('quantity');
            $table->decimal('price', total: 10, places: 0);
            $table->decimal('subtotal', total: 10, places: 0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
    }
};
