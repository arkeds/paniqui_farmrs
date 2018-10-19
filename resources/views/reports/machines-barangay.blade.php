@extends('layout')
@section('content')


<div class="card" >
  <div class="card-header text-white bg-primary ">
     Brgy. {{$barangay->name}}
  </div>
  
  <div class="card-body">
  	<table class="table table-sm barangay_reports" >
      <thead>
        <tr>
        	<th>Machine/Equipment</th>
    			<th>Capacity</th>
    			<th>Year Acquired</th>
          <th>Acquisition Mode</th>
    			<th>Supplier</th>
          <th>Owner</th>
        </tr>
      </thead>
      <tbody>
        @foreach($barangay_machines as $x)
        <tr>
        	<td>{{$x->machName}}</td>
        	<td>{{$x->capacity}}</td>
        	<td>{{$x->acq_yr}}</td>
          <td>{{$x->acquisitionMode()}}</td>
        	<td>{{$x->supplier}}</td>
          <td>{{$x->coop}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    
  </div>
</div>


@endsection