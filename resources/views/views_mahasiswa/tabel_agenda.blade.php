@extends('layouts_views.layout_user')

@section('content')
  <!-- content -->
  <div class="content">
    <div style="margin: 20px">
      <h3>Daftar Agenda</h3>
      <table class="table">
        <thead>
          <tr>
            <th>Agenda</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @for($i=0;$i<=3;$i++)
          <tr>
            <td>Nama Agenda{{$i}}</td>
            <td>{{date('d M Y')}}</td>
            <td>
              <span class="badge badge-success">Terdaftar</span>
              <span class="badge badge-secondary">Belum Terdaftar</span>
            </td>
            <td>
              <a href="/form pendaftaran" class="btn btn-primary btn-sm text-white"><i class='far fa-envelope'></i>&nbsp;Daftar</a>
              <a href="" class="btn btn-secondary btn-sm text-white"><i class='fas fa-edit'></i>&nbsp;Edit</a>
              <a href="" class="btn btn-danger btn-sm text-white"><i class='far fa-times-circle'></i>&nbsp;Batal</a>
            </td>
          </tr>
          @endfor
        </tbody>
      </table>
    </div>
  </div>
<!-- /content -->
@endsection
