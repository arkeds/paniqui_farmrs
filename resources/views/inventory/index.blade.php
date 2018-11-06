@extends('layout')
@section('content')

<div class="card">
	<div class="card-header bg-primary text-white">
		Machines/Equipment Inventory
	</div>
	
	
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Machine/Equipment</th>
				<th>Capacity</th>
				<th>Owner</th>
				<th>Supplier</th>
				<th>Date Registered</th>
			</tr>
		</thead>
		<tbody>
			@foreach($machines as $machine)
			<tr>
				<td>{{ $machine->machName}}</td>
				<td>{{ $machine->capacity ? $machine->capacity.' '.$machine->machUnit : "N/A" }}</td>
				<td>{{ $machine->owner->coop}}</td>
				<td>{{ $machine->supplier}}</td>
				<td>{{ $machine->created_at}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	<div class="card-body">
		{{$machines->links()}}
	</div>
</div>

@endsection