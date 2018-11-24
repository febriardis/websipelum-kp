@extends('layouts_views.layout_admin')

@section('content')
<!-- Content -->
<div class="content">	
	<div class="panel panel-flat" style="width: 85%; margin: 0px auto;">
		<div class="panel-heading" style="margin: 30px 0px;">
			<h4 class="panel-title" style="text-transform: capitalize;">Pendaftaran Bakal Calon Ketua <br> Agenda {{ $tb->nm_agenda }}</h4>
			<hr>
		</div>
		@if(Session::has('pesanEr'))
			<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				{{ Session::get('pesanEr') }} !
			</div>
		@endif
		<div class="panel-body">
			<form action="/tambah kandidat/{{$tb->id}}" method="POST" enctype="multipart/form-data">
			{{csrf_field()}}
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">NIM</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" required="" name="nim" placeholder="NIM Calon Kandidat">
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
			<div style="float: right;">
				<input type="submit" value="Daftar" class="btn btn-primary">
				<a href="{{URL::previous()}}" class="btn btn-danger">Batal</a>
			</div>
			<div class="clear"></div>
		</form>
		</div>

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