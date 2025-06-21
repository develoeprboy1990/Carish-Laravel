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
        Schema::create('customer_basket', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('customer_id')->index('customer_id_fk_idx');
            $table->integer('product_id');
            $table->integer('basket_quantity');
            $table->decimal('final_price', 10);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_basket');
    }
};
