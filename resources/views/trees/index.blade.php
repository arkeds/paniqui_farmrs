@extends('layout')
@section('content')

<div class="card " >
  <div class="card-header text-white bg-primary ">
  	Farm Trees
  	<button data-toggle="modal" data-target="#treeModal" class="btm btn-success float-right">New Tree</button>
  </div>
  
  <table class="table table-sm">
  	<thead>
  		<tr>
  			
  			<th>Tree</th>
  			<th>Action</th>
  		</tr>
  	</thead>
  	<tbody>
  		@foreach($trees as $tree)
      <tr>
        
        <td>{{ $tree->description }}</td>
        <td><button type="button" class="btn btn-warning btn-sm edit" data-toggle="modal" data-target="#editTree" data-tree="{{$tree->id}}"><i class="fa fa-edit"></i></button></td>
      </tr>
      @endforeach
  	</tbody>
  </table>
  <div class="card-body">
  	{{$trees->links()}}
  </div>
</div>





<!-- Modal--> 
<div class="modal fade" id="treeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm">
  <div class="modal-content">
  <form action="{{ url("/trees") }}" method="POST">
    <div class="modal-header">

    	<h4 class="modal-title" id="myModalLabel">New Tree</h4>
    	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body">
    	<input type="text" name="tree_name" class="form-control" placeholder="Tree Type">
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
<div class="modal fade" id="editTree" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm">
  <div class="modal-content">
  <form action="/" method="POST" id="editForm">
    <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">Edit</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body">
        <input type="text" name="tree_name" class="form-control" placeholder="Tree Name" id="tree_name">
        <input type="hidden" name="tree_id" id="tree_id">
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
      let http = '{{url("/api/tree")}}';
      let patchUrl = '{{url("/trees")}}'
      let id = $(this).data('tree');
      let action = http +"/"+id;
      document.getElementById("editForm").action = patchUrl +"/"+ id;
      $.ajax({
        url: action,
        type: 'GET',
        dataType: 'JSON',
      })
      .done(function(data) {
        $('#tree_name').val(data.name);
        
      })
      .fail(function() {
        console.log("error");
      });
      
      
    });
});
</script>


@endpush