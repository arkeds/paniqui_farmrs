@extends('layout')
@section('content')

<div class="alert alert-dismissible alert-primary">
  {{$farmer->coop}}
  <div class="btn-group float-right" role="group">
    <a href="{{url("/farmers/".$farmer->id."/profile")}}" class="btn btn-success ">Profile</a>
    <a href="{{url("/farmers/".$farmer->id."/farm-data")}}" class="btn btn-success ">Farm Data</a>
    <a href="{{url("/farmers/".$farmer->id."/farms")}}" class="btn btn-success disabled">Farms</a>
    <a href="{{url("/farmers/".$farmer->id."/machines")}}" class="btn btn-success">Machines</a>
  </div>
  
</div>

<div class="card">
  <div class="card-body">
    <h4 class="card-title">
      Farms Locations
      <a class="btn btn-success btn-sm float-right" href="{{url("/farmers/".$farmer->id."/farms/create")}}">Add Farm</a>
    </h4>
  	
    
  </div>
  <table class="table">
  	<thead>
  		<tr>
  			<th>Location</th>
  			<th>Tenurial Status</th>
  			{{-- <th>Validity</th> --}}
  			<th>Action</th>
  		</tr>
  	</thead>
    <tbody>
      @foreach($farmer->farms as $farm)
      <tr>
        <td>{{ $farm->farmLocation() }}</td>
        <td>{{ $farm->tenurialStatus() }}</td>
        {{-- <td></td> --}}
        <td>
          <a href="{{url("/farms/".$farm->id)}}" class="btn btn-success btn-sm">View Farm</a>
          <a href="{{url("/farms/".$farm->id."/croppings/create")}}" class="btn btn-success btn-sm">New Cropping Entry</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>




@endsection