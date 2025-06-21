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
        Schema::create('car_option', function (Blueprint $table) {
            $table->comment('Option');
            $table->integer('id_car_option', true);
            $table->string('name', 255)->nullable()->index('name')->comment('Name');
            $table->integer('id_parent')->nullable();
            $table->unsignedInteger('date_create');
            $table->unsignedInteger('date_update');
            $table->integer('id_car_type')->index('id_car_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_option');
    }
};
