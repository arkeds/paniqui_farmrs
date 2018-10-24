@extends('layout')
@section('content')

<div class="card " >
  <div class="card-header text-white bg-primary ">
  	Farm Crops
  	<button data-toggle="modal" data-target="#cropModal" class="btm btn-success float-right">New Crop</button>
  </div>
  
  <table class="table table-sm">
  	<thead>
  		<tr>
  			<th>Crop</th>
  			<th>Action</th>
  		</tr>
  	</thead>
  	<tbody>
  		@foreach($crops as $crop)
  		<tr>
  			<td>{{ $crop->description }}</td>
  			<td><button type="button" class="btn btn-warning btn-sm edit" data-toggle="modal" data-target="#editCrop" data-crop="{{$crop->id}}"><i class="fa fa-edit"></i></button></td>
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


<!-- Modal--> 
<div class="modal fade" id="editCrop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm">
  <div class="modal-content">
  <form action="/" method="POST" id="editForm">
    <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">Edit</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body">
        <input type="text" name="crop_name" class="form-control" placeholder="Crop Name" id="crop_name">
        <input type="hidden" name="crop_id" id="crop_id">
        @csrf
        @method('PATCH')
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Update</button>
    </div>
  </div>
  </form>
</div>
</div>  
<!-- end modal -->




@endsection



@push('scripts')

<script type="text/javascript">
  $(document).ready(function() {
    $('.edit').on('click', function() {
      let http = '{{url("/api/crop")}}';
      let patchUrl = '{{url("/crops")}}'
      let id = $(this).data('crop');
      let action = http +"/"+id;
      document.getElementById("editForm").action = patchUrl +"/"+ id;
      $.ajax({
        url: action,
        type: 'GET',
        dataType: 'JSON',
      })
      .done(function(data) {
        $('#crop_name').val(data.name);
        
      })
      .fail(function() {
        console.log("error");
      });
      
      
    });
});
</script>


@endpush