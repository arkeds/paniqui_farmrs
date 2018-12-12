@extends('layout')
@section('content')

<div class="card">
	<div class="card-header bg-primary text-white">
		Users

		<button class="btn btn-sm btn-success float-right" type="button" data-toggle="modal" data-target="#searchModal">Search</button>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th>Username</th>
				<th>Full Name</th>
				<th>Date Registered</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach($users as $user)
			<tr>
				<td>{{$user->username}}</td>
				<td>{{$user->getName()}}</td>
				<td>{{Date_format($user->created_at, 'Y-M-d')}}</td>
				<td>
					@if($user->is_active)
					<span class="badge badge-pill badge-success">Active</span>
					@else
					<span class="badge badge-pill badge-danger">Disabled</span>
					@endif
				</td>
				<td>
					<a href="{{url("/users/".$user->id."/edit")}}" class="btn btn-warning btn-sm"><i class="fa fa-edit" title="Edit User"></i></a>

					@if(!$user->is_active)
					<a href="{{url("/users/".$user->id."/status")}}" class="btn btn-success btn-sm" onclick="event.preventDefault();
                     document.getElementById('{{"status-form".$user->id}}').submit();">
						<i class="fa fa-user-check" title="Activate User"></i>
					</a>
					@else
					<a href="{{url("/users/".$user->id."/status")}}" class="btn btn-danger btn-sm" onclick="event.preventDefault();
                     document.getElementById('{{"status-form".$user->id}}').submit();">
						<i class="fa fa-user-times" title="Disable User"></i>
					</a>
					@endif
					

					<form id="{{"status-form".$user->id}}" action="{{url("/users/".$user->id."/status")}}" method="POST" style="display: none;">
					    @csrf
					    @method('PATCH')
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
		
	</table>
	{{$users->links()}}
</div>

<!-- Modal--> 
<div class="modal fade" id="searchModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog modal-sm">
  <div class="modal-content">
  <form action="{{url()->current()}}" method="GET">
    <div class="modal-header">
      <h4 class="modal-title" id="myModalLabel">Search</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    </div>
    <div class="modal-body">
      <input type="text" class="form-control" name="search">
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-success">Search</button>
    </div>
  </div>
  </form>
</div>
</div>  
<!-- end modal -->



@endsection