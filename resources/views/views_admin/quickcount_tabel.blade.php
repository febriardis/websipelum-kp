@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Data Hitung Cepat</li>
@endsection

@section('content')
  	{{! $cekTgl = \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d') }}
	<!-- Basic datatable -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Data Hitung Cepat</h5><hr>
		</div>

		<table class="table datatable-basic">
			<thead>
				<tr>
					<th>No</th>
					<th>Agenda</th>
					<th>Tanggal Agenda</th>
					<th>Keterangan</th>
					<th>Total Suara</th>
					<th>Detail</th>
				</tr>
			</thead>
			<tbody>
			{{! $no = 1 }}
			@foreach($tbAgenda as $dt)
			@if($cekTgl >= $dt->tgl_agenda)
			<div style="display: none;">	
				{{! $cek1 = (App\Admin::find($dt->admin_id))->ket }}
				{{! $cek2 = (App\Admin::find($dt->admin_id))->ket2 }}				
				<!-- cek idfak jurusan dmna nm_jurusan==ket2admin-->
				{{! $c1 =(App\Jurusan::where('nm_jurusan', Auth::user()->ket2)->value('fak_id')) }}
				{{! $c2 = (App\Fakultas::where('nm_fakultas', $dt->kat_fakultas)->value('id')) }}
			</div>		
				@if(Auth::user()->ket==$cek1 && Auth::user()->ket2==$cek2 || Auth::user()->ket=='HMJ' && Auth::user()->ket2==$dt->kat_fakultas || Auth::user()->ket=='HMJ' && $dt->kat_fakultas=='Semua Mahasiswa' || Auth::user()->ket=='HMJ' && $dt->kat_jurusan=='Semua Jurusan' && $c1==$c2 || Auth::user()->ket=='Super Admin')
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $dt->nm_agenda }}</td>
					<td>{{ date('d M Y', strtotime($dt->tgl_agenda)) }}</td>
					<td>
						@if($cekTgl > $dt->tgl_agenda)
							<span class="label label-success">Selesai</span>
						@elseif($cekTgl == $dt->tgl_agenda)
							<span class="label label-danger">Sedang Berlangsung</span>
						@endif
					</td>
					<td>
						<!-- cek total suara -->
						<div style="display: none;">
						<!-- cek jumlah DPT -->
				  		{{ $jum_dpt = \App\Pemilih::where('agenda_id', $dt->id)->count() }}
				  		<!-- /cek jumlah DPT -->
						
						<!-- cek total suara -->	
						{{! $tot=0  }}
						{{! $tbVote=\App\Voting::where('agenda_id', $dt->id)->get() }}
						@foreach($tbVote as $t)
							{{! $point = \Crypt::decrypt($t->jumlah) }}
							{{! $nil_p = $point/$jum_dpt*100 }}
							{{! $tot+=$nil_p }}
						@endforeach	
						</div>
						<!-- /cek total suara -->	
						<div class="progress">
					    	<div class="progress-bar progress-bar-striped active" style="width:{{number_format($tot)}}%">{{number_format($tot)}}%</div>
					  	</div>
					</td>
					<td>
						<a href="/detail quick count/{{ \Crypt::encrypt($dt->id) }}"><i class="icon-eye"></i> Lihat</a>
					</td>
				</tr>
				@endif
			@endif
			@endforeach
			</tbody>
		</table>
	</div>
	<!-- /basic datatable -->

@endsection