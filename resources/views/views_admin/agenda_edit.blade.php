@extends('layouts_views.layout_admin')

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
			@if(Session::has('pesanErr'))
			<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ Session::get('pesanErr') }} !
			</div>
			@endif
			<div class="panel-body">
				<div class="form-group">
					<label class="col-lg-3 control-label">Nama Agenda</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" readonly="" name="nm_agenda" value="{{ $data->nm_agenda }}" required="" placeholder="Masukan nama agenda">
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Sistem Pemilihan</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" readonly="" name="sistem_vote" value="{{ $data->sistem_vote }}" required="" placeholder="Masukan nama agenda">
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Waktu Pelaksanan</label>
					<div class="col-lg-5">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon-calendar3"></i></span>
							<input type="date" name="tgl_agenda" readonly="" required="" value="{{$data->tgl_agenda}}" class="form-control" placeholder="Left icon">
						</div>
					</div>
					<div class="col-lg-2">
						<div class="input-group">
							<span class="input-group-addon">start</span>
							<input type="time" name="timeA1" required="" value="{{$data->timeA1}}" class="form-control">
						</div>
					</div>
					<div class="col-lg-2">
						<div class="input-group">
							<span class="input-group-addon">is over</span>
							<input type="time" name="timeA2" required="" value="{{$data->timeA2}}" class="form-control">
						</div>
					</div>
				</div>


				<div class="form-group">
					<label class="col-lg-3 control-label">Pendaftaran Kandidat</label>
					<div class="col-lg-5">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon-calendar3">&nbsp;start</i></span>
							<input type="date" name="StartDaftarK" required="" value="{{$data->StartDaftarK}}" class="form-control" placeholder="Left icon">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon-calendar3">&nbsp;is-over</i></span>
							<input type="date" name="LastDaftarK" required="" value="{{$data->LastDaftarK}}" class="form-control" placeholder="Left icon">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Penyaringan Kandidat</label>
					<div class="col-lg-9">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon-calendar3"></i></span>
							<input type="date" name="tgl_filtering" value="{{$data->tgl_filtering}}" required="" class="form-control" placeholder="Left icon">
						</div>
					</div>
				</div>

				<div class="text-right">
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="{{ URL::previous() }}" class="btn btn-danger">Batal</a>
				</div>
			</div>
		</div>
	</form>
	<!-- /basic layout -->
@endsection