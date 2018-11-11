@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Tambah Admin</li>
@endsection

@section('content')

	@if(Session::has('pesan'))
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session::get('pesan') }} !
		</div>
	@endif
<!-- Basic layout-->
	<form action="/tambah admin" method="POST" class="form-horizontal">
		{{ csrf_field() }}
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Form Penambahan Admin</h5>
			</div>

			<div class="panel-body">
				<div class="form-group">			
					<label class="col-lg-3   control-label">Nama</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="nama" required="" placeholder="Masukan nama">
					</div>
				</div>

				<div class="form-group">			
					<label class="col-lg-3   control-label">Username</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="username" required="" placeholder="Masukan username">
					</div>
				</div>				

				<div class="form-group">			
					<label class="col-lg-3   control-label">Password</label>
					<div class="col-lg-9">
						<input type="password" class="form-control" name="password" required="" placeholder="Masukan password">
					</div>
				</div>	

				@if(Auth::user()->ket=='Super Admin')
				<script type="text/javascript">
					$(window).load(function(){
						$("#pil_ket").change(function(){
							console.log($("#pil_ket option:selected").val());
							if ($("#pil_ket option:selected").val()=='Super Admin' || $("#pil_ket option:selected").val()=='Admin Sema U' || $("#pil_ket option:selected").val()=='Admin Dema U') {
								$('#ket_SA').prop('hidden', false);
								$('#ket_F').prop('hidden', 'true');
								$('#ket_J').prop('hidden', 'true');
							}
							else if ($("#pil_ket option:selected").val()=='Admin Sema F' || $("#pil_ket option:selected").val()=='Admin Dema F') {
								$('#ket_SA').prop('hidden', 'true');
								$('#ket_F').prop('hidden', false);
								$('#ket_J').prop('hidden', 'true');
							}
							else if ($("#pil_ket option:selected").val()=='Admin HMJ'){
								$('#ket_SA').prop('hidden', 'true');
								$('#ket_F').prop('hidden', 'true');
								$('#ket_J').prop('hidden', false);
							}
						});
					});
				</script>	
				<div class="form-group">
					<label class="col-lg-3 control-label">Keterangan</label>
					<div class="col-lg-5">
						<select class="select" id="pil_ket" name="ket" required="" data-placeholder="Pilih Keterangan Admin">
							<option value=""></option>
							<option value="Super Admin">Super Admin</option>
							<option value="Admin Sema U">Admin Sema U</option>
							<option value="Admin Dema U">Admin Dema U</option>
							<option value="Admin Sema F">Admin Sema F</option>
							<option value="Admin Sema F">Admin Dema F</option>
							<option value="Admin HMJ">Admin HMJ</option>
						</select>
					</div>
					
					<input type="hidden" id="ket_SA" name="ket2" value="" hidden="">
					<div class="col-lg-4" id="ket_F" hidden="">
						<select class="select" name="ket2" required="" data-placeholder="Pilih Fakultas">
							<option value=""></option>
							<option>Sains dan Teknologi</option>
							<option>Ilmu Sosial dan Ilmu Politik</option>
							<option>Syariah dan Hulum</option>
							<option>Ushuludin</option>
							<option>Tarbiyah dan Keguruan</option>
							<option>Adab dan Humaniora</option>
							<option>Dakwah dan Komunikasi</option>
							<option>Psikologi</option>
						</select>
					</div>

					<div class="col-lg-4" id="ket_J" hidden="">
						<select class="select" name="ket2" required="" data-placeholder="Pilih Jurusan">
							<option value=""></option>
							<optgroup label="Fak. Sains dan Teknologi">
								<option>Teknik Informatika</option>
								<option>Teknik Elektro</option>
							</optgroup>
							<optgroup label="Fak. Tarbiyah dan Keguruan">
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
				
				@else
					<input type="hidden" name="ket" value="{{ Auth::user()->ket }}" readonly="">
				@endif

				<div class="text-right">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="/tabel admin" class="btn btn-danger">Batal</a>
				</div>
			</div>
		</div>
	</form>
	<!-- /basic layout -->
@endsection