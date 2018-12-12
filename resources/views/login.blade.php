<!DOCTYPE html>
<html>
<head>
	<title>Login || Paniqui FarmRS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="{{asset("css/lumen_bootstrap.min.css")}}">
</head>
<body>
<style type="text/css">
	body{
		background-color: #dadbd6;
	}

</style>
<br>
<div class="container-fluid">
	<div class="row">
	<div class="col-md-3">
		
	</div>
	<div class="col-md-6">
		<div class="card">
			<div class="card-header bg-primary text-white">
				<center>
					<img class="card-img-top" style="width: 250px; height: 250px;" src="{{asset("images/seal.png")}}">
					<h3>Paniqui FarmRS</h3>
					<p>Paniqui Farmers Registration System</p>
				</center>
			</div>
			<div class="card-body">
				@if(Session::has('status'))
				<div class="alert alert-danger">
				  {{ Session::get('status') }}
				</div>
				@endif
				<form action="{{url("/login")}}" method="POST">
					<div class="form-group">
						<input placeholder="Username" required type="text" name="username" class="form-control" value="{{old('username')}}">
					</div>
					<div class="form-group">
						<input placeholder="Password" required type="password" name="password" class="form-control" >
					</div>
					<button type="submit" class="btn btn-block btn-primary">Login</button>
					@csrf
				</form>
				<br>
			{{-- <p style="position: relative; text-align: center; bottom: -20px; margin-bottom: 0px;  bottom: 0px;">Developed By: PHilMech</p> --}}
			</div>
		</div>
	</div>
	<div class="col-md-3">
		
	</div>
</div>
</div>


<script type="text/javascript" src="{{asset("js/jquery.min.js")}}"></script>
<script type="text/javascript" src="{{asset("js/popper.min.js")}}"></script>
<script type="text/javascript" src="{{asset("js/lumen_bootstrap.min.js")}}"></script>
</body>
</html>