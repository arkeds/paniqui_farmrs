@extends('reports')
@section('content')

<div class="card" >
  <div class="card-header text-white bg-primary ">
     @if($tree_name)
      Masterlist of Growers of {{$tree_name}}
     @endif
  </div>
  
  <div class="card-body">
  	<div class="row">
      <div class="col-md-12">
        <div class="form-inline">
          <label class="col-md-2">Select Tree</label>
          <select class="form-control col-md-3" onchange="treeGrowers(this.value)">
            <option value="0">--TREES--</option>
            @foreach($treeList as $t)
            <option {{$selectedTree == $t->id ? "SELECTED" : ""}} value="{{$t->id}}">{{$t->description}}</option>
            @endforeach
          </select>
        </div>
          
      </div> 
    </div>
    <br>
    <table class="table table-bordered table-sm raisersTable" >
      <thead>
        <tr>
          <th colspan="4" align="center">Name</th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          
          <th colspan="2" align="right">No. of Trees</th>
        </tr>
        <tr>
          <th>Last Name</th>
          <th>First Name</th>
          <th>Middle Name</th>
          <th>Extension</th>
          <th>Gender</th>
          <th>Birthdate</th>
          <th>Civil Status</th>
          <th>Education</th>
          <th>Contact No.</th>
          <th>Bearing</th>
          <th>Non-Bearing</th>
        </tr>
      </thead>
      <tbody>
        @foreach($growers as $a)
        <tr>
          <td>{{$a['last_name']}}</td>
          <td>{{$a['first_name']}}</td>
          <td>{{$a['middle_name']}}</td>
          <td>{{$a['extension']}}</td>
          <td>{{$a['gender']}}</td>
          <td>{{$a['birthdate']}}</td>
          <td>{{$a['civil_status']}}</td>
          <td>{{$a['education']}}</td>
          <td>{{$a['contact']}}</td>
          <td align="right">{{$a['bearing']}}</td>
          <td align="right">{{$a['non_bearing']}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection