@extends('layouts_views.layout_user')

@section('content')
  	<div style="display: none;">
  	{{! $cekTgl = \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d'), 
    	$cek  = (App\Agenda::where('tgl_agenda', $cekTgl))->value('tgl_agenda') }}	    	
    {{! $cekJam = \Carbon\Carbon::now('Asia/Jakarta')->format('G:i') }}	
	</div>

	<!-- Content -->	
	<div class="content" style="min-height: 450px; margin-bottom: 60px">
		<div class="content-quickcount">
    		@if(count($cek)!=0)
    		  	<div style="display: none;">
      				{{! $tbA=(App\Agenda::where('tgl_agenda', $cekTgl))->first() }} 

  					{{! $jum_dpt=\App\Pemilih::where('agenda_id', $tbA->id)->count() }}
      				{{! $tot1=0 }}
					{{! $tot2=0 }}	
					
					<!-- cek total suara -->
					{{! $tot=0  }}
					{{! $tbVote=\App\Voting::where('agenda_id', $tbA->id)->get() }}
					@foreach($tbVote as $dt)
						{{! $point = \Crypt::decrypt($dt->jumlah) }}
						{{! $nil_p = $point/$jum_dpt*100 }}
						{{! $tot+=$nil_p }}
					@endforeach	
					<!-- /cek total suara -->	
      			</div>
			
				<div class="list-content-info capitalize">
					<h5>hitung&nbsp;cepat&nbsp;-&nbsp;{{ $tbA->nm_agenda }} </h5>
					<p>Update : {{ \Carbon\Carbon::now('Asia/Jakarta')->format('l, d F Y | H:i')  }}</p>
					<div class="clear"></div>
				</div>

    			@if($tot==100 || $cekJam > $tbA->timeA2)
					<!-- border quick count text -->
					<div class="list-text-qcl">
						<hr><h3>Quick Count Results</h3><hr>
						<div class="clear"></div>
					</div>
					<!-- /border quick count text -->

					<div style="display: none;">
						{{! $tbVoting=\App\Voting::orderBy('jumlah','DESC')->where('agenda_id', $tbA->id)->get() }}
						
						{{! $c = \App\Voting::where('agenda_id', $tbA->id)->max('jumlah') }}
						{{! $large = \Crypt::decrypt($c) }}
					</div>
					<div class="content-counting">
						@foreach($tbVoting as $dt)				
						<div style="display: none;">
							{{! $tb = \App\Kandidat::find($dt->kandidat_id) }}
							{{! $point = \Crypt::decrypt($dt->jumlah) }}
						</div>
						@if($point == $large)
							<div class="panel-count">
								<div class="head-panel-count">
									<img src="/uploads/fotomhs/{{$tb->foto}}" style="" width="100%" height="100%">
									<div class="bg-text-count">
										<div style="display: none;">{{! $nil_p = $point/$jum_dpt*100 }}</div>
										<h1>{{ number_format($nil_p) }}<span style="font-size: 24px">%</span></h1>
										<div class="clear"></div>
										<h2 class="fontArial"> {{$point}} <span style="font-size: 20px">Votes</span></h2>
									</div>
								</div>
								<div class="foot-panel-count">
									<div class="foot-count">
										<h4 class="capitalize">{{$tb->nama}}</h4>
									</div>
								</div>
							</div>
						@else
							<div class="panel-count"> <!-- style="margin-top: 50px" -->
								<div class="head-panel-count">
									<img src="/uploads/fotomhs/{{$tb->foto}}" style="" width="100%" height="100%">
									<div class="bg-text-count">
										<div style="display: none;">{{! $nil_p = $point/$jum_dpt*100 }}</div>
										<h1>{{ number_format($nil_p) }}<span style="font-size: 24px">%</span></h1>
										<div class="clear"></div>
										<h2 class="fontArial"> {{$point}} <span style="font-size: 20px">Votes</span></h2>
									</div>
								</div>
								<div class="foot-panel-count">
									<div class="foot-count">
										<h4 class="capitalize">{{$tb->nama}}</h4>
									</div>
								</div>
							</div>
						@endif

						<div style="display: none;">
							{{! $tot1+=$nil_p }}
							{{! $tot2+=$point }}
						</div>
						
						@endforeach
						<div class="clear"></div>
					</div>

					<div class="progress" style="height: 50px">
						<div class="progress-bar progress-bar-striped progress-bar-animated" style="width:{{number_format($tot1)}}%"><h3>Total Suara Masuk : {{number_format($tot1)}}<span style="font-size: 22px">%</span> / {{$tot2}}</h3></div>
					</div>
				@else
					<meta http-equiv="refresh" content="30"/>
					<!-- border quick count text -->
					<div class="list-text-qc">
						<hr><h3>Quick Count</h3><hr>
						<div class="clear"></div>
					</div>
					<!-- /border quick count text -->

					<div style="display: none;">
						{{! $tbVoting=\App\Voting::where('agenda_id', $tbA->id)->get() }}
					</div>
					<div class="content-counting">
						@foreach($tbVoting as $dt)
						<div style="display: none;">
							{{! $tb = \App\Kandidat::find($dt->kandidat_id) }}
							{{! $point = \Crypt::decrypt($dt->jumlah) }}
						</div>
						<div class="panel-count">
							<div class="head-panel-count">
								<img src="/uploads/fotomhs/{{$tb->foto}}" style="" width="100%" height="100%">
								<div class="bg-text-count">				
									<div style="display: none;">{{! $nil_p = $point/$jum_dpt*100 }}</div>
									<h1>{{ number_format($nil_p) }}<span style="font-size: 24px">%</span></h1>
									<div class="clear"></div>
									<h2 class="fontArial"> {{$point}} <span style="font-size: 20px">Votes</span></h2>
								</div>
							</div>
							<div class="foot-panel-count">
								<div class="foot-count">
									<h4 class="capitalize">{{$tb->nama}}</h4>
								</div>
							</div>
						</div>
						<div style="display: none;">
							{{! $tot1+=$nil_p }}
							{{! $tot2+=$point }}
						</div>
						@endforeach
						<div class="clear"></div>
					</div>

					<div class="progress" style="height: 50px">
						<div class="progress-bar progress-bar-striped progress-bar-animated" style="width:{{number_format($tot1)}}%"><h3>Suara Masuk : {{number_format($tot1)}}<span style="font-size: 22px">%</span> / {{$tot2}}</h3></div>
					</div>
				@endif
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