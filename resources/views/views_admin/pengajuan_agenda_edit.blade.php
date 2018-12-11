@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Pengajuan Agenda</li>
@endsection

@section('content')
	<!-- Basic layout-->
	<form action="/edit ajuan/{{$tb->id}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
		{{ csrf_field() }}
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Edit Pengajuan Agenda</h5>
			</div>
			<div class="panel-body">
				<div class="form-group">			
					<label class="col-lg-3 control-label">Nama Agenda</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" readonly="" name="nm_agenda" required="" value="{{$tb->nm_agenda}}" placeholder="Masukan nama agenda">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Sistem Pemilihan</label>
					<div class="col-lg-9">
						<select class="select" name="sistem_pem" required="" data-placeholder="Pilih Metode Pemilihan">
							<option {{{ ($tb->sistem_vote == 'Pemilu Raya' ? 'selected' : '') }}}>{{ $tb->sistem_vote }}</option>
							<option {{{ ($tb->sistem_vote == 'Delegasi' ? 'selected' : '') }}}>{{ $tb->sistem_vote }}</option>
<!-- 							@if($tb->sistem_vote=='Pemilu Raya')
								<option>{{$tb->sistem_vote}}</option>
								<option>Delegasi</option>
							@else
								<option>{{$tb->sistem_vote}}</option>
								<option>Pemilu Raya</option>
							@endif -->
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">File Berkas</label>
					<div class="col-lg-9">
						<input type="file" name="file" accept=".doc, .docx, .pdf" value="{{$tb->file}}" class="form-control">
						<label class="text-muted">file min. 2 Mb</label>
						<label class="text-muted">*abaikan jika tidak diganti</label>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Kategori Pemilih</label>
					<div class="col-lg-5" id="main">
						<select class="select" id="fakultas" name="fakultas" data-placeholder="Pilih Fakultas">
							{{! $tbFak = (App\Fakultas::all()) }}
							<option></option>
							<option value="Semua Mahasiswa">Semua Mahasiswa UIN SGD Bandung</option>
						@foreach($tbFak as $dt)
							<option value="{{$dt->nm_fakultas}}">{{$dt->nm_fakultas}}</option>
						@endforeach
						</select>
						<label class="text-muted">*abaikan jika tidak diganti</label>
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
				       		{{! $tbJur = (App\Jurusan::where('fak_id', $d->id))->get() }}
			                // ADD TEXTBOX.
			            	$('#a').remove(); 
			                $(container).append('<select style="font-size:14px" class="form-control" name="jurusan" id="a">'+
			                	'<option hidden>Pilih Jurusan</option>'+
			                	'<option>Semua Jurusan</option>'+
								@foreach($tbJur as $dt)
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
							<input type="date" name="tgl_agenda" value="{{$tb->tgl_agenda}}" required="" class="form-control" placeholder="Left icon">
						</div>
					</div>
					<div class="col-lg-2">
						<div class="input-group">
							<span class="input-group-addon">start</span>
							<input type="time" name="timeA1" required="" value="{{$tb->timeA1}}" class="form-control">
						</div>
					</div>
					<div class="col-lg-2">
						<div class="input-group">
							<span class="input-group-addon">is over</span>
							<input type="time" name="timeA2" required="" value="{{$tb->timeA2}}" class="form-control">
						</div>
					</div>
				</div>

				<div class="text-right">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="{{URL::previous()}}" class="btn btn-danger">Batal</a>
				</div>
			</div>
		</div>
	</form>
	<!-- /basic layout -->
@endsection