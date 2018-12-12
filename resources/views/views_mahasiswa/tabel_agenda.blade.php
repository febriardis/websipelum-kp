@extends('layouts_views.layout_user')

@section('content')
  <!-- content -->
  {{! $cekTgl = \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d') }}
  <div class="content">
    <div style="margin: 20px; min-height: 450px">
      <h3>Agenda Terkait</h3>
        @if(Session::has('pesanKan'))
        <div class="alert alert-info">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          {{ Session::get('pesanKan') }} !
        </div>
        @endif
      <table class="table" style="text-transform: capitalize;">
        <thead>
          <tr>
            <th width="56%">Agenda</th>
            <th>Tanggal Agenda</th>
            <th>Keterangan</th>
            <th class="text-center">Aksi</th>
          </tr>
        </thead>
        <tbody>
        @foreach($tbAgenda as $dt)
          @if(Auth::user()->jurusan== $dt->kat_jurusan && Auth::user()->fakultas==$dt->kat_fakultas || $dt->kat_jurusan=='Semua Jurusan' && Auth::user()->fakultas==$dt->kat_fakultas || $dt->kat_fakultas=='Semua Mahasiswa')
          
          <tr>
            <td>{{ $dt->nm_agenda }}</td>
            <td>{{date('d M Y' ,strtotime($dt->tgl_agenda))}}</td>        
            <td>
              <div style="display: none;">
                {{! $cekNim = (App\Kandidat::where([['agenda_id',$dt->id],['nim',Auth::user()->nim]]))->value('nim')}}
              </div>
              @if($cekTgl > $dt->tgl_agenda)
                <span class="badge badge-success">Agenda Selesai</span>
              @elseif($cekTgl == $dt->tgl_agenda)
                <span class="badge badge-danger">Agenda Berlangsung</span>
              @else
                @if($cekTgl >= $dt->StartDaftarK && $cekTgl <= $dt->LastDaftarK)
                  @if($cekNim==Auth::user()->nim)
                    <div style="display: none;">
                      {{!$cekKet = (App\Kandidat::where([['agenda_id',$dt->id],['nim',Auth::user()->nim]]))->value('keterangan')}} 
                    </div>    
                    @if($cekKet=='Menunggu Verifikasi')
                      <span class="badge badge-info">{{$cekKet}}</span>
                    @elseif($cekKet=='Diterima')
                      <span class="badge badge-success">{{$cekKet}}</span>
                    @else
                      <span class="badge badge-danger">{{$cekKet}}</span>
                    @endif
                  @else
                    <span class="badge badge-secondary">Belum Terdaftar</span>
                  @endif
                @else
                    <span class="badge badge-secondary">Bukan Priode Pendaftaran</span>
                @endif
              @endif
            </td>
            <td class="text-center">
              <div style="display: none;">
                {{!$cekNIM = (App\Kandidat::where([['agenda_id',$dt->id],['nim',Auth::user()->nim]]))->value('nim')}}
              </div>
              @if($cekTgl > $dt->tgl_agenda || $cekTgl == $dt->tgl_agenda)
                <a href="javascript::void(0)">no actions</a>
              <!--kondisi jika tanggal belum lewat -->
              @else
                @if($cekNIM==Auth::user()->nim)
                  <div style="display: none;">
                    {{!$cekKet = (App\Kandidat::where([['agenda_id',$dt->id],['nim',Auth::user()->nim]]))->value('keterangan')}} 
                  </div>  
                  @if($cekKet=='Pendaftaran Tidak Diterima')
                    <a href="javascript::void(0)">no actions</a>
                  @elseif($cekKet=='Menunggu Verifikasi')
                  
                  <form action="/batal daftar/{{Auth::user()->nim}}/{{$dt->id}}" method="POST" onclick="return ConfirmDelete()">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm text-white"><i class='far fa-times-circle'></i>&nbsp;Batal</button>
                  </form>

                  @else
                  <a href="javascript::void(0)">no actions</a>
                  @endif
                @else
                  @if($cekTgl >= $dt->StartDaftarK && $cekTgl <= $dt->LastDaftarK)
                    <a href="/form pendaftaran/{{ \Crypt::encrypt($dt->id) }}" class="btn btn-primary btn-sm text-white"><i class='far fa-envelope'></i>&nbsp;Daftar</a>
                  @else
                    <a href="javascript::void(0)">no actions</a>
                  @endif
                @endif
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
    <script>
        function ConfirmDelete() {
          var x = confirm("Yakin Akan Membatalkan?");
          if (x)
            return true;
          else
            return false;}
    </script> 

@endsection
