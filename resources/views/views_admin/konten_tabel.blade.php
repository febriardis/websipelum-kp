@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Konten Berita</li>
@endsection

@section('content')
@if(Auth::user()->ket=='Super Admin')
<div class="content" style="min-height: 450px">
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Slideshow Images</h5>
			<a href="/tambah slideshow">Tambah</a>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-bordered datatable-basic" width="100%" cellspacing="0">
			    <thead>
			        <tr>
			            <th>Images</th>
			            <th>Head Caption</th>
			            <th>Body Caption</th>
			            <th class="text-center">Actions</th>
			        </tr>
			    </thead>
			    <tbody>
			    	@foreach($banners as $banner)
			    	<tr>
			    		<td>
			   				<img src="/uploads/gambar-slide/{{ $banner->image }}" width="100" height="50" alt="">
			    		</td>
			    		<td>{{ $banner->head_caption }}</td>
			    		<td>{{ $banner->body_caption }}</td>
			    		<td class="text-center">
			    			<a href="/slideshow/{{$banner->id}}">Edit</a>
			    			<form action="/slideshow/{{$banner->id}}" method="POST" onclick="return ConfirmDelete()">
			    				@csrf
			    				@method('DELETE')
			    				<input type="submit" value="Hapus" style="border:none; background: none; color: blue">
			    			</form>
			    		</td>
			    	</tr>
			    	@endforeach
			    </tbody>
			</table>
		</div>
	</div>
	<hr>
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">News Content</h5>
			<a href="/tambah berita">Tambah</a>
		</div>
		<div class="panel-body">
			<table class="table table-striped table-bordered datatable-basic" width="100%" cellspacing="0">
			    <thead>
			        <tr>
			            <th>Title</th>
			            <th>News Content</th>
			            <th>Posted</th>
			            <th class="text-center">Actions</th>
			        </tr>
			    </thead>
			    <tbody>
			    	@foreach($contents as $content)
			    	<tr>
			    		<td><b>{{ $content->title }}</b></td>
			    		<td>{!! $content->content !!}</td>
			    		<td>{{ date('d M Y', strtotime($content->created_at)) }}</td>
		    			<td class="text-center">
			    			<a href="/berita/{{$banner->id}}">Edit</a>
			    			<form action="/berita/{{$banner->id}}" method="POST" onclick="return ConfirmDelete()">
			    				@csrf
			    				@method('DELETE')
			    				<input type="submit" value="Hapus" style="border:none; background: none; color: blue">
			    			</form>
			    		</td>
			    	</tr>
			    	@endforeach
			    </tbody>
			</table>
		</div>
	</div>

</div>

  <script type="text/javascript">
    function ConfirmDelete() {
     	var x = confirm("Yakin Akan Menghapus Data?");
     	if (x)
        	return true;
      	else
        	return false;
    }
  </script>
@endif
@endsection