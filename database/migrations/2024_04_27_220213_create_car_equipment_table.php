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
        Schema::create('car_equipment', function (Blueprint $table) {
            $table->comment('Equipment');
            $table->integer('id_car_equipment', true)->comment('id');
            $table->integer('id_car_trim')->index('fk_car_equipment_car_trim')->comment('Trim');
            $table->string('name', 255);
            $table->integer('year')->nullable();
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
        Schema::dropIfExists('car_equipment');
    }
};
