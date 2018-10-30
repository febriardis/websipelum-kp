@extends('layouts.layout')

@section('link')
	<li class="active">Data Agenda</li>
@endsection

@section('content')
	<!-- Basic datatable -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Data Mahasiswa</h5>
		</div>

		<table class="table datatable-basic">
			<thead>
				<tr>
					<th>No</th>
					<th>NIM</th>
					<th>Nama</th>
					<th>Jurusan</th>
					<th>Tahun Angkatan</th>
					<th>Status</th>
					<th>Detail</th>
				</tr>
			</thead>
			<tbody>
				{{ ! $no = 1 }}
				@foreach($tbMhs as $tb)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $tb->nim }}</td>
					<td>{{ $tb->nama }}</td>
					<td>{{ $tb->jurusan }}</td>
					<td>{{ $tb->th_angkatan }}</td>
					<td>
						<span class="label label-info">Aktif</span>
					</td>
					<td>
						<a href="#"><i class="icon-eye"></i> show</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- /basic datatable -->
@endsection