@extends('layouts.layout')

@section('link')
	<li class="active">Edit Data Agenda</li>
@endsection

@section('content')
	<!-- Basic layout-->
	<form action="/edit agenda/{{ $data->id }}" method="POST" class="form-horizontal">
		{{ csrf_field() }}
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Form Perubahan Agenda</h5>
			</div>

			<div class="panel-body">
				<div class="form-group">
					<label class="col-lg-3 control-label">Name Agenda</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="nm_agenda" value="{{ $data->nm_agenda }}" required="" placeholder="Masukan nama agenda">
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Kategori Jurusan</label>
					<div class="col-lg-9">
						<select class="select" name="jurusan" required="" data-placeholder="Pilih Jurusan">
							<option>{{ $data->jurusan }}</option>
							<option>Semua Jurusan</option>
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
					<label class="col-lg-3 control-label">Tanggal Agenda</label>
					<div class="col-lg-9">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon-calendar3"></i></span>
							<input type="date" name="tgl_agenda" required="" value="{{ $data->tgl_agenda }}" class="form-control" placeholder="Left icon">
						</div>
					</div>
				</div>

				<div class="text-right">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="/tabel agenda" class="btn btn-danger">Batal</a>
				</div>
			</div>
		</div>
	</form>
	<!-- /basic layout -->
@endsection