@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Edit Slideshow</li>
@endsection

@section('content')
@if(Auth::user()->ket=='Super Admin')
<div class="content" style="min-height: 450px">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Edit Slideshow</h5>
		</div>

		<div class="panel-body">
			<form action="/slideshow/{{ $banners->id }}" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-3">Image </label>
			          	<!-- js show image -->
				        <script type="text/javascript">
				            function readURL(input) {
				              if (input.files && input.files[0]) {
				                var reader = new FileReader();

				                reader.onload = function(e) {
				                  $('#cek-gambar')
				                    .attr('src', e.target.result);
				                };
				                reader.readAsDataURL(input.files[0]);
				              }
				            }
				        </script>
				        <!--end-->
				        <div class="col-sm-9">
							<input type="file" name="image" onchange="readURL(this);" accept="image/*">
          					<span class="help-block"><i>max 2MB </i></span>
							<span class="text-danger">{{ $errors->first('image')}}</span> 
          					<label class="text-muted">*abaikan jika tidak diganti</label>
							<div class="show-banner">
	            				<img id="cek-gambar" src="/uploads/gambar-slide/{{$banners->image}}" alt="" width="100%" height="100%">
	          				</div>
          				</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-3">Head Caption</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" required="" value="{{ $banners->head_caption }}" name="head" placeholder="masukan heading caption">
						</div>
					</div>
				</div>
				
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-3">Head Content</label>
						<div class="col-sm-9">
							<input type="text" name="body" required="" value="{{$banners->body_caption}}" class="form-control" placeholder="masukan isi caption">
						</div>
					</div>
				</div>

				<div class="right">
					<input type="submit" value="Update" class="btn btn-info">
					<a href="{{ URL::Previous() }}" class="btn btn-danger">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>
@endif
@endsection