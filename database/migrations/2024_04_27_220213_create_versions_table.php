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
        Schema::create('versions', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->integer('make_id')->nullable();
            $table->integer('model_id')->index('model_id');
            $table->string('body_type_id')->nullable();
            $table->integer('transmission_id')->nullable()->comment('Gearbox_type');
            $table->integer('engine_type_id')->nullable()->comment('Fuel_type');
            $table->integer('car_variant_id')->default(0);
            $table->string('first_registration', 255)->nullable();
            $table->string('initial_registration_estonia', 255)->nullable();
            $table->string('engine_capacity_cc', 255)->nullable();
            $table->string('engine_power_kw', 255)->nullable();
            $table->string('door', 255)->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('versions');
    }
};
