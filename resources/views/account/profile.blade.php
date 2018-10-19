@extends('layout')
@section('content')

<div class="card">
	<div class="card-header bg-warning text-white">
		{{Auth::user()->getName()}}
	</div>
	<div class="card-body">
		<ul class="nav nav-tabs">
		  <li class="nav-item">
		    <a class="nav-link active show tabActive" data-toggle="tab" href="#profile"><i class="fa fa-user-circle"></i> Profile Details</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link tabActive" data-toggle="tab" href="#login"><i class="fa fa-lock"></i> Login Details</a>
		  </li>
		  
		</ul>
		<div id="myTabContent" class="tab-content">
		  <div class="tab-pane fade active show" id="profile">
		  	<br>
		  	<form action="{{url("/profile")}}" method="POST">
		    <div class="row">
		    	<div class="col-md-4">
		    		<div class="form-group">
		    			<label>Designation</label>
		    			<input type="text" class="form-control" name="designation" value="{{Auth::user()->designation}}">
		    			
		    		</div>
		    	</div>
		    </div>
		    <div class="row">
		    	<div class="col-md-4">
		    		<div class="form-group">
		    			<label>First Name</label>
		    			<input type="text" class="form-control" name="firstname" value="{{Auth::user()->firstname}}">
		    		</div>
		    	</div>
		    	<div class="col-md-4">
		    		<div class="form-group">
		    			<label>Middle Name</label>
		    			<input type="text" class="form-control" name="middlename" value="{{Auth::user()->middlename}}">
		    		</div>
		    	</div>
		    	<div class="col-md-4">
		    		<div class="form-group">
		    			<label>Last Name</label>
		    			<input type="text" class="form-control" name="lastname" value="{{Auth::user()->lastname}}">
		    		</div>
		    	</div>
		    </div>
		    <div class="row">
		    	<div class="col-md-4">
		    		<div class="form-group">
		    			<label>Contact No.</label>
		    			<input type="text" class="form-control" name="contact" value="{{Auth::user()->contact}}">
		    		</div>
		    	</div>
		    	<div class="col-md-4">
		    		<div class="form-group">
		    			<label>Birthdate</label>
		    			<input type="date" class="form-control" name="birthdate" value="{{Auth::user()->birthdate}}">
		    		</div>
		    	</div>
		    	
		    </div>
		    <div class="row">
		    	<div class="col-md-8">
		    		<div class="form-group">
		    			<label>Home Address</label>
		    			<input type="text" class="form-control" name="address" value="{{Auth::user()->address}}">
		    		</div>
		    	</div>
		    </div>
		    @method('PATCH')
		    @csrf
		    <button type="submit" class="btn btn-primary">Update Profile</button>
		    </form>
		  </div>
		  <div class="tab-pane fade" id="login">
		  	<br>
		  	<form action="{{url("/profile/auth")}}" method="POST">
		    <div class="row">
		    	<div class="col-md-12">
		    		<div class="form-inline">
		    			<label class="col-md-2">Username</label>
		    			<input type="text" name="username" class="form-control col-md-8" value="{{Auth::user()->username}}">
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
		    <button type="submit" class="btn btn-primary">Update Login</button>
			</form>
		  </div>
		  
		</div>	
	</div>
</div>





@endsection