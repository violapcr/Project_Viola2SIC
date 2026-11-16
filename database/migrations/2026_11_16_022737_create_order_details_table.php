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
            $table->id('order_detail_id');
            $table->foreignId('order_id')->constrained('orders', 'order_id')->cascadeOnDelete();
            $table->foreignId('product_id')->constrained('products', 'product_id');
            $table->unsignedInteger('quantity');
            $table->unsignedInteger('unit_price');
            $table->unsignedInteger('subtotal');
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
