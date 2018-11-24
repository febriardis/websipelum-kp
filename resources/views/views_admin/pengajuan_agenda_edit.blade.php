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
						<input type="text" class="form-control" name="nm_agenda" required="" value="{{$tb->nm_agenda}}" placeholder="Masukan nama agenda">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Sistem Pemilihan</label>
					<div class="col-lg-9">
						<select class="select" name="sistem_pem" required="" data-placeholder="Pilih Metode Pemilihan">
							@if($tb->sistem_vote=='Pemilu Raya')
								<option>{{$tb->sistem_vote}}</option>
								<option>Delegasi</option>
							@else
								<option>{{$tb->sistem_vote}}</option>
								<option>Pemilu Raya</option>
							@endif
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">File Berkas</label>
					<div class="col-lg-9">
						<input type="file" name="file" value="{{$tb->file}}" class="form-control">
						<label class="text-muted">*abaikan jika tidak diganti</label>
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