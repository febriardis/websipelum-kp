@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Verifikasi Agenda</li>
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
					<label class="col-lg-3 control-label">Sistem Pemilihan</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" readonly="readonly" name="sistem_pem" value="{{$tb->sistem_vote}}">
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Kategori Pemilih</label>
					<div class="col-lg-5">
						<input type="text" class="form-control" readonly="readonly" name="fakultas" value="{{$tb->kat_fakultas}}">
					</div>
					<div class="col-lg-4">
						<input type="text" class="form-control" readonly="readonly" name="jurusan" value="{{$tb->kat_jurusan}}">
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Waktu Pelaksanan</label>
					<div class="col-lg-5">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon-calendar3"></i></span>
							<input type="date" name="tgl_agenda" required="" value="{{$tb->tgl_agenda}}" class="form-control" placeholder="Left icon">
						</div>
						{{!$cekT = \App\Agenda::where('tgl_agenda', $tb->tgl_agenda)->get()}}
						@if(count($cekT) != 0)
							<span class="label label-danger">Tanggal {{date('d', strtotime($tb->tgl_agenda))}} sudah ada agenda</span>
						@endif
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

				<div class="form-group">
					<label class="col-lg-3 control-label">Pendaftaran Kandidat</label>
					<div class="col-lg-5">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon-calendar3">&nbsp;start</i></span>
							<input type="date" name="StartDaftarK" required="" class="form-control" placeholder="Left icon">
						</div>
					</div>
					<div class="col-lg-4">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon-calendar3">&nbsp;is-over</i></span>
							<input type="date" name="LastDaftarK" required="" class="form-control" placeholder="Left icon">
						</div>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Penyaringan Kandidat</label>
					<div class="col-lg-9">
						<div class="input-group">
							<span class="input-group-addon"><i class="icon-calendar3"></i></span>
							<input type="date" name="tgl_filtering" required="" class="form-control" placeholder="Left icon">
						</div>
					</div>
				</div>

				<div class="text-right">
					<button type="submit" class="btn btn-primary">Buat Agenda</button>
					<a href="{{URL::previous()}}" class="btn btn-danger">Batal</a>
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