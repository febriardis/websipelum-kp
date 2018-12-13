<!DOCTYPE html>
<html>
	<head>
		<title>Sipelum</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">	
		<link rel="stylesheet" type="text/css" href="/css/styleme.css">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  		  		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
  
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  		<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>	
		
		<!-- datatables -->
		<!-- <script src="https://code.jquery.com/jquery-3.1.1.js"></script> -->
  		<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  		<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
		<!-- datatables -->

		<script type="text/javascript">
			function openNav() {document.getElementById("myNav").style.display = "block";}
			function closeNav() {document.getElementById("myNav").style.display = "none";}
		</script>
	</head>
	<body>
	<!-- Main Navbar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light" style="padding: 0px;">
		<div class="container-fluid">
			<div class="navbar-brand">
				<img src="/assets/images/icon.png" style="width: 75%; height: 35px; margin-top: -10px" alt="">
			</div>
	  		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">	 <span class="navbar-toggler-icon"></span>
		  	</button>

		  	<div class="collapse navbar-collapse fontArial" id="navb">
			  	@guest
			    <ul class="navbar-nav mr-auto nav-me">   	
			  		<li class="nav-item {{ (Request::is('/') ? 'active-me' : '') }}">
				  		<a class="nav-link" href="/" style="padding: 10px;">Beranda</a>
				  	</li>
				  	<span class="span">|</span>
				  	<li class="nav-item {{ (Request::is('hc') ? 'active-me' : '') }}">
				    	<a class="nav-link" href="/hc" style="padding: 10px;">Hitung Cepat</a>
				  	</li>  	
				  	<span class="span">|</span>
					<li class="nav-item dropdown {{ (Request::is('info dpt/*/*') ? 'active-me' : '') }}">
				    	<a class="nav-link dropdown-toggle" href="javascript:void(0)" onclick="openNav()" style="padding: 10px;">Informasi DPT </a>
				   	</li>	
				  	<div class="dropdown-menu dropdown-me" style="background-color: rgba(0,0,0,0.8); color: #fff; font-size: 15px" id="myNav">
			    		<a href="javascript:void(0)" class="closeNav" onclick="closeNav()">&times;</a>
			 			<div class="listdrop">
			 				<a class="dropdown-item drop-me" style="font-size: 18px" href="/info dpt/Sema & Dema U/Uin bandung">Sema & Dema Universitas</a>
			 				<div class="dropdown" style="font-size: 18px">
			 					<a class="dropdown-item drop-me" data-toggle="dropdown" href="javascript:void(0)">Sema & Dema Fakultas<i style="float: right;" class="fa fa-caret-down"></i></a>
							  	<div class="dropdown-menu" style="background-color:rgba(0,0,0,0.9);">
							      	{{! $tbFak = (App\Fakultas::all()) }}
							      	@foreach($tbFak as $d)
							      		<a class="dropdown-item" href="/info dpt/Sema & Dema F/{{$d->nm_fakultas}}">{{$d->nm_fakultas}}</a>
							      	@endforeach
							  	</div>
							</div>
					      	<hr style="border: 0.5px solid #cccccc">
			 				<h5>Fak. Tarbiyah dan Keguruan</h5>
			 				{{! $cekJur1 = \App\Jurusan::where('fak_id', 2)->get() }}
			 				@foreach($cekJur1 as $dt)
						      	<a class="dropdown-item" href="/info dpt/HMJ/{{$dt->nm_jurusan}}">HMJ {{$dt->nm_jurusan}}</a>
			 				@endforeach
				    	</div>
				    	<div class="listdrop">	
				    		<h5>Fak. Syariah dan Hukum</h5>
			 				{{! $cekJur2 = \App\Jurusan::where('fak_id', 3)->get() }}
			 				@foreach($cekJur2 as $dt)
						      	<a class="dropdown-item" href="/info dpt/HMJ/{{$dt->nm_jurusan}}">HMJ {{$dt->nm_jurusan}}</a>
			 				@endforeach
					      	<hr style="border: 0.5px solid #cccccc">
					      	<h5>Fak. Ilmu Sosial dan Ilmu Politik</h5>
			 				{{! $cekJur3 = \App\Jurusan::where('fak_id', 8)->get() }}
			 				@foreach($cekJur3 as $dt)
						      	<a class="dropdown-item" href="/info dpt/HMJ/{{$dt->nm_jurusan}}">HMJ {{$dt->nm_jurusan}}</a>
			 				@endforeach
				    	</div>
				    	<div class="listdrop">	
				    	 	<h5>Fak. Dakwah dan  Komunikasi</h5>
			 				{{! $cekJur4 = \App\Jurusan::where('fak_id', 4)->get() }}
			 				@foreach($cekJur4 as $dt)
						      	<a class="dropdown-item" href="/info dpt/HMJ/{{$dt->nm_jurusan}}">HMJ {{$dt->nm_jurusan}}</a>
			 				@endforeach
					      	<hr style="border: 0.3px solid #cccccc">
				    		<h5>Fak. Adab dan Humaniora</h5>
			 				{{! $cekJur5 = \App\Jurusan::where('fak_id', 5)->get() }}
			 				@foreach($cekJur5 as $dt)
						      	<a class="dropdown-item" href="/info dpt/HMJ/{{$dt->nm_jurusan}}">HMJ {{$dt->nm_jurusan}}</a>
			 				@endforeach
					      	<hr style="border: 0.3px solid #cccccc">
					      	<h5>Fak. Psikologi</h5>
			 				{{! $cekJur6 = \App\Jurusan::where('fak_id', 6)->get() }}
			 				@foreach($cekJur6 as $dt)
						      	<a class="dropdown-item" href="/info dpt/HMJ/{{$dt->nm_jurusan}}">HMJ {{$dt->nm_jurusan}}</a>
			 				@endforeach
					    </div>
				    	<div class="listdrop">
					     	<h5>Fak. Sains dan Teknologi</h5>
			 				{{! $cekJur7 = \App\Jurusan::where('fak_id', 7)->get() }}
			 				@foreach($cekJur7 as $dt)
						      	<a class="dropdown-item" href="/info dpt/HMJ/{{$dt->nm_jurusan}}">HMJ {{$dt->nm_jurusan}}</a>
			 				@endforeach
					      	<hr style="border: 0.2px solid #cccccc">
					      	<h5>Fak. Ushuludin</h5>
			 				{{! $cekJur8 = \App\Jurusan::where('fak_id', 1)->get() }}
			 				@foreach($cekJur8 as $dt)
						      	<a class="dropdown-item" href="/info dpt/HMJ/{{$dt->nm_jurusan}}">HMJ {{$dt->nm_jurusan}}</a>
			 				@endforeach
				    	</div>
				  	</div>
				</ul>
			    <ul class="navbar-nav">
			    	<li class="nav-item">
						<a href="" class="nav-link link-me" data-toggle="modal" data-target="#myModal" style="padding: 10px;">Masuk</a>
			    	</li>	
			    </ul>
				@else
				<ul class="navbar-nav mr-auto nav-me">   	
		  			<li class="nav-item {{ (Request::is('beranda') ? 'active-me' : '') }}">
			  			<a class="nav-link" href="/beranda" style="padding: 10px;">Beranda</a>
				  	</li>
				  	<span class="span">|</span>
				  	<li class="nav-item {{ (Request::is('pemilihan') ? 'active-me' : '') }}">
				  		<a class="nav-link" href="/pemilihan" style="padding: 10px;">Pemilihan</a>
				  	</li>
				  	<span class="span">|</span>
				  	<li class="nav-item {{ (Request::is('hitung cepat') ? 'active-me' : '') }}">
				    	<a class="nav-link" href="/hitung cepat" style="padding: 10px;">Hitung Cepat<span class="sr-only">(current)</span></a>
				  	</li>
				   	<span class="span">|</span>
				  	<li class="nav-item dropdown {{ (Request::is('show organisasi/*/*') ? 'active-me' : '') }}">
				    	<a class="nav-link dropdown-toggle" href="javascript:void(0)" onclick="openNav()" style="padding: 10px;">Informasi DPT </a>
				   	</li>	
				  	<div class="dropdown-menu dropdown-me" style="background-color: rgba(0,0,0,0.8); color: #fff; font-size: 15px" id="myNav">
			    		<a href="javascript:void(0)" class="closeNav" onclick="closeNav()">&times;</a>
			 			<div class="listdrop">
			 				<a class="dropdown-item drop-me" style="font-size: 18px" href="/informasi dpt/Sema & Dema U/Uin bandung">Sema & Dema Universitas</a>
			 				<div class="dropdown" style="font-size: 18px">
			 					<a class="dropdown-item drop-me" data-toggle="dropdown" href="javascript:void(0)">Sema & Dema Fakultas<i style="float: right;" class="fa fa-caret-down"></i></a>
							  	<div class="dropdown-menu" style="background-color:rgba(0,0,0,0.9);">
							      	{{! $tbFak = (App\Fakultas::all()) }}
							      	@foreach($tbFak as $d)
							      		<a class="dropdown-item" href="/informasi dpt/Sema & Dema F/{{$d->nm_fakultas}}">{{$d->nm_fakultas}}</a>
							      	@endforeach
							  	</div>
							</div>
					      	<hr style="border: 0.5px solid #cccccc">
			 				<h5>Fak. Tarbiyah dan Keguruan</h5>
			 				{{! $cekJur1 = \App\Jurusan::where('fak_id', 2)->get() }}
			 				@foreach($cekJur1 as $dt)
						      	<a class="dropdown-item" href="/informasi dpt/HMJ/{{$dt->nm_jurusan}}">HMJ {{$dt->nm_jurusan}}</a>
			 				@endforeach
				    	</div>
				    	<div class="listdrop">	
				    		<h5>Fak. Syariah dan Hukum</h5>
			 				{{! $cekJur2 = \App\Jurusan::where('fak_id', 3)->get() }}
			 				@foreach($cekJur2 as $dt)
						      	<a class="dropdown-item" href="/informasi dpt/HMJ/{{$dt->nm_jurusan}}">HMJ {{$dt->nm_jurusan}}</a>
			 				@endforeach
					      	<hr style="border: 0.5px solid #cccccc">
					      	<h5>Fak. Ilmu Sosial dan Ilmu Politik</h5>
			 				{{! $cekJur3 = \App\Jurusan::where('fak_id', 8)->get() }}
			 				@foreach($cekJur3 as $dt)
						      	<a class="dropdown-item" href="/informasi dpt/HMJ/{{$dt->nm_jurusan}}">HMJ {{$dt->nm_jurusan}}</a>
			 				@endforeach
				    	</div>
				    	<div class="listdrop">	
				    	 	<h5>Fak. Dakwah dan  Komunikasi</h5>
			 				{{! $cekJur4 = \App\Jurusan::where('fak_id', 4)->get() }}
			 				@foreach($cekJur4 as $dt)
						      	<a class="dropdown-item" href="/informasi dpt/HMJ/{{$dt->nm_jurusan}}">HMJ {{$dt->nm_jurusan}}</a>
			 				@endforeach
					      	<hr style="border: 0.3px solid #cccccc">
				    		<h5>Fak. Adab dan Humaniora</h5>
			 				{{! $cekJur5 = \App\Jurusan::where('fak_id', 5)->get() }}
			 				@foreach($cekJur5 as $dt)
						      	<a class="dropdown-item" href="/informasi dpt/HMJ/{{$dt->nm_jurusan}}">HMJ {{$dt->nm_jurusan}}</a>
			 				@endforeach
					      	<hr style="border: 0.3px solid #cccccc">
					      	<h5>Fak. Psikologi</h5>
			 				{{! $cekJur6 = \App\Jurusan::where('fak_id', 6)->get() }}
			 				@foreach($cekJur6 as $dt)
						      	<a class="dropdown-item" href="/informasi dpt/HMJ/{{$dt->nm_jurusan}}">HMJ {{$dt->nm_jurusan}}</a>
			 				@endforeach
					    </div>
				    	<div class="listdrop">
					     	<h5>Fak. Sains dan Teknologi</h5>
			 				{{! $cekJur7 = \App\Jurusan::where('fak_id', 7)->get() }}
			 				@foreach($cekJur7 as $dt)
						      	<a class="dropdown-item" href="/informasi dpt/HMJ/{{$dt->nm_jurusan}}">HMJ {{$dt->nm_jurusan}}</a>
			 				@endforeach
					      	<hr style="border: 0.2px solid #cccccc">
					      	<h5>Fak. Ushuludin</h5>
			 				{{! $cekJur8 = \App\Jurusan::where('fak_id', 1)->get() }}
			 				@foreach($cekJur8 as $dt)
						      	<a class="dropdown-item" href="/informasi dpt/HMJ/{{$dt->nm_jurusan}}">HMJ {{$dt->nm_jurusan}}</a>
			 				@endforeach
				    	</div>
					</div>
				  	<span class="span">|</span>
				  	<li class="nav-item dropdown {{ (Request::is('daftar calon') ? 'active-me' : '') }}">
				    	<a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" style="padding: 10px;">Daftar </a>
				    	<div class="dropdown-menu">
					     	<a class="dropdown-item" href="/daftar calon">Calon Kandidat</a>
					    </div>
				  	</li>	
				</ul>

			    <ul class="navbar-nav">
			    	<li class="nav-item dropdown">
				    	<a class="nav-link dropdown-toggle link-me" href="" data-toggle="dropdown" style="padding: 10px;"><i class="fa fa-user-circle-o"></i> {{ Auth::user()->nim }} </a>
				    	<div class="dropdown-menu dropdown-menu-right">
				    		<div class="text-center">
				    			<img src="/uploads/fotomhs/{{Auth::user()->foto}}" width="80" height="80" alt="image not found" style="border-radius: 100%;border:1px solid #cccccc;margin: 10px">
				    		</div>				    	
					    	<div style="width: 155px;margin: 0px 15px">
						    	<div>Nama&nbsp;:<br><b>{{ Auth::user()->nama }}</b></div>
						    	<div>Jurusan/Prodi&nbsp;:<br><b>{{ Auth::user()->jurusan }}</b></div>
				    		</div>
					    	<hr>
					    	<div class="text-center">
						    	<a class="btn btn-danger btn-sm" href="/keluar"><i class="fa fa-sign-out"></i>&nbsp;Keluar</a>
					    	</div>
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
	<div class="modal modal-login" id="myModal" >
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
	
	<div class="listbar fontArial">
		<div class="container">
			<h6 style="margin: 17px; float: left;">Sistem Pemilihan Umum UIN Sunan Gunung Djati Bandung</h6>
			@guest
			<form action="/s" class="form-search" method="GET">
				<input type="text" class="in-search" name="q" autocomplete="off" id="myInput" placeholder="Cari...">	
				<button type="submit" style="outline: none;" class="btn-search"><i class="fa fa-search"></i></button>
			</form>
			@else
			<form action="/search" class="form-search" method="GET">
				<input type="text" class="in-search" name="q" autocomplete="off" id="myInput" placeholder="Cari...">	
				<button type="submit" style="outline: none;" class="btn-search"><i class="fa fa-search"></i></button>
			</form>
			@endif
			
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