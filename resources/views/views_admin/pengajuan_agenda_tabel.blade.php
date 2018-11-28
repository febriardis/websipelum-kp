@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Pengajuan Agenda</li>
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
			<h5 class="panel-title">Pengajuan Agenda</h5><hr>
			@if(Auth::user()->ket=='Super Admin')
			@else
				<a href="/upload pengajuan agenda" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-upload"></i>&nbsp;Pengajuan</a>
			@endif
		</div>

		<table class="table datatable-basic">
			<thead>
				<tr>
					<th>No</th>
					<th>Agenda</th>
					<th>Sistem Pemilihan</th>
					<th>Dokumen</th>
					<th>Tanggal Upload</th>
					<th>Katerangan</th>
					<th class="text-center">Aksi</th>
				</tr>
			</thead>
			<tbody>
				{{!$no=1}}
				{{!$d=1}}
				@foreach($tb as $dt)
					{{! $cek1 = (App\Admin::find($dt->admin_id))->ket,
						$cek2 = (App\Admin::find($dt->admin_id))->ket2
					}}
				@if(Auth::user()->ket==$cek1 && Auth::user()->ket2==$cek2 || Auth::user()->ket== 'Super Admin')
				<tr>
					<td>{{$no++}}</td>
					<td>{{$dt->nm_agenda}}</td>
					<td>{{$dt->sistem_vote}}</td>
					<td><a href="{{ url('uploads/surat/'.$dt->file) }}" target="_blank">file_{{$d++}}</a>
					</td>
					<td>
						{{ date('d F Y', strtotime($dt->created_at)) }}
						<p><b>Dibuat&nbsp;oleh&nbsp;:&nbsp;</b>Admin&nbsp;{{(\App\Admin::find($dt->admin_id))->ket}}.{{(\App\Admin::find($dt->admin_id))->ket2}}</p>
					</td>
					<td>
						@if($dt->ket=='belum diverifikasi')
							<span class="badge badge-warning">{{$dt->ket}}</span>
						@elseif($dt->ket=='agenda ditolak')
							<span class="badge badge-danger">{{$dt->ket}}</span>
						@else
							<span class="badge badge-info">{{$dt->ket}}</span>
						@endif
					</td>
					@if(Auth::user()->ket=='Super Admin')
						@if($dt->ket=='belum diverifikasi')
						<td width="270">
							<a href="/verifikasi/{{\Crypt::encrypt($dt->id)}}" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-share"></i>&nbsp;Buat Agenda</a>
							<a href="/tolak/{{$dt->id}}" class="btn btn-danger btn-xs" onclick="return ConfirmTolak()"><i class="glyphicon glyphicon-share"></i>&nbsp;Tolak Agenda</a>
						</td>
						@elseif($dt->ket=='agenda ditolak')
						<td>
							<script>
							  	function ConfirmDelete() {
							  		var x = confirm("Yakin Akan Menghapus Data?");
							  		if (x)
							    		return true;
							  		else
							    		return false;
							  	}
							</script>
							<a href="/cancel/{{ $dt->id }}" class="btn btn-danger btn-sm" onclick="return ConfirmDelete()"><i class="icon-close2"></i>&nbsp;Hapus</a>
						</td>
						@else
						<td><a href="javascript::void(0)">no actions</a></td>
						@endif
					@else
					<td class="text-center">
						@if($dt->ket=='belum diverifikasi') 
						<ul class="icons-list">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="icon-menu9"></i>
								</a>
								<ul class="dropdown-menu dropdown-menu-right">
									<li><a href="/edit pengajuan agenda/{{\Crypt::encrypt($dt->id)}}"><i class="icon-compose"></i>&nbsp;Edit</a></li>
									<script>
									  	function ConfirmDelete() {
									  		var x = confirm("Yakin Akan Menghapus Data?");
									  		if (x)
									    		return true;
									  		else
									    		return false;
									  	}
									</script>
									<li><a href="/cancel/{{ $dt->id }}" onclick="return ConfirmDelete()"><i class="icon-close2"></i>&nbsp;Batal</a></li>
								</ul>
							</li>
						</ul>
						@elseif($dt->ket=='agenda ditolak')
						<a href="/edit pengajuan agenda/{{\Crypt::encrypt($dt->id)}}" class="btn btn-default btn-sm"><i class="icon-compose"></i>&nbsp;Ajukan Ulang</a>
						@else
							<a href="javascript::void(0)">no actions</a>
						@endif
					</td>
					@endif	
				</tr>
				@endif
				@endforeach

			</tbody>
		</table>
	</div>
	<!-- /basic datatable -->
@endsection