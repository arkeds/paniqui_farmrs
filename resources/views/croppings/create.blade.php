@extends('layout')
@section('content')


<div class="card">
	<div class="card-header text-white bg-primary">
		Create Cropping Entry
	</div>
	<div class="card-body">
	<form action="{{url("/farms/".$farm->id."/croppings/create")}}" method="POST">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Planting Date:</label>
					<input type="date" class="form-control" name="crop_date" required>
				</div>
			</div>
			
			
		</div>
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Cropping No:</label>
					<select class="form-control" name="crop_no" required>
						<option value="1">1st Cropping</option>
						<option value="2">2nd Cropping</option>
						<option value="3">3rd Cropping</option>
					</select>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Area (hectares):</label>
					<input type="number" class="form-control" name="crop_area" required>
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Water Source:</label>
					<select class="form-control" name="water_source" required>
						<option value="IRI">Irrigated</option>
						<option value="NIR">Non Irrigated/Rainfed</option>
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
						<option value="{{ $crop->id }}">{{$crop->description}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-8">
				<div class="form-group">
					<label>Variation:</label>
					<input type="text" class="form-control" name="crop_variation">
				</div>
			</div>
		</div>
		<div class="row">
			
			
		</div>
		@csrf
		<button class="btn btn-primary">Save</button>
		<a href="{{url("/farms/".$farm->id)}}" class="btn btn-secondary">Cancel</a>
	</form>
	</div>
</div>


@endsection

