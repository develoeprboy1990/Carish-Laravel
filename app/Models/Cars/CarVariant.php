<?php

namespace App\Models\Cars;

use Illuminate\Database\Eloquent\Model;

class CarVariant extends Model
{
    protected $table    = "car_varients";
    public    $timestamps  = true;
    protected $fillable    = [
    'make',
    'model',
    'first_registration',
    'initial_registration_estonia',
    'category',
    'subcategory',
    'body',
    'bodytype',
    'length',
    'width',
    'height',
    'full_mass',
    'registered_mass',
    'empty_mass',
    'trailer_with_breakes',
    'trailer_without_breakes',
    'total_trailer_mass',
    'towbar_load',
    'maximum_speed',
    'emission_standard',
    'noise_level',
    'engine_capacity_cc',
    'engine_power_kw',
    'engine_type',
    'gearbox_type',
    'hybrid_type',
    'fuel_combination',
    'fuel_type',
    'additional_fuel',
    'co2_nedc',
    'co2_wltp',
    'average_fuel_consuption',
    'average_fuel_consuption_wltp',
    'electric_driving_range',
    'door',
    'num_of_seats',
    'total_axle',
    'number_of_wheels',
    'steering_wheel',
    'towing_wheel',
    'make_carish',
    'model_carish',
    'make_filter',
    'version_filter'];

    // Define the relationship with the Make model
    public function make()
    {
        return $this->belongsTo('App\Models\Cars\Make','make_carish','title');
    }

    // Define the relationship with the Model model
    public function model()
    {
        return $this->belongsTo('App\Models\Cars\Carmodel','model_carish','name');
    }

}