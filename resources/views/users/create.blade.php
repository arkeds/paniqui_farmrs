@extends('layout')
@section('content')


<div class="card">
	<div class="card-header bg-primary text-white">
		Create User
	</div>
	<form action="{{url("/users/create")}}" method="POST">
	<div class="card-body">
		<h4 class="card-title">User Details</h4>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Designation <span style="color: red;">*</span></label>
					<input type="text" class="form-control" name="designation" value="{{old('designation')}}">
					<span style="color: red;">{{ $errors->first('designation') }}</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>First Name <span style="color: red;">*</span></label>
					<input type="text" class="form-control" name="firstname" value="{{old('firstname')}}">
					<span style="color: red;">{{ $errors->first('firstname') }}</span>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Middle Name <span style="color: red;">*</span></label>
					<input type="text" class="form-control" name="middlename" value="{{old('middlename')}}">
					<span style="color: red;">{{ $errors->first('middlename') }}</span>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Last Name <span style="color: red;">*</span></label>
					<input type="text" class="form-control" name="lastname" value="{{old('lastname')}}">
					<span style="color: red;">{{ $errors->first('lastname') }}</span>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Contact No. </label>
					<input type="text" class="form-control" name="contact" value="{{old('contact')}}">
					<span style="color: red;">{{ $errors->first('contact') }}</span>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Birthdate </label>
					<input type="date" class="form-control" name="birthdate" value="{{old('birthdate')}}">
					<span style="color: red;">{{ $errors->first('birthdate') }}</span>
				</div>
			</div>
			
		</div>
		<div class="row">
			<div class="col-md-8">
				<div class="form-group">
					<label>Home Address</label>
					<input type="text" class="form-control" name="address" value="{{old('address')}}">
				</div>
			</div>
		</div>
	</div>
	<hr>
	<div class="card-body">
		<h4 class="card-title">Login Details</h4>
		<div class="row">
			<div class="col-md-12">
				<div class="form-inline">
					<label class="col-md-2">Username <span style="color: red;">*</span></label>
					<input type="text" name="username" class="form-control col-md-8" value="{{old('username')}}">
					<span style="color: red;">{{ $errors->first('username') }}</span>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<div class="form-inline">
					<label class="col-md-2">Password <span style="color: red;">*</span></label>
					<input type="password" name="password" class="form-control col-md-8">
					<span style="color: red;">{{ $errors->first('password') }}</span>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-12">
				<div class="form-inline">
					<label class="col-md-2">Confirm Password <span style="color: red;">*</span></label>
					<input type="password" name="password_confirmation" class="form-control col-md-8">
					<span style="color: red;">{{ $errors->first('password_confirmation') }}</span>
				</div>
			</div>
		</div>
		<br>
		@if(Auth::user()->root)
		<div class="row">
			<div class="col-md-12">
				<div class="form-inline">
					<label class="col-md-2">&nbsp;</label>
					<div class="custom-control custom-checkbox">
					      <input type="checkbox" class="custom-control-input col-md-8" id="customCheck1" name="isang_admin_officer" value="1">
					      <label class="custom-control-label" for="customCheck1">Administrator Account</label>
					</div>
				</div>
			</div>
		</div>
		@endif
		<br>
		@csrf
		<button class="btn btn-primary">Save</button>
		<a href="/users" class="btn btn-secondary">Cancel</a>
	</div>
	</form>

</div>

<br>
<br>
@endsection