@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Data Admin</li>
@endsection

@section('content')

@if(Session::has('pesan'))
	<div class="alert alert-info">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		{{ Session::get('pesan') }} !
	</div>
@endif

@if(Auth::user()->ket=='Super Admin')
	<!-- Basic datatable -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Data Admin</h5>
			<a href="/tambah admin" class="btn btn-info btn-xs">Tambah Data</a>
		</div>

		<table class="table datatable-basic">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Username</th>
					<th>Tanggal Daftar</th>
					<th>Katerangan</th>
					<th class="text-center">Actions</th>
				</tr>
			</thead>
			<tbody>
			{{!$no=1}}
			@foreach($tbAdmin as $tb)
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $tb->nama }}</td>
					<td>{{ $tb->username }}</td>
					<td>{{ $tb->created_at }}</td>
					<td>{{ $tb->ket }} - <b>{{ $tb->ket2 }}</b></td>
					<td class="text-center">
						<a href="/edit admin/{{$tb->id}}" class="btn btn-info btn-sm"><i class='icon-pencil'></i>&nbsp;Edit</a>
	                  	<form action="/hapus admin/{{$tb->id}}" method="POST" onclick="return ConfirmDelete()">
		                    @csrf
		                    @method('DELETE')
		                    <button type="submit" class="btn btn-danger btn-sm text-white"><i class='icon-trash'></i>&nbsp;Hapus</button>
		                </form>
					</td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
	<!-- /basic datatable -->
@endif
<script>
  	function ConfirmDelete() {
  		var x = confirm("Yakin Akan Menghapus Data?");
  		if (x)
    		return true;
  		else
    		return false;
  	}
</script>
@endsection