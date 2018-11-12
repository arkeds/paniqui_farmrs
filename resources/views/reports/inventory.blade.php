@extends('reports')
@section('content')


<div class="card">
	<div class="card-header bg-primary text-white">
		Machines/Equipment Inventory

		<a href="{{url("/reports/machines/barangay")}}" class="btn btn-success float-right">Machines per Barangay</a>
	</div>
	<br>
	<div class="card-body">
		<table class="table table-sm inventoryTable">
			<thead>
				<tr>
					<th>Machine/Equipment</th>
					<th>Total</th>
					{{-- <th>Functional</th>
					<th>For Repair</th> --}}
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($machines as $machine)
				<tr>
					<td>{{$machine->machName}}</td>
					<td align="center">{{$machine->total}}</td>
					{{-- <td>{{$machine->functional}}</td>
					<td>{{$machine->repair}}</td> --}}
					<td><a href="{{url('/reports/inventory/'.$machine->machCode . '/machines')}}" class="btn btn-success btn-sm">View List</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>



@endsection