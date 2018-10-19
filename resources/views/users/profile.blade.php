@extends('layout')
@section('content')

<div class="card">
	<div class="card-header bg-primary text-white">
		User Account
	</div>
	<div class="card-body">
		<ul class="nav nav-tabs">
		  <li class="nav-item">
		    <a class="nav-link active show tabActive" data-toggle="tab" href="#profile"><i class="fa fa-user-circle"></i> User Details</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link tabActive" data-toggle="tab" href="#login"><i class="fa fa-lock"></i> Login Details</a>
		  </li>
		  
		</ul>
		<div id="myTabContent" class="tab-content">
		  <div class="tab-pane fade active show" id="profile">
		  	<br>
		  	<form action="{{url("/users/".$user->id."/profile")}}" method="POST">
		    <div class="row">
		    	<div class="col-md-4">
		    		<div class="form-group">
		    			<label>Designation</label>
		    			<input type="text" class="form-control" name="designation" value="{{$user->designation}}">
		    			
		    		</div>
		    	</div>
		    </div>
		    <div class="row">
		    	<div class="col-md-4">
		    		<div class="form-group">
		    			<label>First Name</label>
		    			<input type="text" class="form-control" name="firstname" value="{{$user->firstname}}">
		    		</div>
		    	</div>
		    	<div class="col-md-4">
		    		<div class="form-group">
		    			<label>Middle Name</label>
		    			<input type="text" class="form-control" name="middlename" value="{{$user->middlename}}">
		    		</div>
		    	</div>
		    	<div class="col-md-4">
		    		<div class="form-group">
		    			<label>Last Name</label>
		    			<input type="text" class="form-control" name="lastname" value="{{$user->lastname}}">
		    		</div>
		    	</div>
		    </div>
		    <div class="row">
		    	<div class="col-md-4">
		    		<div class="form-group">
		    			<label>Contact No.</label>
		    			<input type="text" class="form-control" name="contact" value="{{$user->contact}}">
		    		</div>
		    	</div>
		    	<div class="col-md-4">
		    		<div class="form-group">
		    			<label>Birthdate</label>
		    			<input type="date" class="form-control" name="birthdate" value="{{$user->birthdate}}">
		    		</div>
		    	</div>
		    	
		    </div>
		    <div class="row">
		    	<div class="col-md-8">
		    		<div class="form-group">
		    			<label>Home Address</label>
		    			<input type="text" class="form-control" name="address" value="{{$user->address}}">
		    		</div>
		    	</div>
		    </div>
		    @method('PATCH')
		    @csrf
		    <button type="submit" class="btn btn-warning">Update Profile</button>
		    </form>
		  </div>
		  <div class="tab-pane fade" id="login">
		  	<br>
		  	<form action="{{url("/users/".$user->id."/login")}}" method="POST">
		    <div class="row">
		    	<div class="col-md-12">
		    		<div class="form-inline">
		    			<label class="col-md-2">Username</label>
		    			<input type="text" name="username" class="form-control col-md-8" value="{{$user->username}}">
		    		</div>
		    	</div>
		    </div>
		    <br>
		    <div class="row">
		    	<div class="col-md-12">
		    		<div class="form-inline">
		    			<label class="col-md-2">Password</label>
		    			<input type="password" placeholder="Leave blank if you don't want to change it" name="password" class="form-control col-md-8">
		    		</div>
		    	</div>
		    </div>
		    <br>
		    <div class="row">
		    	<div class="col-md-12">
		    		<div class="form-inline">
		    			<label class="col-md-2">Confirm Password</label>
		    			<input type="password" placeholder="Leave blank if you don't want to change it" name="password_confirmation" class="form-control col-md-8">
		    		</div>
		    	</div>
		    </div>
		    <br>
		    @csrf
		    @method('PATCH')
		    <button type="submit" class="btn btn-warning">Update login</button>
			</form>
		  </div>
		  
		</div>			
  
	</div>
		
</div>
	

@endsection