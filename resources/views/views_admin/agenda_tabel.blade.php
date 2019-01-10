@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Data Agenda</li>
@endsection

@section('content')
  	{{! $cekTgl = \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d') }}
    {{! $cekJam = \Carbon\Carbon::now('Asia/Jakarta')->format('G:i') }}
	@if(Session::has('pesanA'))
	<div class="alert alert-info">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		{{ Session::get('pesanA') }} !
	</div>
	@endif
	<!-- Basic datatable -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Data Agenda</h5><hr>
		</div>

		<table class="table datatable-basic">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Agenda</th>
					<th>Sistem Pemilihan</th>
					<th>Kategori Pemilih</th>
					<th>Waktu Pelaksanaan</th>
					<th>Persyaratan & Kebijakan</th>
					<th>Template Riwayat Hidup</th>
					<th>Surat Pernyataan</th>
					<th>Katerangan</th>
					<th>Detail</th>
					<th class="text-center">Aksi</th>
				</tr>
			</thead>
			<tbody>
			{{! $no = 1 }}
			@foreach($data as $dt)
				<div style="display: none;">	
					{{! $cek1 = (App\Admin::find($dt->admin_id))->ket }}
					{{! $cek2 = (App\Admin::find($dt->admin_id))->ket2 }}				
					<!-- cek idfak jurusan dmna nm_jurusan==ket2admin-->
					{{! $c1 =(App\Jurusan::where('nm_jurusan', Auth::user()->ket2)->value('fak_id')) }}
					{{! $c2 = (App\Fakultas::where('nm_fakultas', $dt->kat_fakultas)->value('id')) }}
				</div>		
				@if(Auth::user()->ket==$cek1 && Auth::user()->ket2==$cek2 || Auth::user()->ket=='HMJ' && Auth::user()->ket2==$dt->kat_fakultas || Auth::user()->ket=='HMJ' && $dt->kat_fakultas=='Semua Mahasiswa' || Auth::user()->ket=='HMJ' && $dt->kat_jurusan=='Semua Jurusan' && $c1==$c2 || Auth::user()->ket=='Super Admin')
				<tr>
					<td>{{ $no++ }}</td>
					<td>{{ $dt->nm_agenda }}</td>
					<td>{{ $dt->sistem_vote }}</td>
					<td>{{ $dt->kat_jurusan }} <b>({{$dt->kat_fakultas}})</b></td>
					<td>
						{{ date('d M Y', strtotime($dt->tgl_agenda)) }}<br>
						<p><b>Pukul:</b><br> {{ date('G:i', strtotime($dt->timeA1))}} - {{ date('G:i', strtotime($dt->timeA2))}}</p>
					</td>
					<td>
						<a href="javascript::void(0)" data-toggle="modal" data-target="#myModalTerms{{$dt->id}}"><i class="icon-eye"></i> Lihat</a>
						@if($dt->syaratketentuan=='')
                 			<span class="badge badge-danger">belum diisi</span>
						@endif
					</td>
					<td>
						<a href="javascript::void(0)" data-toggle="modal" data-target="#myModalTempRH{{$dt->id}}"><i class="icon-eye"></i> Lihat</a>
						@if($dt->temp_riwayat_hidup=='')
                 			<span class="badge badge-danger">belum diisi</span>
						@endif
					</td>
					<td>
						<a href="javascript::void(0)" data-toggle="modal" data-target="#myModalSP{{$dt->id}}"><i class="icon-eye"></i> Lihat</a>
						@if($dt->surat_pernyataan=='')
                 			<span class="badge badge-danger">belum diisi</span>
						@endif
					</td>
					<td>
						@if($cekTgl < $dt->tgl_agenda)
							<span class="label label-info">Menunggu Tanggal Agenda</span>
							@if($cekTgl == $dt->tgl_filtering)
								<span class="label label-danger">Tahap Penyaringan Kandidat</span>
							@elseif($cekTgl >= $dt->StartDaftarK && $cekTgl <= $dt->LastDaftarK)
								<span class="label label-default">Tahap Pendaftaran Kandidat</span>
							@endif
						@elseif($cekTgl > $dt->tgl_agenda)
							<span class="label label-success">Selesai</span>
						@elseif($cekTgl == $dt->tgl_agenda)
							<span class="label label-danger">Agenda Hari Ini</span>
							@if($cekJam >= $dt->timeA1 && $cekJam <= $dt->timeA2)
								<span class="label label-danger">Sedang Berlangsung</span>		
							@elseif($cekJam > $dt->timeA2)
								<span class="label label-success">Pemilihan berakhir</span>
							@else
								<span class="label label-success">Menunggu waktu pemilihan</span>
							@endif
						@endif
					</td>
					<td>
						<a href="/detail agenda/{{\Crypt::encrypt($dt->id) }}"><i class="icon-eye"></i> Lihat</a>
					</td>
					<td class="text-center"> 	
					@if($cekTgl <= $dt->tgl_agenda)	
						@if(Auth::user()->ket=='Super Admin' || Auth::user()->ket==$cek1 && Auth::user()->ket2==$cek2)
							<a href="/edit agenda/{{\Crypt::encrypt($dt->id)}}" class="btn btn-default btn-sm"><i class="icon-compose"></i></a>
							<form action="/hapus agenda/{{$dt->id}}" method="POST" onclick="return ConfirmDelete()">
			                    @csrf
			                    @method('DELETE')
			                    <button type="submit" class="btn btn-danger btn-sm text-white"><i class='icon-trash'></i></button>
			                </form>
						@else
							<a href="javascript::void(0)">no actions</a>
						@endif
					@else
						<a href="javascript::void(0)">no actions</a>
					@endif
					</td>
				</tr>
				@endif

				<!-- The Modal -->
				<div class="modal" id="myModalTerms{{$dt->id}}" role="dialog">
				    <div class="modal-dialog modal-lg">
				    	<div class="modal-content">
					        <!-- Modal Header -->
					        <div class="modal-header">
					        	<h6 class="modal-title">Kebijakan dan persyaratan pencalonan</h6>
					        	<button type="button" class="close" data-dismiss="modal">&times;</button>
					        </div>
					        <hr>

					        <form action="/update syaratK/{{$dt->id}}" method="POST">
					        	@csrf
					        	@method('PUT')
						        <div class="modal-body">
					       			<div class="form-group">
										<label class="control-label">Syarat & kebijakan : </label>
										<textarea name="syaratketentuan" required="" class="ckeditor" id="ckedtor">{{ $dt->syaratketentuan }}</textarea>
									</div>
						        </div>
						        <div class="modal-footer">
									@if(Auth::user()->ket=='Super Admin' || Auth::user()->ket==$cek1 && Auth::user()->ket2==$cek2)
							        	<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>	
										<button type="submit" class="btn btn-primary">Simpan</button>
									@endif
						        </div>
					        </form>
				    	</div>
				    </div>
				</div>
				<!--End The Modal-->

				<!-- The Modal -->
				<div class="modal" id="myModalTempRH{{$dt->id}}" role="dialog">
				    <div class="modal-dialog modal-lg">
				    	<div class="modal-content">
					        <!-- Modal Header -->
					        <div class="modal-header">
					        	<h6 class="modal-title">Template Formulir Riwayat Hidup</h6>
					        	<button type="button" class="close" data-dismiss="modal">&times;</button>
					        </div>
					        <hr>

					        <form action="/update temp RH/{{$dt->id}}" method="POST" enctype="multipart/form-data">
					        	@csrf
					        	@method('PUT')
						        <div class="modal-body">
					       			<div class="form-group">
										<label class="control-label">Upload Template : </label>
										<input type="file" name="temp_riwayat_hidup">
									</div>
									<iframe src="/uploads/temp_riwayat_hidup/{{$dt->temp_riwayat_hidup}}" style="width: 100%; height: 450px"></iframe>
						        </div>
						        <div class="modal-footer">
									@if(Auth::user()->ket=='Super Admin' || Auth::user()->ket==$cek1 && Auth::user()->ket2==$cek2)
							        	<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>	
										<button type="submit" class="btn btn-primary">Simpan</button>
									@endif
						        </div>
					        </form>
				    	</div>
				    </div>
				</div>
				<!--End The Modal-->

				<!-- The Modal -->
				<div class="modal" id="myModalSP{{$dt->id}}" role="dialog">
				    <div class="modal-dialog modal-lg">
				    	<div class="modal-content">
					        <!-- Modal Header -->
					        <div class="modal-header">
					        	<h6 class="modal-title">Surat Pernyataan Pencalonan</h6>
					        	<button type="button" class="close" data-dismiss="modal">&times;</button>
					        </div>
					        <hr>

					        <form action="/update surat pernyataan/{{$dt->id}}" method="POST" enctype="multipart/form-data">
					        	@csrf
					        	@method('PUT')
						        <div class="modal-body">
					       			<div class="form-group">
										<div class="form-group">
											<label class="control-label">Upload Surat : </label>
											<input type="file" name="surat_pernyataan">
										</div>
										<iframe src="/uploads/surat_pernyataan/{{$dt->surat_pernyataan}}" style="width: 100%; height: 450px"></iframe>
									</div>
						        </div>
						        <div class="modal-footer">
									@if(Auth::user()->ket=='Super Admin' || Auth::user()->ket==$cek1 && Auth::user()->ket2==$cek2)
							        	<button type="button" class="btn btn-link" data-dismiss="modal">Close</button>	
										<button type="submit" class="btn btn-primary">Simpan</button>
									@endif
						        </div>
					        </form>
				    	</div>
				    </div>
				</div>
				<!--End The Modal-->
				@endforeach
			</tbody>
		</table>
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
</script>
@endsection