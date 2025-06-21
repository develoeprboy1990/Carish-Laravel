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
        Schema::table('ads', function (Blueprint $table) {
            $table->foreign(['bought_from_id'])->references(['id'])->on('countries')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['customer_id'], 'ads_ibfk_1')->references(['id'])->on('customers')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['maker_id'], 'ads_ibfk_4')->references(['id'])->on('makes')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['model_id'], 'ads_ibfk_5')->references(['id'])->on('models')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['color_id'], 'ads_ibfk_7')->references(['id'])->on('colors')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['city_id'], 'ads_ibfk_8')->references(['id'])->on('cities')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->dropForeign('ads_bought_from_id_foreign');
            $table->dropForeign('ads_ibfk_1');
            $table->dropForeign('ads_ibfk_4');
            $table->dropForeign('ads_ibfk_5');
            $table->dropForeign('ads_ibfk_7');
            $table->dropForeign('ads_ibfk_8');
        });
    }
};
