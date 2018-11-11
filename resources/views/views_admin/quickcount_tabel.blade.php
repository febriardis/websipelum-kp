@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Data Quick Count</li>
@endsection

@section('content')
	<!-- Basic datatable -->
	<div class="panel panel-flat">
		<div class="panel-heading">
			<h5 class="panel-title">Data Quick Count</h5>
		</div>

		<table class="table datatable-basic">
			<thead>
				<tr>
					<th>No</th>
					<th>Agenda</th>
					<th>Keterangan</th>
					<th>Total Suara</th>
					<th>Detail</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><a href="/quick count">Lihat</a></td>
				</tr>
			</tbody>
		</table>
	</div>
	<!-- /basic datatable -->

@endsection