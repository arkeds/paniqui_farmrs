@extends('layout')
@section('content')

<div class="card">
	<div class="card-header bg-primary text-white">
		Machines/Equipment

		<a href="/machine-equipment/create" class="float-right btn btn-sm btn-success"><i class="fa fa-plus"></i> Create</a>
	</div>
	<div class="card-body">
		<table class="table" id="inventory_table">
			<thead>
				<tr>
					<th>Code</th>
					<th>Description</th>
					<th>Machine Usage</th>
					<th>Unit</th>
					<th>Type</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($machine_equiment as $me)
				<tr>
					<td>{{$me->machCode}}</td>
					<td>{{$me->machName}}</td>
					<td>{{$me->purpose->description}}</td>
					<td>{{$me->machUnit}}</td>
					<td>{{$me->accessory()}}</td>
					<td>
						<a title="edit" href="{{url('/machine-equipment/'.$me->id.'/edit')}}"><i style="color: orange;" class="fa fa-edit"></i></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		
	</div>
</div>

@endsection