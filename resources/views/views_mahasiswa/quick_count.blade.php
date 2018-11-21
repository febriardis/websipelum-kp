@extends('layouts_views.layout_user')

@section('content')
  	{{! $cekTgl = \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d'), 
    	$cek  = (App\Agenda::where('tgl_agenda', $cekTgl))->value('tgl_agenda')
  	}}
	<!-- Content -->	
	<div class="content" style="min-height: 450px">
		<div class="content-quickcount">
      		{{! $tbA=(App\Agenda::where('tgl_agenda', $cekTgl))->first() }} 
    		@if(count($cek)!=0)
				<div class="list-content-info capitalize">
					<h5>hitung&nbsp;cepat&nbsp;-&nbsp;{{ $tbA->nm_agenda }} </h5>
					<p>Update : {{ \Carbon\Carbon::now('Asia/Jakarta')->format('l, d F Y | H:i')  }}</p>
					<div class="clear"></div>
					
					<div>
						
					</div>
				</div>
			@else
				<div class="list-content-info">
					<h5>Tidak ada agenda hari ini </h5>
					<p>Update : {{ \Carbon\Carbon::now('Asia/Jakarta')->format('l, d F Y | H:i')  }}</p>
					<div class="clear"></div>
				</div>
				<div class="content-notfound">
					<img src="assets/images/warning-ico.png" alt="waring">
					<h3 class="text-muted fontArial capitalize">tidak ada pemilihan !</h3>
				</div>
			@endif
		</div>
		<div class="clear"></div>
	</div>
	<!-- /Content -->
@endsection