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
        Schema::create('user_saved_ads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('customer_id')->index('customer_id');
            $table->unsignedBigInteger('ad_id')->index('ad_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_saved_ads');
    }
};
