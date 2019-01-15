@extends('layouts_views.layout_user')

@section('banner')
	@if(count($banners)!=0)
		<!-- Slideshow -->
		<div id="demo" class="carousel slide" data-ride="carousel">
		  	<ul class="carousel-indicators" id="li-carousel">
		  		@foreach($banners as $i => $banner)
			    <li data-target="#demo" data-slide-to="0" class="@if($i == 0) {{ 'active' }} @endif"></li>
			    @endforeach
		  	</ul>
		  	<div class="carousel-inner">
		  		@foreach($banners as $i => $banner)
			    <div class="carousel-item @if($i == 0) {{ 'active' }} @endif">
			      	<img src="/uploads/gambar-slide/{{$banner->image}}" alt="image not found" width="1100" height="500">
			      	<div class="carousel-caption capt-carousel">
			      		<h3>{{$banner->head_caption}}</h3>
				       	<p>{{$banner->body_caption}}</p>
			      	</div>   
			    </div>
			    @endforeach
		  	</div>
		  	<a class="carousel-control-prev" href="#demo" data-slide="prev">
		    	<span class="carousel-control-prev-icon"></span>
		  	</a>
		  	<a class="carousel-control-next" href="#demo" data-slide="next">
		    	<span class="carousel-control-next-icon"></span>
		  	</a>
		</div>
		<!-- /Slideshow -->
		<script>
	  		$('#li-carousel li:first').tab('show');  

	  		$('#carousel-in div:first').tab('active');  
	 	</script>
	@endif
@endsection

@section('content')
	<!-- Content -->
	<div class="content" style="margin-top: 50px; min-height: 450px;">
		<div class="content-info">
			<div class="list-content-berita">
				<h5 style="margin: 8px">Berita Terbaru</h5>
			</div>
			@if(count($contents)!=0)
				@foreach($contents as $content)
				<div class="content-info-item" style="margin: 20px 0px">
					<h4><a href="javascript::void(0)" onclick="rmore{{$content->id}}()" class="link-content">{{ $content->title }}</a></h4>
					<p class="text-muted" id="main">posted {{date('M d, Y', strtotime($content->created_at))}}</p>
					<div id="a{{$content->id}}">
						<p>{!! str_limit(strip_tags($content->content), 200) !!}</p>
	    				<a href="javascript:void(0)" onclick="rmore{{$content->id}}()">Read more >></a>
					</div>
					<div id="b{{$content->id}}" style="display: none;">
						<p>{!! $content->content !!}</p>
	    				<a href="javascript:void(0)" onclick="rless{{$content->id}}()">Read less >></a>
					</div>
				</div>			
				<hr style="border: 1px solid #e6e6e6">
				<script>
					function rmore{{$content->id}}(){
						document.getElementById('a{{$content->id}}').style.display='none';
						document.getElementById('b{{$content->id}}').style.display='block';
					}
					function rless{{$content->id}}(){
						document.getElementById('a{{$content->id}}').style.display='block';
						document.getElementById('b{{$content->id}}').style.display='none';
					}
				</script>
				@endforeach
			@else
				<div class="alert alert-info">
					<h4>No items found</h4>
			    </div>
			@endif
		</div>

		<div class="content-sidebar">
			<div class="content-agenda">
				<div class="list-content-berita">
					<h5 style="margin: 8px">Agenda Terbaru</h5>
				</div>
				<ul style="margin: 20px 0px">
				@foreach($agendasT as $agenda)
					<li><a href="javascript:void(0)">{{$agenda->nm_agenda}}</a>&nbsp;<span class="text-muted">{{ date('F d, Y', strtotime($agenda->tgl_agenda)) }}</span></li>
					<hr>
				@endforeach
				</ul>
			</div>
			<div class="content-count">
				<div class="list-content-berita">
					<h5 style="margin: 8px">Agenda Terakhir</h5>
				</div>
				<ul style="margin: 20px 0px">
					@foreach($agendasL as $agenda)
						<li><a href="javascript:void(0)">{{$agenda->nm_agenda}}</a>&nbsp;<span class="text-muted">{{ date('F d, Y', strtotime($agenda->tgl_agenda)) }}</span></li>
						<hr>
					@endforeach
				</ul>
			</div>
		</div>
		<div class="clear"></div>
	</div>
	<!-- /Content -->
@endsection