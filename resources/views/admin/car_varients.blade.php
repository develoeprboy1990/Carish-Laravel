@extends('admin.layouts.app')

@section('content')
<style type="text/css">
.invalid-feedback {
     font-size: 100%; 
}
.disabled:disabled{
  opacity:0.5;
  cursor: not-allowed; 
}

</style>

{{-- Content Start from here --}}

<div class="bg-white main-titl-row  pb-3 pt-3 row align-items-center ">

   <div class="col-lg-6 col-md-4 col-sm-4  title-col">
    <h3 class="fontbold maintitle mb-2 mb-sm-0 text-capitalize">Car Variants ({{@$total_records}})</h3>
  </div>

  <div class="col-lg-6 col-md-8 col-sm-8 search-col text-right">
      

      <button class="btn btn-info m-2" data-toggle="modal" data-target="#uploadCSV">Upload CSV</button>

      <!-- <button class="btn btn-primary m-2" data-toggle="modal" data-target="#importCSV">Import CSV</button> -->

       <a href="{{url('admin/update-makes')}}"><button class="btn btn-small btn-warning m-2" >
        Update Make/Models
       </button></a>

       <a href="{{url('admin/update-versions')}}"><button class="btn btn-success" >Update Version</button></a>

  </div>

  <!-- <div class="col-lg-4 col-md-5 col-sm-5 search-col text-right">
      <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" style="float: right">Add Google Ad</button>
  </div> -->

</div>

<div class="row">
  <div class="col-lg-12 col-md-8 col-sm-8 search-col text-right mb-2">
    <a href="{{url('admin/empty-carvariants')}}"><button class="btn btn-danger" >Empty CarVariant</button></a>

      <a href="{{url('admin/empty-makemodels')}}"><button class="btn btn-danger" >Empty Make/Models</button></a>


      <a href="{{url('admin/empty-versions')}}"><button class="btn btn-danger" >Empty Versions</button></a>
  </div>
  <div class="col-lg-12 col-12 appointment-col">
    <div class="bg-white custompadding customborder">
      <div class="section-header">
       <h5 class="mb-1">Car Versions</h5>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered example" style="width:100%">
          <thead>
              <tr>
                <th>Action</th>
          <th>make</th>
          <th>model</th>
          <th>first_Registration</th>
          <th>Initial_Registration_Estonia</th>
          <th>category</th>
          <th>subcategory</th>
          <th>body</th>
          <th>bodyType</th>
          <th>length</th>
          <th>width</th>
          <th>height</th>
          <th>full_Mass</th>
          <th>registered_Mass</th>
          <th>empty_Mass</th>
          <th>trailer_With_Breakes</th>
          <th>trailer_Without_Breakes</th>
          <th>total_Trailer_Mass</th>
          <th>towbar_Load</th>
          <th>maximum_Speed</th>
          <th>emission_Standard</th>
          <th>noise_Level</th>
          <th>engine_Capacity_CC</th>
          <th>engine_Power_KW</th>
          <th>engine_Type</th>
          <th>gearbox_Type</th>
          <th>hybrid_Type</th>
          <th>fuel_Combination</th>
          <th>fuel_Type</th>
          <th>additional_Fuel</th>
          <th>CO2_NEDC</th>
          <th>CO2_WLTP</th>
          <th>average_Fuel_Consuption </th>
          <th>average_Fuel_Consuption_WLTP</th>
          <th>electric_Driving_Range</th>
          <th>door</th>
          <th>num_Of_Seats</th>
          <th>total_Axle</th>
          <th>number_Of_Wheels</th>
          <th>steering_Wheel</th>
          <th>towing_Wheel</th>
          <th>make_Carish</th>
          <th>model_Carish</th>
                <th>Created Date</th>
              </tr>
          </thead>
          <tbody>
            
            @foreach($records as $record)
            <tr>
            <td>
              <a  class="actionicon bg-danger deleteaction delete-btn text-center"  href="{{route('delete-make-model-version',['id'=>$record->id])}}" ><i class="fa fa-close" onclick="return confirm('Are you sure you want to delete the record {{ @$record->id }} ?')"></i></a>
            </td>
