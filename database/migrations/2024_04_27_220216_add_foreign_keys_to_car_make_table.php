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
        Schema::table('car_make', function (Blueprint $table) {
            $table->foreign(['id_car_type'], 'fk_car_make_car_type')->references(['id_car_type'])->on('car_type')->onUpdate('no action')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('car_make', function (Blueprint $table) {
            $table->dropForeign('fk_car_make_car_type');
        });
    }
};
