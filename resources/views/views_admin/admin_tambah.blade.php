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
					<label class="col-lg-3 control-label">Nama</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="nama" required="" placeholder="Masukan nama">
					</div>
				</div>

				<div class="form-group">			
					<label class="col-lg-3 control-label">Username</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" name="username" required="" placeholder="Masukan username">
					</div>
				</div>				

				<div class="form-group">			
					<label class="col-lg-3 control-label">Password</label>
					<div class="col-lg-9">
						<input type="password" class="form-control" name="password" required="" placeholder="Masukan password">
					</div>
				</div>	

				@if(Auth::user()->ket=='Super Admin')
				<script type="text/javascript">
				$(document).ready(function() {
				    $("#pil_ket").change(function(){
				    	// CREATE A "DIV" ELEMENT.
			        	var container = document.createElement("div");
			        	container.className="col-lg-4";
				        if($(this).val() == "Super Admin" || $(this).val() == "Admin Sema U" || $(this).val() == "Admin Dema U") {
			                // ADD TEXTBOX.
			            	$('#a').remove(); 
			                $(container).append('<input type=hidden name="ket2" class="form-control" value="Super Admin" id="a"/>');
			                // ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.
			                $('#main').after(container);

			            }else if ($(this).val() == "Admin Sema F" || $(this).val() == "Admin Dema F"){
			                // ADD TEXTBOX.
			            	$('#a').remove(); 
			                $(container).append('<select style="font-size:14px" class="form-control" name="ket2" id="a" required="">'+
			                	'<option hidden>Pilih Fakultas</option>'+
								'<option>Sains dan Teknologi</option>'+
								'<option>Ilmu Sosial dan Ilmu Politik</option>'+
								'<option>Syariah dan Hulum</option>'+
								'<option>Ushuludin</option>'+
								'<option>Tarbiyah dan Keguruan</option>'+
								'<option>Adab dan Humaniora</option>'+
								'<option>Dakwah dan Komunikasi</option>'+
								'<option>Psikologi</option>'+
			                	'</select>'
			                );
			                // ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.
			                $('#main').after(container);

			            }else if ($(this).val() == "Admin HMJ"){
			                // ADD TEXTBOX.
			            	$('#a').remove(); 
			                $(container).append('<select style="font-size:14px" class="form-control" name="ket2" id="a" required="">'+
			                	'<option hidden>Pilih Jurusan</option>'+
								'<optgroup label="Fak. Sains dan Teknologi">'+
									'<option>Teknik Informatika</option>'+
									'<option>Teknik Elektro</option>'+
								'</optgroup>'+
								'<optgroup label="Fak. Tarbiyah dan Keguruan">'+
									'<option>Pendidikan Matematika</option>'+
									'<option>Pendidikan Agama Islam</option>'+
								'</optgroup>'+
								'<optgroup label="Fak. Ilmu Sosial & Ilmu'+
									'Politik">'+
									'<option>Manajemen</option>'+
									'<option>Administrasi Negara</option>'+
									'<option>Sosiologi</option>'+
								'</optgroup>'+
			                	'</select>'
			                );
			                // ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.
			                $('#main').after(container);
			            }
				    });
				});
				</script>

				<div class="form-group">
					<label class="col-lg-3 control-label">Keterangan</label>
					<div class="col-lg-5" id="main">
						<select class="form-control" style="font-size: 14px" id="pil_ket" name="ket" required="">
							<option hidden="">Pilih Keterangan Admin</option>
							<option value="Super Admin">Super Admin</option>
							<option value="Admin Sema U">Admin Sema U</option>
							<option value="Admin Dema U">Admin Dema U</option>
							<option value="Admin Sema F">Admin Sema F</option>
							<option value="Admin Dema F">Admin Dema F</option>
							<option value="Admin HMJ">Admin HMJ</option>
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