<?php

namespace App\Imports;

use App\Coupon;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

use App\Models\Cars\CarVariant;
use App\Models\Cars\Make;
use App\Models\Cars\Carmodel;
use App\Models\Cars\Version;
use App\Models\Cars\BodyTypes;
use App\BodyTypesDescription;
use DB;
use Illuminate\Support\Facades\Log;

class CarVariantsImport implements ToModel, WithHeadingRow, WithChunkReading
{
    /**
    * @param model
    */
    public function __construct()
    {
        //$body =  BodyTypes::create(['name'=>'test']);

    }


    public function model(array $row)
    {
         // Specify the unique identifier for updateOrCreate
        /*$uniqueAttributes = [
            'make'=>$row['make'],
            'model'=>$row['model'],
            'first_registration'=>$row['first_registration'],
            'initial_registration_estonia'=>$row['initial_registration_estonia'],
            'category'=>$row['category'],
            'subcategory'=>$row['subcategory'],
            'body'=>$row['body'],
            'bodytype'=>$row['bodytype'],
            'length'=>$row['length'],
            'width'=>$row['width'],
            'height'=>$row['height'],
            'full_mass'=>$row['full_mass'],
            'registered_mass'=>$row['registered_mass'],
            'empty_mass'=>$row['empty_mass'],
            'trailer_with_breakes'=>$row['trailer_with_breakes'],
            'trailer_without_breakes'=>$row['trailer_without_breakes'],
            'total_trailer_mass'=>$row['total_trailer_mass'],
            'towbar_load'=>$row['towbar_load'],
            'maximum_speed'=>$row['maximum_speed'],
            'emission_standard'=>$row['emission_standard'],
            'noise_level'=>$row['noise_level'],
            'engine_capacity_cc'=>$row['engine_capacity_cc'],
            'engine_power_kw'=>$row['engine_power_kw'],
            'engine_type'=>$row['engine_type'],
            'gearbox_type'=>$row['gearbox_type'],
            'hybrid_type'=>$row['hybrid_type'],
            'fuel_combination'=>$row['fuel_combination'],
            'fuel_type'=>$row['fuel_type'],
            'additional_fuel'=>$row['additional_fuel'],
            'co2_nedc'=>$row['co2_nedc'],
            'co2_wltp'=>$row['co2_wltp'],
            'average_fuel_consuption'=>$row['average_fuel_consuption'],
            'average_fuel_consuption_wltp'=>$row['average_fuel_consuption_wltp'],
            'electric_driving_range'=>$row['electric_driving_range'],
            'door'=>$row['door'],
            'num_of_seats'=>$row['num_of_seats'],
            'total_axle'=>$row['total_axle'],
            'number_of_wheels'=>$row['number_of_wheels'],
            'steering_wheel'=>$row['steering_wheel'],
            'towing_wheel'=>$row['towing_wheel'],
            'make_carish'=>$row['make_carish'],
            'model_carish'=>$row['model_carish'],
            // Add other unique attributes if any
        ];*/

        // Update or create the record based on the unique identifier
        $car_variant = CarVariant::create($row);

        // Assuming your CSV file structure matches the fields in your CarVariants model
        return $car_variant;
       
    }

    public function chunkSize(): int
    {
        // Set the chunk size based on your requirements
        return 2000; // Process 1000 rows at a time
    } 
}

