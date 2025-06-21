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
        Schema::table('customers_basket_attributes', function (Blueprint $table) {
            $table->foreign(['customer_id'], 'customers_basket_attributes_ibfk_1')->references(['id'])->on('customers')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['customer_id'], 'customers_basket_attributes_ibfk_2')->references(['id'])->on('customers')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['customer_id'], 'customers_basket_attributes_ibfk_3')->references(['id'])->on('customers')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customers_basket_attributes', function (Blueprint $table) {
            $table->dropForeign('customers_basket_attributes_ibfk_1');
            $table->dropForeign('customers_basket_attributes_ibfk_2');
            $table->dropForeign('customers_basket_attributes_ibfk_3');
        });
    }
};
