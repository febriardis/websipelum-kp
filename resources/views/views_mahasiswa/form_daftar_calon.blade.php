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
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">Misi</label>
					<div class="col-sm-8">
						<div>
							<a href="javascript:void(0)" class="btn-misi" onclick="addColumn()"><i class='fas fa-plus' style=""></i></a>
							<a href="javascript:void(0)" class="btn-misi" onclick="addFile()"><i class='fas fa-minus' style=""></i></a>
							<div class="clear"></div>	
						</div>
						<input type="text" class="form-control" id="misi" value="" placeholder="Misi 1">
					</div>
				</div>
			</div>
			
			<div class="form-group">
				<div class="row">
					<label class="control-label col-sm-4">Misi</label>
					<div class="col-sm-8">
						<textarea name="deskripsi" class="ckeditor" id="ckedtor"></textarea>
					</div>
				</div>
			</div>
			<input type="submit" value="Daftar" class="btn btn-primary right">
			<div class="clear"></div>
		</form>

		<script type="text/javascript">

			function removeElement(elementId) {
			    // Removes an element from the document
			    var element = document.getElementById("elementId");
			    element.parentNode.removeChild(element);
			}
			var id=1;
			function addColumn() {
			    id++;
			    var add = $('<input/>').attr({
			    	id: "d-"+id,
			        type: "text",
			        name:"misi",
			        class: "form-control",
			        placeholder: 'Misi '+id
			    });
			    var a = '<a href="javascript:void(0)" onclick="javascript:removeElement("d-'+id+'"); return false;">remove</a>';

				$("#misi").parent().append(add);
			}	
		</script>


	</div>
</div>
<!-- /Content -->

@endsection