@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Tambah Balon</li>
@endsection

@section('content')
	@if(Session::has('pesan'))
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session::get('pesan') }} !
		</div>
	@endif
	<!-- Basic layout-->
	<form action="/tambah balon" method="POST" class="form-horizontal" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Form Penambahan Calon</h5>
			</div>

			<input type="hidden" name="admin_id" value="{{ Auth::user()->id }}">
			<div class="panel-body">
				<div class="form-group">
					<label class="col-lg-3 control-label">NIM</label>
					<div class="col-lg-9">
						<input type="nummber" name="nim" class="form-control" required="" placeholder="1234567890">
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Nama</label>
					<div class="col-lg-9">
						<input type="text" name="nama" class="form-control" required="" placeholder="Masukan nama">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-3 control-label">Foto</label>
					<div class="col-lg-9">
						<input type="file" class="file-styled" name="foto" required="" accept="image/*">
						<span class="help-block">Accepted formats: png, jpg. Max file size 2Mb</span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Jurusan</label>
					<div class="col-lg-9">
						<select class="select" data-placeholder="Pilih Jurusan" name="jurusan" required="">
							<option></option>
							<optgroup label="Fak. Sains dan Teknologi">
								<option>Teknik Informatika</option>
								<option>Teknik Elektro</option>
							</optgroup>
							<optgroup label="Fak. Tarbiyah dan Dakwah">
								<option>Pendidikan Matematika</option>
								<option>Pendidikan Agama Islam</option>
							</optgroup>
							<optgroup label="Fak. Ilmu Sosial & Ilmu Politik">
								<option>Manajemen</option>
								<option>Administrasi Negara</option>
								<option>Sosiologi</option>
							</optgroup>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Tahun Angkatan</label>
					<div class="col-lg-9">
						<select class="select" name="angkatan" required="" data-placeholder="Pilih Tahun Angkatan">
							<option value=""></option>
							<option>2012</option>
							<option>2013</option>
							<option>2014</option>
							<option>2015</option>
							<option>2016</option>
							<option>2017</option>
							<option>2018</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Kandidat Agenda</label>
					<div class="col-lg-9">
						<select class="select" name="agenda_id" required="" data-placeholder="Pilih Agenda">
							<option value=""></option>
							@foreach($agenda as $ag)
							<option value="{{ $ag->id }}">{{ $ag->nm_agenda }}</option>
							@endforeach
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Visi</label>
					<div class="col-lg-9">
						<textarea class="form-control" name="visi" required="" placeholder="Masukan visi calon" rows="5"></textarea>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Misi</label>
					<div class="col-lg-9">
						<textarea class="form-control" name="misi" required="" placeholder="Masukan misi calon" rows="5"></textarea>
					</div>
				</div>

				<div class="text-right">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="/tabel balon" class="btn btn-danger">Batal</a>
				</div>
			</div>
		</div>
	</form>
	<!-- /basic layout -->


@endsection

