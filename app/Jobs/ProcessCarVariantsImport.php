<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Bus\Batchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Cars\CarVariant;
use App\Imports\CarVariantsImport;
use Maatwebsite\Excel\Facades\Excel;

class ProcessCarVariantsImport implements ShouldQueue
{
    use Batchable, Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;
    public $header;

    public function __construct($data,$header)
    {
        $this->data = $data;
        $this->header = $header; 
    }

    public function handle()
    {
        foreach($this->data as $car){
            $carData = array_combine($this->header,$car);
            CarVariant::create($carData);
        }
        //Excel::import(new CarVariantsImport, $this->data);
    }

    /**
     * Handle a job failure.
     */
    public function failed(Throwable $exception)
    {
        // Send user notification of failure, etc...
    }
}