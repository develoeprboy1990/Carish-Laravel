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
        Schema::table('ad_features', function (Blueprint $table) {
            $table->foreign(['ad_id'], 'ad_features_ibfk_1')->references(['id'])->on('ads')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['features_id'], 'ad_features_ibfk_2')->references(['id'])->on('features')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ad_features', function (Blueprint $table) {
            $table->dropForeign('ad_features_ibfk_1');
            $table->dropForeign('ad_features_ibfk_2');
        });
    }
};
