@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Data Agenda</li>
@endsection

@section('content')
  	{{! $cekTgl = \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d') }}
	@if(Session::has('pesanA'))
	<div class="alert alert-info">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		{{ Session::get('pesanA') }} !
	</div>
	@endif
	<!-- Basic datatable -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Data Agenda</h5><hr>
		</div>

		<table class="table datatable-basic">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Agenda</th>
					<th>Sistem Pemilihan</th>
					<th>Kategori Pemilih</th>
					<th>Tanggal Agenda</th>
					<th>Katerangan</th>
					<th>Detail</th>
					<th class="text-center">Aksi</th>
				</tr>
			</thead>
			<tbody>
			{{! $no = 1 }}
			@foreach($data as $dt)
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
					<td>{{ $dt->sistem_vote }}</td>
					<td>{{ $dt->kat_jurusan }} <b>({{$dt->kat_fakultas}})</b></td>
					<td>{{ date('d M Y', strtotime($dt->tgl_agenda)) }}</td>
					<td>
						@if($cekTgl < $dt->tgl_agenda)
							<span class="label label-info">Menunggu Tanggal Agenda</span>
						@elseif($cekTgl > $dt->tgl_agenda)
							<span class="label label-success">Selesai</span>
						@elseif($cekTgl == $dt->tgl_agenda)
							<span class="label label-danger">Sedang Berlangsung</span>
						@endif
					</td>
					<td>
						<a href="/detail agenda/{{\Crypt::encrypt($dt->id) }}"><i class="icon-eye"></i> Lihat</a>
					</td>
					<td class="text-center"> 	
					@if($cekTgl < $dt->tgl_agenda)	
						@if(Auth::user()->ket=='Super Admin' || Auth::user()->ket==$cek1 && Auth::user()->ket2==$cek2)
							<ul class="icons-list">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>
									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="/edit agenda/{{\Crypt::encrypt($dt->id) }}"><i class="icon-compose"></i> Edit Data</a></li>
										<script>
										  	function ConfirmDelete() {
										  		var x = confirm("Yakin Akan Menghapus Data?");
										  		if (x)
										    		return true;
										  		else
										    		return false;
										  	}
										</script>
										<li><a href="/hapus agenda/{{ $dt->id }}" onclick="return ConfirmDelete()"><i class="icon-close2"></i> Hapus Data</a></li>
									</ul>
								</li>
							</ul>
						@else
							<a href="javascript::void(0)">no actions</a>
						@endif
					@else
						<a href="javascript::void(0)">no actions</a>
					@endif
					</td>
				</tr>
				@endif
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- /basic datatable -->

@endsection