@extends('layouts.layout')

@section('link')
	<li class="active">Data Pemilih</li>
@endsection

@section('content')
	@if(Session::has('pesan'))
		<div class="alert alert-info">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session::get('pesan') }} !
			<p><b>Username : </b> {{ Session::get('username') }} </p>
			<p><b>Password : </b> {{ Session::get('password') }} </p>
		</div>
	@endif

	@if(Session::has('pesanh'))
		<div class="alert alert-info">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session::get('pesanh') }} !
		</div>
	@endif

	<!-- Basic datatable -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Data Pemilih</h5>
		</div>

		<table class="table datatable-basic">
			<thead>
				<tr>
					<th>No</th>
					<th>NIM</th>
					<th>Nama</th>
					<th>Agenda</th>
					<th>Lokasi TPS</th>
					<th>Keterangan</th>
					<th class="text-center">Actions</th>
				</tr>
			</thead>
			<tbody>
				{{! $no=1 }}
				@foreach($data as $dt)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $dt->nim }}</td>
					<td>{{ $dt->nama }}</td>
					<td>
						{{ (App\Agenda::find($dt->agenda_id)->nm_agenda) }}
					</td>
					<td>
						{{ (App\Tps::find($dt->tps_id)->lokasi) }}
					</td>
					<td>
						@if($dt->vote = 'Belum Memilih')
						<span class="label label-info">{{ $dt->ket_vote }}</span>
						@else
						<span class="label label-success">{{ $dt->ket_vote }}</span>
						@endif
					</td>
					<td class="text-center">
						<ul class="icons-list">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon-menu9"></i>
								</a>

								<ul class="dropdown-menu dropdown-menu-right">
									<!-- <li><a href="#"><i class="icon-compose"></i> Edit Data</a></li> -->
									<script>
									  	function ConfirmDelete() {
									  		var x = confirm("Yakin Akan Menghapus Data?");
									  		if (x)
									    		return true;
									  		else
									    		return false;
									  	}
									</script>
									<li><a href="/hapus pemilih/{{ $dt->id }}" onclick="return ConfirmDelete()"><i class="icon-close2"></i> Hapus Data</a></li>
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