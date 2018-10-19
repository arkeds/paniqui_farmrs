@extends('layout')
@section('content')

@if(Auth::user()->is_admin)
<div class="row">
	<div class="col-md-4">
		<div class="card">
			<div class="card-header bg-success text-white">
				<h2><i class="fa fa-user-check"></i> <span class="badge">{{$active_users}}</span></h2>
				Active Users
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-header bg-danger text-white">
				<h2><i class="fa fa-user-times"></i> <span class="badge">{{$x_users}}</span></h2>
				Disabled Users
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-header bg-primary text-white">
				<h2><i class="fa fa-users"></i> <span class="badge">{{$all_users}}</span></h2>
				Total Users
			</div>
		</div>
	</div>
</div>
<br>
@endif



<div class="row">
	<div class="col-md-8">
		<div class="row">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header bg-primary text-white">
						<h2><i class="fa fa-users"></i> <span class="badge">{{$farmerCount}}</span></h2>
						Registered Farmers
					</div>
				</div>
				
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header bg-warning text-white">
						<h2><i class="fa fa-cogs"></i> <span class="badge">{{$functionalMachines}}</span></h2>
						Machines/Equipment
					</div>
				</div>
				
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<ul class="list-group">
				<li class="list-group-item active">Quick Links</li>
				<li class="list-group-item"><a href="{{url("/farmers/create")}}">Register Farmer</a></li>
				<li class="list-group-item"><a href="{{url("/reports/farmers")}}">Farmers Summary</a></li>
			</ul>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-body">
				<h2 class="card-title">Inventory</h2>
				<table class="table table-sm" id="inventory_table">
					<thead>
						<tr>
							<th>Machine/Equipment</th>
							<th>Total</th>
							{{-- <th>Functional</th>
							<th>For Repair</th> --}}
							
						</tr>
					</thead>
					<tbody>
						@foreach($machines as $machine)
						<tr>
							<td>{{$machine->machName}}</td>
							<td align="center">{{$machine->total}}</td>
							{{-- <td>{{$machine->functional}}</td>
							<td>{{$machine->repair}}</td> --}}
							
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

@endsection