@extends('layouts_views.layout_user')

@section('content')
  {{! $cekTgl = \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d'), 
      $cek  = (App\Agenda::where('tgl_agenda', $cekTgl))->value('tgl_agenda')
  }}
  <!-- content -->
  <div class="content" style="min-height: 450px">
    @if(count($cek)!=0)
      {{! $tbA=(App\Agenda::where('tgl_agenda', $cekTgl))->first() }} 
      @if(Auth::user()->jurusan==$tbA->kat_jurusan && Auth::user()->fakultas==$tbA->kat_fakultas || $tbA->kat_jurusan=='Semua Jurusan' && Auth::user()->fakultas==$tbA->kat_fakultas || $tbA->kat_fakultas=='Semua Mahasiswa')
          <!-- list-content Ada Jadwal -->
          <div class="list-content-info">
            <h5>{{$tbA->nm_agenda}}</h5>
            <p>{{ \Carbon\Carbon::now('Asia/Jakarta')->format('l, d F Y')  }}</p>
            <div class="clear"></div>
          </div>
          <!-- /list-content -->

          <!-- jika mahasiswa sudah memilih hilangkan button vote -->
          <!-- content-vote -->
          {{! $tbKandidat = (App\Kandidat::where('agenda_id', $tbA->id)->get()) }}
          <div class="content-vote">
            @if(count($tbKandidat)!=0)
            @foreach($tbKandidat as $tb)
            <!-- panel kandidat -->
            <div class="panel-kandidat bg-light">
              <div class="foto-kandidat">
                <img src="/uploads/fotomhs/{{$tb->foto}}" style="width: 100%; height: 230px;" alt="">
              </div>     
              <div class="caption text-center" style="margin: 15px 0px 0px 0px;">
                <h6 style="margin: 0px">{{$tb->nama}}</h6>
                <small class="text-info"><i class="fa fa-thumbs-o-up"></i> 5 Votes</small>
                <div class="button-vote">
                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_view"><i class="fa fa-eye"></i> View</button>
                  <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-thumbs-o-up"></i> Vote</button>
                  <div class="clear"></div>
                </div>
              </div>
            </div>
            <!-- panel kandidat -->

            <!-- modal view kandidat-->
            <div class="modal" id="modal_view">
              <div class="modal-dialog">
                <div class="modal-content">
                
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Profil Kandidat</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>      
                  <!-- Modal body -->
                  <div class="modal-body">
                    <div class="modal-foto">
                      <img src="assets/images/placeholder.jpg" style="width: 125px; float: left; height: 140px;" alt="">
                      <div style="float: left;margin: 20px">
                        <h6 style="margin: 0px">Febri Ardi Saputra</h6>
                        <small class="text-info"><i class="fa fa-thumbs-o-up"></i> 5 Votes</small> 
                      </div>
                      <div class="clear"></div>
                    </div> 

                    <div class="caption fontArial" style="margin-top: 15px;">          
                      <div>
                        <h6><b>Visi</b></h6> 
                        <p>&quot;Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                        tempor incididunt ut labore et dolore magna aliqua.&quot;</p>
                      </div>
                      <div>
                        <h6><b>Misi</b></h6>
                        <ul>
                          <li>Ut enim ad minim veniam</li>
                          <li>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea</li>
                          <li>uis aute irure dolor in reprehenderit in </li>
                          <li>voluptate velit esse cillum dolore eu fugiat nulla pariatur. </li>
                        </ul>
                      </div>
                    </div>
                  </div>   
                  <!-- Modal footer -->
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-thumbs-o-up"></i> Vote</button>
                  </div>    
                </div>
              </div>
            </div>
            <!-- /modal view kandidat -->
            @endforeach
            @else
            <h6 class="text-center text-muted">Kandidat Tidak Ditemukan</h6>  
            @endif
            <div class="clear"></div>
          </div>
          <!-- /content-vote -->
      @else
          <!-- list-content Tidak Ada Jadwal -->
          <div class="list-content-info">
            <h5>tidak ada agenda</h5>
            <p>{{ \Carbon\Carbon::now('Asia/Jakarta')->format('l, d F Y')  }}</p>
            <div class="clear"></div>
          </div>
          <!-- /list-content -->
          <div class="content-notfound">
            <img src="assets/images/warning-ico.png" alt="waring">
            <h3 class="text-muted fontArial capitalize">tidak ada pemilihan !</h3>
          </div>
      @endif
    @else
      <!-- list-content Tidak Ada Jadwal -->
      <div class="list-content-info">
        <h5>tidak ada agenda</h5>
        <p>{{ \Carbon\Carbon::now('Asia/Jakarta')->format('l, d F Y')  }}</p>
        <div class="clear"></div>
      </div>
      <!-- /list-content -->
    @endif
  </div>
<!-- /content -->
@endsection
