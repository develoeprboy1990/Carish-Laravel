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
        Schema::table('ad_suggesstion', function (Blueprint $table) {
            $table->foreign(['ad_id'])->references(['id'])->on('ads')->onUpdate('no action')->onDelete('cascade');
            $table->foreign(['suggesstion_id'])->references(['id'])->on('suggesstions')->onUpdate('no action')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ad_suggesstion', function (Blueprint $table) {
            $table->dropForeign('ad_suggesstion_ad_id_foreign');
            $table->dropForeign('ad_suggesstion_suggesstion_id_foreign');
        });
    }
};
