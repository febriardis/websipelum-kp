@extends('layouts_views.layout_admin')

@section('link')
	<li class="active"></li>
@endsection

@section('content')
	<!-- Advanced login -->
	<form action="/login admin" method="POST">
		{{ csrf_field() }}
		<div class="login-form">
			<div class="text-center">
				<img src="/assets/images/logo-uin.png" style="width: 35%; max-height: 165px">
				<h5 class="content-group-lg">Admin<small class="display-block">Masukan username dan password</small></h5>
			</div>
			@if(Session::has('pesan'))
				<div class="alert alert-danger">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					{{ Session::get('pesan') }} !
				</div>
			@endif
			<div class="form-group has-feedback has-feedback-left">
				<input type="text" class="form-control input-lg" autocomplete="off" name="username" required="" placeholder="Username">
				<div class="form-control-feedback">
					<i class="icon-user text-muted"></i>
				</div>
			</div>
			<div class="form-group has-feedback has-feedback-left">
				<input type="password" class="form-control input-lg" name="password" required="" placeholder="Password">
				<div class="form-control-feedback">
					<i class="icon-lock2 text-muted"></i>
				</div>
			</div>
			<div class="form-group">
				<button type="submit" class="btn bg-blue btn-block btn-lg">Login <i class="icon-arrow-right14 position-right"></i></button>
			</div>
	</form>
	<!-- /advanced login -->
@endsection