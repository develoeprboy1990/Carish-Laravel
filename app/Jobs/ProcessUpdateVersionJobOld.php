<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\Cars\CarVariant;
use App\Models\Cars\Make;
use App\Models\Cars\Carmodel;
use App\Models\Cars\Version;
use App\Models\Cars\BodyTypes;
use App\BodyTypesDescription;

use App\Models\Transmission;
use App\Models\TransmissionDescription;
use App\Models\EngineType;
use App\Models\EngineTypeDescription;

class ProcessUpdateVersionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Retrieve a chunk of records from the source table
        // Retrieve a chunk of records from the source table
    CarVariant::join('makes', 'car_varients.make_carish', '=', 'makes.title')
              ->join('models', 'car_varients.model_carish', '=', 'models.name')
              ->select(
                  'car_varients.*', // Select all columns from the CarVariant table
                  'makes.id as make_id', // Select the id column from the Make table and alias it as make_id
                  'models.id as model_id' // Select the id column from the Carmodel table and alias it as model_id
              )
              ->where('makes.status', 1) // Assuming 'status' indicates active status
              ->where('models.status', 1)->chunk(50, function ($records) {
        //CarVariant::where('make','Honda')->chunk(100, function ($records) {
            foreach ($records as $record) {
                // Process each record and insert into the target table
                

                //$make = Make::updateOrCreate(['title' => $record->make_carish]);

                //$carModel = $make->model()->updateOrCreate(['name' => $record->model_carish]);
                    


                //body (body_types) 
                $bodyCode = $record->body; 
                $bodyType = BodyTypes::updateOrCreate([
                    'api_code' => $bodyCode,
                    'status'=>1
                ]);
                $bodyType->bodyType_description()->updateOrCreate(
                    ['language_id' => 1],
                    ['name' => $bodyCode]
                );
            
                if ($record->gearbox_type !== null) {
                //Gearbox_type (transmissions)
                    $gearboxCode = $record->gearbox_type; 
                    $gearboxType = Transmission::updateOrCreate([
                        'api_code' => $gearboxCode,
                        'status'   => 1
                    ]);
                    $gearboxType->transmission_description()->updateOrCreate(
                        ['language_id' => 1],
                        ['title' => $gearboxCode]
                    );
                }


                //Fuel_type (engine_types)
                $fuelCode = $record->fuel_type; 
                $fuelType = EngineType::updateOrCreate([
                    'api_code' => $fuelCode,
                    'status' => 1
                ]);
                $fuelType->engine_type_description()->updateOrCreate(
                    ['language_id' => 1],
                    ['title' => $fuelCode]
                );

                //Version code
                Version::updateOrCreate([
                    'make_id' => $record->make_id,
                    'model_id' => $record->model_id,
                    'body_type_id'=>$bodyType->id,
                    'transmission_id'=>@$gearboxType->id,
                    'engine_type_id'=>$fuelType->id,
                    'car_variant_id'=>$record->id,
                    'first_registration'=>$record->first_registration,
                    'initial_registration_estonia'=>$record->initial_registration_estonia,
                    'category'=>$record->category,
                    'subcategory'=>$record->subcategory,
                    'body'=>$record->body,
                    'bodytype'=>$record->bodytype,
                    'length'=>$record->length,
                    'width'=>$record->width,
                    'height'=>$record->height,
                    'full_mass'=>$record->full_mass,
                    'registered_mass'=>$record->registered_mass,
                    'empty_mass'=>$record->empty_mass,
                    'trailer_with_breakes'=>$record->trailer_with_breakes,
                    'trailer_without_breakes'=>$record->trailer_without_breakes,
                    'total_trailer_mass'=>$record->total_trailer_mass,
                    'towbar_load'=>$record->towbar_load,
                    'maximum_speed'=>$record->maximum_speed,
                    'emission_standard'=>$record->emission_standard,
                    'noise_level'=>$record->noise_level,
                    'engine_capacity_cc'=>$record->engine_capacity_cc,
                    'engine_power_kw'=>$record->engine_power_kw,
                    'engine_type'=>$record->engine_type,
                    'gearbox_type'=>$record->gearbox_type,
                    'hybrid_type'=>$record->hybrid_type,
                    'fuel_combination'=>$record->fuel_combination,
                    'fuel_type'=>$record->fuel_type,
                    'additional_fuel'=>$record->additional_fuel,
                    'co2_nedc'=>$record->co2_nedc,
                    'co2_wltp'=>$record->co2_wltp,
                    'average_fuel_consuption'=>$record->average_fuel_consuption,
                    'average_fuel_consuption_wltp'=>$record->average_fuel_consuption_wltp,
                    'electric_driving_range'=>$record->electric_driving_range,
                    'door'=>$record->door,
                    'num_of_seats'=>$record->num_of_seats,
                    'total_axle'=>$record->total_axle,
                    'number_of_wheels'=>$record->number_of_wheels,
                    'steering_wheel'=>$record->steering_wheel,
                    'towing_wheel'=>$record->towing_wheel,
                    'make'=>$record->make,
                    'model'=>$record->model
                    // Add more columns as needed
                ]);
            $record->update(['version_filter' => 1]);
            }
        });
    }
}
/*  01-label
                02-transmission_label
                03-extra_details
                04-engine_capacity
                05-engine_power
                06-id_car_serie
                07-id_car_generation
                08-model_id
                09-from_date
                10-to_date
                11-cc
                12-body_type_id
                13-kilowatt
                14-car_length (09-length)
                15-car_width (10-width)
                16-car_height (11-height)
                17-weight
                18-curb_weight
                19-wheel_base
                20-ground_clearance 
                21-seating_capacity
                22-fuel_tank_capacity
                23-number_of_door (35-door)
                24-displacement
                25-torque
                26-gears
                27-max_speed
                28-acceleration 
                29-number_of_cylinders
                30-front_wheel_size
                31-back_wheel_size
                32-front_tyre_size
                33-back_tyre_size
                34-drive_type
                35-fueltype (28-fuel_type)
                36-average_fuel
                37-transmissiontype
                
                01-make
                02-model
                03-first_registration
                04-initial_registration_estonia
                05-category
                06-subcategory
                07-body
                08-bodytype
                //09-length
                //10-width
                //11-height
                12-full_mass
                13-registered_mass  
                14-empty_mass
                15-trailer_with_breakes  
                16-trailer_without_breakes   
                17-total_trailer_mass
                18-towbar_load
                19-maximum_speed
                20-emission_standard
                21-noise_level
                22-engine_capacity_cc
                23-engine_power_kw
                24-engine_type
                25-gearbox_type
                26-hybrid_type
                27-fuel_combination
                28-fuel_type
                29-additional_fuel
                30-co2_nedc
                31-co2_wltp
                32-average_fuel_consuption
                33-average_fuel_consuption_wltp
                34-electric_driving_range
                //35-door
                36-num_of_seats
                37-total_axle
                38-number_of_wheels
                39-steering_wheel
                40-towing_wheel
                41-make_carish 
                42-model_carish
*/

/*
$bodyCode = $record->body;
$bodyTranslations = [
['language_id' => 1, 'name' => $bodyCode]
];  
$bodyType = BodyTypes::updateOrCreate([
'name' => $bodyCode
]);
foreach ($bodyTranslations as $bodyTranslation) {
$bodyType->bodyType_description()->updateOrCreate(
['language_id' => $bodyTranslation['language_id']],
['name' => $bodyTranslation['name']]
);
}
*/