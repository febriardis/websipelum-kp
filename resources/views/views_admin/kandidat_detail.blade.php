@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Detail Kandidat</li>
@endsection

@section('content')

<div class="content">
	<form action="/terima kandidat/{{$tbMhs->id}}/{{$idAgenda}}" method="POST" class="form-horizontal" >
		{{ csrf_field() }}
		<div class="panel panel-flat" style="padding: 50px">
			<div class="panel-heading" style="text-align: center;">
				<h4 style="text-transform: capitalize;">Detail Kandidat</h4>
			<hr>
			</div>
			
			<div class="panel-body">
				<h5 style="text-transform: capitalize;">I. BIODATA DIRI</h5>
				<div class="form-group">
					<label class="col-lg-3 control-label">Foto</label>
					<div class="col-lg-9">
					<img src="/uploads/foto-kandidat/{{$tbMhs->foto}}" width="90" height="100">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-3 control-label">Nama</label>
					<div class="col-lg-9">
						<input type="text" name="nama" class="form-control" value="{{$tbMhs->nama}}" readonly="readonly">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-3">Jenis Kelamin</label>
					<div class="col-lg-9">
						<label><input type="radio" name="jen_kelamin" required="" readonly="" value="lk" {{{ ($tbMhs->jen_kelamin == 'lk' ? 'checked' : '') }}}> Laki-laki</label><br>
						<label><input type="radio" name="jen_kelamin" required="" readonly="" value="pr" {{{ ($tbMhs->jen_kelamin == 'pr' ? 'checked' : '') }}}> Perempuan</label>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-lg-3">Tempat, Tanggal Lahir</label>
					<div class="col-lg-9">
						<input type="text" class="form-control" required="" readonly="" name="tmp_lahir" value="{{$tbMhs->tmp_lahir}}" style="width: 30%;float: left;">
						<input type="date" name="tgl_lahir" required="" readonly="" class="form-control" value="{{$tbMhs->tgl_lahir}}" style="width: 30%;float: left;">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">NIM</label>
					<div class="col-lg-9">
						<input type="text" name="nama" class="form-control" readonly="" value="{{$tbMhs->nim}}" readonly="readonly">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-3 control-label">Jurusan/Fakultas</label>
					<div class="col-lg-4">
						<input type="text" name="nama" class="form-control" readonly="" value="{{$tbMhs->jurusan}}" readonly="readonly">
					</div>
					<div class="col-lg-4">
						<input type="text" name="nama" class="form-control" readonly="" value="{{$tbMhs->fakultas}}" readonly="readonly">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Agama</label>
					<div class="col-lg-9">
						<input type="text" name="nama" class="form-control" readonly="" value="{{$tbMhs->agama}}" readonly="readonly">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">No Hp</label>
					<div class="col-lg-9">
						<input type="text" name="nama" class="form-control" readonly="" value="{{$tbMhs->no_hp}}" readonly="readonly">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Email</label>
					<div class="col-lg-9">
						<input type="text" name="nama" class="form-control" readonly="" value="{{$tbMhs->email}}" readonly="readonly">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">No Hp</label>
					<div class="col-lg-9">
						<input type="text" name="nama" class="form-control" readonly="" value="{{$tbMhs->no_hp}}" readonly="readonly">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Media Sosial</label>
					<div class="col-lg-9">
						<label>Facebook : {{$tbMhs->medsos1}}</label><br>
						<label>Twitter : {{$tbMhs->medsos2}}</label><br>
						<label>Instagram : {{$tbMhs->medsos3}}</label>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-lg-3 control-label">Blog/Website</label>
					<div class="col-lg-9">
						<input type="text" name="nama" class="form-control" readonly="" value="{{$tbMhs->blog}}" readonly="readonly">
					</div>
				</div>

				<div class="form-group">
					<label class="control-label col-lg-3">Anak Ke-</label>
					<div class="col-lg-2">
						<input type="text" class="form-control" readonly="" required="" value="{{$tbMhs->anak_ke}}" name="anak_ke">
					</div>
					<label class="control-label col-lg-1">dari - </label>
					<div class="col-lg-2">
						<input type="text" class="form-control" readonly="" required="" value="{{$tbMhs->jum_saudara}}" name="jum_saudara">
					</div>
					<label class="control-label col-lg-1">Saudara</label>
				</div>

				<div class="form-group">
					<label class="col-lg-3 control-label">Asal SMA</label>
					<div class="col-lg-9">
						<input type="text" name="nama" class="form-control" readonly="" value="{{$tbMhs->asal_sma}}" readonly="readonly">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Asal Daerah</label>
					<div class="col-lg-9">
						<input type="text" name="nama" class="form-control" readonly="" value="{{$tbMhs->asal_daerah}}" readonly="readonly">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Motto Hidup</label>
					<div class="col-lg-9">
						<input type="text" name="nama" class="form-control" readonly="" value="{{$tbMhs->motto}}" readonly="readonly">
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Motivasi Jadi Ketua</label>
					<div class="col-lg-9">
						<textarea class="form-control" readonly="" rows="4">{{$tbMhs->motivasi}}</textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Visi</label>
					<div class="col-lg-9">
						<p>&quot;{{$tbMhs->visi}}&quot;</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-lg-3 control-label">Misi</label>
					<div class="col-lg-9">
						<p>{!! $tbMhs->misi !!}</p>
					</div>
				</div>
				
				<hr>
				<h5 style="text-transform: capitalize;">II. DAFTAR RIWAYAT HIDUP</h5>
				<div class="form-group">
					<a href="/uploads/temp_riwayat_hidup/{{$tbMhs->riwayat_hidup}}" download="">Download</a><br>
					<embed src="/uploads/riwayat_hidup/{{$tbMhs->riwayat_hidup}}" style="width: 100%; height: 600px;border: 1px solid black"></embed>
				</div>

				<hr>
				<h5 style="text-transform: capitalize;">Lampiran</h5>
				<h6 style="text-transform: capitalize;">Transkrip Nilai : </h6>
				<div class="form-group">
					<a href="/uploads/temp_riwayat_hidup/{{$tbMhs->transkrip_nilai}}" download="">Download</a><br>
					<embed src="/uploads/transkrip_nilai/{{$tbMhs->transkrip_nilai}}" style="width: 100%; height: 600px; border: 1px solid black"></embed>
				</div>
			</div>
			<div class="panel-footer">
					<div class="text-right">
					<a href="{{ URL::previous() }}" class="btn btn-default"><i class="icon-undo2"></i>&nbsp;Kembali</a>
					<div style="display: none;">
					{{! $cekAdmin = (\App\Agenda::find($idAgenda))->admin_id,
						$cekkat1Admin = (\App\Admin::find($cekAdmin))->ket,
						$cekkat2Admin = (\App\Admin::find($cekAdmin))->ket2
					}}
					{{! $cekTgl = \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d') }}
					{{! $cekTglFilter = (App\Agenda::find($idAgenda))->tgl_filtering }}
					</div>
					@if(Auth::user()->id==$cekAdmin || Auth::user()->ket==$cekkat1Admin && Auth::user()->ket2==$cekkat2Admin)
						@if($cekTgl == $cekTglFilter)
							<button type="submit" class="btn btn-primary">Terima</button>
							<a href="/tolak kandidat/{{$tbMhs->id}}/{{$idAgenda}}" class="btn btn-danger">Tolak</a>
						@else
							<a href="javascript::void(0)" class="btn btn-primary" id="pnotify-solid-danger">Terima</a>
							<a href="javascript::void(0)" class="btn btn-danger" id="pnotify-solid-danger">Tolak</a>
						@endif
					@endif
				</div>
			</div>
		</div>
	</form>
	<!-- /basic layout -->
</div>
@endsection