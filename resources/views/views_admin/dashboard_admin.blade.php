@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Dashboard</li>
@endsection

@section('content')
{{! $cekTgl = \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d') }}
{{! $cekJam = \Carbon\Carbon::now('Asia/Jakarta')->format('G:i') }}
<div style="margin-top: 20px">
	<!-- Quick stats boxes -->
	<div class="row">
		<a href="/tabel agenda">
			<div class="col-lg-3">
				<!-- Members online -->
				<div class="panel bg-teal-300">
					<div class="panel-body">
						<h3 class="no-margin">3,450</h3>
						Agenda
					</div>
				</div>
				<!-- /members online -->
			</div>
		</a>
		<a href="/tabel mahasiswa">
			<div class="col-lg-3">
				<!-- Current server load -->
				<div class="panel bg-pink-400">
					<div class="panel-body">
						<h3 class="no-margin">3,450</h3>
						Pemilih
					</div>
				</div>
				<!-- /current server load -->
			</div>
		</a>

		<a href="/pengajuan agenda">
			<div class="col-lg-3">
				<!-- Today's revenue -->
				<div class="panel bg-blue-400">
					<div class="panel-body">
						<h3 class="no-margin">3,450</h3>
						Pengajuan
					</div>
				</div>
				<!-- /today's revenue -->
			</div>
		</a>

		<a href="/data quick count">
			<div class="col-lg-3">
				<!-- Today's revenue -->
				<div class="panel bg-green-400">
					<div class="panel-body">
						<h3 class="no-margin">3,450</h3>
						Hitung Cepat
					</div>
				</div>
				<!-- /today's revenue -->
			</div>
		</a>
	</div>
	<!-- /quick stats boxes -->

	<!-- Streamgraph chart -->
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
			<p class="content-group">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum..</p>

			<div class="chart-container">
				<div class="chart" id="d3-streamgraph"></div>
			</div>
		</div>
	</div>
	<!-- /streamgraph chart -->

	<!-- sales stats -->
	<div class="col-lg-12">
		<!-- Marketing campaigns -->
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
						<td colspan="6">Belum terlaksana</td>
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
									@if($cekTgl < $dt->tgl_agenda)
										<span class="label label-info">Menunggu Tanggal Agenda</span>
										@if($cekTgl == $dt->tgl_filtering)
											<p><span class="label label-danger">Tahap Penyaringan Kandidat</span></p>
										@elseif($cekTgl >= $dt->StartDaftarK && $cekTgl <= $dt->LastDaftarK)
											<p><span class="label label-default">Tahap Pendaftaran Kandidat</span></p>
										@endif
									@elseif($cekTgl > $dt->tgl_agenda)
										<span class="label label-success">Selesai</span>
									@elseif($cekTgl == $dt->tgl_agenda)
										<span class="label label-danger">Agenda Hari Ini</span>
										@if($cekJam >= $dt->timeA1 && $cekJam <= $dt->timeA2)
											<span class="label label-danger">Sedang Berlangsung</span>		
										@elseif($cekJam > $dt->timeA2)
											<span class="label label-success">Pemilihan berakhir</span>
										@else
											<span class="label label-success">Menunggu waktu pemilihan</span>
										@endif
									@endif
								</td>
								<td class="text-center"> 	
									<a href="/detail agenda/{{\Crypt::encrypt($dt->id) }}"><i class="icon-eye"></i> Lihat</a>
								</td>
							</tr>
							@endif
						@endif
					@endforeach

					<!-- Sudah Terlaksana -->
					
					<tr class="active border-double">
						<td colspan="6">Sudah terlaksana</td>
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
									<a href="/detail agenda/{{\Crypt::encrypt($dt->id) }}"><i class="icon-eye"></i> Lihat</a>
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
@endsection