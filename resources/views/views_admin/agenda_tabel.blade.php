@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Data Agenda</li>
@endsection

@section('content')
	@if(Session::has('pesan'))
	<div class="alert alert-info">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		{{ Session::get('pesan') }} !
	</div>
	@endif
	<!-- Basic datatable -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Data Agenda</h5>
			<a href="/tambah agenda" class="btn btn-info btn-xs">Tambah Data</a>
		</div>

		<table class="table datatable-basic">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Agenda</th>
					<th>Metode Pemilihan</th>
					<th>Kategori Pemilih</th>
					<th>Tanggal Agenda</th>
					<th>Katerangan</th>
					<th>Detail</th>
					<th class="text-center">Actions</th>
				</tr>
			</thead>
			<tbody>
				{{! $no = 1 }}
				@foreach($data as $dt)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $dt->nm_agenda }}</td>
					<td>{{ $dt->metodep }}</td>
					<td>{{ $dt->kat_jurusan }} <b>({{$dt->kat_fakultas}})</b></td>
					<td>{{ date('d M Y', strtotime($dt->tgl_agenda)) }}</td>
					<td>
						@if(date('Y-m-d') < $dt->tgl_agenda)
							<span class="label label-info">Menunggu Tanggal Agenda</span>
						@elseif(date('Y-m-d') > $dt->tgl_agenda)
							<span class="label label-success">Selesai</span>
						@elseif(date('Y-m-d') == $dt->tgl_agenda)
							<span class="label label-danger">Sedang Berlangsung</span>
						@endif
					</td>
					<td>
						<a href="/detail agenda/{{ $dt->id }}"><i class="icon-eye"></i> Lihat</a>
					</td>
					<td class="text-center"> 
						<ul class="icons-list">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon-menu9"></i>
								</a>

								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="/edit agenda/{{ $dt->id }}"><i class="icon-compose"></i> Edit Data</a></li>
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
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- /basic datatable -->

@endsection