<!DOCTYPE html>
<html>
<head>
	<title>Paniqui FarmRS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="{{asset("css/lumen_bootstrap.min.css")}}">

	<link rel="stylesheet" type="text/css" href="{{asset("fonts/fontawesome-free/css/all.min.css")}}">
	<link rel="stylesheet" type="text/css" href="{{asset("plugins/datatable/datatables.min.css")}}"/>
	<link rel="stylesheet" type="text/css" href="{{asset("css/custom.css")}}">
</head>
<body style="background-color: #dadbd6;">
	@include('topnav')
	<br>
	@if(Session::has('message'))
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				
			</div>
			<div class="col-md-6">
				<div class="alert alert-dismissible alert-success">
				  <button type="button" class="close" data-dismiss="alert">&times;</button>
				  {{ Session::get('message') }}
				</div>
			</div>
			<div class="col-md-3">
				
			</div>
		</div>
	</div>
	
	@endif
	<main class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				@include('sidenav')	
			</div>
			<div class="col-md-9" id="boxes">
				@yield('content')
				<br><br>
			</div>
		</div>
	</main>

<script type="text/javascript" src="{{asset("js/jquery.min.js")}}"></script>
<script type="text/javascript" src="{{asset("js/popper.min.js")}}"></script>
<script type="text/javascript" src="{{asset("js/lumen_bootstrap.min.js")}}"></script>
<script type="text/javascript" src="{{asset("js/functions.js")}}"></script>
<script type="text/javascript" src="{{asset("js/onload.js")}}"></script>
<script type="text/javascript" src="{{asset("fonts/fontawesome-free/js/all.min.js")}}"></script>
<script type="text/javascript" src="{{asset("plugins/datatable/datatables.min.js")}}"></script>

<script type="text/javascript" src="{{asset("plugins/datatable/Buttons-1.5.2/js/dataTables.buttons.min.js")}}"></script>
<script type="text/javascript" src="{{asset("plugins/datatable/Buttons-1.5.2/js/buttons.bootstrap.min.js")}}"></script>
<script type="text/javascript" src="{{asset("plugins/datatable/Buttons-1.5.2/js/buttons.print.min.js")}}"></script>
<script type="text/javascript" src="{{asset("plugins/datatable/Buttons-1.5.2/js/buttons.html5.min.js")}}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.iframehelper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>


<script type="text/javascript" src="{{asset("js/tables.js")}}"></script>

@stack('scripts')
<script type="text/javascript">
	
</script>
</body>
</html>