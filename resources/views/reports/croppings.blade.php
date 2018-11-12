@extends('reports')
@section('content')

<div class="card" >
  <div class="card-header text-white bg-primary ">
   Masterlist of {{$cropName}} Farmers
  </div>
  
  <div class="card-body">
    <form method="GET" action="" id="cropReport">
  	<div class="row">
      
        <div class="col-md-3">
          <div class="form-group">
            <label>Select Crop</label>
            <select class="form-control" id="crop">
              <option value="0">--Crops-</option>
              @foreach($crops as $c)
              <option {{$c->id == $selectedCrop ? "SELECTED" : ""}} value="{{$c->id}}">{{$c->description}}</option>
              @endforeach
            </select>  
          </div>
            
        </div>
        <div class="col-md-2">
          <label>Start</label>
          <input type="date" name="start" class="form-control" id="startDate">
        </div> 
        <div class="col-md-2">
          <label>End</label>
          <input type="date" name="end" class="form-control" id="endDate">
        </div>
        <div class="col-md-2">
          <button class="btn btn-primary" onclick="setCropReport()">Submit</button>
        </div>  
      
    
    </div>
    </form>
    <br>
    <table class="table table-bordered table-sm raisersTable" >
      <thead>
        <tr>
          <th></th>
          <th colspan="4" align="center">Name</th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          
          <th colspan="4" align="right">Cropping Data</th>
        </tr>
        <tr>
          <th>Barangay</th>
          <th>Last Name</th>
          <th>First Name</th>
          <th>Middle Name</th>
          <th>Extension</th>
          <th>Gender</th>
          <th>Birthdate</th>
          {{-- <th>Civil Status</th> --}}
          <th>Education</th>
          <th>Contact No.</th>
          
          <th>Farm Area (HA)</th>
          <th>Water Source</th>
          <th>Planting Date</th>
        </tr>
      </thead>
      <tbody>
       @foreach($croppings as $c)
        <tr>
          <td>{{$c['farmer']['barangay']['name']}}</td>
          <td>{{$c['farmer']['lName']}}</td>
          <td>{{$c['farmer']['fName']}}</td>
          <td>{{$c['farmer']['mName']}}</td>
          <td>{{$c['farmer']['xName']}}</td>
          <td>{{$c['farmer']['gender'] == "M" ? "MALE" : "FEMALE"}}</td>
          <td>{{$c['farmer']['birthdate']}}</td>
          {{-- <td>{{$c['farmer']['civil_status']}}</td> --}}
          <td>{{$c['farmer']['education']}}</td>
          <td>{{$c['farmer']['contact']}}</td>
          <td>{{$c['land_area']}}</td>
          <td>{{$c['water_source']}}</td>
          <td>{{$c['planting_date']}}</td>
        </tr>
       @endforeach
      </tbody>
    </table>
  </div>
  
</div>

@endsection