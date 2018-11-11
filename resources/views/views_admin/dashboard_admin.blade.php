@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Dashboard</li>
@endsection

@section('content')
	<!-- Quick stats boxes -->
	<div class="row">
		<a href="/tabel agenda">
			<div class="col-lg-4">
				<!-- Members online -->
				<div class="panel bg-teal-400">
					<div class="panel-body">
						<div class="heading-elements">
							<span class="heading-text badge bg-teal-800">+53,6%</span>
						</div>
						<h3 class="no-margin">3,450</h3>
						Agenda Pemilu
						<div class="text-muted text-size-small">489</div>
					</div>

					<div class="container-fluid">
						<div id="members-online"></div>
					</div>
				</div>
				<!-- /members online -->
			</div>
		</a>

		<a href="/tabel mahasiswa">
			<div class="col-lg-4">
				<!-- Current server load -->
				<div class="panel bg-pink-400">
					<div class="panel-body">
						<div class="heading-elements">
							<span class="heading-text badge bg-teal-800">+53,6%</span>
						</div>

						<h3 class="no-margin">49.4%</h3>
						Data Mahasiswa
						<div class="text-muted text-size-small">34.6%</div>
					</div>

					<div id="server-load"></div>
				</div>
				<!-- /current server load -->
			</div>
		</a>

		<a href="/tabel admin">
			<div class="col-lg-4">
				<!-- Today's revenue -->
				<div class="panel bg-blue-400">
					<div class="panel-body">
						<div class="heading-elements">
							<ul class="icons-list">
							<span class="heading-text badge bg-teal-800">+53,6%</span>
		                	</ul>
	                	</div>

						<h3 class="no-margin">18,390</h3>
						Berita Acara
						<div class="text-muted text-size-small">37,578</div>
					</div>

					<div id="today-revenue"></div>
				</div>
				<!-- /today's revenue -->
			</div>
		</a>
	</div>
	<!-- /quick stats boxes -->

	<!-- Streamgraph chart -->
	<div class="panel panel-flat">
		<div class="panel-heading">

		</div>

		<div class="panel-body">
			<p class="content-group">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum..</p>

			<div class="chart-container">
				<div class="chart" id="d3-streamgraph"></div>
			</div>
		</div>
	</div>
	<!-- /streamgraph chart -->
@endsection