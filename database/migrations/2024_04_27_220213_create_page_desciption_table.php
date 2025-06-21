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
        Schema::create('page_desciption', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('page_id')->index('page_id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('language_id')->nullable()->index('language_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_desciption');
    }
};
