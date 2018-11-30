@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Dashboard</li>
@endsection

@section('content')
<div style="margin-top: 20px">
	<!-- Quick stats boxes -->
	<div class="row">
		<a href="/tabel agenda">
			<div class="col-lg-3">
				<!-- Members online -->
				<div class="panel bg-teal-300">
					<div class="panel-body">
						<h3 class="no-margin">3,450</h3>
						Agenda
					</div>
				</div>
				<!-- /members online -->
			</div>
		</a>
		<a href="/tabel mahasiswa">
			<div class="col-lg-3">
				<!-- Current server load -->
				<div class="panel bg-pink-400">
					<div class="panel-body">
						<h3 class="no-margin">3,450</h3>
						Pemilih
					</div>
				</div>
				<!-- /current server load -->
			</div>
		</a>

		<a href="/pengajuan agenda">
			<div class="col-lg-3">
				<!-- Today's revenue -->
				<div class="panel bg-blue-400">
					<div class="panel-body">
						<h3 class="no-margin">3,450</h3>
						Pengajuan
					</div>
				</div>
				<!-- /today's revenue -->
			</div>
		</a>

		<a href="/data quick count">
			<div class="col-lg-3">
				<!-- Today's revenue -->
				<div class="panel bg-green-400">
					<div class="panel-body">
						<h3 class="no-margin">3,450</h3>
						Hitung Cepat
					</div>
				</div>
				<!-- /today's revenue -->
			</div>
		</a>
	</div>
	<!-- /quick stats boxes -->

	<!-- Streamgraph chart -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h3>Live Vote</h3>
			<div class="heading-elements">
				<ul class="icons-list">
            		<li><a data-action="reload"></a></li>
            	</ul>
        	</div>
			<div id="server-load"></div>
		</div>

		<div class="panel-body">
			<p class="content-group">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum..</p>

			<div class="chart-container">
				<div class="chart" id="d3-streamgraph"></div>
			</div>
		</div>
	</div>
	<!-- /streamgraph chart -->

	<!-- sales stats -->
	<div class="col-lg-12">
		<!-- Marketing campaigns -->
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h6 class="panel-title">Agenda</h6>
			</div>

			<div class="table-responsive">
				<table class="table text-nowrap">
					<thead>
						<tr>
							<th class="col-md-2">No</th>
							<th class="col-md-2">Agenda+sistem</th>
							<th class="col-md-2">Kategori Pemilih</th>
							<th class="col-md-2">Tanggal</th>
							<th class="col-md-2">Keterangan</th>
							<th class="text-center" style="width: 20px;"><i class="icon-arrow-down12"></i></th>
						</tr>
					</thead>
					<tbody>
						<tr class="active border-double">
							<td colspan="6">Belum terlaksana</td>
						</tr>
						@for($i=1;$i<=3;$i++)
						<tr>
							<td>{{$i}}</td>
							<td><span class="text-muted">Muhammad Yusuf</span></td>
							<td>{{date('d/m/Y')}}</td>
							<td><span class="label bg-success-400">Belum Bayar</span></td>
							<td><h6 class="text-semibold">Rp. 123.000</h6></td>
							<td class="text-center">
								<ul class="icons-list">
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
										<ul class="dropdown-menu dropdown-menu-right">
											<li><a href="#"><i class="icon-eye"></i> Lihat detail</a></li>
											<li><a href="#"><i class="icon-pencil7"></i> Update</a></li>
										</ul>
									</li>
								</ul>
							</td>
						</tr>
						@endfor
						<tr class="active border-double">
							<td colspan="6">Sudah terlaksana</td>
						</tr>
						@for($i=1;$i<=3;$i++)
						<tr>
							<td>{{$i}}</td>
							<td><span class="text-muted">Muhammad Yusuf</span></td>
							<td>{{date('d/m/Y')}}</td>
							<td><span class="label bg-success-400">Belum Bayar</span></td>
							<td><h6 class="text-semibold">Rp. 123.000</h6></td>
							<td class="text-center">
								<ul class="icons-list">
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-menu7"></i></a>
										<ul class="dropdown-menu dropdown-menu-right">
											<li><a href="#"><i class="icon-eye"></i> Lihat detail</a></li>
											<li><a href="#"><i class="icon-pencil7"></i> Update</a></li>
										</ul>
									</li>
								</ul>
							</td>
						</tr>
						@endfor
					</tbody>
				</table>
			</div>
		</div>
		<!-- /marketing campaigns -->
	</div>
	<!-- /sales stats -->
</div>
@endsection