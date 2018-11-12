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
          <th>Name</th>
          {{-- <th>Owner Type</th> --}}
          <th>Address</th>
          <th>Barangay</th>
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
            { data: 'name', name: 'name' },
            // { data: 'owner_type', name: 'owner_type' },
            { data: 'address', name: 'address' },
            { data: 'barangay', name: 'barangay' },
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