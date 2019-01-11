@extends('layouts_views.layout_admin')

@section('content')
<!-- Content -->
<div class="content">	
	<div class="panel panel-flat" style="width: 85%; margin: 0px auto;">
		<div class="panel-heading" style="margin: 30px 0px; text-align: center;">
			<h4 style="text-transform: capitalize;">Formulir Pendaftaran Calon Ketua <br> Agenda {{ $tb->nm_agenda }}</h4>
			<hr>
		</div>
		@if(Session::has('pesanEr'))
			<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ Session::get('pesanEr') }} !
			</div>
		@endif
		<div class="panel-body">
			<form action="/tambah kandidat/{{$tb->id}}" method="POST" enctype="multipart/form-data" style="margin: 50px">
				<h5 style="text-transform: capitalize;">I. BIODATA DIRI</h5>
				{{csrf_field()}}
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-4">NIM</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" required="" name="nim" value="">
						</div>
					</div>
				</div>
				<!-- <div class="form-group">
					<div class="row">
						<label class="control-label col-sm-4">Nama</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" required="" name="nama" value="">
						</div>
					</div>
				</div> -->
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-4">Jenis Kelamin</label>
						<div class="col-sm-8">
							<label><input type="radio" name="jen_kelamin" required="" value="lk"> Laki-laki</label><br>
							<label><input type="radio" name="jen_kelamin" required="" value="pr"> Perempuan</label>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-4">Tempat, Tanggal Lahir</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" required="" name="tmp_lahir" style="width: 30%;float: left;">
							<input type="date" name="tgl_lahir" required="" class="form-control" style="width: 30%;float: left;">
						</div>
					</div>
				</div>
