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
        Schema::create('tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code');
            $table->integer('status')->nullable()->default(1);
            $table->timestamps();
            $table->unsignedBigInteger('make_id')->nullable()->index('tags_make_id_foreign');
            $table->integer('model_id')->nullable()->index('tags_model_id_foreign');
            $table->integer('average_fuel')->nullable();
            $table->unsignedBigInteger('suggesstion_id')->nullable()->index('tags_suggesstion_id_foreign');
            $table->integer('mileage_total')->nullable();
            $table->integer('mileage_per_year')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
