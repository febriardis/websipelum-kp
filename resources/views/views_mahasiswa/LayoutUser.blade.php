<!DOCTYPE html>
<html>
	<head>
		<title>Sipelum</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="css/styleme.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	</head>
	<body>
	<!-- Main Navbar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding: 0px">
		<div class="container-fluid">
			<div class="navbar-brand">
				<img src="assets/images/icon.png" style="width: 75%; height: 35px; margin-top: -10px" alt="">
			</div>
	  		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">	    
	  			<span class="navbar-toggler-icon"></span>
		  	</button>

		  	<div class="collapse navbar-collapse" id="navb">
			    <ul class="navbar-nav mr-auto nav-me">
			      	@yield('nav-item')
			    </ul>
		  		@guest
			    <ul class="navbar-nav">
			    	<li class="nav-item">
						<a href="" class="nav-link link-me" data-toggle="modal" data-target="#myModal" style="padding: 10px;">Masuk</a>
			    	</li>	
			    </ul>
				@else
			    <ul class="navbar-nav">
			    	<li class="nav-item dropdown">
				    	<a class="nav-link dropdown-toggle link-me" href="" data-toggle="dropdown" style="padding: 10px;"><i class="fa fa-user"></i> {{ Auth::user()->nim }} </a>
				    	<div class="dropdown-menu dropdown-menu-right">
					    	<a class="dropdown-item" href="#">{{ Auth::user()->nama }}</a>
					    	<a class="dropdown-item" href="/keluar">Keluar</a>
					    </div>
			  		</li>
			    </ul>
			    @endguest
			</div>
		</div>
	</nav>
	<!-- /Main Navbar -->
	@if(Session::has('pesan'))
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session::get('pesan') }} !
		</div>
	@endif
	<!-- The Modal -->
	<div class="modal" id="myModal" >
	    <div class="modal-dialog">
	    	<div class="modal-content">
		        <!-- Modal Header -->
		        <div class="modal-header">
		        	<span class="glyphicon glyphicon-user"></span> 
		        	<h6 class="modal-title"><i class="fa fa-key"></i> Masuk dengan akun portal akademik</h6>
		        	<button type="button" class="close" data-dismiss="modal">&times;</button>
		        </div>
		        
		        <!-- Modal body -->
		        <div class="modal-body">
					<form action="/login" method="POST" >
						{{ csrf_field() }}
						<div class="input-group mb-3">
						    <div class="input-group-prepend">
						    	<span class="input-group-text"><i class="fa fa-user"></i> </span>
						    </div>
						    <input type="text" name="nim" class="form-control" placeholder="NIM">
						</div>
						
						<div class="input-group mb-3">
						    <div class="input-group-prepend">
						    	<span class="input-group-text"><i class="fa fa-lock"></i> </span>
						    </div>
						    <input type="password" name="password" class="form-control" placeholder="Kata Sandi">
						</div>
						<div style="float: right;">
							<input type="submit" class="btn btn-primary" value="Masuk">
						</div>
					</form>
		        </div>

	    	</div>
	    </div>
	</div>
	<!--End The Modal-->

	<!-- List Bar -->
	
	<div class="listbar">
		<div class="container">
			<h6 style="margin: 17px; float: left;">Sistem Pemilihan Umum UIN Sunan Gunung Djati Bandung</h6>
			<form class="form-search">
				<input type="text" class="in-search" id="myInput" placeholder="Search..">	
				<button type="submit" style="outline: none;" class="btn-search"><i class="fa fa-search"></i></button>
			</form>
			<div class="clear"></div>
		</div>
	</div>
	<!-- /List Bar -->

	<!-- bannner -->
	@yield('banner')
	<!-- /bannner -->

	<!---->
	<div class="container">
		@yield('content')
	</div>
	<!---->

	<!-- footer -->
	<footer style="padding: 15px; background: #e6e6e6">
		<div class="container">	
			&copy; 2018. <a href="" target="_blank">PTIPD UIN Sunan Gunung Djati Bandung</a>
		</div>
	</footer>
	<!-- /footer -->
	</body>
</html>