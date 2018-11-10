@extends('views_mahasiswa.LayoutUser')

@section('banner')
	<!-- Slideshow -->
	<div id="demo" class="carousel slide" data-ride="carousel">
	  	<ul class="carousel-indicators">
		    <li data-target="#demo" data-slide-to="0" class="active"></li>
		    <li data-target="#demo" data-slide-to="1"></li>
		    <li data-target="#demo" data-slide-to="2"></li>
	  	</ul>
	  	<div class="carousel-inner">
		    <div class="carousel-item active">
		      	<img src="assets/images/gerbang.JPG" alt="Los Angeles" width="1100" height="500">
		      	<div class="carousel-caption" style="border: 1px solid #ffffff; margin: 5%; background-color: rgba(0,0,0,0.3)">
		      		<h3>UIN Sunan Gunung Djati Bandung</h3>
			       	<p>We had such a great time in LA!</p>
		      	</div>   
		    </div>
		    <div class="carousel-item">
		      	<img src="assets/images/gerbang.JPG" alt="Los Angeles" width="1100" height="500">
		      	<div class="carousel-caption" style="border: 1px solid #ffffff; margin: 5%; background-color: rgba(0,0,0,0.3)">
		      		<h3>UIN Sunan Gunung Djati Bandung</h3>
			       	<p>We had such a great time in LA!</p>
		      	</div>   
		    </div>
		    <div class="carousel-item">
		      	<img src="assets/images/gerbang.JPG" alt="Los Angeles" width="1100" height="500">
		      	<div class="carousel-caption" style="border: 1px solid #ffffff; margin: 5%; background-color: rgba(0,0,0,0.3)">
		      		<h3>UIN Sunan Gunung Djati Bandung</h3>
			       	<p>We had such a great time in LA!</p>
		      	</div>   
		    </div>
	  	</div>
	  	<a class="carousel-control-prev" href="#demo" data-slide="prev">
	    	<span class="carousel-control-prev-icon"></span>
	  	</a>
	  	<a class="carousel-control-next" href="#demo" data-slide="next">
	    	<span class="carousel-control-next-icon"></span>
	  	</a>
	</div>
	<!-- /Slideshow -->
@endsection

@section('content')
	<!-- Content -->
	<div class="content" style="margin-top: 50px;">
		<div class="content-info">
			<div class="list-content-info" style="padding: 2px; margin-bottom: 20px; background: #73e600; color: #ffffff">
				<h5 style="margin: 8px">Berita Terbaru</h5>
			</div>
			<div class="content-info-item" style="margin: 20px 0px">
				<h4><a href="" class="link-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h4>
				<p class="text-muted">posted {{date('M d, Y')}}</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat.</p>
			</div>
			<hr style="border: 1px solid #e6e6e6">
			<div class="content-info-item">
				<h4><a href="" class="link-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h4>
				<p class="text-muted">posted {{date('M d, Y')}}</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</div>			
			<hr style="border: 1px solid #e6e6e6">
			<div class="content-info-item" style="margin: 20px 0px">
				<h4><a href="" class="link-content">Lorem ipsum dolor sit amet, consectetur adipisicing elit</a></h4>
				<p class="text-muted">posted {{date('M d, Y')}}</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat.</p>
			</div>
		</div>

		<div class="content-sidebar">
			<div class="content-agenda">
				<div class="list-content-info" style="padding: 2px; background: #73e600; color: #ffffff">
					<h5 style="margin: 8px">Agenda</h5>
				</div>
				<ul style="margin: 20px 0px">
					<li><a href="">Pemilihan Ketua Himatif</a>&nbsp<span class="text-muted">October 17, 2018</span></li>
					<li><a href="" class="">Pemilihan Ketua Dema Fakultas Saintek</a>&nbsp<span class="text-muted">October 17, 2018
					<li><a href="">Pemilihan Ketua Himatif</a>&nbsp<span class="text-muted">October 17, 2018</span></li>
					<li><a href="" class="">Pemilihan Ketua Dema Fakultas Saintek</a>&nbsp<span class="text-muted">October 17, 2018
					<li><a href="">Pemilihan Ketua Himatif</a>&nbsp<span class="text-muted">October 17, 2018</span></li>
					<li><a href="" class="">Pemilihan Ketua Dema Fakultas Saintek</a>&nbsp<span class="text-muted">October 17, 2018</span></li>
				</ul>
			</div>
			<div class="content-count">
				<div class="list-content-info" style="padding: 2px; background: #73e600; color: #ffffff">
					<h5 style="margin: 8px">Suara Masuk</h5>
				</div>
				<ul style="margin: 20px 0px">
					<li><a href="">Pemilihan Ketua Himatif</a>&nbsp<span class="text-muted">October 17, 2018</span></li>
					<li><a href="" class="">Pemilihan Ketua Dema Fakultas Saintek</a>&nbsp<span class="text-muted">October 17, 2018
					<li><a href="">Pemilihan Ketua Himatif</a>&nbsp<span class="text-muted">October 17, 2018</span></li>
				</ul>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<!-- /Content -->
@endsection