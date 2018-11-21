@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Pengajuan Agenda</li>
@endsection

@section('content')
	<!-- Basic layout-->
	<form action="/upload berita/{{Auth::user()->id}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
		{{ csrf_field() }}
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Pengajuan Agenda</h5>
			</div>

			<input type="hidden" name="admin_id" value="{{ Auth::user()->id }}">
			<div class="panel-body">
				<div class="form-group">			
					<label class="col-lg-3 control-label">Nama Agenda</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="nm_agenda" required="" placeholder="Masukan nama agenda">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Sistem Pemilihan</label>
					<div class="col-lg-9">
						<select class="select" name="sistem_pem" required="" data-placeholder="Pilih Metode Pemilihan">
							<option value=""></option>
							<option>Pemilu Raya</option>
							<option>Delegasi</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">File Berkas</label>
					<div class="col-lg-9">
						<input type="file" name="file" required="" class="form-control" placeholder="Left icon">	
					</div>
				</div>

				<div class="text-right">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="/berita acara" class="btn btn-danger">Batal</a>
				</div>
			</div>
		</div>
	</form>
	<!-- /basic layout -->
@endsection