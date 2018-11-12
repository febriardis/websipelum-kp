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
  		<script type="text/javascript" src="ckeditor/ckeditor.js"></script>	
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
				<img src="assets/images/icon.png" style="width: 75%; height: 35px; margin-top: -10px" alt="">
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
				  	<div class="dropdown-menu dropdown-me" style="background-color: rgba(0,0,0,0.8); color: #fff;" id="myNav">
			    		<a href="javascript:void(0)" class="closeNav" onclick="closeNav()">&times;</a>
			 			<div class="listdrop">
			 				<h5>Organisasi Mahasiswa</h5>	
			 				<a class="dropdown-item drop-me" style="font-size: 18px;" href="/org">Sema Universitas</a>
			 				<a class="dropdown-item drop-me" style="font-size: 18px;" href="/org">Dema Universitas</a>
			 				<div class="dropdown" style="width: 230px">
			 					<a class="dropdown-item drop-me" style="font-size: 18px;" data-toggle="dropdown" href="javascript:void(0)">Sema Fakultas<i style="float: right;" class="fa fa-caret-down"></i></a>
							  	<div class="dropdown-menu" style="background-color:rgba(0,0,0,0.9);">
							      	<a class="dropdown-item" href="/org">Ushuludin</a>
							      	<a class="dropdown-item" href="#">Tarbiyah dan Hukum</a>
							      	<a class="dropdown-item" href="#">Syariah dan Hukum</a>
							      	<a class="dropdown-item" href="#">Dakwah dan Komunikasi</a>
							      	<a class="dropdown-item" href="#">Adab dan Humaniora</a>
							      	<a class="dropdown-item" href="#">Psikologi</a>
							      	<a class="dropdown-item" href="#">Saintek dan Teknologi</a>
							      	<a class="dropdown-item" href="#">Ilmu Sosial dan Ilmu Politik</a>
							  	</div>
							</div>
			 				<div class="dropdown" style="width: 230px">
			 					<a class="dropdown-item drop-me" style="font-size: 18px;" data-toggle="dropdown" href="javascript:void(0)">Dema Fakultas<i style="float: right;" class="fa fa-caret-down"></i></a>
							  	<div class="dropdown-menu" style="background-color:rgba(0,0,0,0.9);">
							      	<a class="dropdown-item" href="/org">Ushuludin</a>
							      	<a class="dropdown-item" href="#">Tarbiyah dan Hukum</a>
							      	<a class="dropdown-item" href="#">Syariah dan Hukum</a>
							      	<a class="dropdown-item" href="#">Dakwah dan Komunikasi</a>
							      	<a class="dropdown-item" href="#">Adab dan Humaniora</a>
							      	<a class="dropdown-item" href="#">Psikologi</a>
							      	<a class="dropdown-item" href="#">Saintek dan Teknologi</a>
							      	<a class="dropdown-item" href="#">Ilmu Sosial dan Ilmu Politik</a>
							  	</div>
							</div>
					      	<hr style="border: 0.1px solid #cccccc">
			 				<h5>HMJ Fak.Tarbiyah dan Keguruan</h5>
					      	<a class="dropdown-item" href="#">Manajemen Pendidikan Islam</a>
					      	<a class="dropdown-item" href="#">Pendidikan Agama Islam</a>
					      	<a class="dropdown-item" href="#">Pendidikan Bahasa Arab</a>
					      	<a class="dropdown-item" href="#">Pendidikan Matematika</a>
					      	<a class="dropdown-item" href="#">Pendidikan Biologi</a>
					      	<a class="dropdown-item" href="#">Pendidikan Fisika</a>
					      	<a class="dropdown-item" href="#">Pendidikan Kimia</a>
					      	<a class="dropdown-item" href="#">Pendidikan Guru MI (PGMI)</a>
					      	<a class="dropdown-item" href="#">Pendidikan Islam Anak Usia Dini</a>
				    	</div>
				    	<div class="listdrop">	
				    		<h5>HMJ Fak.Syariah dan Hukum</h5>
					      	<a class="dropdown-item" href="/org">Hukum Keluarga (Ahwal Al-Syakhsiyah)</a>
					      	<a class="dropdown-item" href="#">Hukum Ekonomi Syariah (Muamalah)</a>
					      	<a class="dropdown-item" href="#">Hukum Tata Negara (Siyasah)</a>
					      	<a class="dropdown-item" href="#">Perbandingan Madzhab dan Hukum</a>
					      	<a class="dropdown-item" href="#">Ilmu Hukum</a>
					      	<a class="dropdown-item" href="#">Hukum Pidana Islam</a>
					      	<a class="dropdown-item" href="#">Manajemen Keuangan Syariah</a>
					      	<a class="dropdown-item" href="#">Akutansi Syariah</a>
					      	<a class="dropdown-item" href="#">Ekonomi Syariah</a>
					      	<hr style="border: 0.5px solid #cccccc">
					      	<h5>HMJ Fak.Ilmu Sosial dan Ilmu Politik</h5>
					      	<a class="dropdown-item" href="/org">Administrai Publik</a>
					      	<a class="dropdown-item" href="#">Manajemen</a>
					      	<a class="dropdown-item" href="#">Sosiologi</a>
					      	<a class="dropdown-item" href="#">Ilmu Politik</a>
				    	</div>
				    	<div class="listdrop">	
				    	 	<h5>HMJ Fak.Dakwah dan  Komunikasi</h5>
					      	<a class="dropdown-item" href="/org">Bimbingan Konseling Islam</a>
					      	<a class="dropdown-item" href="#">Komunikasi dan Penyiaran Islam</a>
					      	<a class="dropdown-item" href="#">Manajemen Dakwah</a>
					      	<a class="dropdown-item" href="#">Pengembangan Masyarakat Islam</a>
					      	<a class="dropdown-item" href="#">Ilmu Komunikasi Jurnalistik</a>
					      	<a class="dropdown-item" href="#">Ilmu Komunikasi Humas</a>
					      	<hr style="border: 0.3px solid #cccccc">
				    		<h5>HMJ Fak.Adab dan Humaniora</h5>
					      	<a class="dropdown-item" href="/org">Sejarah dan Peradaban Islam</a>
					      	<a class="dropdown-item" href="#">Bahasa dan Sastra Arab</a>
					      	<a class="dropdown-item" href="#">Sastra Inggris</a>
					      	<hr style="border: 0.3px solid #cccccc">
					      	<h5>HMJ Fak.Psikologi</h5>
					      	<a class="dropdown-item" href="/org">Psikologi</a>
					    </div>
				    	<div class="listdrop">
					     	<h5>HMJ Fak.Sains dan Teknologi</h5>
					      	<a class="dropdown-item" href="/org">Matematika</a>
					      	<a class="dropdown-item" href="#">Biologi</a>
					      	<a class="dropdown-item" href="#">Fisika</a>
					      	<a class="dropdown-item" href="#">Kimia</a>
					      	<a class="dropdown-item" href="#">Teknik Informatika</a>
					      	<a class="dropdown-item" href="#">Agroteknologi</a>
					      	<a class="dropdown-item" href="#">Teknik Elektro</a>
					      	<hr style="border: 0.2px solid #cccccc">
					      	<h5>HMJ Fak.Ushuludin</h5>
					      	<a class="dropdown-item" href="/org">Aqidah dan Filsafat Islam</a>
					      	<a class="dropdown-item" href="#">Studi Agama-Agama</a>
					      	<a class="dropdown-item" href="#">Ilmu Al-Quran dan Tafsir</a>
					      	<a class="dropdown-item" href="#">Tasawuf Psikoterapi</a>
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
				  	<div class="dropdown-menu dropdown-me" style="background-color: rgba(0,0,0,0.8); color: #fff;" id="myNav">
			    		<a href="javascript:void(0)" class="closeNav" onclick="closeNav()">&times;</a>
			 			<div class="listdrop">
			 				<h5>Organisasi Mahasiswa</h5>	
			 				<a class="dropdown-item drop-me" style="font-size: 18px;" href="/organisasi">Sema Universitas</a>
			 				<a class="dropdown-item drop-me" style="font-size: 18px;" href="/organisasi">Dema Universitas</a>
			 				<div class="dropdown" style="width: 230px">
			 					<a class="dropdown-item drop-me" style="font-size: 18px;" data-toggle="dropdown" href="javascript:void(0)">Sema Fakultas<i style="float: right;margin-top: 2px" class="fa fa-caret-down"></i></a>
							  	<div class="dropdown-menu" style="background-color:rgba(0,0,0,0.9);">
							      	<a class="dropdown-item" href="/organisasi">Ushuludin</a>
							      	<a class="dropdown-item" href="#">Tarbiyah dan Hukum</a>
							      	<a class="dropdown-item" href="#">Syariah dan Hukum</a>
							      	<a class="dropdown-item" href="#">Dakwah dan Komunikasi</a>
							      	<a class="dropdown-item" href="#">Adab dan Humaniora</a>
							      	<a class="dropdown-item" href="#">Psikologi</a>
							      	<a class="dropdown-item" href="#">Saintek dan Teknologi</a>
							      	<a class="dropdown-item" href="#">Ilmu Sosial dan Ilmu Politik</a>
							  	</div>
							</div>
			 				<div class="dropdown" style="width: 230px">
			 					<a class="dropdown-item drop-me" style="font-size: 18px;" data-toggle="dropdown" href="javascript:void(0)">Dema Fakultas<i style="float: right;margin-top: 2px" class="fa fa-caret-down"></i></a>
							  	<div class="dropdown-menu" style="background-color:rgba(0,0,0,0.9);">
							      	<a class="dropdown-item" href="/organisasi">Ushuludin</a>
							      	<a class="dropdown-item" href="#">Tarbiyah dan Hukum</a>
							      	<a class="dropdown-item" href="#">Syariah dan Hukum</a>
							      	<a class="dropdown-item" href="#">Dakwah dan Komunikasi</a>
							      	<a class="dropdown-item" href="#">Adab dan Humaniora</a>
							      	<a class="dropdown-item" href="#">Psikologi</a>
							      	<a class="dropdown-item" href="#">Saintek dan Teknologi</a>
							      	<a class="dropdown-item" href="#">Ilmu Sosial dan Ilmu Politik</a>
							  	</div>
							</div>
					      	<hr style="border: 0.1px solid #cccccc">
			 				<h5>HMJ Fak.Tarbiyah dan Keguruan</h5>
					      	<a class="dropdown-item" href="#">Manajemen Pendidikan Islam</a>
					      	<a class="dropdown-item" href="#">Pendidikan Agama Islam</a>
					      	<a class="dropdown-item" href="#">Pendidikan Bahasa Arab</a>
					      	<a class="dropdown-item" href="#">Pendidikan Matematika</a>
					      	<a class="dropdown-item" href="#">Pendidikan Biologi</a>
					      	<a class="dropdown-item" href="#">Pendidikan Fisika</a>
					      	<a class="dropdown-item" href="#">Pendidikan Kimia</a>
					      	<a class="dropdown-item" href="#">Pendidikan Guru MI (PGMI)</a>
					      	<a class="dropdown-item" href="#">Pendidikan Islam Anak Usia Dini</a>
				    	</div>
				    	<div class="listdrop">	
				    		<h5>HMJ Fak.Syariah dan Hukum</h5>
					      	<a class="dropdown-item" href="/organisasi">Hukum Keluarga (Ahwal Al-Syakhsiyah)</a>
					      	<a class="dropdown-item" href="#">Hukum Ekonomi Syariah (Muamalah)</a>
					      	<a class="dropdown-item" href="#">Hukum Tata Negara (Siyasah)</a>
					      	<a class="dropdown-item" href="#">Perbandingan Madzhab dan Hukum</a>
					      	<a class="dropdown-item" href="#">Ilmu Hukum</a>
					      	<a class="dropdown-item" href="#">Hukum Pidana Islam</a>
					      	<a class="dropdown-item" href="#">Manajemen Keuangan Syariah</a>
					      	<a class="dropdown-item" href="#">Akutansi Syariah</a>
					      	<a class="dropdown-item" href="#">Ekonomi Syariah</a>
					      	<hr style="border: 0.5px solid #cccccc">
					      	<h5>HMJ Fak.Ilmu Sosial dan Ilmu Politik</h5>
					      	<a class="dropdown-item" href="/organisasi">Administrai Publik</a>
					      	<a class="dropdown-item" href="#">Manajemen</a>
					      	<a class="dropdown-item" href="#">Sosiologi</a>
					      	<a class="dropdown-item" href="#">Ilmu Politik</a>
				    	</div>
				    	<div class="listdrop">	
				    	 	<h5>HMJ Fak.Dakwah dan  Komunikasi</h5>
					      	<a class="dropdown-item" href="/organisasi">Bimbingan Konseling Islam</a>
					      	<a class="dropdown-item" href="#">Komunikasi dan Penyiaran Islam</a>
					      	<a class="dropdown-item" href="#">Manajemen Dakwah</a>
					      	<a class="dropdown-item" href="#">Pengembangan Masyarakat Islam</a>
					      	<a class="dropdown-item" href="#">Ilmu Komunikasi Jurnalistik</a>
					      	<a class="dropdown-item" href="#">Ilmu Komunikasi Humas</a>
					      	<hr style="border: 0.3px solid #cccccc">
				    		<h5>HMJ Fak.Adab dan Humaniora</h5>
					      	<a class="dropdown-item" href="/org">Sejarah dan Peradaban Islam</a>
					      	<a class="dropdown-item" href="#">Bahasa dan Sastra Arab</a>
					      	<a class="dropdown-item" href="#">Sastra Inggris</a>
					      	<hr style="border: 0.3px solid #cccccc">
					      	<h5>HMJ Fak.Psikologi</h5>
					      	<a class="dropdown-item" href="/organisasi">Psikologi</a>
					    </div>
				    	<div class="listdrop">
					     	<h5>HMJ Fak.Sains dan Teknologi</h5>
					      	<a class="dropdown-item" href="/organisasi">Matematika</a>
					      	<a class="dropdown-item" href="#">Biologi</a>
					      	<a class="dropdown-item" href="#">Fisika</a>
					      	<a class="dropdown-item" href="#">Kimia</a>
					      	<a class="dropdown-item" href="#">Teknik Informatika</a>
					      	<a class="dropdown-item" href="#">Agroteknologi</a>
					      	<a class="dropdown-item" href="#">Teknik Elektro</a>
					      	<hr style="border: 0.2px solid #cccccc">
					      	<h5>HMJ Fak.Ushuludin</h5>
					      	<a class="dropdown-item" href="/organisasi">Aqidah dan Filsafat Islam</a>
					      	<a class="dropdown-item" href="#">Studi Agama-Agama</a>
					      	<a class="dropdown-item" href="#">Ilmu Al-Quran dan Tafsir</a>
					      	<a class="dropdown-item" href="#">Tasawuf Psikoterapi</a>
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