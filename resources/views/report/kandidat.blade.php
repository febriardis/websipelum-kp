@extends('layouts_views.layout_report')

@section('content')
<div>
	<div style="float: right;font-size: 0.7em">
		report : {{date('d M Y')}}
	</div>
  	<h4>Daftar Kandidat</h4>
  	<h4>{{App\Agenda::find($idAgenda)->nm_agenda}}</h4>
	<div style="font-size: 0.9em">       
	  	<p><b>Tanggal Pemilihan : </b>{{ date('d F Y', strtotime(App\Agenda::find($idAgenda)->tgl_agenda)) }}<br>
		<b>Waktu : </b>{{ date('G:i', strtotime(App\Agenda::find($idAgenda)->timeA1))}} - {{ date('G:i', strtotime(App\Agenda::find($idAgenda)->timeA2))}}</p>  
	  	<table class="table table-striped table-bordered">
		    <thead>
		      	<tr>
			        <th>No</th>
			        <th>NIM</th>
			        <th>Nama</th>
			        <th>Jurusan</th>
			        <th>Angkatan</th>
			        <th>Keterangan</th>
		      	</tr>
		    </thead>
		    <tbody>
		    	{{!$no=1}}
		    	@foreach($kandidats as $kandidat)
		    	<tr>
		    		<td>{{$no++}}</td>
			        <td>{{$kandidat->nim}}</td>
			        <td>{{\App\Mahasiswa::where('nim', $kandidat->nim)->value('nama')}}</td>
			        <td>{{\App\Mahasiswa::where('nim', $kandidat->nim)->value('jurusan')}}</td>
			        <td>{{\App\Mahasiswa::where('nim', $kandidat->nim)->value('th_angkatan')}}</td>
			        <td>{{$kandidat->keterangan}}</td>
		      	</tr>
		      	@endforeach
		    </tbody>
	  	</table>
	</div>
</div>

@endsection