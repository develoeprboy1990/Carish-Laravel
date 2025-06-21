// Method to handle file upload (Step-1)
    public function uploadCarVariantsFile(Request $request)
    {
            // Validate the uploaded file
            $request->validate([
                'csv' => 'required|file|mimes:csv,txt|max:10240', // Adjust max file size as needed
            ]);
            $file = $request->file('csv');
            // Retrieve the original file name
            $originalFileName = $file->getClientOriginalName();
            // Generate a unique filename by appending a timestamp and converting to lowercase
            $uniqueFileName = strtolower(pathinfo($originalFileName, PATHINFO_FILENAME)) . '_' . time() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('car-varients', $uniqueFileName);
            // Save the file path in the database
            $importFile = ImportFile::create([
                'file_path' => $filePath,
                'file_name' => $uniqueFileName,
                'status' => 'pending', // You can add additional status fields if needed
                'type' => 'car_variant'
            ]);
    
            $data = file($request->file('csv'));
            $chunks = array_chunk($data,1000);
            foreach($chunks as $key => $chunk){
                $name = "/tmp{$key}.csv";
                $path = storage_path('app/temp');
                file_put_contents($path.$name,$chunk);
            }

        // Return a response indicating successful file upload
        return redirect()->back()->with('successmsg', 'Your file is being uploaded.');
    }


    public function importCarVariantsData($fileId)
    {

        // Retrieve the file path from the database
        $importFile = ImportFile::findOrFail($fileId);

        $path = storage_path('app/temp');

        $files = glob("$path/*.csv");

        $header = [];

        foreach($files as $key => $file)
        {
            $data = array_map('str_getcsv', file($file));
            if($key === 0){
                $header = $data[0];
                // Convert header keys to lowercase
                $header = array_map('strtolower', $header);
                unset($data[0]);
            }

            ProcessCarVariantsImport::dispatch($data,$header);
            
            unlink($file);
        }


        // Update the status of the import file if needed
        $importFile->update(['status' => 'importing']);

        // Return a response indicating that the import process has started
        return redirect()->back()->with('successmsg', 'Import process started.');

    }


    //CODE FOR HANDEL THE CARVARIANT Process
    foreach($this->data as $car){
        $carData = array_combine($this->header,$car);
        CarVariant::create($carData);
    }