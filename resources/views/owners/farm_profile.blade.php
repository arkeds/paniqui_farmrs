@extends('layout')
@section('content')


<div class="alert alert-dismissible alert-primary">
	{{$farmer->coop}}
	<div class="btn-group float-right" role="group">
	  <a href="{{url("/farmers/".$farmer->id."/profile")}}" class="btn btn-success ">Profile</a>
	  <a href="{{url("/farmers/".$farmer->id."/farm-data")}}" class="btn btn-success disabled">Farm Data</a>
	  <a href="{{url("/farmers/".$farmer->id."/farms")}}" class="btn btn-success ">Farms</a>
	  <a href="{{url("/farmers/".$farmer->id."/machines")}}" class="btn btn-success ">Machines</a>
	</div>
	
</div>
<div class="row">
	<div class="col-md-6">
		<div class="card" >
		  <div class="card-body">
		  	<h4 class="card-title">
		  		Poultry/Livestock
		  		<button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addAnimal"><i class="fa fa-plus"></i></button>
		  	</h4>
		  	  <table class="table dTable">
		  		<thead>
		  			<tr>
		  				<th>Animal Type</th>
		  				<th>Backyard</th>
		  				<th>Commercial</th>
		  			</tr>
		  		</thead>
		  		<tbody>
		  			@foreach($farmer->animals as $ani)
		  			<tr>
		  				<td>{{ $ani->animalType->description }}</td>
		  				<td>{{$ani->animal_count}}</td>
		  				<td>{{$ani->commercial_count}}</td>
		  			</tr>
		  			@endforeach
		  		</tbody>
		  	</table>
		  </div>
		  
		</div>

	</div>
	<div class="col-md-6">
		<div class="card" >
		  <div class="card-body">
		  	<h4 class="card-title">
		  		Fruit Trees
		  		<button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addFruit"><i class="fa fa-plus"></i></button>
		  	</h4>

		  	  <table class="table dTable">
		  		<thead>
		  			<tr>
		  				<th>Tree Name</th>
		  				<th>Fruit Bearing</th>
		  				<th>Non-Fruit Bearing</th>
		  			</tr>
		  		</thead>
		  		<tbody>
		  			@foreach($farmer->trees as $tree)
		  			<tr>
		  				<td>{{ $tree->treeType->description }}</td>
		  				<td>{{$tree->bearing}}</td>
		  				<td>{{$tree->non_bearing}}</td>
		  			</tr>
		  			@endforeach
		  		</tbody>
		  	</table>
		  </div>
		  
		</div>

	</div>
</div>




<!-- Modal--> 
<div class="modal fade" id="addAnimal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm">
  <div class="modal-content">
  <form action="{{url("farmers/".$farmer->id."/animal")}}" method="POST">
    <div class="modal-header">
    	<h4 class="modal-title" id="myModalLabel">Add Poulty/Livestock</h4>
      	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body">
      <div class="form-group">
      	<label>Poulty/Livestock</label>
      	<select class="form-control" name="animal_id">
      		@foreach($animals as $animal)
      		<option value="{{$animal->id}}">{{$animal->description}}</option>
      		@endforeach
      	</select>
      </div>
      <div class="form-group">
      	<label>Backyard (heads)</label>
      	<input type="number" class="form-control" name="animal_count">
      </div>
      <div class="form-group">
      	<label>Commercial (heads)</label>
      	<input type="number" class="form-control" name="commercial_count">
      </div>
    </div>
    <div class="modal-footer">
    	<input type="hidden" name="farmer_id" value="{{$farmer->id}}">
    	@csrf
    	@method('POST')
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div>
  </form>
</div>
</div>
</div>  
<!-- end modal -->

<!-- Modal--> 
<div class="modal fade" id="addFruit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm">
  <div class="modal-content">
  <form action="{{url("farmers/".$farmer->id."/tree")}}" method="POST">
    <div class="modal-header">
    	<h4 class="modal-title" id="myModalLabel">Add Fruit Tree</h4>
      	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      
    </div>
    <div class="modal-body">
    	<div class="form-group">
    		<label>Fruit Tree</label>
    		<select class="form-control" name="tree_id">
    			@foreach($trees as $tree)
    			<option value="{{$tree->id}}">{{$tree->description}}</option>
    			@endforeach
    		</select>
    	</div>
    	<div class="form-group">
    		<label>Bearing</label>
    		<input type="number" class="form-control" name="bearing">
    	</div>
    	<div class="form-group">
    		<label>Non-Bearing</label>
    		<input type="number" class="form-control" name="non_bearing">
    	</div>
    </div>
    <div class="modal-footer">
		<input type="hidden" name="farmer_id" value="{{$farmer->id}}">
		@csrf
		@method('POST')
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div>
  </form>
</div>
</div> 
</div> 
<!-- end modal -->


@endsection


