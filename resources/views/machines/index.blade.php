@extends('layout')
@section('content')

<div class="alert alert-dismissible alert-primary">
  {{$owner->coop}}
  <div class="btn-group float-right" role="group">
    <a href="{{url("/farmers/".$owner->id."/profile")}}" class="btn btn-success ">Profile</a>
    <a href="{{url("/farmers/".$owner->id."/farm-data")}}" class="btn btn-success ">Farm Data</a>
    <a href="{{url("/farmers/".$owner->id."/farms")}}" class="btn btn-success">Farms</a>
    <a href="{{url("/farmers/".$owner->id."/machines")}}" class="btn btn-success disabled">Machines</a>
  </div>
  
</div>

<div class="card">
  <div class="card-body">
    <h4 class="card-title">
      Machines/Equipment
      <a class="btn btn-success btn-sm float-right" href="{{url("/farmers/".$owner->id."/machines/create")}}">Add Machine/Equipment</a>
    </h4>
  	
    
  </div>
  <table class="table ">
  	<thead>
  		<tr>
  			<th>Machine/Equipment</th>
  			<th>Serial No.</th>
  			<th>Year Acquired</th>
        <th>Status</th>
  			<th>Registration Date</th>
  			<th>Action</th>
  		</tr>
  	</thead>
    <tbody>
      @foreach($machines as $machine)
      <tr>
        <td>{{$machine->machine->machName}}</td>
        <td>{{$machine->serial}}</td>
        <td>{{$machine->acquisition_year}}</td>
        <td>{{$machine->machineStatus()}}</td>
        <td>{{$machine->created_at}}</td>
        <td><a class="btn btn-warning btn-sm" href="{{url('/farmers/'.$owner->id.'/machines/'.$machine->machId.'/edit')}}"><i class="fa fa-edit"></i></a></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection