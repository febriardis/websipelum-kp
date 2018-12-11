@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Tambah Admin</li>
@endsection

@section('content')
@if(Auth::user()->ket=='Super Admin')
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

				<div class="form-group">
					<label class="col-lg-3 control-label">Keterangan</label>
					<div class="col-lg-5" id="main">
						<select class="form-control" style="font-size: 14px" id="pil_ket" name="ket" required="">
							<option hidden="">Pilih Keterangan Admin</option>
							<option value="Super Admin">Super Admin</option>
							<option value="KPU U">Admin KPU Univ</option>
							<option value="KPU F">Admin KPU Fak</option>
							<option value="HMJ">Admin HMJ</option>
						</select>
					</div>
				</div>

				<script type="text/javascript">
				$(document).ready(function() {
				    $("#pil_ket").change(function(){
				    	// CREATE A "DIV" ELEMENT.
			            {{! $cek = (\App\Fakultas::all())}}
			        	var container = document.createElement("div");
			        	container.className="col-lg-4";
				        if($(this).val() == "Super Admin" || $(this).val() == "KPU U") {
			                // ADD TEXTBOX.
			            	$('#a').remove(); 
			                $(container).append('<input type=hidden name="ket2" class="form-control" value="" id="a"/>');
			                // ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.
			                $('#main').after(container);

			            }else if ($(this).val() == "KPU F"){
			                // ADD TEXTBOX.
			            	$('#a').remove(); 
			                $(container).append('<select style="font-size:14px" class="form-control" name="ket2" id="a" required="">'+
			                	'<option hidden>Pilih Fakultas</option>'+
			                	@foreach($cek as $d)
								'<option>{{$d->nm_fakultas}}</option>'+
								@endforeach
			                	'</select>'
			                );
			                // ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.
			                $('#main').after(container);

			            }else if ($(this).val() == "HMJ"){
			                // ADD TEXTBOX.
			            	$('#a').remove(); 
			                $(container).append('<select style="font-size:14px" class="form-control" name="ket2" id="a" required="">'+
			                	'<option hidden>Pilih Jurusan</option>'+
			                	@foreach($cek as $d)
								'<optgroup label="{{$d->nm_fakultas}}">'+
									{{! $jur = (App\Jurusan::where('fak_id', $d->id))->get() }}
									@foreach($jur as $t)
									'<option>{{$t->nm_jurusan}}</option>'+
									@endforeach
								'</optgroup>'+
			                	@endforeach
			                	'</select>'
			                );
			                // ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.
			                $('#main').after(container);
			            }
				    });
				});
				</script>
				<div class="text-right">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="/tabel admin" class="btn btn-danger">Batal</a>
				</div>
			</div>
		</div>
	</form>
	<!-- /basic layout -->
@else
	<!-- Error title -->
	<div class="text-center content-group">
		<h1 class="error-title">403</h1>
		<h5>Oops, an error has occurred. Forbidden!</h5>
	</div>
	<!-- /error title -->
@endif
@endsection