@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Berita Acara</li>
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
			<h5 class="panel-title">Berita Acara</h5><hr>
			@if(Auth::user()->ket=='Super Admin')
			@else
				<a href="/upload berita acara" class="btn btn-info btn-xs">Upload</a>
			@endif
		</div>

		<table class="table datatable-basic">
			<thead>
				<tr>
					<th>No</th>
					<th>Agenda</th>
					<th>Sistem Pemilihan</th>
					<th>Tanggal Upload</th>
					<th>Katerangan</th>
					<th class="text-center">Actions</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>
						@if(Auth::user()->ket=='Super Admin')
						<a href="/verifikasi berita" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-upload"></i> Terbitkan</a>
						@else
						<button>admin</button>
						@endif	
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<!-- /basic datatable -->
@endsection