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
        Schema::create('ads_pricing', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_category', 20)->nullable();
            $table->integer('number_of_days')->nullable();
            $table->string('type')->nullable();
            $table->string('pricing')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ads_pricing');
    }
};
