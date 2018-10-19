@extends('layout')
@section('content')

<div class="card" >
  <div class="card-header text-white bg-primary ">
    Registered Owners
    <button class="btn btn-sm btn-success float-right" data-toggle="modal" data-target="#searchModal"><i class="fa fa-search"></i> Search</button>
  </div>
    <table class="table table-hover table-sm">
      <thead>
        <tr>
          <th>Name</th>
          <th>Owner Type</th>
          <th>Address</th>
          <th>Registered Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($owners as $owner)
        <tr>
          <td>{{ $owner->coop }}</td>
          <td>{{ $owner->get_owner_type() }}</td>
          <td>{{ $owner->house .', '. $owner->barangay->name }}</td>
          <td>{{ $owner->registeredDate() }}</td>
          <td>
            <a href="{{ url("farmers/$owner->id/profile") }}" class="btn btn-success btn-sm" title="Profile">View</a>
            
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  <div class="card-body">
  	
    {{ $owners->links() }}
  </div>
</div>


<!-- Modal--> 
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm">
  <div class="modal-content">
  <form action="{{url("farmers")}}" method="GET">
    <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">Search</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      
    </div>
    <div class="modal-body">
      <input type="text" name="search" class="form-control">
    </div>
    <div class="modal-footer">
      
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Search</button>
    </div>
  </div>
  </form>
</div>
</div>  
<!-- end modal -->



@endsection