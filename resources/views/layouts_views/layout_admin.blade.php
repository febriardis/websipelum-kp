<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin Sipelum</title>

	<link rel="stylesheet" type="text/css" href="/css/styleAdmin.css">

	<script type="text/javascript" src="/ckeditor/ckeditor.js"></script>	

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="/assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/icons/fontawesome/styles.min.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="/assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="/assets/js/plugins/ui/prism.min.js"></script>
	<script type="text/javascript" src="/assets/js/core/app.js"></script>
	<script type="text/javascript" src="/assets/js/charts/echarts/bars_tornados.js"></script>
	<!-- /theme JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="/assets/js/plugins/visualization/d3/d3.min.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/visualization/d3/d3_tooltip.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/forms/styling/switchery.min.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/forms/selects/bootstrap_multiselect.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/pickers/daterangepicker.js"></script>
	<script type="text/javascript" src="/assets/js/pages/dashboard.js"></script>
	<!-- /theme JS files -->

	<!-- Core JS files -->
	<script type="text/javascript" src="/assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="/assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="/assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="/assets/js/pages/form_layouts.js"></script>
	<!-- /theme JS files -->

		<!-- Theme JS files -->
	<script type="text/javascript" src="/assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="/assets/js/pages/datatables_basic.js"></script>
	<!-- /theme JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="/assets/js/plugins/ui/dragula.min.js"></script>
	<script type="text/javascript" src="/assets/js/pages/extension_dnd.js"></script>
	<!-- /theme JS files -->
	
	<script type="text/javascript" src="/assets/js/core/app.js"></script>
	
</head>

