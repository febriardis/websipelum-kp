@extends('layouts_views.layout_admin')

@section('content')
@if(count($Agenda)!=0)
<!-- Content -->
<div class="content" style="min-height: 450px">
  	<div class="head-content">  
		<h4>Informasi Daftar Pemilih / Delegasi</h4>
  	</div>

  	<div class="tabbable">
	    <ul class="nav nav-tabs nav-tabs-highlight" id="myTab">
	   	{{! $n=1 }}
		@foreach($Agenda as $dt)
			<div style="display: none;">	
				{{! $cek1 = (App\Admin::find($dt->admin_id))->ket }}
				{{! $cek2 = (App\Admin::find($dt->admin_id))->ket2 }}
				{{! $c1 =(App\Jurusan::where('nm_jurusan', Auth::user()->ket2)->value('fak_id')) }}
				{{! $c2 = (App\Fakultas::where('nm_fakultas', $dt->kat_fakultas)->value('id')) }}
			</div>		
			@if(Auth::user()->ket==$cek1 && Auth::user()->ket2==$cek2 || Auth::user()->ket=='HMJ' && Auth::user()->ket2==$dt->kat_fakultas || Auth::user()->ket=='HMJ' && $dt->kat_fakultas=='Semua Mahasiswa' || Auth::user()->ket=='HMJ' && $dt->kat_jurusan=='Semua Jurusan' && $c1==$c2 || Auth::user()->ket=='Super Admin')
	      	<li><a href="#highlighted-justified-tab{{$dt->id}}" data-toggle="tab">Agenda {{$n++}}</a></li>
	      	@endif
	    @endforeach
	    </ul>

    <div class="tab-content">
      	<!-- tab pane -->
      	@foreach($Agenda as $dt)
		<div style="display: none;">	
			{{! $cek1 = (App\Admin::find($dt->admin_id))->ket }}
			{{! $cek2 = (App\Admin::find($dt->admin_id))->ket2 }}
			{{! $c1 =(App\Jurusan::where('nm_jurusan', Auth::user()->ket2)->value('fak_id')) }}
			{{! $c2 = (App\Fakultas::where('nm_fakultas', $dt->kat_fakultas)->value('id')) }}
		</div>		
			@if(Auth::user()->ket==$cek1 && Auth::user()->ket2==$cek2 || Auth::user()->ket=='HMJ' && Auth::user()->ket2==$dt->kat_fakultas || Auth::user()->ket=='HMJ' && $dt->kat_fakultas=='Semua Mahasiswa' || Auth::user()->ket=='HMJ' && $dt->kat_jurusan=='Semua Jurusan' && $c1==$c2 || Auth::user()->ket=='Super Admin')
	      	<div class="tab-pane active" id="highlighted-justified-tab{{$dt->id}}">
	      		<h4 class="panel-title">{{$dt->nm_agenda }}</h4>
				<p><b>Waktu Pemilihan : </b>{{ date('d F Y', strtotime($dt->tgl_agenda)) }},
				<b>Pukul : </b>{{ date('G:i', strtotime($dt->timeA1))}} - {{ date('G:i', strtotime($dt->timeA2))}}</p>

				<table class="table table-striped table-bordered datatable-basic" width="100%" cellspacing="0">
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
				    	{{! $tbPemilih = \App\Pemilih::where('agenda_id', $dt->id)->get() }}
				    	@foreach($tbPemilih as $d)
						<tr>
							<td>{{$no++}}</td>
							<td>{{$d->nim}}</td>
							<td>{{\App\Mahasiswa::where('nim', $d->nim)->value('nama')}}</td>
							<td>{{\App\Mahasiswa::where('nim', $d->nim)->value('jurusan')}}</td>
							<td>{{\App\Mahasiswa::where('nim', $d->nim)->value('fakultas')}}</td>
							<td>{{\App\Mahasiswa::where('nim', $d->nim)->value('th_angkatan')}}</td>
						</tr>
						@endforeach
				    </tbody>
				</table>
	      	</div>
	      	@endif
      	@endforeach
      	<!-- /tab pane -->
    </div>
@endif
</div>
<!-- /Content -->
<script>
	$('#myTab a:first').tab('show');
</script>
@endsection