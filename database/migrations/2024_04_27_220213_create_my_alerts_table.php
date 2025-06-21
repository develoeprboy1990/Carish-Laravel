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
        Schema::create('my_alerts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('customer_id')->nullable();
            $table->string('car_make')->nullable();
            $table->string('car_model')->nullable();
            $table->string('city')->nullable();
            $table->double('price_from', null, 0)->nullable();
            $table->double('price_to', null, 0)->nullable();
            $table->double('year_from', null, 0)->nullable();
            $table->double('year_to', null, 0)->nullable();
            $table->string('mileage_from')->nullable();
            $table->string('mileage_to')->nullable();
            $table->string('transmission')->nullable();
            $table->string('frequenct')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('my_alerts');
    }
};