<td>{{ @$record->make }}</td>
<td>{{ @$record->model }}</td>
<td>{{ @$record->first_registration }}</td>
<td>{{ @$record->initial_registration_estonia }}</td>
<td>{{ @$record->category }}</td>
<td>{{ @$record->subcategory }}</td>
<td>{{ @$record->body }}</td>
<td>{{ @$record->bodytype }}</td>
<td>{{ @$record->length }}</td>
<td>{{ @$record->width }}</td>
<td>{{ @$record->height }}</td>
<td>{{ @$record->full_mass }}</td>
<td>{{ @$record->registered_mass }}</td>
<td>{{ @$record->empty_mass }}</td>
<td>{{ @$record->trailer_with_breakes }}</td>
<td>{{ @$record->trailer_without_breakes }}</td>
<td>{{ @$record->total_trailer_mass }}</td>
<td>{{ @$record->towbar_load }}</td>
<td>{{ @$record->maximum_speed }}</td>
<td>{{ @$record->emission_standard }}</td>
<td>{{ @$record->noise_level }}</td>
<td>{{ @$record->engine_capacity_cc }}</td>
<td>{{ @$record->engine_power_kw }}</td>
<td>{{ @$record->engine_type }}</td>
<td>{{ @$record->gearbox_type }}</td>
<td>{{ @$record->hybrid_type }}</td>
<td>{{ @$record->fuel_combination }}</td>
<td>{{ @$record->fuel_type }}</td>
<td>{{ @$record->additional_fuel }}</td>
<td>{{ @$record->co2_nedc }}</td>
<td>{{ @$record->co2_wltp }}</td>
<td>{{ @$record->average_fuel_consuption  }}</td>
<td>{{ @$record->average_fuel_consuption_wltp }}</td>
<td>{{ @$record->electric_driving_range }}</td>
<td>{{ @$record->door }}</td>
<td>{{ @$record->num_of_seats }}</td>
<td>{{ @$record->total_axle }}</td>
<td>{{ @$record->number_of_wheels }}</td>
<td>{{ @$record->steering_wheel }}</td>
<td>{{ @$record->towing_wheel }}</td>
<td>{{ @$record->make_carish }}</td>
<td>{{ @$record->model_carish }}</td>
<td>{{$record->created_at !== null ? $record->created_at : '--'}}</td>
            </tr>
            @endforeach
            
            </td>
          </tbody>
      </table>
    </div>
   </div>
  </div>

</div>
<!-- Upload csv file  -->
<div class="modal fade" id="uploadCSV"> 
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">   
        <div class="modal-body text-center">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h3 class="text-capitalize fontmed">Upload CSV For Car Variants</h3>
          <div class="mt-3">
          <form method="post" action="{{url('admin/upload-car-variants')}}" class="upload-excel-form" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="form-group">
              <a target="" href="{{asset('public/admin/excel/Car_Varients.csv')}}" download><span class="btn btn-success" id="examplefilebtn">Download Example File</span></a>
            </div>

            <div class="form-group">
              <input type="file" name="csv" class="font-weight-bold form-control-lg form-control" >
            </div>           
            
            <div class="form-submit">
              <input type="submit" value="upload" class="btn btn-primary save-btn">
              <input type="reset" value="close" class="btn btn-danger close-btn">
            </div>
            </form>
         </div> 
        </div>
      </div>
    </div>  
  </div>


<!-- Import CSV file  -->
<div class="modal fade" id="importCSV"> 
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">   
        <div class="modal-body text-center">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h3 class="text-capitalize fontmed">Uploaded Files</h3>
          <div class="mt-3">
            <div class="table-responsive">
              <table class="table table-bordered" style="width:100%">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>File Name</th>
                    <th>Action</th>
                  </tr>
                  @foreach($uploadedFiles as $file)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td> {{ $file->file_name }}</td>
                    <td>              
                      <a href="{{url('admin/import-car-variants/'.$file->id)}}"><button type="btn" class="btn btn-danger close-btn">Import File</button></a>
                    </td>
                  </tr>
                  @endforeach
                </thead>
              </table>
            </div> 
          </div>
        </div>
      </div>  
  </div>
</div>


@push('custom-scripts')
<script type="text/javascript">
  $(function(e){
    $('.example').DataTable({});

     @if(Session::has('successmsg'))
        toastr.success('Success!',"{{Session::get('successmsg')}}" ,{"positionClass": "toast-bottom-right"});
      @endif

     @if(Session::has('errormsg'))
        toastr.error('Error!',"{{Session::get('errormsg')}}" ,{"positionClass": "toast-bottom-right"});
      @endif
    
  });
</script>
@endpush
@endsection