<!-- 				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-4">NIM</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" required="" name="nim" value="{{Auth::user()->nim}}">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<label class="col-sm-4 control-label">Jurusan/Fakultas</label>
						<div class="col-sm-4" id="main">
							<select class="select" id="fakultas" name="fakultas" required="" data-placeholder="Pilih Fakultas">
								{{! $Faks = (App\Fakultas::all()) }}
								<option></option>
							@foreach($Faks as $fak)
								<option value="{{$fak->nm_fakultas}}">{{$fak->nm_fakultas}}</option>
							@endforeach
							</select>
						</div>
					</div>
				</div>
 -->
				<!-- {{! $cekFak = (App\Fakultas::all()) }}
				<script type="text/javascript">
				$(document).ready(function() {
				    $("#fakultas").change(function(){
				    	// CREATE A "DIV" ELEMENT.
			        	var container = document.createElement("div");
			        	container.className="col-sm-4";
			        	
			        	@foreach($cekFak as $d)
				       	if ($(this).val() == "{{$d->nm_fakultas}}"){
				       		{{! $Jurs = (App\Jurusan::where('fak_id', $d->id))->get() }}
			                // ADD TEXTBOX.
			            	$('#a').remove(); 
			                $(container).append('<select style="font-size:14px" class="form-control" name="jurusan" id="a" required="">'+
			                	'<option hidden>Pilih Jurusan</option>'+
								@foreach($Jurs as $jur)
								'<option>{{$jur->nm_jurusan}}</option>'+
								@endforeach
			                	'</select>'
			                );
			                // ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.
			                $('#main').after(container);
			            }
			            @endforeach

			            else if ($(this).val() == "Semua Mahasiswa"){
			            	$('#a').remove(); 
			            }
				    });
				});
				</script> -->

				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-4">Foto</label>
						<div class="col-sm-8">
							<span class="text-danger">{{ $errors->first('foto')}}</span> 
							<input type="file" name="foto" accept="image/*" onchange="readURL(this);" required="">
		      				<span class="help-block"><i> max 2MB </i></span>
		      	          	<!-- js show image -->
					        <script type="text/javascript">
					            function readURL(input) {
					              if (input.files && input.files[0]) {
					                var reader = new FileReader();

					                reader.onload = function(e) {
					                  $('#cek-gambar')
					                    .attr('src', e.target.result);
					                };
					                reader.readAsDataURL(input.files[0]);
					              }
					            }
					        </script>
					        <!--end-->
					        <div class="showimage">
					            <img id="cek-gambar" src="#" alt="" width="100%" height="100%">
					        </div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-4">Agama</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" required="" name="agama">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-4">No Hp</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" required="" name="no_hp">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-4">Email</label>
						<div class="col-sm-8">
							<input type="email" class="form-control" required="" name="email">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-4">Media Sosial</label>
						<div class="col-sm-8">
							<div class="row">
								<label class="control-label col-sm-2">Facebook</label>
								<input type="text" class="form-control" style="width: 40%" required="" name="medsos1">
							</div>
							<div class="row">
								<label class="control-label col-sm-2">Twitter</label>
								<input type="text" class="form-control" style="width: 40%" required="" name="medsos2">
							</div>
							<div class="row">
								<label class="control-label col-sm-2">Instagram</label>
								<input type="text" class="form-control" style="width: 40%" required="" name="medsos3">
							</div>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-4">Blog/Website</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" required="" name="blog">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-4">Anak Ke-</label>
						<div class="col-sm-2">
							<input type="text" class="form-control" required="" name="anak_ke">
						</div>
						<label class="control-label col-sm-1">dari - </label>
						<div class="col-sm-2">
							<input type="text" class="form-control" required="" name="jum_saudara">
						</div>
						<label class="control-label col-sm-1">Saudara</label>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-4">Asal SMA</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" required="" name="asal_sma">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-4">Asal Daerah</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" required="" name="asal_daerah">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-4">Motto Hidup</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" required="" name="motto">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-4">Motivasi jadi Ketua </label>
						<div class="col-sm-8">
							<textarea class="form-control" required="" name="motivasi" rows="4"></textarea>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-4">Transkrip Nilai</label>
						<div class="col-sm-8">
							<span class="text-danger">{{ $errors->first('transkrip_nilai')}}</span> 
							<input type="file" required="" name="transkrip_nilai">
							<span class="help-block"><i> max 2MB </i></span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-4">Visi</label>
						<div class="col-sm-8">
							<input type="text" required="" autocomplete="off" name="visi" class="form-control" placeholder="Masukan visi anda">
						</div>
					</div>
				</div>
					<!-- <div class="form-group">
					<div class="row">
						<label class="control-label col-sm-4">Misi</label>
						<div class="col-sm-8">
							<div>
								<p class="text-muted" style="float: left;">*click the (+) or (-) button.</p>
								<a href="javascript:void(0)" id="btRemove" class="btn-misi"><i class='fas fa-minus' style=""></i></a>
								<a href="javascript:void(0)" id="btAdd" class="btn-misi"><i class='fas fa-plus' style=""></i></a>
								<div class="clear"></div>	
							</div>
							<div id="main"></div>
						</div>
					</div>
				</div>	 -->
				<div class="form-group">
					<div class="row">
						<label class="control-label col-sm-4">Misi</label>
						<div class="col-sm-8">
							<textarea name="misi" required="" class="ckeditor" id="ckedtor"></textarea>
						</div>
					</div>
				</div>

				<hr>
				<h5 style="text-transform: capitalize;">II. DAFTAR RIWAYAT HIDUP</h5>
				<div class="form-group">
					<div class="row">
						<div class="col-sm-4"></div>
						<div class="col-sm-8">
							<span class="text-danger">{{ $errors->first('riwayat_hidup')}}</span> 
							<input type="file" name="riwayat_hidup" required=""><br>
							<a href="/uploads/temp_riwayat_hidup/{{$tb->temp_riwayat_hidup}}" download="">Download Template</a><br>
						</div>
					</div>
				</div>
				<hr>
				<div class="form-group form-check">
					<div class="row">
						<label class="control-label col-sm-4"></label>
						<div class="col-sm-8">
				    		<label class="form-check-label">
								<input type="checkbox" name="" required=""> Saya menyetujui <a href="javascript::void(0)" data-toggle="modal" data-target="#myModalTerms">kebijakan &amp; persyaratan</a> pencalonan.
							</label>
							<br>
							<label class="form-check-label">
								<input type="checkbox" name="" required=""> Saya menyetujui <a href="javascript::void(0)" data-toggle="modal" data-target="#myModalSP">surat pernyataan</a> pencalonan.
							</label>
						</div>
					</div>
				</div>

				<div class="right">
					<input type="submit" value="Daftar" class="btn btn-primary">
					<a href="{{URL::previous()}}" class="btn btn-danger">Batal</a>
				</div>

				<div class="clear"></div>
			</form>

			<!-- The Modal -->
			<div class="modal fade" id="myModalTerms" role="dialog">
			    <div class="modal-dialog">
			    	<div class="modal-content">
				        <!-- Modal Header -->
				        <div class="modal-header">
				        	<h6 class="modal-title">Kebijakan dan persyaratan pencalonan</h6>
				        	<button type="button" class="close" data-dismiss="modal">&times;</button>
				        </div>
				        
				        <!-- Modal body -->
				        <div class="modal-body">
				        	{!! $tb->syaratketentuan !!}
				        </div>

				        <div class="modal-footer"> 	
				        	<button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
				        </div>
			    	</div>
			    </div>
			</div>
			<!--End The Modal-->

			<!-- The Modal -->
			<div class="modal fade" id="myModalSP">
			    <div class="modal-dialog modal-lg">
			    	<div class="modal-content">
				        <!-- Modal Header -->
				        <div class="modal-header">
				        	<h6 class="modal-title">Surat Pernyataan Calon Ketua</h6>
				        	<button type="button" class="close" data-dismiss="modal">&times;</button>
				        </div>
				        
				        <div class="modal-body">
			       			<div class="form-group">
								<!-- <iframe src="/uploads/surat_pernyataan/{{$tb->surat_pernyataan}}" style="width: 100%; height: 450px"></iframe> -->
								<embed src="/uploads/surat_pernyataan/{{$tb->surat_pernyataan}}" style="width: 100%; height: 450px; border: 1px solid black"></embed>
							</div>
				        </div>
				        <div class="modal-footer"> 	
				        	<button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
				        </div>
			    	</div>
			    </div>
			</div>
			<!--End The Modal-->

			<script type="text/javascript">
				$('#myModalTerms').modal('show');

			    $(document).ready(function() {
			        var iCnt = 0;
			        // CREATE A "DIV" ELEMENT.
			        var container = $(document.createElement('div'));
			        $('#btAdd').click(function() {
			                iCnt++;
			                // ADD TEXTBOX.
			                $(container).append('<input type=text name="misi" class="form-control" id=misi'+iCnt+' '+'placeholder="Misi ' + iCnt + '" />');
			                // ADD BOTH THE DIV ELEMENTS TO THE "main" CONTAINER.
			                $('#main').after(container);
			        });

			        // REMOVE ONE ELEMENT PER CLICK.
			        $('#btRemove').click(function() {
			            if (iCnt != 0) { 
			            	$('#misi' + iCnt).remove(); 
			            	iCnt--; 
			            }
			        });
			    });
			</script>
		</div>
	</div>
</div>
<!-- /Content -->

@endsection