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
        Schema::create('google_ads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('page_id')->nullable();
            $table->string('ad_position')->nullable();
            $table->string('ad_title')->nullable();
            $table->string('ad_description')->nullable();
            $table->string('ad_link')->nullable();
            $table->string('img')->nullable();
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('google_ads');
    }
};
