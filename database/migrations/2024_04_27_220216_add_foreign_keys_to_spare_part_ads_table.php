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
        Schema::table('spare_part_ads', function (Blueprint $table) {
            $table->foreign(['customer_id'], 'spare_part_ads_ibfk_1')->references(['id'])->on('customers')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['customer_id'], 'spare_part_ads_ibfk_2')->references(['id'])->on('customers')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['city_id'], 'spare_part_ads_ibfk_3')->references(['id'])->on('cities')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('spare_part_ads', function (Blueprint $table) {
            $table->dropForeign('spare_part_ads_ibfk_1');
            $table->dropForeign('spare_part_ads_ibfk_2');
            $table->dropForeign('spare_part_ads_ibfk_3');
        });
    }
};
