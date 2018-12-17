@extends('reports')
@section('content')

<div class="card" >
  <div class="card-header text-white bg-primary ">
    <span class="rTitle">Registered Farmers</span>
    <a  href="{{url("/reports/farmers/barangay")}}" class="btn btn-success float-right">Barangay</a>
  </div>
  
  <div class="card-body">
  		
    <table class="table table-sm" id="farmers-table">
      <thead>
        <tr>
        	<th>Barangay</th>
        	<th>Sitio/Zone</th>
        	<th>ID</th>
			<th>Last Name</th>
			<th>First Name</th>
			<th>Middle Name</th>
			<th>Ext.</th>
			<th>Gender</th>
			<th>Birthdate</th>
			<th>Education</th>
			<th>Contact No.</th>
			

			<th>Registered Date</th>
          
        </tr>
      </thead>
      <tbody>
        
      </tbody>
    </table>
  </div>
</div>

@endsection

@push('scripts')
<script>
$(function() {
    $('#farmers-table').DataTable({
    	dom: 'lfBrtip',
        processing: true,
        serverSide: true,
        ajax: '{!! route('reports.farmer.getFarmers') !!}',
        columns: [
        	{ data: 'barangay', name: 'barangay' },
        	{ data: 'address', name: 'address' },
        	{ data: 'id', name: 'id' },
            { data: 'last_name', name: 'last_name' },
            { data: 'first_name', name: 'first_name' },
            { data: 'middle_name', name: 'middle_name' },
            { data: 'ext', name: 'ext' },
            { data: 'gender', name: 'gender' },
            { data: 'birthdate', name: 'birthdate' },
            { data: 'education', name: 'education' },
            { data: 'contact', name: 'contact' },
            
            
            { data: 'registered_at', name: 'registered_at' },
            
        ],
        buttons: [
		{
	        extend: 'print',
	        text: '<i class="fa fa-print"></i> Print',
	        className: 'btn-success',
	        exportOptions: {
	            modifier: { search: 'applied' },
	            //columns: [ 0, 1]
	        },
	        init: function(api, node, config) {
	           $(node).removeClass('btn-default')
	        }
	    },
	    {
	        extend: 'csv',
	        text: '<i class="fa fa-file-excel"></i> Excel',
	        className: 'btn-success',
	        messageTop: 'Inventory',
	        title: 'Registered Farmers',
	        exportOptions: {
	            modifier: { search: 'applied' },
	            //columns: [ 0, 1]
	        },
	        init: function(api, node, config) {
	           $(node).removeClass('btn-default')
	        }
	    },
	    {
	        extend: 'pdf',
	        text: '<i class="fa fa-file-pdf"></i> PDF',
	        title: 'Registered Farmers',
	        className: 'btn-success',
	        title: function(){return $('.rTitle').text()},
	        orientation: 'landscape',
	        pageSize: 'LEGAL',
	        exportOptions: {
	            modifier: { search: 'applied' },
	            //columns: [ 0, 1]
	            
	        },
	        customize: function(doc){
	        	doc.content[1].table.widths = 
	        	        Array(doc.content[1].table.body[0].length + 1).join('*').split('');
	        },
	        download: 'open',
	        init: function(api, node, config) {
	           $(node).removeClass('btn-default')
	        }

	    }

	]
    });
});
</script>
@endpush