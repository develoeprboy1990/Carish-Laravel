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
        Schema::create('tag_description', function (Blueprint $table) {
            $table->integer('tag_id')->index('tag_id');
            $table->string('name');
            $table->string('code')->nullable();
            $table->integer('language_id')->nullable()->index('language_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_description');
    }
};
