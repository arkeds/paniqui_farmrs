@extends('reports')
@section('content')

	{{-- 
	<div class="alert  alert-info">
	  Reports Section
	</div>
 --}}
<div class="row">
	<div class="col-md-3">
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
	<div class="col-md-3">
		<a href="{{url('reports/cooperatives')}}" style="text-decoration: none;" class="reports-link">
		<div class="card">
			<center>
				<div class="card-header bg-primary text-white">
					<h2><i class="fa fa-landmark fa-lg"></i></h2>
					Cooperatives
				</div>
			</center>
		</div>
		</a>
	</div>
	<div class="col-md-3">
		<a href="{{url('/reports/inventory/count')}}" style="text-decoration: none;" class="reports-link">
		<div class="card">
			<div class="card-header bg-primary text-white">
				<center>
					<h2><i class="fa fa-cubes fa-lg"></i> </h2>
					Machine/Equipment Inventory
				</center>
			</div>
		</div>
		</a>
	</div>
	<div class="col-md-3">
		<a href="{{url('/reports/inventory')}}" style="text-decoration: none;" class="reports-link">
		<div class="card">
			<div class="card-header bg-primary text-white">
				<center>
					<h2><i class="fa fa-list fa-lg"></i> </h2>
					Machine/Equipment List
				</center>
			</div>
		</div>
		</a>
	</div>
</div>

<div class="row">
	<div class="col-md-3">
		<a href="{{url('/reports/animals/0/raisers')}}" style="text-decoration: none;" class="reports-link">
		<div class="card">
			<div class="card-header bg-primary text-white">
				<center>
					<h2><i class="fa fa-grip-horizontal fa-lg"></i> </h2>
					Livestock/Poultry Raisers
				</center>
			</div>
		</div>
		</a>
	</div>
	<div class="col-md-3">
		<a href="{{url('/reports/trees/0/growers')}}" style="text-decoration: none;" class="reports-link">
		<div class="card">
			<div class="card-header bg-primary text-white">
				<center>
					<h2><i class="fa fa-tree fa-lg"></i> </h2>
					Fruit Tree Farmers
				</center>
			</div>
		</div>
		</a>
	</div>
	<div class="col-md-3">
		<a href="{{url('/reports/crops/0/croppings')}}" style="text-decoration: none;" class="reports-link">
		<div class="card">
			<div class="card-header bg-primary text-white">
				<center>
					<h2><i class="fa fa-apple-alt fa-lg"></i> </h2>
					Crop Farmers
				</center>
			</div>
		</div>
		</a>
	</div>
</div>


@endsection