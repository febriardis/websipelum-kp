@extends('layouts.layout')

@section('link')
	<li class="active">Tambah Pemilih</li>
@endsection

@section('content')
	@if(Session::has('pesan'))
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session::get('pesan') }} !
		</div>
	@endif
	<!-- Basic layout-->
	<form action="/tambah pemilih" method="POST" class="form-horizontal">
		{{ csrf_field() }}
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Form Pendaftaran Pemilu</h5>
			</div>

			<div class="panel-body">
				<div class="form-group">
					<label class="col-lg-3 control-label">Nim</label>
					<div class="col-lg-9">
						<input type="number" name="nim" required="" class="form-control" placeholder="1234567890">
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Nama</label>
					<div class="col-lg-9">
						<input type="text" name="nama" required="" class="form-control" placeholder="Masukan nama mahasiswa">
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Nama Agenda</label>
					<div class="col-lg-9">
						<select class="select" id="select" required="" name="agenda_id" data-placeholder="Pilih Agenda">
							<option value=""></option>
							@foreach($agenda as $dt)
							<option id="id{{ $dt->id }}" value="{{ $dt->id }}">{{ $dt->nm_agenda }}</option>
							@endforeach
						</select>
					</div>
				</div>
				
				<script type="text/javascript">
					$(document).ready(function() {
					    $("#select").change(function(){
					        @foreach($agenda as $dt)
					        if($(this).val() == "{{ $dt->id }}") {
				            	{{! $i = 1 }}
					        	@foreach($tps as $t)
									document.getElementById("sele").options.remove({{$i}});									
									@if($t->agenda_id == $dt->id)
											var c = document.createElement("option");
											c.text = "{{$t->lokasi}}";
											c.value = "{{$t->id}}";
					            			document.getElementById("sele").options.add(c, {{$i}});	            		
					            		{{ $i++ }}
					            	@endif
				            	@endforeach
				            }
				            @endforeach
					    });
					});
				</script>

				<div class="form-group">
					<label class="col-lg-3 control-label">TPS</label>
					<div class="col-lg-9">
						<select class="select" id="sele" name="tps_id" required="" data-placeholder="Pilih TPS">
							<option value=""></option>
							<option value=""></option>
						</select>
					</div>
				</div>

				<div class="text-right">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="/tabel paslon" class="btn btn-danger">Batal</a>
				</div>
			</div>
		</div>
	</form>
	<!-- /basic layout -->


@endsection

