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
        Schema::create('car_make', function (Blueprint $table) {
            $table->comment('Make');
            $table->integer('id_car_make', true)->comment('id');
            $table->string('name', 255);
            $table->unsignedInteger('date_create');
            $table->unsignedInteger('date_update');
            $table->integer('id_car_type')->index('id_car_type');

            $table->unique(['name', 'id_car_type'], 'name_id_car_type_u');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_make');
    }
};
