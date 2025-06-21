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
        Schema::create('order_products', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('order_id')->index('order_id_fk_idx');
            $table->decimal('product_price', 10);
            $table->string('product_name', 45);
            $table->text('product_description');
            $table->string('product_model', 45)->nullable();
            $table->string('product_quantity', 45)->nullable();
            $table->enum('product_status', ['Pending', 'Shipped', 'Cancelled', 'Refunded'])->default('Pending');
            $table->string('products_tax', 45)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_products');
    }
};
