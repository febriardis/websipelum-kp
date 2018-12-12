@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Detail Agenda</li>
@endsection

@section('content')
<div style="display: none;">
	{{! $cekTgl = \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d') }}
	{{! $tgl_agenda = (App\Agenda::find($IdAgenda))->tgl_agenda }}
	{{! $StartDaftarK = (App\Agenda::find($IdAgenda))->StartDaftarK }}
	{{! $LastDaftarK = (App\Agenda::find($IdAgenda))->LastDaftarK }}
</div>
	<!-- ================Header================ -->
	<div class="page-header-content" style="border-bottom: 1px solid #cccccc">
		<div class="page-title">
			<p>
				Tanggal Agenda : <b>{{ date('l, d M Y', strtotime((App\Agenda::find($IdAgenda))->tgl_agenda)) }}</b>
			</p>
			<h4>
				<span class="text-semibold" style="text-transform: uppercase;">{{ (App\Agenda::find($IdAgenda))->nm_agenda }}</span>
			</h4>
			<p>
				Kategori Pemilih : {{ (App\Agenda::find($IdAgenda))->kat_jurusan }} 
				<b>({{(App\Agenda::find($IdAgenda))->kat_fakultas}})</b> 
			</p>
		</div>
		<div class="heading-elements">
			<h4><b>{{ (App\Agenda::find($IdAgenda))->sistem_vote }}</b></h4>
		</div>
	</div>
	<!-- /================Header================ -->
	<br>
	<!-- Pricing table -->
	<div class="breadcrumb-line breadcrumb-line-component">
		<ul class="breadcrumb">
			<li><i class="glyphicon glyphicon-forward"></i>&nbsp;Kandidat</li>
		</ul>
		<ul class="breadcrumb right" style="float: right; border: 1px solid #cccccc; padding: 10px 20px">
			<li><b>Tahap Pendaftaran</b> : {{ date('d M', strtotime($StartDaftarK)) }} - {{ date('d M Y', strtotime($LastDaftarK)) }}</li>
			<li><b>Tahap Penyaringan</b> : {{ date('d F Y', strtotime((App\Agenda::find($IdAgenda))->tgl_filtering)) }}</li>
		</ul>
	</div>

	@if(Session::has('pesanK'))
		<div class="alert alert-info">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session::get('pesanK') }} !
		</div>
	@endif

	@if(Session::has('pesanErr'))
		<div class="alert alert-danger">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session::get('pesanErr') }} !
		</div>
	@endif

    <!-- Basic datatable -->
	<div class="panel panel-flat">
		<div style="display: none;">
		{{! $cekAdmin = (\App\Agenda::find($IdAgenda))->admin_id,
			$cekkat1Admin = (\App\Admin::find($cekAdmin))->ket,
			$cekkat2Admin = (\App\Admin::find($cekAdmin))->ket2
		}}
		</div>
		<div class="panel-heading">			
			@if(Auth::user()->ket=='Super Admin')
			@else
				@if(Auth::user()->id==$cekAdmin || Auth::user()->ket==$cekkat1Admin && Auth::user()->ket2==$cekkat2Admin)
					@if($cekTgl < $tgl_agenda)
						@if($cekTgl >= $StartDaftarK && $cekTgl <= $LastDaftarK)
							<a href="/tambah kandidat/{{\Crypt::encrypt($IdAgenda)}}" class="btn btn-primary btn-sm">Tambah</a>
						@endif
					@elseif($cekTgl >= $tgl_agenda)
					@endif
				@else
				@endif
			@endif
			<div style="float: right;margin-bottom: 25px">
				<button type="button" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-print"></i>&nbsp;Cetak</button>
			</div>
		</div>	

		@if(Session::has('pesanVerif'))
			<div class="alert alert-info">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ Session::get('pesanVerif') }} !
			</div>
		@endif

		<table class="table datatable-basic">
			<thead>
				<tr>
					<th>No</th>
					<th>Foto</th>
					<th>NIM</th>
					<th>Nama</th>
					<th>Jurusan</th>
					<th>Keterangan</th>
					<th>Detail</th>
					<th class="text-center">Actions</th>
				</tr>
			</thead>
			<tbody>
				{{! $no = 1}}
				@foreach($tbK as $dt)
				<tr>
					<td>{{$no++}}</td>
					<td><img src="{{ url('uploads/foto-kandidat/'.$dt->foto) }}" alt="image not found" width="90" height="100"> </td>
					<td>{{$dt->nim}}</td>
					<td>{{$dt->nama}}</td>
					<td>{{$dt->jurusan}}&nbsp;-&nbsp;{{$dt->angkatan}}</td>
					<td>
		 				@if($dt->keterangan=='Menunggu Verifikasi')
		                  <span class="badge badge-info">{{$dt->keterangan}}</span>
		                @elseif($dt->keterangan=='Diterima')
		                  <span class="badge badge-success">{{$dt->keterangan}}</span>
		                @else
		                  <span class="badge badge-danger">{{$dt->keterangan}}</span>
		                @endif
					</td>
					<td>
						<a href="/detail kandidat/{{$dt->nim}}/{{\Crypt::encrypt($IdAgenda) }}"><i class="icon-eye"></i> Lihat</a>
					</td>
					<td class="text-center">

					@if($cekTgl < $tgl_agenda)					
						@if(Auth::user()->ket=='Super Admin')
							<a href="javascript:void(0)">no actions</a>
						@else
							@if(Auth::user()->id==$cekAdmin || Auth::user()->ket==$cekkat1Admin && Auth::user()->ket2==$cekkat2Admin)<ul class="icons-list">
								<li class="dropdown">
									<a href="#" class="dropdown-toggle" data-toggle="dropdown">
										<i class="icon-menu9"></i>
									</a>

									<ul class="dropdown-menu dropdown-menu-right">
										<li><a href="/detail kandidat/{{$dt->nim}}/{{\Crypt::encrypt($IdAgenda)}}"><i class="glyphicon glyphicon-ok-circle"></i> Verifikasi Data</a></li>
										
										<li><a href="/hapus kandidat/{{ $dt->id }}/{{ $IdAgenda }}" onclick="return ConfirmDelete()"><i class="icon-close2"></i> Hapus Data</a></li>
									</ul>
								</li>
							</ul>
							@else
							<a href="javascript:void(0)">no actions</a>
							@endif
						@endif
					@else
						<a href="javascript:void(0)">no actions</a>
					@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!-- /basic datatable --> 


	<!-- ==================Daftar Pemilih Tetap================ -->
	<!-- Pricing table -->
	<div class="breadcrumb-line breadcrumb-line-component">
		<ul class="breadcrumb">
			<li><i class="glyphicon glyphicon-forward"></i>&nbsp;Daftar Pemilih Tetap</li>
		</ul>
	</div>

	@if(Session::has('pesanP'))
		<div class="alert alert-info">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session::get('pesanP') }} !
		</div>
	@endif
	@if(Session::has('pesanE'))
		<div class="alert alert-info">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session::get('pesanE') }} !
		</div>
	@endif

	<!-- Basic datatable -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			@if(Auth::user()->ket=='HMJ')
				<!-- memanggil modal mahasiswa -->
				@if($cekTgl < $tgl_agenda)
					<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal_large">Import Data</i></button>
				@elseif($cekTgl >= $tgl_agenda)
				@endif
			@endif
			<div style="float: right;margin-bottom: 25px">
				<button type="button" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-print"></i>&nbsp;Cetak</button>
			</div>
		</div>
		
		<!-- ==================Table Daftar Pemilih Tetap================ -->
			<table class="table datatable-basic">
				<thead>
					<tr>
						<th></th>
						<th>No</th>
						<th>NIM</th>
						<th>Nama</th>
						<th>Jurusan</th>
						<th>Keterangan</th>
						<th class="text-center">Actions</th>
					</tr>
				</thead>
				<tbody>
				{{!$no=1}}
				@if(Auth::user()->ket=='Super Admin' || Auth::user()->ket=='KPU U') 
					@foreach($tbP as $dt)
					<tr>
						<td><input type="checkbox" name="id[]" value="{{ $dt->id }}"> </td>
						<td>{{$no++}}</td>
						<td>{{$dt->nim}}</td>
						<td>{{\App\Mahasiswa::where('nim', $dt->nim)->value('nama')}}</td>
						<td>{{\App\Mahasiswa::where('nim', $dt->nim)->value('jurusan')}}</td>
						{{! $cek = \Crypt::decrypt($dt->ket_vote)}}
						@if($cek == 'belum memilih')
						<td>
							<span class="label label-info">{{ $cek }}</span>
						</td>
						<td class="text-center">
							<a href="/hapus pemilih/{{ $dt->id }}/{{ $IdAgenda }}" class="btn btn-sm btn-danger" onclick="return ConfirmDelete()"><i class="icon-close2"></i> Hapus Data</a>
						</td>
						@else
							<td>
								<span class="label label-success">{{ $cek }}</span>
							</td>
							<td class="text-center">
								<a href="javascript:void(0)">no actions</a>
							</td>
						@endif
					</tr>
					@endforeach
				
				@elseif(Auth::user()->ket=='KPU F')	
					@foreach($tbP as $dt)
					{{! $cekFak = \App\Mahasiswa::where('nim', $dt->nim)->value('fakultas') }}
					@if($cekFak == Auth::user()->ket2)
					<tr>
						<td><input type="checkbox" name="id[]" value="{{ $dt->id }}"> </td>
						<td>{{$no++}}</td>
						<td>{{$dt->nim}}</td>
						<td>{{\App\Mahasiswa::where('nim', $dt->nim)->value('nama')}}</td>
						<td>{{\App\Mahasiswa::where('nim', $dt->nim)->value('jurusan')}}</td>
						{{! $cek = \Crypt::decrypt($dt->ket_vote)}}
						@if($cek == 'belum memilih')
						<td>
							<span class="label label-info">{{ $cek }}</span>
						</td>
						<td class="text-center">
							<a href="/hapus pemilih/{{ $dt->id }}/{{ $IdAgenda }}" class="btn btn-sm btn-danger" onclick="return ConfirmDelete()"><i class="icon-close2"></i> Hapus Data</a>
						</td>
						@else
							<td>
								<span class="label label-success">{{ $cek }}</span>
							</td>
							<td class="text-center">
								<a href="javascript:void(0)">no actions</a>
							</td>
						@endif
					</tr>
					@endif
					@endforeach
				@else
					@foreach($tbP as $dt)
					{{! $cekJur = \App\Mahasiswa::where('nim', $dt->nim)->value('jurusan') }}
					@if($cekJur == Auth::user()->ket2)
					<tr>
						<td><input type="checkbox" name="id[]" value="{{ $dt->id }}"> </td>
						<td>{{$no++}}</td>
						<td>{{$dt->nim}}</td>
						<td>{{\App\Mahasiswa::where('nim', $dt->nim)->value('nama')}}</td>
						<td>{{\App\Mahasiswa::where('nim', $dt->nim)->value('jurusan')}}</td>							
						{{! $cek = \Crypt::decrypt($dt->ket_vote) }}
						@if($cek == 'belum memilih')
						<td>
							<span class="label label-info">{{ $cek }}</span>
						</td>
						<td class="text-center">
							<a href="/hapus pemilih/{{ $dt->id }}/{{ $IdAgenda }}" class="btn btn-sm btn-danger" onclick="return ConfirmDelete()"><i class="icon-close2"></i> Hapus Data</a>
						</td>
						@else
							<td>
								<span class="label label-success">{{ $cek }}</span>
							</td>
							<td class="text-center">
									<a href="javascript:void(0)">no actions</a>
							</td>
						@endif
					</tr>
					@endif
					@endforeach
				@endif
				</tbody>
				<tfoot>
					<tr bgcolor="#fcfcfc">
						<td colspan="7">
							<div class="checkbox">
								<label><input type="checkbox" onclick="checkAllId(this)" class="styled">Check all</label>
								&nbsp;<a href="">Hapus Data</a>
							</div>
						</td>
					</tr>	
				</tfoot>
			</table>
		<!-- ==================Table Daftar Pemilih Tetap================ -->

		<!-- ==================/Modal Table Data Mahasiswa================ -->
		<!-- Large modal -->
		<div id="modal_large" class="modal fade">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title">Data Mahasiswa</h5>
					</div>
					
					<form action="/tambah pemilih/{{ $IdAgenda }}" method="POST">
						{{ csrf_field() }}
						<div class="modal-body">
							<table class="table datatable-basic">
								<thead>
									<tr>
										<th></th>
										<th>NIM</th>
										<th>Nama</th>
										<th>Jurusan</th>
										<th>Fakultas</th>
										<th>Tahun Angkatan</th>
									</tr>
								</thead>
								<tbody>
									{{! $no=1 }}
									<div style="display: none;">
										{{! $tbMhs = \App\Mahasiswa::where('jurusan', Auth::user()->ket2)->get() }}
									</div>
									@foreach($tbMhs as $dt)
									<tr>
										{{! $n =  $no++ }}
										<td>
											<input type="checkbox" name="nim[]" value="{{ $dt->nim }}"> 
										</td>
										<td>{{ $dt->nim }}</td>
										<td>{{ $dt->nama }}</td>
										<td>{{ $dt->jurusan }}</td>
										<td>{{ $dt->fakultas }}</td>
										<td>{{ $dt->th_angkatan }}</td>
									</tr>
									@endforeach
								</tbody>
								<tfoot>
									<tr bgcolor="#fcfcfc">
										<td colspan="5">
											<div class="checkbox">
												<label><input type="checkbox" onclick="checkAllNim(this)" class="styled">Check all</label>
											</div>
										</td>
										<td>
									</tr>	
								</tfoot>
							</table>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
							@if($no==1)
							@else
								<button type="submit" class="btn btn-primary">Export</button>
							@endif
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- /large modal -->
		<!-- ==================/Modal Table Data Mahasiswa================ -->
	</div>
	<!-- /basic datatable --> 

	<script>
	  	function ConfirmDelete() {
	  		var x = confirm("Yakin Akan Menghapus Data?");
	  		if (x)
	    		return true;
	  		else
	    		return false;
	    }
										
		function checkAllNim(source) {
		  checkboxes = document.getElementsByName('nim[]');
		  for(var i=0, n=checkboxes.length;i<n;i++) {
		    checkboxes[i].checked = source.checked;
		  }
		}

		function checkAllId(source) {
		  checkboxes = document.getElementsByName('id[]');
		  for(var i=0, n=checkboxes.length;i<n;i++) {
		    checkboxes[i].checked = source.checked;
		  }
		}

	</script>	

@endsection