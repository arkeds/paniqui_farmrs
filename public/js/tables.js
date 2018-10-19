let base_url = "http://paniqui.local:8000/"


$('.dTable').DataTable({
	dom: 'frtip',
	searching: false,
	pageLength: 5
});

$('.rTable').DataTable({
	dom: 'lfBrtip',
	searching: true,
	buttons: [
		{
	        extend: 'print',
	        text: '<i class="fa fa-print"></i> Print',
	        className: 'btn-success',
	        exportOptions: {
	            modifier: { search: 'applied' },
	            columns: [ 0, 1]
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
	        title: 'Machine/Equipment Inventory',
	        exportOptions: {
	            modifier: { search: 'applied' },
	            columns: [ 0, 1]
	        },
	        init: function(api, node, config) {
	           $(node).removeClass('btn-default')
	        }
	    },
	    {
	        extend: 'pdf',
	        text: '<i class="fa fa-file-pdf"></i> PDF',
	        className: 'btn-success',
	        title: 'Paniqui Farmers Registration System',
	        exportOptions: {
	            modifier: { search: 'applied' },
	            columns: [ 0, 1]
	            
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




$('.inventoryTable').DataTable({
	dom: 'fBrtip',
	theme: 'bootstrap',
	searching: true,
	buttons: [
		{
	        extend: 'print',
	        text: '<i class="fa fa-print"></i> Print',
	        className: 'btn-success',
	        exportOptions: {
	            modifier: { search: 'applied' },
	            columns: [ 0, 1]
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
	        title: 'Machine/Equipment Inventory',
	        exportOptions: {
	            modifier: { search: 'applied' },
	            columns: [ 0, 1]
	        },
	        init: function(api, node, config) {
	           $(node).removeClass('btn-default')
	        }
	    },
	    {
	        extend: 'pdf',
	        text: '<i class="fa fa-file-pdf"></i> PDF',
	        className: 'btn-success',
	        exportOptions: {
	            modifier: { search: 'applied' },
	            columns: [ 0, 1]
	            
	        },
	        download: 'open',
	        init: function(api, node, config) {
	           $(node).removeClass('btn-default')
	        },
	        customize: function(doc){
	        	doc.content[1].table.widths = 
	        	        Array(doc.content[1].table.body[0].length + 1).join('*').split('');
	        }

	    }

	]

});

$('.barangay_reports').DataTable({
	dom: 'fBrtip',
	theme: 'bootstrap',
	searching: true,
	buttons: [
		{
	        extend: 'print',
	        text: '<i class="fa fa-print"></i> Print',
	        className: 'btn-success',
	        exportOptions: {
	            modifier: { search: 'applied' },
	            
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
	        title: 'Machine/Equipment Inventory',
	        exportOptions: {
	            modifier: { search: 'applied' },
	            
	        },
	        init: function(api, node, config) {
	           $(node).removeClass('btn-default')
	        }
	    },
	    {
	        extend: 'pdf',
	        text: '<i class="fa fa-file-pdf"></i> PDF',
	        className: 'btn-success',
	        title: 'Machine/Equipment Inventory',
	        orientation: 'landscape',
	        pageSize: 'LEGAL',
	        exportOptions: {
	            modifier: { search: 'applied' },
	            
	            
	        },
	        download: 'open',
	        init: function(api, node, config) {
	           $(node).removeClass('btn-default')
	        },
	        customize: function(doc){
	        	doc.content[1].table.widths = 
	        	        Array(doc.content[1].table.body[0].length + 1).join('*').split('');
	        }

	    }

	]

});


$('#inventory_table').DataTable({
	dom: 'frtip',
	theme: 'bootstrap',
	searching: true
});