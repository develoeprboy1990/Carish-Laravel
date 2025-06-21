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
        Schema::create('make_model_versions', function (Blueprint $table) {
            $table->integer('id', true);
            $table->tinyText('make_title')->nullable();
            $table->tinyText('model_title')->nullable();
            $table->tinyText('variant')->nullable();
            $table->tinyText('version')->nullable();
            $table->tinyText('from_date')->nullable();
            $table->tinyText('to_date')->nullable();
            $table->tinyText('cc')->nullable();
            $table->tinyText('engin_power')->nullable();
            $table->string('car_number')->nullable();
            $table->tinyText('created_at')->nullable();
            $table->tinyText('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('make_model_versions');
    }
};
