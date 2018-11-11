@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Data Calon</li>
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
			<h5 class="panel-title">Data Calon</h5>
			<a href="/tambah balon" class="btn btn-info">Tambah Data</a>
		</div>
		<table class="table datatable-basic">
			<thead>
				<tr>
					<th>No</th>
					<th>NIM</th>
					<th>Nama</th>
					<th>Foto</th>
					<th>Jurusan</th>
					<th>Angkatan</th>
					<th>Bakal Calon Di</th>
					<th>Visi</th>
					<th>Misi</th>
					<th class="text-center">Actions</th>
				</tr>
			</thead>
			<tbody>
				{{! $no = 1 }}
				@foreach($data as $dt)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $dt->nim }}</td>
					<td>{{ $dt->nama }}</td>
					<td><img src="{{ url('uploads/file/'.$dt->foto) }}" alt="" style="width: 90px; float: left; height: 100px"> </td>
					<td>{{ $dt->jurusan }}</td>
					<td>{{ $dt->angkatan }}</td>
					<td>{{ (App\Agenda::find($dt->agenda_id)->nm_agenda) }}</td>
					<td><p>{{ $dt->visi }}</p></td>
					<td><p>{{ $dt->misi }}</p></td>
					<td class="text-center">
						<ul class="icons-list">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon-menu9"></i>
								</a>

								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="/edit balon/{{ $dt->id }}"><i class="icon-compose"></i> Edit Data</a></li>
									<script>
									  	function ConfirmDelete() {
									  		var x = confirm("Yakin Akan Menghapus Data?");
									  		if (x)
									    		return true;
									  		else
									    		return false;
									  	}
									</script>
									<li><a href="/hapus balon/{{ $dt->id }}" onclick="return ConfirmDelete()"><i class="icon-close2"></i> Hapus Data</a></li>
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