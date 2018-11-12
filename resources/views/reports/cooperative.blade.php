@extends('reports')
@section('content')

<div class="card" >
  <div class="card-header text-white bg-primary ">
     MASTERLIST OF REGISTERED COOPERATIVES AND ASSOCIATIONS
  </div>
  
  <div class="card-body">
  		
    <table class="table table-sm raisersTable" >
      <thead>
        <tr>
          <th>Cooperative/Assocation</th>
          <th>Chairman/President</th>
          <th>Address</th>
          <th>Contact No.</th>
          <th>No. of Members</th>
        </tr>
      </thead>
      <tbody>
        @foreach($cooperatives as $c)
        <tr>
        	<td>{{$c['coop']}}</td>
        	<td>{{$c['chairman']}}</td>
        	<td>{{$c['address']}}</td>
        	<td>{{$c['contact']}}</td>
        	<td>{{$c['members_total']}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection