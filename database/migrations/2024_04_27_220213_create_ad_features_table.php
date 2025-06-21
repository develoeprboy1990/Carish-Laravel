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
        Schema::create('ad_features', function (Blueprint $table) {
            $table->integer('id', true);
            $table->unsignedBigInteger('ad_id')->nullable()->index('ad_id');
            $table->integer('features_id')->nullable()->index('feature_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ad_features');
    }
};
