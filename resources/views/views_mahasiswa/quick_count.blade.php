@extends('layouts_views.layout_user')

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
			<div class="quickcount-notfound" style="min-height: 450px; border: 1px solid  #d9d9d9; text-align: center;">
				<img src="assets/images/warning-ico.png" style="width: 10%; margin: 100px 0px 20px 0px;" alt="waring">
				<h3 class="text-muted fontArial">Tidak ada pemilihan !</h3>
			</div>
			<!-- end div -->
			
		</div>
		<div class="clear"></div>
	</div>
	<!-- /Content -->
@endsection