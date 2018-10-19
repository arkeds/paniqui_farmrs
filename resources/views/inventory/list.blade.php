@extends('layout')
@section('content')

<div class="card">
	<div class="card-header bg-primary text-white">
		Machines/Equipment Inventory
	</div>
	<br>
	<div class="card-body">
		<table class="table table-sm inventoryTable">
			<thead>
				<tr>
					<th>Machine/Equipment</th>
					<th>Capacity</th>
					<th>Year Acquired</th>
					<th>Owner</th>
					<th>Status</th>
					<th>Supplier</th>
					<th>Date Registered</th>
				</tr>
			</thead>
			<tbody>
				@foreach($machines as $machine)
				<tr>
					<td>{{$machine->machName}}</td>
					<td>{{$machine->capacity.' '.$machine->machUnit}}</td>
					<td>{{$machine->acquisition_year}}</td>
					<td>{{$machine->owner->coop}}</td>
					<td>{{$machine->machineStatus()}}</td>
					<td>{{$machine->supplier}}</td>
					<td>{{$machine->created_at}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>






@endsection