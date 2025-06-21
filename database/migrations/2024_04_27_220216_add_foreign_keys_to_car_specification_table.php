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
        Schema::table('car_specification', function (Blueprint $table) {
            $table->foreign(['id_parent'], 'fk_car_specification_car_specification')->references(['id_car_specification'])->on('car_specification')->onUpdate('no action')->onDelete('no action');
            $table->foreign(['id_car_type'], 'fk_car_specification_car_type')->references(['id_car_type'])->on('car_type')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('car_specification', function (Blueprint $table) {
            $table->dropForeign('fk_car_specification_car_specification');
            $table->dropForeign('fk_car_specification_car_type');
        });
    }
};
