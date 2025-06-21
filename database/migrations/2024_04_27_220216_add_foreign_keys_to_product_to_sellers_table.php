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
        Schema::table('product_to_sellers', function (Blueprint $table) {
            $table->foreign(['customer_id'], 'product_to_sellers_ibfk_1')->references(['id'])->on('customers')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_to_sellers', function (Blueprint $table) {
            $table->dropForeign('product_to_sellers_ibfk_1');
        });
    }
};
