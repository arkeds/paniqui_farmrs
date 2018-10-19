@extends('layout')
@section('content')
<div class="card " >
  <div class="card-header text-white bg-primary ">Register Farmer</div>
  <div class="card-body">
  <form method="POST" action="{{ url("farmers/create") }}">
  	<div class="row">
  		<div class="col-md-3">
  			<select required class="form-control" name="owner_type" onchange="isCoop(this.value)">
  				<option value="">--Owner Type</option>
  				<option value="P">Individual</option>
  				<option value="C">Cooperative/Organization</option>
  			</select>
  		</div>
  		<div class="col-md-9">
  			<input disabled  type="text" id="cooperative" name="cooperative"class="form-control" placeholder="Cooperative/Organization Name">
  		</div>
  	</div>
  	<br>
  	<div class="row">
  		<div class="col-md-3">
  			<input type="text" name="firstname" class="form-control" placeholder="First Name" required>
  		</div>
  		<div class="col-md-3">
  			<input type="text" name="middlename" class="form-control" placeholder="Middle Name" required>
  		</div>
  		<div class="col-md-3">
  			<input type="text" name="lastname" class="form-control" placeholder="Last Name" required>
  		</div>
  		<div class="col-md-3">
  			<select class="form-control" name="extension">
  				<option value="">--Extension--</option>
          <option value="JR">Jr.</option>
          <option value="SR">Sr.</option>
          <option value="III">III</option>
          <option value="IV">IV</option>
          <option value="V">V</option>
          <option value="VI">VI</option>
          <option value="VII">VII</option>
          <option value="VIII">VIII</option>

  			</select>
  		</div>
  	</div>
    <br>
    <div class="row">
    	<div class="col-md-4">
    		<select class="form-control" required name="gender">
    			<option>--Gender--</option>
    			<option value="M">Male</option>
    			<option value="F">Female</option>
    		</select>
    	</div>
    	<div class="col-md-4">
    		<input type="date" name="birthdate" class="form-control" required>
    	</div>
    	<div class="col-md-4">
    		<input type="text" name="contact" class="form-control" placeholder="Contact No." required>
    	</div>
    	
    </div>
    <br>

    <div class="row">
    	<div class="col-md-4">
    		<select class="form-control" required name="barangay">
    			<option>--Barangay--</option>
    			@foreach($barangays as $barangay)
    			<option value="{{$barangay->code}}">{{(string)$barangay->name}}</option>
    			@endforeach
    		</select>
    	</div>
    	<div class="col-md-8">
    		<input type="text" name="address" class="form-control" placeholder="Purok/Zone/St. and House No.">
    	</div>

    </div>
    <br>
    <div class="row">
      <div class="col-md-4">
        <select class="form-control" required name="civil_status">
          <option>--Civil Status--</option>
          <option value="S">Single</option>
          <option value="M">Married</option>
          <option value="L">Live-in</option>
          <option value="P">Separated</option>
          <option value="W">Widow/Widower</option>
        </select>
      </div>
      <div class="col-md-4">
        <select class="form-control" name="education">
          <option value="None">--Educational Attainment--</option>
          <option value="Elementary Level">Elementary Level</option>
          <option value="Highschool Level">Highschool Level</option>
          <option value="College Undergraduate">College Undergraduate</option>
          <option value="Vocational Course">Vocational Course</option>
          <option value="College Graduate">College Graduate</option>
        </select>
      </div>
    </div>
    @csrf
    <br>
    <button class="btn btn-primary" type="submit">Save</button>
    <a class="btn btn-secondary"  href="{{url("farmers")}}">Cancel</a>
    </form>
  </div>
</div>

@endsection