@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Detail Kandidat</li>
@endsection

@section('content')

<form action="/terima kandidat/{{$tbMhs->id}}/{{$nmAgenda}}" method="POST" class="form-horizontal">
		{{ csrf_field() }}
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Detail Kandidat</h5>
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-lg-3 control-label">Foto</label>
					<div class="col-lg-9">
					<img src="/uploads/fotomhs/{{$tbMhs->foto}}" width="90" height="100">
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">NIM</label>
					<div class="col-lg-9">
						<input type="text" name="nama" class="form-control" value="{{$tbMhs->nim}}" readonly="readonly">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Nama</label>
					<div class="col-lg-9">
						<input type="text" name="nama" class="form-control" value="{{$tbMhs->nama}}" readonly="readonly">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Jurusan</label>
					<div class="col-lg-9">
						<input type="text" name="nama" class="form-control" value="{{$tbMhs->jurusan}}" readonly="readonly">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Tahun Angkatan</label>
					<div class="col-lg-9">
						<input type="text" name="nama" class="form-control" value="{{$tbMhs->angkatan}}" readonly="readonly">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Visi</label>
					<div class="col-lg-9">
						<p>{{$tbMhs->visi}}</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Misi</label>
					<div class="col-lg-9">
						<p>{!! $tbMhs->misi !!}</p>
					</div>
				</div>
				<div class="text-right">
				<a href="{{ URL::previous() }}" class="btn btn-default"><i class="icon-undo2"></i>&nbsp;Kembali</a>
					<button type="submit" class="btn btn-primary">Terima</button>
					<a href="/tolak kandidat/{{$tbMhs->id}}/{{$nmAgenda}}" class="btn btn-danger">Tolak</a>
				</div>
			</div>
		</div>
	</form>
	<!-- /basic layout -->
@endsection