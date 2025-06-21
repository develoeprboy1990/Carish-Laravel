<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Bus\Batchable;
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

class ProcessUpdateMakeJob implements ShouldQueue
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
            $make = Make::updateOrCreate(['title' => $record->make_carish]);
            $carModel = $make->model()->updateOrCreate(['name' => $record->model_carish]);
            $record->update(['make_filter' => 1]); 
        }


        /*CarVariant::where('make_filter',0)->chunk(100, function ($records) {
            foreach ($records as $record) {        
                $make = Make::updateOrCreate(['title' => $record->make_carish]);
                $carModel = $make->model()->updateOrCreate(['name' => $record->model_carish]);
                $record->update(['make_filter' => 1]);                    
            }
        });*/
    }
}