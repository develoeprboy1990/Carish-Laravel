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
        Schema::create('ad_suggesstion', function (Blueprint $table) {
            $table->unsignedBigInteger('ad_id')->index('ad_suggesstion_ad_id_foreign');
            $table->unsignedBigInteger('suggesstion_id')->index('ad_suggesstion_suggesstion_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ad_suggesstion');
    }
};
