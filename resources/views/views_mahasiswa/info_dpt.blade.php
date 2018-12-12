@extends('layouts_views.layout_user')

@section('content')
<!-- Content -->
<div class="content" style="min-height: 450px; margin: 20px">
@if(count($Agenda)!=0)
	@if(count($Agenda)>1)
	  	<!-- Nav tabs -->
	  	<ul class="nav nav-tabs" id="myTab" role="tablist">
		  	{{!$n=1}}
		    @foreach($Agenda as $dt)
		    <li class="nav-item">
		      	<a class="nav-link" data-toggle="tab" href="#menu{{$dt->id}}">Agenda {{$n++}}</a>
		    </li>
		    @endforeach
	  	</ul>

	  	<!-- Tab panes -->
	  	<div class="tab-content">
		    {{!$i=1}}
		    @foreach($Agenda as $agenda)
		    <div id="menu{{$agenda->id}}" class="container tab-pane"><br>
		    	<h4 class="panel-title">Informasi Daftar Pemilih / Delegasi</h4>
				<h4 class="panel-title">{{$agenda->nm_agenda }}</h4>
				<p><b>Waktu Pemilihan : </b>{{ date('d F Y', strtotime($agenda->tgl_agenda)) }},
				<b>Pukul : </b>{{ date('G:i', strtotime($agenda->timeA1))}} - {{ date('G:i', strtotime($agenda->timeA2))}}</p>
				<table id="tabel-data{{$agenda->id}}" class="table table-striped table-bordered" width="100%" cellspacing="0">
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
				    	{{! $tbPemilih = \App\Pemilih::where('agenda_id', $agenda->id)->get() }}
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
		    </div>
		    <script>
			    $(document).ready(function(){
			        $('#tabel-data{{$agenda->id}}').DataTable();
			    });
			</script>
		    @endforeach
	  	</div>
	  	<!-- Tab panes -->    
	@else
		@foreach($Agenda as $d)
		<h4 class="panel-title">Informasi Daftar Pemilih / Delegasi</h4>
		<h4 class="panel-title">{{$d->nm_agenda }}</h4>
		<p><b>Waktu Pemilihan : </b>{{ date('d F Y', strtotime($d->tgl_agenda)) }},
		<b>Pukul : </b>{{ date('G:i', strtotime($d->timeA1))}} - {{ date('G:i', strtotime($d->timeA2))}}</p>

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
		    	{{! $tbPemilih = \App\Pemilih::where('agenda_id', $d->id)->get() }}
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
		@endforeach
	@endif
@else
	<!-- Error title -->
	<div class="text-center content-group">
		<h5>Belum ada agenda pemilihan!</h5>
	</div>
	<!-- /error title -->
@endif
</div>

<script>
	$('#myTab a:first').tab('show');
    
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });
</script>

@endsection