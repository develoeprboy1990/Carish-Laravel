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
        Schema::table('user_saved_ads', function (Blueprint $table) {
            $table->foreign(['customer_id'], 'user_saved_ads_ibfk_1')->references(['id'])->on('customers')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['customer_id'], 'user_saved_ads_ibfk_2')->references(['id'])->on('customers')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['customer_id'], 'user_saved_ads_ibfk_3')->references(['id'])->on('customers')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['ad_id'], 'user_saved_ads_ibfk_4')->references(['id'])->on('ads')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_saved_ads', function (Blueprint $table) {
            $table->dropForeign('user_saved_ads_ibfk_1');
            $table->dropForeign('user_saved_ads_ibfk_2');
            $table->dropForeign('user_saved_ads_ibfk_3');
            $table->dropForeign('user_saved_ads_ibfk_4');
        });
    }
};
