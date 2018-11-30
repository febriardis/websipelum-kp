@extends('layouts_views.layout_user')

@section('content')
<!-- Content -->
<div class="content">	
	<div style="width: 80%; margin: 20px auto">
		<div style="margin: 30px 0px;">
			<h4 style="text-transform: capitalize;">Pendaftaran Bakal Calon Ketua <br> Agenda {{ $tb->nm_agenda }}</h4>
			<hr>
		</div>
		<form action="/daftar kandidat/{{$tb->id}}" method="POST" enctype="multipart/form-data">
			{{csrf_field()}}
			<span class="text-danger">{{ $errors->first('foto')}}</span> 
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">NIM</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" required="" name="nim" readonly="readonly" value="{{Auth::user()->nim}}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">Nama</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" required="" name="nama" readonly="readonly" value="{{Auth::user()->nama}}">
					</div>
				</div>
			</div>
			<input type="hidden" name="foto" value="{{Auth::user()->foto}}" readonly="readonly">
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">Jurusan</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" required="" name="jurusan" readonly="readonly" value="{{Auth::user()->jurusan}}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">Tahun Angkatan</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" required="" name="th_angkatan" readonly="readonly" value="{{Auth::user()->th_angkatan}}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">IPK</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" required="" placeholder="Masukan nilai IPK anda" name="ipk">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">Transkrip Nilai</label>
					<div class="col-sm-8">
						<input type="file" required="" name="transkrip">
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
			</div> -->	
			 <div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">Misi</label>
					<div class="col-sm-8">
						<textarea name="misi" required="" class="ckeditor" id="ckedtor"></textarea>
					</div>
				</div>
			</div>
			
			<div class="form-group form-check">
				<div class="row">
					<label class="control-label col-sm-4"></label>
					<div class="col-sm-8">
			    		<label class="form-check-label">
							<input type="checkbox" name="" required=""> Saya menyetujui <a href="javascript::void(0)" data-toggle="modal" data-target="#myModalTerms">kebijakan &amp; persyaratan</a> pencalonan.
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
		<div class="modal" id="myModalTerms" role="dialog">
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
<!-- /Content -->

@endsection