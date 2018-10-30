@extends('layouts.layout')

@section('link')
	<li class="active">Nomor Urut</li>
@endsection

@section('content')
	<!-- Basic layout-->
	<form action="/tambah tps" method="POST" class="form-horizontal">
		{{ csrf_field() }}
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h5 class="panel-title">Penentuan Nomor Urut Paslon </h5>
			</div>

			<div class="panel-body">
				<div class="form-group">
					<label class="col-lg-3 control-label">Nama Agenda</label>
					<div class="col-lg-9">
						<select class="select" id="select" name="agenda_id" required="" data-placeholder="Pilih Agenda">
							<option value=""></option>
							@foreach($agenda as $dt)
							<option value="{{ $dt->id }}">{{ $dt->nm_agenda }}</option>
							@endforeach
						</select>
					</div>
				</div>

				<script type="text/javascript">
					var randomList = [];
					$(document).ready(function() {
					    $("#select").change(function(){
					    document.getElementById('list').innerText = "";
					        @foreach($agenda as $dt)
							if($(this).val() == "{{ $dt->id }}") {
				            	{{! $i = 0 }}
					        	@foreach($paslon as $t)  	
									@if($t->agenda_id == $dt->id)
			    						var c = document.createElement('div');
			    						c.innerText = {{ $t->id }};
			    						c.style.border = "1px solid black";
			    						c.style.width = "200px";
			    						c.style.float = "left";
			    						c.style.margin = "10px";
		  								randomList.push({{ $t->id }});
			    						document.getElementById('list').appendChild(c);
					            		{{ $i++ }}
					            	@endif
				            	@endforeach
				            }
				            @endforeach
					    });
					});
				</script>

				<input type="hidden" name="">
				
				<div class="form-group">
					<label class="col-lg-3 control-label"></label>
					<div class="col-lg-9">
						<div id="list">
							
						</div>
					</div>
				</div>

				<div class="text-right">
					<a class="btn btn-success text-left" id="Shuffle" onClick="shuffleList()">Random No Urut</a>
					<button type="submit" class="btn btn-primary">Simpan</button>
					<a href="/tabel agenda" class="btn btn-danger">Batal</a>
				</div>
			</div>
		</div>
	</form>
	<!-- /basic layout -->
	
	<script type="text/javascript">
		function updateList(wordsArr) {
		  	shuffleArr(wordsArr);
		  	var list = document.getElementById('list');
		  	list.innerHTML = "";
		  	for (var i =0; i < wordsArr.length; i++) {
			    var word = wordsArr[i];
			    var d = document.createElement('div');
			    d.style.border = "1px solid black";
			    d.style.width = "200px";
				d.style.float = "left";
				d.style.margin = "10px";
			    d.innerText = word;
			    list.appendChild(d);

			    var c = document.createElement('h3');
			    var h = document.createElement('h5');
			    c.innerText = "No Urut";
			    h.innerText = i+1;
			    d.appendChild(c);
  			    d.appendChild(h);

		  	}
		}

		function shuffleArr(arr) {
		    var j,
		        x,
		        i;
		    for (var i = arr.length; i; i--) {
		        j = Math.floor(Math.random() * i);
		        x = arr[i - 1];
		        arr[i - 1] = arr[j];
		        arr[j] = x;
		    }
		}

		function shuffleList() {
		  	var list = randomList;
		  	updateList(list);
		}
	</script>
@endsection

