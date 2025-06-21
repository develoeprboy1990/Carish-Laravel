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
        Schema::create('ad_tag', function (Blueprint $table) {
            $table->unsignedBigInteger('ad_id')->index('ad_tag_ad_id_foreign');
            $table->unsignedBigInteger('tag_id')->index('ad_tag_tag_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ad_tag');
    }
};