/*
public function transformDate($value, $format = 'Y-m-d')
    {
        try {

        // Parse the date from the Excel value
        $dateTimeObject = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value);
        
        // Return the date formatted in the same format as in the Excel
        return $dateTimeObject->format($format);


        } catch (\ErrorException $e) {
            //return \Carbon\Carbon::createFromFormat($format, $value);
            return \Carbon\Carbon::createFromFormat($format, $value)->format($format);
        }
    }

        // Check if the 'make' field is null or empty
    if (!empty($row['make_carish'])) {
        // Create or update a record in Make
        $make = Make::updateOrCreate(['title' => $row['make_carish']]);
    } else {
        // Handle the case where the 'make' field is null or empty
        // For example, you can log a warning or skip the creation/update
        \Log::warning('Empty make field encountered in row: ' . json_encode($row));
        return null; // Skip the creation/update
    }
*/      
        //$row['first_registration'] = $this->transformDate($row['first_registration']);
        //$row['initial_registration_estonia'] = $this->transformDate($row['initial_registration_estonia']);

        //$this->updateothers($row);


        /*if (!empty($row['first_registration']))
        $row['first_registration'] = Carbon::createFromFormat('d/m/Y', $row['first_registration'])->format('Y-m-d');

        if (!empty($row['initial_registration_estonia']))
        $row['initial_registration_estonia'] = Carbon::createFromFormat('d/m/Y', $row['initial_registration_estonia'])->format('Y-m-d');
        */



 /*return new CarVariant([
            'make' => $row[0],
            'make_Carish' => $row[40],
            'model' => $row[1],
            'model_Carish'  => $row[41],
            'first_Registration' => $row[2],
            'Initial_Registration_Estonia' => $row[3],
            'category' => $row[4],
            'subcategory' => $row[5],
            'body' => $row[6],
            'bodyType' => $row[7],
            'length' => $row[8],
            'width' => $row[9],
            'height' => $row[10],
            'full_Mass' => $row[11],
            'registered_Mass' => $row[12],
            'empty_Mass' => $row[13],
            'trailer_With_Breakes' => $row[14],
            'trailer_Without_Breakes' => $row[15],
            'total_Trailer_Mass' => $row[16],
            'towbar_Load' => $row[17],
            'maximum_Speed' => $row[18],
            'emission_Standard' => $row[19],
            'noise_Level' => $row[20],
            'engine_Capacity_CC' => $row[21],
            'engine_Power_KW' => $row[22],
            'engine_Type' => $row[23],
            'gearbox_Type' => $row[24],
            'hybrid_Type' => $row[25],
            'fuel_Combination' => $row[26],
            'fuel_Type' => $row[27],
            'additional_Fuel' => $row[28],
            'CO2_NEDC' => $row[29],
            'CO2_WLTP' => $row[30],
            'average_Fuel_Consuption' => $row[31],
            'average_Fuel_Consuption_WLTP' => $row[32],
            'electric_Driving_Range' => $row[33],
            'door' => $row[34],
            'num_Of_Seats' => $row[35],
            'total_Axle' => $row[36],
            'number_Of_Wheels' => $row[37],
            'steering_Wheel' => $row[38],
            'towing_Wheel' => $row[39]
            
            // Add more columns here as needed
        ]);*/

    /*public function collection(Collection $rows)
    {  
        $fields    = array();

        $rows = $rows->skip(1);

        foreach ($rows as $values) {

            $fields['versions'][$values[40]][] =   array(
            'make' => $values[0],
            'make_Carish' => $values[40],
            'model' => $values[1],
            'model_Carish'  => $values[41],
            'first_Registration' => $values[2],
            'Initial_Registration_Estonia' => $values[3],
            'category' => $values[4],
            'subcategory' => $values[5],
            'body' => $values[6],
            'bodyType' => $values[7],
            'length' => $values[8],
            'width' => $values[9],
            'height' => $values[10],
            'full_Mass' => $values[11],
            'registered_Mass' => $values[12],
            'empty_Mass' => $values[13],
            'trailer_With_Breakes' => $values[14],
            'trailer_Without_Breakes' => $values[15],
            'total_Trailer_Mass' => $values[16],
            'towbar_Load' => $values[17],
            'maximum_Speed' => $values[18],
            'emission_Standard' => $values[19],
            'noise_Level' => $values[20],
            'engine_Capacity_CC' => $values[21],
            'engine_Power_KW' => $values[22],
            'engine_Type' => $values[23],
            'gearbox_Type' => $values[24],
            'hybrid_Type' => $values[25],
            'fuel_Combination' => $values[26],
            'fuel_Type' => $values[27],
            'additional_Fuel' => $values[28],
            'CO2_NEDC' => $values[29],
            'CO2_WLTP' => $values[30],
            'average_Fuel_Consuption' => $values[31],
            'average_Fuel_Consuption_WLTP' => $values[32],
            'electric_Driving_Range' => $values[33],
            'door' => $values[34],
            'num_Of_Seats' => $values[35],
            'total_Axle' => $values[36],
            'number_Of_Wheels' => $values[37],
            'steering_Wheel' => $values[38],
            'towing_Wheel' => $values[39]
            );
             dd($fields);
        } 
       
    }*/

    /*protected $fields = [];
    public function collection(Collection $rows)
    {
        foreach ($rows as $values) {
            $this->fields['varients'][$values[40]][] = [
                'make' => $values[0],
                'make_Carish' => $values[40],
                'model' => $values[1],
                'model_Carish'  => $values[41],
                // Add other fields here
            ];  
        }
    }

    public function getFields()
    {
        return $this->fields;
    }*/

