@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Edit Berita</li>
@endsection

@section('content')
@if(Auth::user()->ket=='Super Admin')
<div class="content" style="min-height: 450px">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Edit Berita</h5>
		</div>

		<div class="panel-body">
			<form action="/berita/{{ $contents->id }}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<div class="form-group">
					<label class="control-label">Title</label>
					<input type="text" class="form-control" required="" value="{{ $contents->title }}" name="title" placeholder="masukan heading caption">
				</div>
				
				<div class="form-group">
					<label class="control-label">News Content</label>
					<textarea name="content" required="" class="ckeditor" id="ckedtor">{{ $contents->content }}</textarea>
				</div>

				<div class="right">
					<input type="submit" value="Tambahkan" class="btn btn-info">
					<a href="{{ URL::Previous() }}" class="btn btn-danger">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>
@endif
@endsection