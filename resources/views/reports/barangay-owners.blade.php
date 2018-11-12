@extends('reports')
@section('content')


<div class="card" >
  <div class="card-header text-white bg-primary ">
     Owners per Barangay
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
        @foreach($barangay_owners_count as $x)
        <tr>
        	<td>{{$x->brgy}}</td>
        	<td align="right">{{$x->total}}</td>
        	<td align=""><a href="{{url('/reports/farmers/barangay/'.$x->code)}}" class="btn btn-success btn-sm">View</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection