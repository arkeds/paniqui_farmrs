@extends('reports')
@section('content')

<div class="card" >
  <div class="card-header text-white bg-primary ">
    @if($animal_name)
     Masterlist of Raisers of {{$animal_name}}
    @endif
  </div>
  
  <div class="card-body">
  	<div class="row">
      <div class="col-md-12">
        <div class="form-inline">
          <label class="col-md-2">Select Animal</label>
          <select class="form-control col-md-3" onchange="animalRaisers(this.value)">
            <option value="0">--ANIMALS-</option>
            @foreach($animalList as $a)
            <option {{$selectedAnimal == $a->id ? "SELECTED" : ""}} value="{{$a->id}}">{{$a->description}}</option>
            @endforeach
          </select>
        </div>
          
      </div> 
    </div>
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
          
          <th colspan="2" align="right">No. of Heads</th>
        </tr>
        <tr>
          <th>Barangay</th>
          <th>Last Name</th>
          <th>First Name</th>
          <th>Middle Name</th>
          <th>Extension</th>
          <th>Gender</th>
          <th>Birthdate</th>
          <th>Civil Status</th>
          <th>Education</th>
          <th>Contact No.</th>
          <th>Backyard</th>
          <th>Commercial</th>
        </tr>
      </thead>
      <tbody>
        @foreach($raisers as $a)
        <tr>
          <td>{{$a['barangay']}}</td>
          <td>{{$a['last_name']}}</td>
          <td>{{$a['first_name']}}</td>
          <td>{{$a['middle_name']}}</td>
          <td>{{$a['extension']}}</td>
          <td>{{$a['gender']}}</td>
          <td>{{$a['birthdate']}}</td>
          <td>{{$a['civil_status']}}</td>
          <td>{{$a['education']}}</td>
          <td>{{$a['contact']}}</td>
          <td align="right">{{$a['backyard']}}</td>
          <td align="right">{{$a['commercial']}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection