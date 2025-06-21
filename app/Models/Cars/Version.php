<?php

namespace App\Models\Cars;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    public    $timestamps  = true;
    protected $fillable    = ['make_id','model_id','body_type_id','transmission_id','engine_type_id','car_variant_id','label','transmission_label','extra_details','engine_capacity','engine_power','id_car_serie','id_car_generation','from_date','to_date','cc','kilowatt','car_length','car_width','car_height','weight','curb_weight','wheel_base','ground_clearance','seating_capacity','fuel_tank_capacity','number_of_door','displacement','torque','gears','max_speed','acceleration','number_of_cylinders','front_wheel_size','back_wheel_size','front_tyre_size','back_tyre_size','drive_type','fueltype','average_fuel','transmissiontype',

    'first_registration','initial_registration_estonia','category','subcategory','body','bodytype','length','width','height','full_mass','registered_mass','empty_mass','trailer_with_breakes','trailer_without_breakes','total_trailer_mass','towbar_load','maximum_speed','emission_standard','noise_level',
    'engine_capacity_cc',
    'engine_power_kw',
    'engine_type','gearbox_type','hybrid_type','fuel_combination','fuel_type','additional_fuel','co2_nedc','co2_wltp','average_fuel_consuption','average_fuel_consuption_wltp','electric_driving_range','door','num_of_seats','total_axle','number_of_wheels','steering_wheel','towing_wheel','make','model',

    'sort_order'];  


public function models()
    {
        return $this->belongsTo('App\Models\Cars\Carmodel','model_id','id');
    } 

    public function bodyTypes()
    {
        return $this->belongsTo('App\Models\Cars\BodyTypes','body_type_id','id');
    }

    public function body_type_description(){
        return $this->belongsTo('App\BodyTypesDescription','body_type_id','body_type_id');
    }

    public function ads(){
        return $this->hasMany('App\Ad');
    }
    public function CarSerie()
    {
        return $this->belongsTo('App\Models\Cars\CarSerie','id_car_serie','id_car_serie');
    }
    public function CarGeneration()
    {
        return $this->belongsTo('App\Models\Cars\CarGeneration','id_car_generation','id_car_generation');
    }
    public function transmission(){
        return $this->belongsTo('App\Models\Transmission','transmissiontype','id');
    }
    public function transmissionDescription()
    {
        return $this->belongsTo('App\Models\TransmissionDescription', 'transmissiontype', 'transmission_id');
    }

    public function CarVarient()
    {
        return $this->belongsTo('App\Models\Cars\CarVariant','car_variant_id','id');
    }
    
}
