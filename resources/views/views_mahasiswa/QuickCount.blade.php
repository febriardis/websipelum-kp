@extends('views_mahasiswa.LayoutUser')

@section('nav-item')
	@guest
		<li class="nav-item">
	  		<a class="nav-link" href="/" style="padding: 10px;">Beranda</a>
	  	</li>
	  	<span class="span">|</span>
	  	<li class="nav-item">
	    	<a class="nav-link active" href="/hitung cepat" style="padding: 10px;">Hitung Cepat</a>
	  	</li>
	  	<span class="span">|</span>
	  	<li class="nav-item">
	    	<a class="nav-link" href="javascript:void(0)" style="padding: 10px;">Syarat & Ketentuan</a>
	  	</li>
	@else
		<li class="nav-item">
  			<a class="nav-link" href="/" style="padding: 10px;">Beranda</a>
	  	</li>
	  	<span class="span">|</span>
	  	<li class="nav-item">
	  		<a class="nav-link" href="/pemilihan" style="padding: 10px;">Pemilihan</a>
	  	</li>
	  	<span class="span">|</span>
	  	<li class="nav-item">
	    	<a class="nav-link active" href="/hitung cepat" style="padding: 10px;">Hitung Cepat</a>
	  	</li>
	  	<span class="span">|</span>
	  	<li class="nav-item dropdown">
	    	<a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" style="padding: 10px;">Daftar </a>
	    	 <div class="dropdown-menu">
		      <a class="dropdown-item" href="#">Calon Kandidat</a>
		    </div>
	  	</li>
	  	<span class="span">|</span>
	  	<li class="nav-item">
	    	<a class="nav-link" href="javascript:void(0)" style="padding: 10px;">Syarat & Ketentuan</a>
	  	</li>
	@endguest
@endsection

@section('content')
	<!-- Content -->
	<div class="content" style="margin-top: 10px;">
		<div class="content-quickcount">
			<div class="list-content-info">
				<h5 style="margin: 8px;float: left;">Hitung Cepat - </h5>
				<p style="margin: 8px;float: right;">Update : {{ \Carbon\Carbon::now('Asia/Jakarta')->format('l, d F Y | H:i')  }}</p>
			<div class="clear"></div>
			</div>

			<!-- div if pemilihan == tidak ada -->
			<div class="quickcount-notfound" style="height: 450px; border: 1px solid black; border: 1px solid  #d9d9d9; text-align: center;">
				<img src="assets/images/warning-ico.png" style="width: 10%; margin: 100px 0px 20px 0px;" alt="waring">
				<h3 class="text-muted">Pemilihan hari ini tidak ada !</h3>
			</div>
			<!-- end div -->

		</div>
		<div class="clear"></div>
	</div>
	<!-- /Content -->
@endsection