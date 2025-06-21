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
        Schema::create('car_specification', function (Blueprint $table) {
            $table->comment('Specification');
            $table->integer('id_car_specification', true)->comment('id');
            $table->string('name', 255)->comment('Название');
            $table->integer('id_parent')->nullable()->index('fk_car_characteristic_car_characteristic')->comment('id');
            $table->unsignedInteger('date_create');
            $table->unsignedInteger('date_update');
            $table->integer('id_car_type')->index('id_car_type');

            $table->unique(['name', 'id_parent', 'id_car_type'], 'name_2');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_specification');
    }
};
