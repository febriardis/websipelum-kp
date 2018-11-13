@extends('layouts_views.layout_user')

@section('content')
<!-- Content -->
<div class="content">	
	<div style="width: 80%; margin: 20px auto">
		<div style="margin: 30px 0px;">
			<h4>Pendaftaran Bakal Calon Ketua .....</h4>
			<hr>
		</div>
		<form action="" method="">
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">NIM</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" readonly="readonly" value="{{Auth::user()->nim}}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">Nama</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" readonly="readonly" value="{{Auth::user()->nama}}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">Jurusan</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" readonly="readonly" value="{{Auth::user()->jurusan}}">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">IPK</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" placeholder="Masukan nilai IPK anda">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">Transkrip Nilai</label>
					<div class="col-sm-8">
						<input type="file">
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">Visi</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" placeholder="Masukan visi anda">
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
						<textarea name="deskripsi" class="ckeditor" id="ckedtor"></textarea>
					</div>
				</div>
			</div>
			<div class="right">
				<input type="submit" value="Daftar" class="btn btn-primary">
				<a href="/daftar calon" class="btn btn-danger">Batal</a>
			</div>

			<div class="clear"></div>
		</form>

		<script type="text/javascript">
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