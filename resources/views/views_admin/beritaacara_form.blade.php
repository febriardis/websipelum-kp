@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Upload Berita Acara</li>
@endsection

@section('content')
	<!-- Basic layout-->
	<form action="/tambah agenda" method="POST" class="form-horizontal">
		{{ csrf_field() }}
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Form Upload Berita Acara</h5>
			</div>

			<input type="hidden" name="admin_id" value="{{ Auth::user()->id }}">
			<div class="panel-body">
				<div class="form-group">
					<label class="col-lg-3 control-label">Sistem Pemilihan</label>
					<div class="col-lg-9">
						<select class="select" name="metodep" required="" data-placeholder="Pilih Metode Pemilihan">
							<option value=""></option>
							<option>Pemilu Raya</option>
							<option>Delegasi</option>
						</select>
					</div>
				</div>

				<div class="form-group">			
					<label class="col-lg-3 control-label">Nama Agenda</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="nm_agenda" required="" placeholder="Masukan nama agenda">
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Kategori Pemilih</label>
					<div class="col-lg-5">
						<select class="select" name="fakultas" required="" data-placeholder="Pilih Fakultas">
							<option></option>
							<option value="Semua Mahasiswa">Semua Mahasiswa UIN SGD Bandung</option>
							<option>Sains dan Teknologi</option>
							<option>Tarbiyah dan Keguruan</option>
							<option>Syariah dan Hukum</option>
							<option>Ushuludin</option>
						</select>
					</div>
					<div class="col-lg-4">
						<select class="select" name="jurusan" required="" data-placeholder="Pilih Jurusan">
							<option></option>
							<option>-</option>
							<optgroup label="Fak. Sains dan Teknologi">
								<option>Semua Jurusan</option>
								<option>Teknik Informatika</option>
								<option>Teknik Elektro</option>
							</optgroup>
							<optgroup label="Fak. Tarbiyah dan Keguruan">
								<option>Semua Jurusan</option>
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
							<input type="date" name="tgl_agenda" required="" class="form-control" placeholder="Left icon">
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