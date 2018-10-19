@extends('layout')
@section('content')

<div class="alert alert-dismissible alert-primary">
  Farmer's Profile
  <div class="btn-group float-right" role="group">
    <a href="{{url("/farmers/".$owner->id."/profile")}}" class="btn btn-success active disabled">Profile</a>
    <a href="{{url("/farmers/".$owner->id."/farm-data")}}" class="btn btn-success">Farm Data</a>
    <a href="{{url("/farmers/".$owner->id."/farms")}}" class="btn btn-success ">Farms</a>
    <a href="{{url("/farmers/".$owner->id."/machines")}}" class="btn btn-success ">Machines</a>
  </div>
  
</div>

<div class="row"></div>
<div class="card" >
  <div class="card-body">
  	<div class="row">
  		<div class="col-md-12 ">
  			<a href="{{  url("/farmers/$owner->id/edit") }}" class="btn btn-warning float-right"><i class="fa fa-edit"></i> Edit</a>
  		</div>
  	</div>
  	
  	<div class="row">
  		<div class="col-md-4">
  			
  		</div>
  		<div class="col-md-8">
  			@if($owner->isAssocation())
  			<label><strong>Association/Cooperative Name:</strong></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$owner->coop}}
  			<br>
  			<label><strong>Contact Person:</strong></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$owner->profile->formalName()}}
  			@else
  			<label><strong>Name:</strong></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$owner->profile->fullName()}}
  			@endif
        <br>
        <label><strong>Civil Status:</strong></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$owner->profile->civilStatus()}}
  			<br>
  			<label><strong>Address:</strong></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$owner->house.', '.$owner->barangay->name}}
  			<br>
  			<label><strong>Contact No:</strong></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$owner->profile->contact}}
        <br>
        <label><strong>Educational Attainment:</strong></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$owner->profile->education}}
  		</div>
  	</div>
  </div>
</div>
<br>
<div class="card" >
  <div class="card-body">
    <button class="btn btn-primary float-right" data-toggle="modal" data-target="#memberModal"><i class="fa fa-user-plus"></i> Add Member</button>
    
    <h4 class="card-title">Family/Association Members</h4>
    <table class="table table-hover">
      <thead>
        <tr>
          <th>Name</th>
          <th>Relationship</th>
          <th>Birthdate</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($owner->relations as $relation)
        <tr>
          <td>{{ $relation->name }}</td>
          <td>{{ $relation->relationType() }}</td>
          <td>{{ $relation->birthdate }}</td>
          <td>
            <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="event.preventDefault();
                     document.getElementById('{{"relation".$relation->id}}').submit();">Delete</a>
            <form id="{{"relation".$relation->id}}" action="{{url("/farmers/member/".$relation->id)}}" method="POST" style="display: none;">
                <input type="hidden" name="farmer_id" value="{{$owner->id}}">
                @csrf
                @method('DELETE')
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    
  </div>
</div>

<!-- Modal--> 
<div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm">
  <div class="modal-content">
  <form action="{{url("farmers/member")}}" method="POST">
    <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">New Member</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body">
      <div class="form-group">
        <label>Name:</label>
        <input type="text" class="form-control" name="member_name" required>
      </div>
      <div class="form-group">
        <label>Relationship:</label>
        <select class="form-control" required name="relationship">
          <option value="S">Spouse</option>
          <option value="C">Child</option>
          <option value="M">Organization Member</option>
        </select>
      </div>
      <div class="form-group">
        <label>Birthdate:</label>
        <input type="date" class="form-control" name="member_birth" required>
      </div>
    </div>
    <div class="modal-footer">
      <input type="hidden" name="owner_id" value="{{ $owner->id }}">
      @csrf
      <button type="submit" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div>
  </form>
</div>
</div>  
</div>
<!-- end modal -->



@endsection

