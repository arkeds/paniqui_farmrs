@extends('layout')
@section('content')

<div class="card">
	<div class="card-header bg-primary text-white">
		Admin Users
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
					<a href="{{url("/users/admin/".$user->id)}}" class="btn btn-success btn-sm"><i class="fa fa-user-circle" title="View User"></i></a>
					
					<a href="{{url("/users/admin/".$user->id."/edit")}}" class="btn btn-warning btn-sm"><i class="fa fa-edit" title="Edit User"></i></a>

					@if(!$user->is_active)
					<a href="{{url("/users/admin/".$user->id."/status")}}" class="btn btn-success btn-sm" onclick="event.preventDefault();
                     document.getElementById('{{"status-form".$user->id}}').submit();">
						<i class="fa fa-user-check" title="Activate User"></i>
					</a>
					@else
					<a href="{{url("/users/admin/".$user->id."/status")}}" class="btn btn-danger btn-sm" onclick="event.preventDefault();
                     document.getElementById('{{"status-form".$user->id}}').submit();">
						<i class="fa fa-user-times" title="Disable User"></i>
					</a>
					@endif
					

					<form id="{{"status-form".$user->id}}" action="{{url("/users/admin/".$user->id."/status")}}" method="POST" style="display: none;">
					    @csrf
					    @method('PATCH')
					</form>
				</td>
			</tr>
			@endforeach
		</tbody>
		{{$users->links()}}
	</table>
</div>

@endsection