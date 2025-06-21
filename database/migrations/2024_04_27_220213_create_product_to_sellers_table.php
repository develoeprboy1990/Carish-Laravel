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
        Schema::create('product_to_sellers', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('customer_id')->index('seller_id_fk_idx');
            $table->integer('product_id')->index('product_id_fk_idx');
            $table->integer('product_quantity');
            $table->decimal('product_price', 10);
            $table->dateTime('product_date_available');
            $table->text('ship_to_countries')->nullable();
            $table->decimal('domastic_shipping', 10)->default(0);
            $table->decimal('international_shipping', 10)->default(0);
            $table->decimal('canada_shipping', 10)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_to_sellers');
    }
};
