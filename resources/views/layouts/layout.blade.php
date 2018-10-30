<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sipemlu</title>

	<script type="text/javascript" src="chartjs/Chart.bundle.js"></script>

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
	<script type="text/javascript" src="/assets/js/core/app.js"></script>
	<script type="text/javascript" src="/assets/js/pages/form_layouts.js"></script>
	<!-- /theme JS files -->

		<!-- Theme JS files -->
	<script type="text/javascript" src="/assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="/assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="/assets/js/pages/datatables_basic.js"></script>
	<!-- /theme JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="/assets/js/plugins/visualization/echarts/echarts.js"></script>
	<script type="text/javascript" src="/assets/js/charts/echarts/columns_waterfalls.js"></script>
	<script type="text/javascript" src="/assets/js/charts/echarts/timeline_option.js"></script>
	<!-- /theme JS files -->

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
							<span>{{ Auth::user()->nama }}</span>
							<i class="caret"></i>
						</a>

						<ul class="dropdown-menu dropdown-menu-right">
							<li><a href="#"><i class="glyphicon glyphicon-user"></i> {{ Auth::user()->ket }}</a></li>
							<li class="divider"></li>
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
									<span class="media-heading text-semibold">{{ Auth::user()->nama }}</span>
									<div class="text-size-mini text-muted">
										{{ Auth::user()->username }}
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
								<li><a href="/dashboard"><i class="icon-home4"></i> <span>Dashboard</span></a></li>
								<li>
									<a href="#"><i class="glyphicon glyphicon-user"></i> <span>Admin Pemilu</span></a>
									<ul>
										<li><a href="/tambah admin">Tambah Admin</a></li>
										<li><a href="/tabel admin">Data Admin</a></li>
									</ul>
								</li>
								<li>
									<a href="/tabel mahasiswa"><i class="icon-database2"></i> <span>Data Mahasiswa</span></a>
								</li>								
								<li>
									<a href="#"><i class="icon-clipboard3"></i> <span>Agenda</span></a>
									<ul>
										<li><a href="/tambah agenda">Tambah Agenda</a></li>
										<li><a href="/tabel agenda">Data Agenda</a></li>
									</ul>
								</li>
								<li>
									<a href="/quick count"><i class="icon-stats-bars2"></i> <span>Quick Count</span></a>
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
								<span> {{ date('l, d M Y', strtotime(\Carbon\Carbon::now('Asia/Jakarta'))) }}</span>
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
						&copy; 2018. <a href="" target="_blank">UIN Sunan Gunung Djati Bandung</a>
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