@extends('layout')
@section('content')
<div class="card " >
  <div class="card-header text-white bg-warning">Edit Owner</div>
  <div class="card-body">
  <form method="POST" action="{{ url("farmers/".$owner->id) }}">
  	<div class="row">
  		<div class="col-md-3">
  			<select required class="form-control" name="owner_type" onchange="isCoop(this.value)">
  				<option value="">--Owner Type</option>
  				<option value="P" <?php if($owner->owner_type == "P"){ echo "SELECTED"; } ?>>Individual</option>
  				<option value="C" <?php if($owner->owner_type == "C"){ echo "SELECTED"; } ?>>Cooperative/Organization</option>
  			</select>
  		</div>
  		<div class="col-md-9">
        @if($owner->owner_type == "C")
  			<input type="text" id="cooperative" name="cooperative"class="form-control" placeholder="Cooperative/Organization Name" value="{{$owner->coop}}">
        @else
        <input type="text" id="cooperative" name="cooperative"class="form-control" placeholder="Cooperative/Organization Name" disabled>
        @endif
  		</div>
  	</div>
  	<br>
  	<div class="row">
  		<div class="col-md-3">
  			<input type="text" name="firstname" class="form-control" placeholder="First Name" required value="{{$owner->profile->fName}}">
  		</div>
  		<div class="col-md-3">
  			<input type="text" name="middlename" class="form-control" placeholder="Middle Name" required value="{{$owner->profile->mName}}">
  		</div>
  		<div class="col-md-3">
  			<input type="text" name="lastname" class="form-control" placeholder="Last Name" required value="{{$owner->profile->lName}}">
  		</div>
  		<div class="col-md-3">
  			<select class="form-control" name="extension">
  				<option value="">--Extension--</option>
          <option value="JR" <?php if($owner->profile->xName == "JR"){ echo "SELECTED"; } ?>>Jr.</option>
          <option value="SR" <?php if($owner->profile->xName == "SR"){ echo "SELECTED"; } ?>>Sr.</option>
          <option value="III" <?php if($owner->profile->xName == "III"){ echo "SELECTED"; } ?>>III</option>
          <option value="IV" <?php if($owner->profile->xName == "IV"){ echo "SELECTED"; } ?>>IV</option>
          <option value="V" <?php if($owner->profile->xName == "V"){ echo "SELECTED"; } ?>>V</option>
          <option value="VI" <?php if($owner->profile->xName == "VI"){ echo "SELECTED"; } ?>>VI</option>
          <option value="VII" <?php if($owner->profile->xName == "VII"){ echo "SELECTED"; } ?>>VII</option>
          <option value="VIII" <?php if($owner->profile->xName == "VIII"){ echo "SELECTED"; } ?>>VIII</option>

  			</select>
  		</div>
  	</div>
    <br>
    <div class="row">
    	<div class="col-md-4">
    		<select class="form-control" required name="gender">
    			<option>--Gender--</option>
    			<option value="M" <?php if($owner->profile->gender == "M"){ echo "SELECTED"; } ?>>Male</option>
    			<option value="F" <?php if($owner->profile->gender == "F"){ echo "SELECTED"; } ?>>Female</option>
    		</select>
    	</div>
    	<div class="col-md-4">
    		<input type="date" name="birthdate" class="form-control" required value="{{$owner->profile->birthdate}}">
    	</div>
    	<div class="col-md-4">
    		<input type="text" name="contact" class="form-control" placeholder="Contact No." required value="{{$owner->profile->contact}}">
    	</div>
    	
    </div>
    <br>

    <div class="row">
    	<div class="col-md-4">
    		<select class="form-control" required name="barangay">
    			<option>--Barangay--</option>
    			@foreach($barangays as $barangay)
    			<option value="{{$barangay->code}}" <?php if($owner->brgy == $barangay->code){ echo "SELECTED"; } ?> >{{(string)$barangay->name}}</option>
    			@endforeach
    		</select>
    	</div>
    	<div class="col-md-8">
    		<input type="text" name="address" class="form-control" placeholder="Purok/Zone/St. and House No." value="{{$owner->house}}">
    	</div>

    </div>
    <br>
    <div class="row">
      <div class="col-md-4">
        <select class="form-control" required name="civil_status">
          <option>--Civil Status--</option>
          <option value="S" <?php if($owner->profile->civil_status == "S"){ echo "SELECTED"; } ?>>Single</option>
          <option value="M" <?php if($owner->profile->civil_status == "M"){ echo "SELECTED"; } ?>>Married</option>
          <option value="L" <?php if($owner->profile->civil_status == "L"){ echo "SELECTED"; } ?>>Live-in</option>
          <option value="P" <?php if($owner->profile->civil_status == "P"){ echo "SELECTED"; } ?>>Separated</option>
          <option value="W" <?php if($owner->profile->civil_status == "W"){ echo "SELECTED"; } ?>>Widow/Widower</option>
        </select>
      </div>
      <div class="col-md-4">
        <select class="form-control" name="education">
          <option value="None">--Educational Attainment--</option>
          <option value="Elementary Level" <?php if($owner->profile->civil_status == "S"){ echo "SELECTED"; } ?>>Elementary Level</option>
          <option value="Highschool Level" <?php if($owner->profile->civil_status == "S"){ echo "SELECTED"; } ?>>Highschool Level</option>
          <option value="College Undergraduate" <?php if($owner->profile->civil_status == "S"){ echo "SELECTED"; } ?>>College Undergraduate</option>
          <option value="Vocational Course" <?php if($owner->profile->civil_status == "S"){ echo "SELECTED"; } ?>>Vocational Course</option>
          <option value="College Graduate" <?php if($owner->profile->civil_status == "S"){ echo "SELECTED"; } ?>>College Graduate</option>
        </select>
      </div>
    </div>
    @csrf
    @method('PATCH')
    <br>
    <button class="btn btn-primary" type="submit">Update</button>
    <a class="btn btn-secondary"  href="{{url("/farmers/".$owner->id."/profile")}}">Cancel</a>
    </form>
  </div>
</div>

@endsection