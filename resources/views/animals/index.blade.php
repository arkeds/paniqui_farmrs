@extends('layout')
@section('content')

<div class="card " >
  <div class="card-header text-white bg-primary ">
  	Farm Animals
  	<button data-toggle="modal" data-target="#animalModal" class="btm btn-success float-right">New Animal</button>
  </div>
  
  <table class="table table-sm">
  	<thead>
  		<tr>
  			<th>#</th>
  			<th>Animal</th>
  			<th>Action</th>
  		</tr>
  	</thead>
  	<tbody>
  		@foreach($animals as $animal)
  		<tr>
  			<td>{{ $animal->id }}</td>
  			<td>{{ $animal->description }}</td>
  			<td><button class="btn btn-warning btn-sm edit" type="button" data-toggle="modal" data-target="#editAnimal" data-animal="{{$animal->id}}"><i class="fa fa-edit"></i></button></td>
  		</tr>
  		@endforeach
  	</tbody>
  </table>
  <div class="card-body">
  	{{$animals->links()}}
  </div>
</div>





<!-- Modal--> 
<div class="modal fade" id="animalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm">
  <div class="modal-content">
  <form action="{{ url("/animals") }}" method="POST">
    <div class="modal-header">
    	<h4 class="modal-title" id="myModalLabel">New Farm Animal</h4>
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body">
    	<input type="text" name="animal_name" class="form-control" placeholder="Animal Name">
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
<div class="modal fade" id="editAnimal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm">
  <div class="modal-content">
  <form action="/" method="POST" id="editForm">
    <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">Edit</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body">
        <input type="text" name="animal_name" class="form-control" placeholder="Animal Name" id="animal_name">
        <input type="hidden" name="animal_id" id="animal_id">
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
      $('#animal_name').val('');
      let http = '{{url("/api/animal")}}';
      let patchUrl = '{{url("/animals")}}'
      let id = $(this).data('animal');
      let action = http +"/"+id;
      document.getElementById("editForm").action = patchUrl +"/"+ id;
      $.ajax({
        url: action,
        type: 'GET',
        dataType: 'JSON',
      })
      .done(function(data) {
        
        $('#animal_name').val(data.name);
        
      })
      .fail(function() {
        console.log("error");
      });
      
      
    });
});
</script>


@endpush