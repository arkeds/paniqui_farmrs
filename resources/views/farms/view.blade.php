@extends('layout')
@section('content')

<div class="alert alert-dismissible alert-primary">
  Farm Details
  <a href="{{"/farmers/".$farm->owner_id."/farms"}}" class="btn btn-success float-right">Farms</a>
</div>

<div class="card">
	<div class="card-body">
		<div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label>Owner</label>
					<input type="text" readonly class="form-control" value="{{$farm->land_owner}}">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Location</label>
					<input type="text" readonly class="form-control" value="{{$farm->farmLocation()}}">
				</div>
			</div>
			<div class="col-md-4">
				<div class="form-group">
					<label>Tenurial Status</label>
					<input type="text" readonly class="form-control" value="{{$farm->tenurialStatus()}}">
				</div>
			</div>
			@if(!is_null($farm->validity_date))
			<div class="col-md-4">
				<div class="form-group">
					<label>Validity</label>
					<input type="text" readonly class="form-control" value="{{$farm->validity_date}}">
				</div>
			</div>
			@endif
			
		</div>
	</div>
</div>
<br>
<div class="card">
	<div class="card-body">
		<h4 class="card-title">Cropping Entries
			<a href="{{url("/farms/".$farm->id."/croppings/create")}}" class="btn btn-success float-right">New Cropping Entry</a>
		</h4>
		<br>
		<table class="table dTable">
			<thead>
				<tr>
					<th>Crop Order</th>
					<th>Crop</th>
					<th>Variety</th>
					<th>Area (Hectares)</th>
					<th>Water Source</th>
					<th>Planting Date</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($farm->croppings as $cropping)
				<tr>
					<td>{{$cropping->cropOrder()}}</td>
					<td>{{$cropping->crop->description}}</td>
					<td>{{$cropping->variation}}</td>
					<td align="center">{{$cropping->crop_area}}</td>
					<td>{{$cropping->waterSource()}}</td>
					<td>{{$cropping->planting_date}}</td>
					<td>
						<a href="{{url("/croppings/".$cropping->id."/edit")}}" title="Edit"><i style="color: #ff851b;" class="fa fa-edit"></i></a>
						&nbsp;&nbsp;&nbsp;
						<a href="javascript:void(0)" onclick="event.preventDefault();
                    			 document.getElementById('cform{{$cropping->id}}').submit();" title="Delete"><i style="color: #ff4136;" class="fa fa-trash"></i></a>
                    	<form id="cform{{$cropping->id}}" action="{{url("/croppings/".$cropping->id)}}" method="POST" style="display: none;">
                    		@method('DELETE')
            	            @csrf
            	        </form>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	
</div>




@endsection