@extends('layouts.layout')

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
				@if(Auth::user()->ket=='Super Admin')
					@foreach($tbAdmin as $tb)
						<tr>
							<td>{{ $no++ }}</td>
							<td>{{ $tb->nama }}</td>
							<td>{{ $tb->username }}</td>
							<td>{{ $tb->created_at }}</td>
							<td>{{ $tb->ket }} - <b>{{ $tb->ket2 }}</b></td>
							<td class="text-center">
								<ul class="icons-list">
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown">
											<i class="icon-menu9"></i>
										</a>

										<ul class="dropdown-menu dropdown-menu-right">
											<li><a href=""><i class="icon-compose"></i> Edit Data</a></li>
											<script>
											  	function ConfirmDelete() {
											  		var x = confirm("Yakin Akan Menghapus Data?");
											  		if (x)
											    		return true;
											  		else
											    		return false;
											  	}
											</script>
											<li><a href="" onclick="return ConfirmDelete()"><i class="icon-close2"></i> Hapus Data</a></li>
										</ul>
									</li>
								</ul>
							</td>
						</tr>
					@endforeach
				@else
					@foreach($tbAdmin as $tb)
						@if($tb->ket==Auth::user()->ket)
							<tr>
								<td>{{ $no++ }}</td>
								<td>{{ $tb->nama }}</td>
								<td>{{ $tb->username }}</td>
								<td>{{ $tb->created_at }}</td>
								<td>{{ $tb->ket }}</td>
								<td class="text-center">
									<ul class="icons-list">
										<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>

											<ul class="dropdown-menu dropdown-menu-right">
												<li><a href=""><i class="icon-compose"></i> Edit Data</a></li>
												<script>
												  	function ConfirmDelete() {
												  		var x = confirm("Yakin Akan Menghapus Data?");
												  		if (x)
												    		return true;
												  		else
												    		return false;
												  	}
												</script>
												<li><a href="" onclick="return ConfirmDelete()"><i class="icon-close2"></i> Hapus Data</a></li>
											</ul>
										</li>
									</ul>
								</td>
							</tr>
						@endif
					@endforeach

				@endif
				
			</tbody>
		</table>
	</div>
	<!-- /basic datatable -->
@endsection