@extends('reports')
@section('content')


<div class="card" >
  <div class="card-header text-white bg-primary ">
     Machines per Barangay
  </div>
  
  <div class="card-body">
    <table class="table table-sm rTable" >
      <thead>
        <tr>
          <th>Barangay</th>
          <th>Total</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($barangay_machines as $x)
        <tr>
        	<td>{{$x->name}}</td>
        	<td align="right">{{$x->total}}</td>
        	<td align=""><a href="{{url('/reports/barangay/'.$x->code.'/machines')}}" class="btn btn-success btn-sm">View</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection