<!DOCTYPE html>
<html>
	<head>
		<title>Sipelum</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.5.0/css/all.css' integrity='sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU' crossorigin='anonymous'>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="/css/styleme.css">
		<link rel="stylesheet" type="text/css" href="/bootstrap-4.1.3/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="/bootstrap-4.1.3/js/bootstrap.min.js"></script>		
  		<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>	
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
	  		<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">	    
	  			<span class="navbar-toggler-icon"></span>
		  	</button>

		  	<div class="collapse navbar-collapse fontArial" id="navb">
			  	@guest
			    <ul class="navbar-nav mr-auto nav-me">   	
			  		<li class="nav-item">
				  		<a class="nav-link" href="/" style="padding: 10px;">Beranda</a>
				  	</li>
				  	<span class="span">|</span>
				  	<li class="nav-item">
				    	<a class="nav-link" href="/hc" style="padding: 10px;">Hitung Cepat</a>
				  	</li>  	
				  	<span class="span">|</span>
					<li class="nav-item dropdown">
				    	<a class="nav-link dropdown-toggle" href="javascript:void(0)" onclick="openNav()" style="padding: 10px;">Organisasi </a>
				   	</li>	
				  	<div class="dropdown-menu dropdown-me" style="background-color: rgba(0,0,0,0.8); color: #fff; font-size: 15px" id="myNav">
			    		<a href="javascript:void(0)" class="closeNav" onclick="closeNav()">&times;</a>
			 			<div class="listdrop">
			 				<h5>Organisasi Mahasiswa</h5>	
			 				<a class="dropdown-item drop-me" href="/org">Sema Universitas</a>
			 				<a class="dropdown-item drop-me" href="/org">Dema Universitas</a>
			 				<div class="dropdown" style="width: 230px">
			 					<a class="dropdown-item drop-me" data-toggle="dropdown" href="javascript:void(0)">Sema Fakultas<i style="float: right;" class="fa fa-caret-down"></i></a>
							  	<div class="dropdown-menu" style="background-color:rgba(0,0,0,0.9);">
							      	{{! $tbFak = (App\Fakultas::all()) }}
							      	@foreach($tbFak as $d)
							      		<a class="dropdown-item" href="/org/Sema F/{{$d->nm_fakultas}}">{{$d->nm_fakultas}}</a>
							      	@endforeach
							  	</div>
							</div>
			 				<div class="dropdown" style="width: 230px">
			 					<a class="dropdown-item drop-me" data-toggle="dropdown" href="javascript:void(0)">Dema Fakultas<i style="float: right;" class="fa fa-caret-down"></i></a>
							  	<div class="dropdown-menu" style="background-color:rgba(0,0,0,0.9);">
							      	{{! $tbFak = (App\Fakultas::all()) }}
							      	@foreach($tbFak as $d)
							      		<a class="dropdown-item" href="/org/Dema F/{{$d->nm_fakultas}}">{{$d->nm_fakultas}}</a>
							      	@endforeach
							  	</div>
							</div>
					      	<hr style="border: 0.5px solid #cccccc">
			 				<h5>Fak. Tarbiyah dan Keguruan</h5>
					      	<a class="dropdown-item" href="#">HMJ Manajemen Pendidikan Islam</a>
					      	<a class="dropdown-item" href="#">HMJ Pendidikan Agama Islam</a>
					      	<a class="dropdown-item" href="#">HMJ Pendidikan Bahasa Arab</a>
					      	<a class="dropdown-item" href="#">HMJ Pendidikan Matematika</a>
					      	<a class="dropdown-item" href="#">HMJ Pendidikan Biologi</a>
					      	<a class="dropdown-item" href="#">HMJ Pendidikan Fisika</a>
					      	<a class="dropdown-item" href="#">HMJ Pendidikan Kimia</a>
					      	<a class="dropdown-item" href="#">HMJ Pendidikan Guru MI (PGMI)</a>
					      	<a class="dropdown-item" href="#">HMJ Pendidikan Islam Anak Usia Dini</a>
				    	</div>
				    	<div class="listdrop">	
				    		<h5>Fak. Syariah dan Hukum</h5>
					      	<a class="dropdown-item" href="/org">HMJ Hukum Keluarga (Ahwal Al-Syakhsiyah)</a>
					      	<a class="dropdown-item" href="#">HMJ Hukum Ekonomi Syariah (Muamalah)</a>
					      	<a class="dropdown-item" href="#">HMJ Hukum Tata Negara (Siyasah)</a>
					      	<a class="dropdown-item" href="#">HMJ Perbandingan Madzhab dan Hukum</a>
					      	<a class="dropdown-item" href="#">HMJ Ilmu Hukum</a>
					      	<a class="dropdown-item" href="#">HMJ Hukum Pidana Islam</a>
					      	<a class="dropdown-item" href="#">HMJ Manajemen Keuangan Syariah</a>
					      	<a class="dropdown-item" href="#">HMJ Akutansi Syariah</a>
					      	<a class="dropdown-item" href="#">HMJ Ekonomi Syariah</a>
					      	<hr style="border: 0.5px solid #cccccc">
					      	<h5>Fak. Ilmu Sosial dan Ilmu Politik</h5>
					      	<a class="dropdown-item" href="/org">HMJ Administrai Publik</a>
					      	<a class="dropdown-item" href="#">HMJ Manajemen</a>
					      	<a class="dropdown-item" href="#">HMJ Sosiologi</a>
					      	<a class="dropdown-item" href="#">HMJ Ilmu Politik</a>
				    	</div>
				    	<div class="listdrop">	
				    	 	<h5>Fak. Dakwah dan  Komunikasi</h5>
					      	<a class="dropdown-item" href="/org">HMJ Bimbingan Konseling Islam</a>
					      	<a class="dropdown-item" href="#">HMJ Komunikasi dan Penyiaran Islam</a>
					      	<a class="dropdown-item" href="#">HMJ Manajemen Dakwah</a>
					      	<a class="dropdown-item" href="#">HMJ Pengembangan Masyarakat Islam</a>
					      	<a class="dropdown-item" href="#">HMJ Ilmu Komunikasi Jurnalistik</a>
					      	<a class="dropdown-item" href="#">HMJ Ilmu Komunikasi Humas</a>
					      	<hr style="border: 0.3px solid #cccccc">
				    		<h5>Fak. Adab dan Humaniora</h5>
					      	<a class="dropdown-item" href="/org">HMJ Sejarah dan Peradaban Islam</a>
					      	<a class="dropdown-item" href="#">HMJ Bahasa dan Sastra Arab</a>
					      	<a class="dropdown-item" href="#">HMJ Sastra Inggris</a>
					      	<hr style="border: 0.3px solid #cccccc">
					      	<h5>Fak. Psikologi</h5>
					      	<a class="dropdown-item" href="/org">HMJ Psikologi</a>
					    </div>
				    	<div class="listdrop">
					     	<h5>Fak. Sains dan Teknologi</h5>
					      	<a class="dropdown-item" href="/org">HMJ Matematika</a>
					      	<a class="dropdown-item" href="#">HMJ Biologi</a>
					      	<a class="dropdown-item" href="#">HMJ Fisika</a>
					      	<a class="dropdown-item" href="#">HMJ Kimia</a>
					      	<a class="dropdown-item" href="#">HMJ Teknik Informatika</a>
					      	<a class="dropdown-item" href="#">HMJ Agroteknologi</a>
					      	<a class="dropdown-item" href="#">HMJ Teknik Elektro</a>
					      	<hr style="border: 0.2px solid #cccccc">
					      	<h5>Fak. Ushuludin</h5>
					      	<a class="dropdown-item" href="/org">HMJ Aqidah dan Filsafat Islam</a>
					      	<a class="dropdown-item" href="#">HMJ Studi Agama-Agama</a>
					      	<a class="dropdown-item" href="#">HMJ Ilmu Al-Quran dan Tafsir</a>
					      	<a class="dropdown-item" href="#">HMJ Tasawuf Psikoterapi</a>
				    	</div>
					</div>
				  	<span class="span">|</span>
				  	<li class="nav-item">
				    	<a class="nav-link" href="javascript:void(0)" style="padding: 10px;">Syarat & Ketentuan</a>
				  	</li>
				</ul>
			    <ul class="navbar-nav">
			    	<li class="nav-item">
						<a href="" class="nav-link link-me" data-toggle="modal" data-target="#myModal" style="padding: 10px;">Masuk</a>
			    	</li>	
			    </ul>
				@else
				<ul class="navbar-nav mr-auto nav-me">   	
		  			<li class="nav-item">
			  			<a class="nav-link" href="/" style="padding: 10px;">Beranda</a>
				  	</li>
				  	<span class="span">|</span>
				  	<li class="nav-item">
				  		<a class="nav-link" href="/pemilihan" style="padding: 10px;">Pemilihan</a>
				  	</li>
				  	<span class="span">|</span>
				  	<li class="nav-item">
				    	<a class="nav-link" href="/hitung cepat" style="padding: 10px;">Hitung Cepat<span class="sr-only">(current)</span></a>
				  	</li>
				   	<span class="span">|</span>
				  	<li class="nav-item dropdown">
				    	<a class="nav-link dropdown-toggle" href="javascript:void(0)" onclick="openNav()" style="padding: 10px;">Organisasi </a>
				   	</li>	
				  	<div class="dropdown-menu dropdown-me" style="background-color: rgba(0,0,0,0.8); color: #fff; font-size: 15px" id="myNav">
			    		<a href="javascript:void(0)" class="closeNav" onclick="closeNav()">&times;</a>
			 			<div class="listdrop">
			 				<h5>Organisasi Mahasiswa</h5>	
			 				<a class="dropdown-item drop-me" href="/organisasi">Sema Universitas</a>
			 				<a class="dropdown-item drop-me" href="/organisasi">Dema Universitas</a>
			 				<div class="dropdown" style="width: 230px">
			 					<a class="dropdown-item drop-me" data-toggle="dropdown" href="javascript:void(0)">Sema Fakultas<i style="float: right;" class="fa fa-caret-down"></i></a>
							  	<div class="dropdown-menu" style="background-color:rgba(0,0,0,0.9);">
							      	{{! $tbFak = (App\Fakultas::all()) }}
							      	@foreach($tbFak as $d)
							      		<a class="dropdown-item" href="/organisasi/Sema F/{{$d->nm_fakultas}}">{{$d->nm_fakultas}}</a>
							      	@endforeach
							  	</div>
							</div>
			 				<div class="dropdown" style="width: 230px">
			 					<a class="dropdown-item drop-me" data-toggle="dropdown" href="javascript:void(0)">Dema Fakultas<i style="float: right;" class="fa fa-caret-down"></i></a>
							  	<div class="dropdown-menu" style="background-color:rgba(0,0,0,0.9);">
							      	{{! $tbFak = (App\Fakultas::all()) }}
							      	@foreach($tbFak as $d)
							      		<a class="dropdown-item" href="/organisasi/Dema F/{{$d->nm_fakultas}}">{{$d->nm_fakultas}}</a>
							      	@endforeach
							  	</div>
							</div>
					      	<hr style="border: 0.5px solid #cccccc">
			 				<h5>Fak. Tarbiyah dan Keguruan</h5>
					      	<a class="dropdown-item" href="#">HMJ Manajemen Pendidikan Islam</a>
					      	<a class="dropdown-item" href="#">HMJ Pendidikan Agama Islam</a>
					      	<a class="dropdown-item" href="#">HMJ Pendidikan Bahasa Arab</a>
					      	<a class="dropdown-item" href="#">HMJ Pendidikan Matematika</a>
					      	<a class="dropdown-item" href="#">HMJ Pendidikan Biologi</a>
					      	<a class="dropdown-item" href="#">HMJ Pendidikan Fisika</a>
					      	<a class="dropdown-item" href="#">HMJ Pendidikan Kimia</a>
					      	<a class="dropdown-item" href="#">HMJ Pendidikan Guru MI (PGMI)</a>
					      	<a class="dropdown-item" href="#">HMJ Pendidikan Islam Anak Usia Dini</a>
				    	</div>
				    	<div class="listdrop">	
				    		<h5>Fak. Syariah dan Hukum</h5>
					      	<a class="dropdown-item" href="/organisasi">HMJ Hukum Keluarga (Ahwal Al-Syakhsiyah)</a>
					      	<a class="dropdown-item" href="#">HMJ Hukum Ekonomi Syariah (Muamalah)</a>
					      	<a class="dropdown-item" href="#">HMJ Hukum Tata Negara (Siyasah)</a>
					      	<a class="dropdown-item" href="#">HMJ Perbandingan Madzhab dan Hukum</a>
					      	<a class="dropdown-item" href="#">HMJ Ilmu Hukum</a>
					      	<a class="dropdown-item" href="#">HMJ Hukum Pidana Islam</a>
					      	<a class="dropdown-item" href="#">HMJ Manajemen Keuangan Syariah</a>
					      	<a class="dropdown-item" href="#">HMJ Akutansi Syariah</a>
					      	<a class="dropdown-item" href="#">HMJ Ekonomi Syariah</a>
					      	<hr style="border: 0.5px solid #cccccc">
					      	<h5>Fak. Ilmu Sosial dan Ilmu Politik</h5>
					      	<a class="dropdown-item" href="/organisasi">HMJ Administrai Publik</a>
					      	<a class="dropdown-item" href="#">HMJ Manajemen</a>
					      	<a class="dropdown-item" href="#">HMJ Sosiologi</a>
					      	<a class="dropdown-item" href="#">HMJ Ilmu Politik</a>
				    	</div>
				    	<div class="listdrop">	
				    	 	<h5>Fak. Dakwah dan  Komunikasi</h5>
					      	<a class="dropdown-item" href="/organisasi">HMJ Bimbingan Konseling Islam</a>
					      	<a class="dropdown-item" href="#">HMJ Komunikasi dan Penyiaran Islam</a>
					      	<a class="dropdown-item" href="#">HMJ Manajemen Dakwah</a>
					      	<a class="dropdown-item" href="#">HMJ Pengembangan Masyarakat Islam</a>
					      	<a class="dropdown-item" href="#">HMJ Ilmu Komunikasi Jurnalistik</a>
					      	<a class="dropdown-item" href="#">HMJ Ilmu Komunikasi Humas</a>
					      	<hr style="border: 0.3px solid #cccccc">
				    		<h5>Fak. Adab dan Humaniora</h5>
					      	<a class="dropdown-item" href="/organisasi">HMJ Sejarah dan Peradaban Islam</a>
					      	<a class="dropdown-item" href="#">HMJ Bahasa dan Sastra Arab</a>
					      	<a class="dropdown-item" href="#">HMJ Sastra Inggris</a>
					      	<hr style="border: 0.3px solid #cccccc">
					      	<h5>Fak. Psikologi</h5>
					      	<a class="dropdown-item" href="/organisasi">HMJ Psikologi</a>
					    </div>
				    	<div class="listdrop">
					     	<h5>Fak. Sains dan Teknologi</h5>
					      	<a class="dropdown-item" href="/organisasi">HMJ Matematika</a>
					      	<a class="dropdown-item" href="#">HMJ Biologi</a>
					      	<a class="dropdown-item" href="#">HMJ Fisika</a>
					      	<a class="dropdown-item" href="#">HMJ Kimia</a>
					      	<a class="dropdown-item" href="#">HMJ Teknik Informatika</a>
					      	<a class="dropdown-item" href="#">HMJ Agroteknologi</a>
					      	<a class="dropdown-item" href="#">HMJ Teknik Elektro</a>
					      	<hr style="border: 0.2px solid #cccccc">
					      	<h5>Fak. Ushuludin</h5>
					      	<a class="dropdown-item" href="/organisasi">HMJ Aqidah dan Filsafat Islam</a>
					      	<a class="dropdown-item" href="#">HMJ Studi Agama-Agama</a>
					      	<a class="dropdown-item" href="#">HMJ Ilmu Al-Quran dan Tafsir</a>
					      	<a class="dropdown-item" href="#">HMJ Tasawuf Psikoterapi</a>
				    	</div>
					</div>
				  	<span class="span">|</span>
				  	<li class="nav-item dropdown">
				    	<a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" style="padding: 10px;">Daftar </a>
				    	 <div class="dropdown-menu">
					      <a class="dropdown-item" href="/daftar calon">Calon Kandidat</a>
					    </div>
				  	</li>	
				  	<span class="span">|</span>
				  	<li class="nav-item">
				    	<a class="nav-link" href="javascript:void(0)" style="padding: 10px;">Syarat &amp; Ketentuan</a>
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
						    	<a class="btn btn-danger btn-sm" href="/keluar"><i class="fa fa-sign-out"></i>Keluar</a>
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
			<form class="form-search">
				<input type="text" class="in-search" autocomplete="off" id="myInput" placeholder="Cari...">	
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