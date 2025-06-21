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
        Schema::create('customer_shippings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id')->index('cusomer_id_fk_idx');
            $table->integer('country_id');
            $table->integer('state_id')->nullable();
            $table->string('shipping_first_name', 200);
            $table->string('shipping_last_name', 200);
            $table->string('shipping_city', 200);
            $table->string('shipping_postcode', 200)->nullable();
            $table->string('shipping_address_1', 200)->nullable();
            $table->string('shipping_address_2', 200)->nullable();
            $table->string('shipping_company', 200)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_shippings');
    }
};
