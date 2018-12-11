@extends('layouts_views.layout_user')

@section('content')
<!-- Content -->
<div class="content" style="min-height: 450px; margin: 20px">
	@if(count($Agenda)!=0)
		<h4 class="panel-title">Informasi Daftar Pemilih / Delegasi</h4>
		<h4 class="panel-title">{{ $Agenda->nm_agenda }}</h4>
		<table id="tabel-data" class="table table-striped table-bordered" width="100%" cellspacing="0">
		    <thead>
		        <tr>
		            <th>No</th>
		            <th>NIM</th>
		            <th>Nama</th>
		            <th>Jurusan</th>
		            <th>Fakultas</th>
		            <th>Angkatan</th>
		        </tr>
		    </thead>
		    <tbody>
		    	{{! $no=1 }}
		    	{{! $tbPemilih = \App\Pemilih::where('agenda_id', $Agenda->id)->get() }}
		    	@foreach($tbPemilih as $dt)
				<tr>
					<td>{{$no++}}</td>
					<td>{{$dt->nim}}</td>
					<td>{{\App\Mahasiswa::where('nim', $dt->nim)->value('nama')}}</td>
					<td>{{\App\Mahasiswa::where('nim', $dt->nim)->value('jurusan')}}</td>
					<td>{{\App\Mahasiswa::where('nim', $dt->nim)->value('fakultas')}}</td>
					<td>{{\App\Mahasiswa::where('nim', $dt->nim)->value('th_angkatan')}}</td>
				</tr>
				@endforeach
		    </tbody>
		</table>
	@else
		<!-- Error title -->
		<div class="text-center content-group">
			<h5>Belum ada agenda pemilihan!</h5>
		</div>
		<!-- /error title -->
	@endif
</div>

<script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>

@endsection