<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Bus\Batchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\Cars\CarVariant;
use App\Models\Cars\Make;
use App\Models\Cars\Carmodel;
use App\Models\Cars\Version;
use App\Models\Cars\BodyTypes;
use App\Models\Transmission;
use App\Models\EngineType;

class ProcessUpdateVersionJob implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $variants;
    /**
     * Create a new job instance.
    */
    public function __construct($variants)
    {

        $this->variants = $variants;
    }

    /**
     * Execute the job.
    */
    public function handle()
    {
        foreach($this->variants  as $record){
            //\Log::info($record);
            $bodyType = $this->updateBodyType($record->body);
            $transmissionType = $record->gearbox_type ? $this->updateTransmissionType($record->gearbox_type) : null;
            $engineType = $this->updateEngineType($record->fuel_type);

            $this->updateVersion($record, $bodyType, $transmissionType, $engineType);
        }


        /*CarVariant::join('makes', 'car_varients.make_carish', '=', 'makes.title')
            ->join('models', 'car_varients.model_carish', '=', 'models.name')
            ->select(
                'car_varients.*',
                'makes.id as make_id',
                'models.id as model_id'
            )
            ->where('makes.status', 1)
            ->where('models.status', 1)
            ->where('car_varients.version_filter',0)
            ->limit(25000) // Adjust the limit as per your testing needs
            ->get()
            ->each(function ($record) {

                $bodyType = $this->updateBodyType($record->body);
                $transmissionType = $record->gearbox_type ? $this->updateTransmissionType($record->gearbox_type) : null;
                $engineType = $this->updateEngineType($record->fuel_type);

                $this->updateVersion($record, $bodyType, $transmissionType, $engineType);
            });*/


    }

    private function updateBodyType($bodyCode)
    {
        $bodyType = BodyTypes::updateOrCreate([
                    'api_code' => $bodyCode,
                    'status'=>1
            ]);
        $bodyType->bodyType_description()->updateOrCreate(
                    ['language_id' => 1],
                    ['name' => $bodyCode]
            );
        return $bodyType;

    }

    private function updateTransmissionType($gearboxCode)
    {
        $gearboxType = Transmission::updateOrCreate([
                        'api_code' => $gearboxCode,
                        'status'   => 1
                    ]);
        $gearboxType->transmission_description()->updateOrCreate(
            ['language_id' => 1],
            ['title' => $gearboxCode]
        );
        return $gearboxType;

        /*return Transmission::updateOrCreate(
            ['api_code' => $gearboxCode],
            ['status' => 1]
        );*/
    }

    private function updateEngineType($fuelCode)
    {
        $fuelType = EngineType::updateOrCreate([
                    'api_code' => $fuelCode,
                    'status' => 1
        ]);
        $fuelType->engine_type_description()->updateOrCreate(
            ['language_id' => 1],
            ['title' => $fuelCode]
        );

        return $fuelType;

        /*return EngineType::updateOrCreate(
            ['api_code' => $fuelCode],
            ['status' => 1]
        );*/
    }

    private function updateVersion($record, $bodyType, $transmissionType, $engineType)
    {

        // Access related data using eager loading
        $make = Make::where('title', $record->make_carish)->first();
        //$makeId = $record->make->id;
        $model = Carmodel::where('name', $record->model_carish)->first();
        //$modelId = $record->model->id;
        
        Version::updateOrCreate(
            [
                'make_id' => $make->id,
                'model_id' => $model->id,
                'body_type_id' => $bodyType->id,
                'transmission_id' => optional($transmissionType)->id,
                'engine_type_id' => $engineType->id,
                'car_variant_id' => $record->id,
            ],
            [
                'first_registration' => $record->first_registration,
                'initial_registration_estonia' => $record->initial_registration_estonia,
                'engine_capacity_cc' => $record->engine_capacity_cc,
                'engine_power_kw' => $record->engine_power_kw,
                'door' => $record->door,
                // Add more columns as needed
            ]
        );

        $record->update(['version_filter' => 1]);
    }
}