<body class="sidebar-xs">
	@guest
	<!-- Main navbar -->
	<div class="navbar navbar-default header-highlight">
		<div class="container ">
			<a class="navbar-brand" href="/"><img src="/assets/images/icon.png" style="width: 75%; height: 35px; margin-top: -10px" alt=""></a>
		</div>
	</div>
	<!-- /Main navbar -->
	<div class="login-container">
		<!-- Page container -->
		<div class="page-container">
			<!-- Page content -->
			<div class="page-content">
				<!-- Main content -->
				<div class="content-wrapper">	
					<!-- Content area -->
					<div class="content">
						
						@yield('content')

						<!-- Footer -->
						<div class="footer text-muted">
							<div class="container">
								&copy; 2018. <a href="" target="_blank">UIN Sunan Gunung Djati Bandung</a>
							</div>
						</div>
						<!-- /footer -->
					</div>
					<!-- /Content area -->
				</div>
				<!-- /main content -->
			</div>
			<!-- /page content -->
		</div>
		<!-- /page container -->
	</div>

	@else
	<!-- Main navbar -->
	<div class="navbar navbar-default header-highlight">
		<div class="navbar-header ">
			<a class="navbar-brand" href=""><img src="/assets/images/icon.png" style="width: 75%; height: 35px; margin-top: -10px"alt=""></a>
			<ul class="nav navbar-nav pull-right visible-xs-block">
				<li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li>
					<a class="sidebar-control sidebar-main-toggle hidden-xs" data-popup="tooltip" title="Collapse main" data-placement="bottom" data-container="body">
						<i class="icon-paragraph-justify3"></i>
					</a>
				</li>
			</ul>
			<a class="navbar-brand" href=""><img src="/assets/images/icon.png" style="width: 75%; height: 35px; margin-top: -10px" alt=""></a>
			<div class="navbar-right">
				<ul class="nav navbar-nav">
					<li class="dropdown dropdown-user">
						<a class="dropdown-toggle" data-toggle="dropdown">
							<span style="text-transform: capitalize;"><i class="glyphicon glyphicon-user"></i>&nbsp;{{ Auth::user()->nama }}&nbsp;|&nbsp;Admin&nbsp;{{ Auth::user()->ket }}. {{ Auth::user()->ket2 }} </span>
							<i class="caret"></i>
						</a>

						<ul class="dropdown-menu dropdown-menu-right">
							<li><a href="/keluar"><i class="glyphicon glyphicon-log-out"></i> Keluar</a></li>
						</ul>
					</li>					
				</ul>
			</div>
		</div>
	</div>
	<!-- /main navbar -->

	<!-- Page container -->
	<div class="page-container">
		<!-- Page content -->
		<div class="page-content">
			<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-default">
				<div class="sidebar-content">
					<!-- User menu -->
					<div class="sidebar-user">
						<div class="category-content">
							<div class="media">
								<div class="media-body">
									<span style="text-transform: capitalize;" class="media-heading text-semibold">{{ Auth::user()->nama }}</span>
									<div style="text-transform: capitalize;" class="text-size-mini text-muted">
										{{ Auth::user()->ket }}.{{ Auth::user()->ket2 }}
									</div>
								</div>

								<div class="media-right media-middle">
									<ul class="icons-list">
										<li>
											<a href="#"><i class="icon-cog3"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- /user menu -->

					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main Menu</span> <i class="icon-menu" title="Main Menu"></i></li>
								
								<li {{ (Request::is('dashboard') ? 'class=active' : '') }}><a href="/dashboard"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								@if(Auth::user()->ket=='Super Admin')
								<li>
									<a href="#"><i class="glyphicon glyphicon-user"></i> <span>Admin</span></a>
									<ul>
										<li {{ (Request::is('tambah admin') ? 'class=active' : '') }}><a href="/tambah admin">Tambah Admin</a></li>
										<li {{ (Request::is('tabel admin') ? 'class=active' : '') }}><a href="/tabel admin">Data Admin</a></li>
									</ul>
								</li>	
								<li>
									<a href="#"><i class="icon-newspaper"></i> <span>Konten Berita</span></a>
								</li>	
								@endif

								@if(Auth::user()->ket=='Super Admin')
								
								@elseif(Auth::user()->ket=='Sema U' || Auth::user()->ket=='Dema U')
								<li {{ (Request::is('organisasi univ/*') ? 'class=active' : '') }}>
									<a href="/organisasi univ/{{Auth::user()->ket}}"><i class="glyphicon glyphicon-th-large"></i> <span>Organisasi</span></a>
								</li>
								@else
								<li {{ (Request::is('organisasi/*/*') ? 'class=active' : '') }}>
									<a href="/organisasi/{{Auth::user()->ket}}/{{Auth::user()->ket2}}"><i class="glyphicon glyphicon-th-large"></i> <span>Organisasi</span></a>
								</li>
								@endif
								<li {{ (Request::is('pengajuan agenda') ? 'class=active' : '') }}>
									<a href="/pengajuan agenda"><i class="icon-clipboard3"></i><span>Pengajuan Agenda</span></a>
								</li>							
								<li {{ (Request::is('tabel agenda') ? 'class=active' : '') }}>
									<a href="/tabel agenda"><i class="icon-calendar"></i><span>Agenda</span></a>
								</li>
								<li {{ (Request::is('data quick count') ? 'class=active' : '') }}>
									<a href="/data quick count"><i class="icon-stats-bars2"></i> <span>Hitung Cepat</span></a>
								</li>
								<li {{ (Request::is('tabel mahasiswa') ? 'class=active' : '') }}>
									<a href="/tabel mahasiswa"><i class="icon-database2"></i> <span>Data Mahasiswa</span></a>
								</li>	
								<!-- /main -->
							</ul>
						</div>
					</div>
					<!-- /main navigation -->
				</div>
			</div>
			<!-- /main sidebar -->	

			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Page header -->
				<div class="page-header">
					<div class="breadcrumb-line breadcrumb-line-component bg-info">
						<ul class="breadcrumb">
							<li><a href="/dashboard"><i class="icon-home2 position-left"></i> Home</a></li>
							@yield('link')
						</ul>
						<div class="heading-elements">
							<button type="button" class="btn btn-info daterange-ranges heading-btn text-semibold">
								<i class="icon-calendar3 position-left"></i> 
								<span> {{ date('l, d F Y', strtotime(\Carbon\Carbon::now('Asia/Jakarta'))) }}</span>
							</button>
			           	</div>
					</div>
				</div>
				<!-- /page header -->

				<!--////////////////////////////////////Content////////////////////////////////////////////-->
				<!-- Content area -->
				<div class="content">
					@yield('content')
					<!-- Footer -->
					<div class="footer text-muted">
						&copy; 2018. <a href="http://ptipd.uinsgd.ac.id/" target="_blank">PTIPD UIN Sunan Gunung Djati Bandung</a>
					</div>
					<!-- /footer -->
				</div>
				<!-- /content area -->
			</div>
			<!-- /main content -->
		</div>
		<!-- /page content -->
	</div>
	<!-- /page container -->
	@endguest
</body>
</html>