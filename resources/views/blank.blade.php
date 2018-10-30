@extends('layout')
@section('content')


<div class="card">
	{{$pivot}}
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Barangay</th>
				@foreach($pivot->unique('machName') as $p)
					<th>{{$p->machName}}</th>
				@endforeach
				
			</tr>
		</thead>
		<tbody>
			@foreach($pivot->unique('brgy') as $b)
			<tr>
				<td>{{$b->brgy}}</td>
				@foreach($pivot->where('brgy', $b->brgy) as $p)
					<th>{{$p->machName}}</th>
				@endforeach
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
@endsection