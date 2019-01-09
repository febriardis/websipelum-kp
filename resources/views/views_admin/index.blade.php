@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Dashboard</li>
@endsection

@section('content')
{{! $cekTgl = \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d') }}
{{! $cekJam = \Carbon\Carbon::now('Asia/Jakarta')->format('G:i:s') }}
<div class="content">
	<div style="margin-top: 20px">
	<!-- Quick stats boxes -->
	<div class="row">
		<a href="/tabel agenda">
			<div class="col-lg-3">
				<!-- Members online -->
				<div class="panel bg-teal-300">
					<div class="panel-body" style="float: left;">
						<h3 class="no-margin">
							@if(Auth::user()->ket=='Super Admin')
								{{ count(App\Agenda::all()) }}
							@else
								{{ count(App\Agenda::where('admin_id', Auth::user()->id)->get()) }}
							@endif
						</h3>
						Agenda
					</div>
					<div class="panel-body" style="float: right; width: 100px; height: 100px">
						<img src="/assets/images/dash1.png" width="100%" height="100%">
					</div>
					<div class="clear"></div>
				</div>
				<!-- /members online -->
			</div>
		</a>
		<a href="/tabel pemilih">
			<div class="col-lg-3">
				<!-- Current server load -->
				<div class="panel bg-pink-400">
					<div class="panel-body" style="float: left;">
						<h3 class="no-margin">{{count(App\Pemilih::all())}}</h3>
						Pemilih/Delegasi
					</div>
					<div class="panel-body" style="float: right; width: 110px; height: 100px">
						<img src="/assets/images/dash2.png" width="100%" height="100%">
					</div>
					<div class="clear"></div>
				</div>
				<!-- /current server load -->
			</div>
		</a>

		<a href="/pengajuan agenda">
			<div class="col-lg-3">
				<!-- Today's revenue -->
				<div class="panel bg-blue-400">
					<div class="panel-body" style="float: left;">
						<h3 class="no-margin">
							@if(Auth::user()->ket=='Super Admin')
								{{ count(App\AgendaAjuan::all()) }}
							@else
								{{ count(App\AgendaAjuan::where('admin_id', Auth::user()->id)->get()) }}
							@endif
						</h3>
						Pengajuan
					</div>
					<div class="panel-body" style="float: right; width: 110px; height: 100px">
						<img src="/assets/images/dash3.png" width="100%" height="100%">
					</div>
					<div class="clear"></div>
				</div>
				<!-- /today's revenue -->
			</div>
		</a>

		<a href="/data quick count">
			<div class="col-lg-3">
				<!-- Today's revenue -->
				<div class="panel bg-green-400">
					<div class="panel-body" style="float: left;">
						<div style="display: none;">
							{{! $no = 0 }}
							{{! $Agenda = App\Agenda::all()  }}
						</div>
						<h3 class="no-margin">
							@foreach($Agenda as $dt)
							@if($cekTgl >= $dt->tgl_agenda)
								{{! $cek1 = (App\Admin::find($dt->admin_id))->ket }}
								{{! $cek2 = (App\Admin::find($dt->admin_id))->ket2 }}	
								
								{{! $c1 =(App\Jurusan::where('nm_jurusan', Auth::user()->ket2)->value('fak_id')) }}
								{{! $c2 = (App\Fakultas::where('nm_fakultas', $dt->kat_fakultas)->value('id')) }}
								@if(Auth::user()->ket==$cek1 && Auth::user()->ket2==$cek2 || Auth::user()->ket=='HMJ' && Auth::user()->ket2==$dt->kat_fakultas || Auth::user()->ket=='HMJ' && $dt->kat_fakultas=='Semua Mahasiswa' || Auth::user()->ket=='HMJ' && $dt->kat_jurusan=='Semua Jurusan' && $c1==$c2 || Auth::user()->ket=='Super Admin')
								
									{{ $no++ }}
								
								@endif
							@endif
							@endforeach
						</h3>
						Quick Count
					</div>
					<div class="panel-body" style="float: right; width: 110px; height: 100px">
						<img src="/assets/images/dash4.png" width="100%" height="100%">
					</div>
					<div class="clear"></div>
				</div>
				<!-- /today's revenue -->
			</div>
		</a>
	</div>
	<!-- /quick stats boxes -->

	<!-- Live Vote -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h3>Live Vote</h3>
			<div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="reload"></a></li>
            	</ul>
        	</div>
			<div id="server-load"></div>
		</div>

		<div class="panel-body">
			@if(count($agenda)!=0)
			<!-- Nav tabs -->
			<ul class="nav nav-tabs" id="myTab" role="tablist">
			    {{!$n=1}}
			    @foreach($agenda as $dt)
			    <li class="nav-item">
			        <a class="nav-link" data-toggle="tab" href="#menu{{$dt->id}}">Pemilihan {{$n++}}</a>
			    </li>
			    @endforeach
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
			    @foreach($agenda as $a)
              	{{! $kandidat = (App\Kandidat::where([['agenda_id', $a->id],['keterangan', 'Diterima']])->get()) }}
			    <div id="menu{{$a->id}}" class="container tab-pane" style="width: 100%"><br>
			    @if(count($kandidat)!=0)
			        <div style="display: none;">
			            {{! $cekPem=\App\Pemilih::where('agenda_id', $a->id)->get() }}
			            {{! $jum_dpt= count($cekPem) }}
			            
			            {{! $tot1=0 }}
			        	{{! $tot2=0 }}
				        <!-- cek total suara -->
				        {{! $tot=0  }}
				        {{! $tbVote=\App\Voting::where('agenda_id', $a->id)->get() }}

				        @if(count($cekPem)!=0)				       
				        	@foreach($tbVote as $dt)
				        	{{! $point = \Crypt::decrypt($dt->jumlah) }}
				          	{{! $nil_p = $point/$jum_dpt*100 }}
				          	{{! $tot+=$nil_p }}
				       		@endforeach 
			            @endif
			            <!-- /cek total suara --> 
			        </div>
			      	<div class="list-content-info capitalize">
				        <h5>{{ $a->nm_agenda }} </h5>
						<p>Pukul : {{ date('G:i', strtotime($a->timeA1))}} - {{ date('G:i', strtotime($a->timeA2))}}</p>
				        <p>Update : {{ \Carbon\Carbon::now('Asia/Jakarta')->format('l, d F Y | H:i')  }}</p>
				        <div class="clear"></div>
			      	</div>

	    			@if($tot==100 && $cekJam > $a->timeA2 )
		    			<!-- border quick count text -->
						<div class="list-text-qcl">
							<hr><h3>Quick Count Results</h3><hr>
							<div class="clear"></div>
						</div>
						<!-- /border quick count text -->
			        @else
				        <!-- border quick count text -->
				        <div class="list-text-qcl">
				          	<hr><h3>Quick Count</h3><hr>
				          	<div class="clear"></div>
				        </div>
				        <!-- /border quick count text -->
			        @endif

			        <div style="display: none;">
			          	{{! $tbVoting=\App\Voting::orderBy('jumlah','DESC')->where('agenda_id', $a->id)->get() }}
			          	{{! $c = \App\Voting::where('agenda_id', $a->id)->max('jumlah') }}
			          	{{! $large = \Crypt::decrypt($c) }}
			        </div>

			        <div class="row">
			        	<div class="col-md-9">
			        		<div class="content-counting">
					         	@foreach($tbVoting as $dt)        
					            <div style="display: none;">
					              	{{! $tb = \App\Kandidat::find($dt->kandidat_id) }}
					              	{{! $point = \Crypt::decrypt($dt->jumlah) }}
					            </div>
					            
					   	      	<div class="row">
					   	      		<div style="float: left;">
						      			<img src="/uploads/foto-kandidat/{{$tb->foto}}" style="" width="60" height="60">
							      	</div>
							      	<div class="col-md-10">
							      		<h6>{{$tb->nama}}</h6>
							      		<div class="progress content-group-sm" >
							      			@if(count($cekPem)!=0)	
											<div style="display: none;">{{! $nil_p = $point/$jum_dpt*100 }}</div>
											<div class="progress-bar progress-bar-danger" style="width: {{ number_format($nil_p) }}%;">
												<span>{{ number_format($nil_p) }}% / {{$point}} Votes</span>
											</div>
											@endif
										</div>
									</div>
						      	</div>
					            
					            @if(count($cekPem)!=0)	
					            <div style="display: none;">
					              	{{! $tot1+=$nil_p }}
					              	{{! $tot2+=$point }}
					            </div>
					            @endif
					          	@endforeach
					          	<div class="clear"></div>
					        </div>
			        	</div>	

			        	<div class="col-lg-3">
							@if($cekJam >= $a->timeA1 && $cekJam <= $a->timeA2)
								<span class="label label-danger">Sedang Berlangsung</span>		
							@elseif($cekJam > $a->timeA2)
								<span class="label label-success">Pemilihan berakhir</span>
							@else
								<span class="label label-success">Menunggu waktu pemilihan</span>
							@endif
			   		        <div style="width: 90%">
								@if($tot==100 || $cekJam > $a->timeA2)
					        	<div style="color: #ffffff; background-color: #C62828; font-size: 1.5em; text-align: center; padding: 5px">
					        		Total Suara Akhir
					        	</div>
			        			@else
					        	<div style="color: #ffffff; background-color: #C62828; font-size: 1.5em; text-align: center; padding: 5px">
					        		Total Suara Masuk
					        	</div>
					        	@endif
					        	<div style="color: #ffffff; background-color: #F44336; font-size: 3.5em; text-align: center;">
					        		<span class="fontArial">{{number_format($tot1)}}<span style="font-size: 18px">%</span></span>
					        	</div>
					        </div>
					        <label>Jumlah Pemilih : {{$jum_dpt}}</label>
			        	</div>
			        </div>
			    @else
			      	<div class="list-content-info capitalize">
				        <h5>{{ $a->nm_agenda }} </h5>
						<p>Pukul : {{ date('G:i', strtotime($a->timeA1))}} - {{ date('G:i', strtotime($a->timeA2))}}</p>
				        <p>Update : {{ \Carbon\Carbon::now('Asia/Jakarta')->format('l, d F Y | H:i')  }}</p>
				        <div class="clear"></div>
			      	</div>
			  	  	<div class="content-notfound">
					    <h3 class="text-muted fontArial capitalize">tidak ada kandidat !</h3>
				  	</div>
			    @endif
			    </div>
			    @endforeach
			</div>
			<!-- Tab panes -->  
			@else
		  	<div class="list-content-info">
			    <h5>Tidak ada agenda hari ini </h5>
			    <p>Update : {{ \Carbon\Carbon::now('Asia/Jakarta')->format('l, d F Y | H:i')  }}</p>
			    <div class="clear"></div>
		  	</div>
		  	<div class="content-notfound">
			    <h3 class="text-muted fontArial capitalize">tidak ada pemilihan !</h3>
		  	</div>
			@endif
		</div>
	</div>
	<!-- /Live Vote -->
	
	<!-- List Agenda -->
	<div class="col-lg-12">
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h6 class="panel-title">Agenda Terkait</h6>
			</div>

			<div class="table-responsive">
				<table class="table text-nowrap">
					<thead>
						<tr>
							<th>No</th>
							<th width="38%">Agenda</th>
							<th>Kategori Pemilih</th>
							<th>Tanggal</th>
							<th>Keterangan</th>
							<th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
						</tr>
					</thead>
					<tbody>
					<tr class="active border-double">
						<td colspan="6">Belum Terlaksana</td>
					</tr>
					{{! $no = 1 }}
					@foreach($tbAgenda as $dt)
						<div style="display: none;">	
							{{! $cek1 = (App\Admin::find($dt->admin_id))->ket }}
							{{! $cek2 = (App\Admin::find($dt->admin_id))->ket2 }}				
							<!-- cek idfak jurusan dmna nm_jurusan==ket2admin-->
							{{! $c1 =(App\Jurusan::where('nm_jurusan', Auth::user()->ket2)->value('fak_id')) }}
							{{! $c2 = (App\Fakultas::where('nm_fakultas', $dt->kat_fakultas)->value('id')) }}
						</div>		
						@if(Auth::user()->ket==$cek1 && Auth::user()->ket2==$cek2 || Auth::user()->ket=='HMJ' && Auth::user()->ket2==$dt->kat_fakultas || Auth::user()->ket=='HMJ' && $dt->kat_fakultas=='Semua Mahasiswa' || Auth::user()->ket=='HMJ' && $dt->kat_jurusan=='Semua Jurusan' && $c1==$c2 || Auth::user()->ket=='Super Admin')
							
							@if($cekTgl < $dt->tgl_agenda)
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $dt->nm_agenda }}<p><b>{{ $dt->sistem_vote }}</b></p></td>
								<td>{{ $dt->kat_jurusan }} <p><b>({{$dt->kat_fakultas}})</b></p></td>
								<td>
									{{ date('d M Y', strtotime($dt->tgl_agenda)) }}<br>
									<p><b>Pukul:</b><br> {{ date('G:i', strtotime($dt->timeA1))}} - {{ date('G:i', strtotime($dt->timeA2))}}</p>
								</td>
								<td>
									<span class="label label-info">Menunggu Tanggal Agenda</span>
									@if($cekTgl == $dt->tgl_filtering)
										<p><span class="label label-danger">Tahap Penyaringan Kandidat</span></p>
									@elseif($cekTgl >= $dt->StartDaftarK && $cekTgl <= $dt->LastDaftarK)
										<p><span class="label label-default">Tahap Pendaftaran Kandidat</span></p>
									@endif
								</td>
								<td class="text-center"> 	
									<a href="/detail agenda/{{\Crypt::encrypt($dt->id) }}"><i class="icon-eye"></i> Lihat</a>
								</td>
							</tr>
							@endif
						@endif
					@endforeach

					<!-- sedang berlangsung -->
					<tr class="active border-double">
						<td colspan="6">Sedang Berlangsung</td>
					</tr>
					{{! $no = 1 }}
					@foreach($tbAgenda as $dt)
						<div style="display: none;">	
							{{! $cek1 = (App\Admin::find($dt->admin_id))->ket }}
							{{! $cek2 = (App\Admin::find($dt->admin_id))->ket2 }}				
							<!-- cek idfak jurusan dmna nm_jurusan==ket2admin-->
							{{! $c1 =(App\Jurusan::where('nm_jurusan', Auth::user()->ket2)->value('fak_id')) }}
							{{! $c2 = (App\Fakultas::where('nm_fakultas', $dt->kat_fakultas)->value('id')) }}
						</div>		
						@if(Auth::user()->ket==$cek1 && Auth::user()->ket2==$cek2 || Auth::user()->ket=='HMJ' && Auth::user()->ket2==$dt->kat_fakultas || Auth::user()->ket=='HMJ' && $dt->kat_fakultas=='Semua Mahasiswa' || Auth::user()->ket=='HMJ' && $dt->kat_jurusan=='Semua Jurusan' && $c1==$c2 || Auth::user()->ket=='Super Admin')
							@if($cekTgl == $dt->tgl_agenda)
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $dt->nm_agenda }}<p><b>{{ $dt->sistem_vote }}</b></p></td>
								<td>{{ $dt->kat_jurusan }} <p><b>({{$dt->kat_fakultas}})</b></p></td>
								<td>
									{{ date('d M Y', strtotime($dt->tgl_agenda)) }}<br>
									<p><b>Pukul:</b><br> {{ date('G:i', strtotime($dt->timeA1))}} - {{ date('G:i', strtotime($dt->timeA2))}}</p>
								</td>
								<td>
									<span class="label label-danger">Agenda Hari Ini</span>
									@if($cekJam >= $dt->timeA1 && $cekJam <= $dt->timeA2)
										<span class="label label-danger">Sedang Berlangsung</span>		
									@elseif($cekJam > $dt->timeA2)
										<span class="label label-success">Pemilihan berakhir</span>
									@else
										<span class="label label-success">Menunggu waktu pemilihan</span>
									@endif
								</td>
								<td class="text-center"> 	
									<a href="/detail quick count/{{\Crypt::encrypt($dt->id) }}"><i class="icon-eye"></i> Lihat</a>
								</td>
							</tr>
							@endif
						@endif
					@endforeach
					<!-- /sedang berlangsung -->

					<!-- Sudah Terlaksana -->
					<tr class="active border-double">
						<td colspan="6">Sudah Terlaksana</td>
					</tr>
					{{! $no = 1 }}
					@foreach($tbAgenda as $dt)
						<div style="display: none;">	
							{{! $cek1 = (App\Admin::find($dt->admin_id))->ket }}
							{{! $cek2 = (App\Admin::find($dt->admin_id))->ket2 }}				
							<!-- cek idfak jurusan dmna nm_jurusan==ket2admin-->
							{{! $c1 =(App\Jurusan::where('nm_jurusan', Auth::user()->ket2)->value('fak_id')) }}
							{{! $c2 = (App\Fakultas::where('nm_fakultas', $dt->kat_fakultas)->value('id')) }}
						</div>		
						@if(Auth::user()->ket==$cek1 && Auth::user()->ket2==$cek2 || Auth::user()->ket=='HMJ' && Auth::user()->ket2==$dt->kat_fakultas || Auth::user()->ket=='HMJ' && $dt->kat_fakultas=='Semua Mahasiswa' || Auth::user()->ket=='HMJ' && $dt->kat_jurusan=='Semua Jurusan' && $c1==$c2 || Auth::user()->ket=='Super Admin')
							@if($cekTgl > $dt->tgl_agenda)
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $dt->nm_agenda }}<p><b>{{ $dt->sistem_vote }}</b></p></td>
								<td>{{ $dt->kat_jurusan }} <p><b>({{$dt->kat_fakultas}})</b></p></td>
								<td>
									{{ date('d M Y', strtotime($dt->tgl_agenda)) }}<br>
									<p><b>Pukul:</b><br> {{ date('G:i', strtotime($dt->timeA1))}} - {{ date('G:i', strtotime($dt->timeA2))}}</p>
								</td>
								<td>
									<span class="label label-success">Selesai</span>
								</td>
								<td class="text-center"> 	
									<a href="/detail quick count/{{\Crypt::encrypt($dt->id) }}"><i class="icon-eye"></i> Lihat</a>
								</td>
							</tr>
							@endif
						@endif
					@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<!-- /marketing campaigns -->
	</div>
	<!-- /sales stats -->
</div>

<script>
    $('#myTab a:first').tab('show');  
</script>
@endsection