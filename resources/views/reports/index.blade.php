@extends('layout')
@section('content')

	{{-- 
	<div class="alert  alert-info">
	  Reports Section
	</div>
 --}}
<div class="row">
	<div class="col-md-4">
		<a href="{{url('reports/farmers')}}" style="text-decoration: none;" class="reports-link">
		<div class="card">
			<center>
				<div class="card-header bg-primary text-white">
					<h2><i class="fa fa-users fa-lg"></i></h2>
					Registered Farmers
				</div>
			</center>
		</div>
		</a>
	</div>
	<div class="col-md-4">
		<a href="{{url('/reports/inventory/count')}}" style="text-decoration: none;" class="reports-link">
		<div class="card">
			<div class="card-header bg-success text-white">
				<center>
					<h2><i class="fa fa-cubes fa-lg"></i> </h2>
					Machine/Equipment Inventory
				</center>
			</div>
		</div>
		</a>
	</div>
	<div class="col-md-4">
		<a href="{{url('/reports/inventory')}}" style="text-decoration: none;" class="reports-link">
		<div class="card">
			<div class="card-header bg-warning text-white">
				<center>
					<h2><i class="fa fa-list fa-lg"></i> </h2>
					Machine/Equipment List
				</center>
			</div>
		</div>
		</a>
	</div>
</div>




@endsection