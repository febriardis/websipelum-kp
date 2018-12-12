@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Pengajuan Agenda</li>
@endsection

@section('content')
	<!-- Basic layout-->
	<form action="/upload ajuan/{{Auth::user()->id}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
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
						@if(Auth::user()->ket=='HMJ')
						<input type="text" class="form-control" name="nm_agenda" readonly="" required= required value="Pemilihan Ketua {{Auth::user()->ket}} {{Auth::user()->ket2}}">
						@elseif(Auth::user()->ket=='KPU U')
						<select class="select" name="nm_agenda" required="" data-placeholder="Pilih Kategori">
							<option value=""></option>
							<option>Pemilihan Ketua Sema UIN SGD Bandung</option>
							<option>Pemilihan Ketua Dema UIN SGD Bandung</option>
						</select>
						@else						
						<select class="select" name="nm_agenda" required="" data-placeholder="Pilih Kategori">
							<option value=""></option>
							<option>Pemilihan Ketua Sema Fak. {{Auth::user()->ket2}}</option>
							<option>Pemilihan Ketua Dema Fak. {{Auth::user()->ket2}}</option>
						</select>
						@endif

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
						<input type="file" name="file" accept=".doc, .docx, .pdf, .txt" required="" class="form-control" placeholder="Left icon">
						<span class="help-block"><i> max 2MB </i></span>
						<span class="text-danger">{{ $errors->first('file')}}</span> 
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
					<label class="col-lg-3 control-label">Waktu Pelaksanan</label>
					<div class="col-lg-5">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon-calendar3"></i></span>
							<input type="date" name="tgl_agenda" required="" class="form-control" placeholder="Left icon">
						</div>
					</div>
					<div class="col-lg-2">
						<div class="input-group">
							<span class="input-group-addon">start</span>
							<input type="time" name="timeA1" required="" class="form-control">
						</div>
					</div>
					<div class="col-lg-2">
						<div class="input-group">
							<span class="input-group-addon">is over</span>
							<input type="time" name="timeA2" required="" class="form-control">
						</div>
					</div>
				</div>

				<div class="text-right">
					<button type="submit" class="btn btn-primary">Ok</button>
					<a href="{{URL::previous()}}" class="btn btn-danger">Batal</a>
				</div>
			</div>
		</div>
	</form>
	<!-- /basic layout -->
@endsection