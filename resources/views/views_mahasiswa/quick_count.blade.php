@extends('layouts_views.layout_user')

@section('content')
	<!-- Content -->
	<div class="content" style="margin-top: 10px;">
		<div class="content-quickcount">
			<div class="list-content-info">
				<h5>Hitung Cepat - </h5>
				<p>Update : {{ \Carbon\Carbon::now('Asia/Jakarta')->format('l, d F Y | H:i')  }}</p>
			<div class="clear"></div>
			</div>

			<!-- div if pemilihan == tidak ada -->
			<div class="content-notfound">
				<img src="assets/images/warning-ico.png" alt="waring">
				<h3 class="text-muted fontArial capitalize">tidak ada pemilihan !</h3>
			</div>
			<!-- end div -->
			
		</div>
		<div class="clear"></div>
	</div>
	<!-- /Content -->
@endsection