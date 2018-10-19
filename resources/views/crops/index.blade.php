@extends('layout')
@section('content')

<div class="card " >
  <div class="card-header text-white bg-primary ">
  	Farm Crops
  	<button data-toggle="modal" data-target="#cropModal" class="btm btn-success float-right">New Crop</button>
  </div>
  
  <table class="table dTable">
  	<thead>
  		<tr>
  			<th>#</th>
  			<th>Crop</th>
  			<th>Action</th>
  		</tr>
  	</thead>
  	<tbody>
  		@foreach($crops as $crop)
  		<tr>
  			<td>{{ $crop->id }}</td>
  			<td>{{ $crop->description }}</td>
  			<td></td>
  		</tr>
  		@endforeach
  	</tbody>
  </table>
  <div class="card-body">
  	{{$crops->links()}}
  </div>
</div>





<!-- Modal--> 
<div class="modal fade" id="cropModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm">
  <div class="modal-content">
  <form action="{{ url("/crops") }}" method="POST">
    <div class="modal-header">
    	<h4 class="modal-title" id="myModalLabel">New Farm Crops</h4>
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body">
    	<input type="text" name="crop_name" class="form-control" placeholder="Crop Name">
      @csrf
      @method('POST')
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Save</button>
    </div>
  </div>
  </form>
</div>
</div>  
<!-- end modal -->







@endsection