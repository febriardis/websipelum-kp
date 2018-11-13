@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Berita Acara</li>
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
			<h5 class="panel-title">Berita Acara</h5><hr>
			@if(Auth::user()->ket=='Super Admin')
			@else
				<a href="/upload berita acara" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-upload"></i>&nbsp;Upload</a>
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
					<th class="text-center">Actions</th>
				</tr>
			</thead>
			<tbody>
				{{!$no=1}}{{!$d=1}}
				@foreach($tb as $dt)
				{{! $cek1 = (App\Admin::find($dt->admin_id))->ket }}
				{{! $cek2 = (App\Admin::find($dt->admin_id))->ket2 }}
				@if(Auth::user()->ket==$cek1 && Auth::user()->ket2==$cek2 || Auth::user()->ket== 'Super Admin')
				<tr>
					<td>{{$no++}}</td>
					<td>{{$dt->nm_agenda}}</td>
					<td>{{$dt->sistem_vote}}</td>
					<td><a href="{{ url('uploads/surat/'.$dt->file) }}">file_{{$d++}}</a>
					</td>
					<td>
						{{ date('d F Y', strtotime($dt->created_at)) }}
					</td>
					<td>
						@if($dt->ket=='belum dibuat')
							<span class="badge badge-danger">{{$dt->ket}}</span>
						@else
							<span class="badge badge-info">{{$dt->ket}}</span>
						@endif
					</td>
					<td>
						@if(Auth::user()->ket=='Super Admin')
							@if($dt->ket=='belum dibuat')
								<a href="/verifikasi/{{$dt->id}}" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-share"></i>&nbsp;Buat Agenda</a>
							@else
							@endif
						@else
							<script>
							  	function ConfirmDelete() {
							  		var x = confirm("Yakin Akan Membatalkan Agenda?");
							  		if (x)
							    		return true;
							  		else
							    		return false;
							  	}
							</script>
							<a href="/cancel/{{$dt->id}}" onclick="return ConfirmDelete()">Batal</a>
						@endif	
					</td>
				</tr>
				@endif
				@endforeach

			</tbody>
		</table>
	</div>
	<!-- /basic datatable -->
@endsection