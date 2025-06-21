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
        Schema::create('suggesstion_descriptions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('suggesstion_id')->index('suggesstion_id');
            $table->string('title');
            $table->text('sentence')->nullable();
            $table->integer('language_id')->nullable()->index('language_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suggesstion_descriptions');
    }
};
