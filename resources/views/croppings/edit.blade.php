@extends('layout')
@section('content')


<div class="card">
	<div class="card-header text-white bg-warning">
		Edit Cropping Entry
	</div>
	<div class="card-body">
	<form action="{{url("/croppings/".$cropping->id)}}" method="POST">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Planting Date:</label>
					<input type="date" class="form-control" name="crop_date" required value="{{$cropping->planting_date}}">
				</div>
			</div>
			
			
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Cropping No:</label>
					<select class="form-control" name="crop_no" required>
						<option value="1" {{$cropping->crop_no == 1 ? "SELECTED" : ""}}>1st Cropping</option>
						<option value="2" {{$cropping->crop_no == 2 ? "SELECTED" : ""}}>2nd Cropping</option>
						<option value="3" {{$cropping->crop_no == 3 ? "SELECTED" : ""}}>3rd Cropping</option>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Area (hectares):</label>
					<input type="number" class="form-control" name="crop_area" required value="{{$cropping->crop_area}}">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Water Source:</label>
					<select class="form-control" name="water_source" required>
						<option value="IRI" {{$cropping->water_source == "IRI" ? "SELECTED" : ""}} >Irrigated</option>
						<option value="NIR" {{$cropping->water_source == "NIR" ? "SELECTED" : ""}} >Non Irrigated/Rainfed</option>
					</select>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Crop:</label>
					<select class="form-control" name="crop_id" required>
						@foreach($crops as $crop)
						<option value="{{ $crop->id }}" {{$cropping->crop_id == $crop->id ? "SELECTED" : ""}}>{{$crop->description}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-8">
				<div class="form-group">
					<label>Variation:</label>
					<input type="text" class="form-control" name="crop_variation" value="{{$cropping->variation}}">
				</div>
			</div>
		</div>
		<div class="row">
			
			
		</div>
		@method('PATCH')
		@csrf
		<button class="btn btn-primary">Save</button>
		<a href="{{ URL::previous()}}" class="btn btn-secondary">Cancel</a>
	</form>
	</div>
</div>


@endsection

