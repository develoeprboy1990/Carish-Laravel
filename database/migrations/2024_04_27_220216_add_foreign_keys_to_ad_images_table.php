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
        Schema::table('ad_images', function (Blueprint $table) {
            $table->foreign(['ad_id'], 'ad_images_ibfk_1')->references(['id'])->on('ads')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ad_images', function (Blueprint $table) {
            $table->dropForeign('ad_images_ibfk_1');
        });
    }
};
