@extends('layouts_views.layout_user')

@section('content')
  <!-- content -->
  <div class="content">
    <div style="margin: 20px; min-height: 450px">
      <h3>List Agenda </h3>
        @if(Session::has('pesanNyalon'))
        <div class="alert alert-info">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{ Session::get('pesanNyalon') }} !
        </div>
        @endif
      <table class="table" style="text-transform: capitalize;">
        <thead>
          <tr>
            <th>Agenda</th>
            <th>Tanggal</th>
            <th>Keterangan</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
          {{! $n=1 }}
          {{! $t1 = (App\Agenda::pluck('kat_jurusan')) }}
          {{! $t2 = (App\Agenda::pluck('kat_fakultas')) }}

          <!-- {{! $t1 = (App\Agenda::where('kat_jurusan', Auth::user()->jurusan)->get())}} 
          {{! $t2 = (App\Agenda::where('kat_fakultas', Auth::user()->fakultas)->get())}} 
           --><!-- where katjur==jurmhs or katfak==fakmhs -->
          <!-- if(agenda_jurusan == mahasiswa_jursan) {} -->
          
          @foreach($tbAgenda as $dt)
          @if(Auth::user()->jurusan== $dt->kat_jurusan && Auth::user()->fakultas==$dt->kat_fakultas || $dt->kat_jurusan=='Semua Jurusan' && Auth::user()->fakultas==$dt->kat_fakultas || $dt->kat_fakultas=='Semua Mahasiswa')
          <tr>
            <td>{{ $dt->nm_agenda }}</td>
            <td>{{date('d M Y' ,strtotime($dt->tgl_agenda))}}</td>
            <td>
              <div style="display: none;">
              {{!$cekNim = (App\Kandidat::where('agenda_id',$dt->id))->value('nim')}}
              {{!$cekKet = (App\Kandidat::where('agenda_id',$dt->id))->value('keterangan')}}
              </div>
              @if(Auth::user()->nim==$cekNim)
                @if($cekKet=='Menunggu Verifikasi')
                  <span class="badge badge-info">Menunggu Verifikasi</span>
                @elseif($cekKet=='Terdaftar')
                  <span class="badge badge-success">Terdaftar</span>
                @else
                  <span class="badge badge-danger">Pendaftaran Tidak Diterima</span>
                @endif
              @else
                <span class="badge badge-secondary">Belum Terdaftar</span>
              @endif
            </td>
            <td>
              @if(Auth::user()->nim==$cekNim)
                <a href="" class="btn btn-secondary btn-sm text-white"><i class='fas fa-edit'></i>&nbsp;Edit</a>
                <a href="" class="btn btn-danger btn-sm text-white"><i class='far fa-times-circle'></i>&nbsp;Batal</a>
              @else
                <a href="/form pendaftaran/{{ $dt->nm_agenda }}" class="btn btn-primary btn-sm text-white"><i class='far fa-envelope'></i>&nbsp;Daftar</a>
              @endif
            </td>
          </tr>
          @endif
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
<!-- /content -->
@endsection
