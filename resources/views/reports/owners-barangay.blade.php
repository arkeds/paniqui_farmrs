@extends('reports')
@section('content')


<div class="card" >
  <div class="card-header text-white bg-primary ">
     Brgy. {{$barangay->name}}
  </div>
  
  <div class="card-body">
  	<table class="table table-sm barangay_reports" >
      <thead>
        <tr>
        	<th>Owner Type</th>
			<th>Name</th>
			<th>Address</th>
			<th>Registered Date</th>
        </tr>
      </thead>
      <tbody>
        @foreach($barangay->owners as $x)
        <tr>
        	<td>{{$x->get_owner_type()}}</td>
        	<td>{{$x->coop}}</td>
        	<td>{{$x->house}}</td>
        	<td>{{$x->registeredDate()}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    
  </div>
</div>


@endsection