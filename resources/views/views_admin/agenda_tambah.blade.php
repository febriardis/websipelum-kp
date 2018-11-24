@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Verifikasi Agenda</li>
@endsection

@section('content')
	@if(Session::has('pesan'))
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session::get('pesan') }} !
		</div>
	@endif
	<!-- Basic layout-->
	<form action="/tambah agenda/{{$tb->admin_id}}" method="POST" class="form-horizontal">
		{{ csrf_field() }}
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Formulir Pembuatan Agenda</h5>
			</div>
			<input type="hidden" name="id_bacara" value="{{$tb->id}}">
			<div class="panel-body">
				<div class="form-group">
					<label class="col-lg-3 control-label">Agenda</label>
					<div class="col-lg-9">
						<input type="text" name="nm_agenda" class="form-control" value="{{$tb->nm_agenda}}" readonly="readonly">
					</div>
				</div>

				<div class="form-group">			
					<label class="col-lg-3   control-label">Sistem Pemilihan</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" readonly="readonly" name="sistem_pem" value="{{$tb->sistem_vote}}">
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Kategori Pemilih</label>
					<div class="col-lg-5" id="main">
						<select class="select" id="fakultas" name="fakultas" required="" data-placeholder="Pilih Fakultas">
							{{! $tb = (App\Fakultas::all()) }}
							<option></option>
							<option value="Semua Mahasiswa">Semua Mahasiswa UIN SGD Bandung</option>
						@foreach($tb as $dt)
							<option value="{{$dt->nm_fakultas}}">{{$dt->nm_fakultas}}</option>
						@endforeach
						</select>
						</select>
					</div>
				</div>

				{{! $cekFak = (App\Fakultas::all()) }}
				<script type="text/javascript">
				$(document).ready(function() {
				    $("#fakultas").change(function(){
				    	// CREATE A "DIV" ELEMENT.
			        	var container = document.createElement("div");
			        	container.className="col-lg-4";
			        	@foreach($cekFak as $d)
				       	if ($(this).val() == "{{$d->nm_fakultas}}"){
				       		{{! $tb = (App\Jurusan::where('fak_id', $d->id))->get() }}
			                // ADD TEXTBOX.
			            	$('#a').remove(); 
			                $(container).append('<select style="font-size:14px" class="form-control" name="jurusan" id="a" required="">'+
			                	'<option hidden>Pilih Jurusan</option>'+
			                	'<option>Semua Jurusan</option>'+
								@foreach($tb as $dt)
								'<option>{{$dt->nm_jurusan}}</option>'+
								@endforeach
			                	'</select>'
			                );
			                // ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.
			                $('#main').after(container);
			            }
			            @endforeach
			            else if ($(this).val() == "Semua Mahasiswa"){
			            	$('#a').remove(); 
			            }
				    });
				});

				</script>

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
					<button type="submit" class="btn btn-primary">Terbitkan</button>
					<a href="{{URL::previous()}}" class="btn btn-danger">Batal</a>
				</div>
			</div>
		</div>
	</form>
	<!-- /basic layout -->
@endsection