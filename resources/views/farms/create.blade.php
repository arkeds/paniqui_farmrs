@extends('layout')
@section('content')

<div class="card">
	<div class="card-header text-white bg-primary">
		New Farm Location
	</div>
	<div class="card-body">
	<form action="{{url("/farmers/".$farmer->id."/farms/create")}}" method="POST">
	<div class="row">
		<div class="col-md-3">
			<select class="form-control" name="brgy">
				<option value="">--BARANGAY--</option>
				@foreach($barangays as $brgy)
				<option value="{{$brgy->code}}">{{$brgy->name}}</option>
				@endforeach
			</select>
		</div>
		<div class="col-md-6">
			<input type="text" name="sitio" class="form-control" required placeholder="sitio/location">
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-3">
			<select required class="form-control" name="tenurial"  onchange="tenurialStatus(this.value)">
				<option value="">--Tenurial Status--</option>
				<option value="O">OWNED</option>
				<option value="T">TENANT</option>
				<option value="R">RENT</option>
			</select>
		</div>
		<div class="col-md-6">
			<input type="text" name="land_owner" id="land_owner" disabled class="form-control" required placeholder="Land Owner">
		</div>
		
	</div>
	<br>
	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<label>Validity Date</label>
				<input type="date" name="validity_date" class="form-control" placeholder="Valid Until" placeholder="Valid Date">
			</div>
			
			
		</div>
	</div>
	@method('POST')
	@csrf
	<button class="btn btn-primary" type="submit">Save</button>
	<a href="{{ url("/farmers/".$farmer->id."/farms") }}" class="btn btn-secondary">Cancel</a>		
	</form>
	</div>
  
</div>




@endsection