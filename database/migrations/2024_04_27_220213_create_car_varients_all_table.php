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
        Schema::create('car_varients_all', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('make', 255)->nullable();
            $table->string('model', 255)->nullable();
            $table->string('first_registration', 255)->nullable();
            $table->string('initial_registration_estonia', 255)->nullable();
            $table->string('category', 255)->nullable();
            $table->string('subcategory', 255)->nullable();
            $table->string('body', 255)->nullable();
            $table->string('bodytype', 255)->nullable();
            $table->string('length', 255)->nullable();
            $table->string('width', 255)->nullable();
            $table->string('height', 255)->nullable();
            $table->string('full_mass', 255)->nullable();
            $table->string('registered_mass', 255)->nullable();
            $table->string('empty_mass', 255)->nullable();
            $table->string('trailer_with_breakes', 255)->nullable();
            $table->string('trailer_without_breakes', 255)->nullable();
            $table->string('total_trailer_mass', 255)->nullable();
            $table->string('towbar_load', 255)->nullable();
            $table->string('maximum_speed', 255)->nullable();
            $table->string('emission_standard', 255)->nullable();
            $table->string('noise_level', 255)->nullable();
            $table->string('engine_capacity_cc', 255)->nullable();
            $table->string('engine_power_kw', 255)->nullable();
            $table->string('engine_type', 255)->nullable();
            $table->string('gearbox_type', 255)->nullable();
            $table->string('hybrid_type', 255)->nullable();
            $table->string('fuel_combination', 255)->nullable();
            $table->string('fuel_type', 255)->nullable();
            $table->string('additional_fuel', 255)->nullable();
            $table->string('co2_nedc', 255)->nullable();
            $table->string('co2_wltp', 255)->nullable();
            $table->string('average_fuel_consuption', 255)->nullable();
            $table->string('average_fuel_consuption_wltp', 255)->nullable();
            $table->string('electric_driving_range', 255)->nullable();
            $table->string('door', 255)->nullable();
            $table->string('num_of_seats', 255)->nullable();
            $table->string('total_axle', 255)->nullable();
            $table->string('number_of_wheels', 255)->nullable();
            $table->string('steering_wheel', 255)->nullable();
            $table->string('towing_wheel', 255)->nullable();
            $table->string('make_carish', 255)->nullable();
            $table->string('model_carish', 255)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_varients_all');
    }
};
