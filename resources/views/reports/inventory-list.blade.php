@extends('layout')
@section('content')


<div class="card">
	<div class="card-header bg-primary text-white">
		Machines/Equipment Inventory
	</div>
	
	<div class="card-body">
		<table class="table table-sm" id="inventoryTable">
			<thead>
				<tr>
					<th>Machine/Equipment</th>
					<th>Capacity</th>
					<th>Year Acquired</th>
					<th>Owner</th>
					<th>Supplier</th>
					<th>Date Registered</th>
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
    $('#inventoryTable').DataTable({
    	dom: 'lfBrtip',
        processing: true,
        serverSide: true,
        ajax: '{!! route('reports.inventory.getInventory') !!}',
        columns: [
            { data: 'machine', name: 'machine' },
            { data: 'capacity', name: 'capacity' },
            { data: 'acq_year', name: 'acq_year' },
            { data: 'owner', name: 'owner' },
            { data: 'supplier', name: 'supplier' },
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
	        exportOptions: {
	            modifier: { search: 'applied' },
	            //columns: [ 0, 1]
	            
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