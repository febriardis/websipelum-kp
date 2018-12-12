@extends('layouts_views.layout_user')

@section('content')
<div style="display: none;">
  {{! $cekJam = \Carbon\Carbon::now('Asia/Jakarta')->format('G:i') }}
</div>
<!-- Content -->
<div class="content" style="min-height: 450px; margin: 20px">
@if(count($agenda)!=0)
  @if(count($agenda)>1)
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
      {{!$n=1}}
      @foreach($agenda as $dt)
        {{! $cek = \App\Pemilih::where([['nim', Auth::user()->nim],['agenda_id', $dt->id]])->get() }}
        @if(count($cek)!=0)
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#menu{{$dt->id}}">Pemilihan {{$n++}}</a>
        </li>
        @endif
      @endforeach
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
      @foreach($agenda as $a)
        {{! $cek = \App\Pemilih::where([['nim', Auth::user()->nim],['agenda_id', $a->id]])->get() }}
        @if(count($cek)!=0)
        <div id="menu{{$a->id}}" class="container tab-pane"><br>
          {{! $idPemilih = \App\Pemilih::where([['nim', Auth::user()->nim],['agenda_id', $a->id]])->value('id') }}
          @if($cekJam >= $a->timeA1 && $cekJam <= $a->timeA2)
            <!-- content jam sudah sesuai -->
              <!-- list-content -->
              <div class="list-content-info">
                <h5>{{$a->nm_agenda}}</h5>
                <p><b>Pelaksanaan :</b> {{ \Carbon\Carbon::now('Asia/Jakarta')->format('l, d F Y')  }} / Jam : {{ date('G:i', strtotime($a->timeA1)) }} - {{ date('G:i', strtotime($a->timeA2)) }} WIB</p>
                <div class="clear"></div>
              </div>
              @if(Session::has('pesanVote'))
              <div class="alert alert-info">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ Session::get('pesanVote') }} !
              </div>
              @endif
              <!-- /list-content -->
            
              <!-- content-vote -->
              {{! $kandidat = (App\Kandidat::where([['agenda_id', $a->id],['keterangan', 'Diterima']])->get()) }}
              <div class="content-vote">
                @if(count($kandidat)!=0)
                @foreach($kandidat as $tb)
                <!-- panel kandidat -->
                <div class="panel-kandidat bg-light">
                  <div class="foto-kandidat">
                    <img src="/uploads/foto-kandidat/{{$tb->foto}}" style="width: 100%; height: 230px;" alt="">
                  </div>     
                  <div class="caption text-center" style="margin: 15px 0px 0px 0px;">
                    <h6 style="margin: 0px">{{$tb->nama}}</h6>
                    <small class="text-info"><i class="fa fa-thumbs-o-up"></i> 
                      <div style="display: none;">
                        {{! $nilVote = \App\Voting::where([['agenda_id',$a->id],['kandidat_id', $tb->id]])->value('jumlah') }}
                      </div>
                      {{ \Crypt::decrypt($nilVote) }}&nbsp;Votes
                    </small>
                    <div class="button-vote">    
                      {{! $Kvote = App\Pemilih::where([['nim', Auth::user()->nim],['agenda_id', $a->id]])->value('ket_vote') }}
                      {{! $cekK = \Crypt::decrypt($Kvote) }}
                      
                      @if($cekK=='belum memilih')
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_view{{ $tb->id }}"><i class="fa fa-eye"></i>&nbsp;View</button>
                      
                        <!-- tambahkan enkripsi -->
                        <form action="/vote/{{$a->id}}/{{$tb->id}}/{{$idPemilih}}" method="POST">
                          {{csrf_field()}}
                          <button type="submit" data-action="reload" class="btn btn-danger btn-sm"><i class="fa fa-thumbs-o-up"></i> Vote</button>
                        </form>
                      @else
                        <a href="javascript::void(0)" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_view{{ $tb->id }}"><i class="fa fa-eye"></i>&nbsp;View</a>
                      @endif
                      <div class="clear"></div>
                    </div>
                  </div>
                </div>
                <!-- panel kandidat -->

                <!-- modal view kandidat-->
                <div class="modal" id="modal_view{{ $tb->id }}">
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
                          <img src="/uploads/foto-kandidat/{{$tb->foto}}" style="width: 125px; float: left; height: 140px;" alt="">
                          <div style="float: left;margin: 20px">
                            <h6 style="margin: 0px">{{$tb->nama}}</h6>
                            <small class="text-info"><i class="fa fa-thumbs-o-up"></i>
                            <div style="display: none;">
                              {{! $nilVote = \App\Voting::where([['agenda_id',$a->id],['kandidat_id', $tb->id]])->value('jumlah') }}
                            </div>
                            {{ \Crypt::decrypt($nilVote) }}&nbsp;Votes
                            </small> 
                          </div>
                          <div class="clear"></div>
                        </div> 

                        <div class="caption fontArial" style="margin-top: 15px;">          
                          <div>
                            <h6><b>Visi</b></h6> 
                            <p>&quot;{{$tb->visi}}&quot;</p>
                          </div>
                          <div>
                            <h6><b>Misi</b></h6>
                            {!! $tb->misi !!}
                          </div>
                        </div>
                      </div>   
                      <!-- Modal footer -->
                      <div class="modal-footer">
                      @if($cekK=='belum memilih')
                        <form action="/vote/{{$a->id}}/{{$tb->id}}/{{$idPemilih}}" method="POST">
                          {{csrf_field()}}
                          <button type="submit" data-action="reload" class="btn btn-danger btn-sm"><i class="fa fa-thumbs-o-up"></i> Vote </button>
                        </form>
                      @endif
                      </div>    
                    </div>
                  </div>
                </div>
                <!-- /modal view kandidat -->
                
                @endforeach
                @else
                  <h6 class="text-center text-muted">Kandidat Tidak Ada</h6>  
                @endif
                <div class="clear"></div>
              </div>
              <!-- /content-vote -->
            <!-- content jam sudah sesuai -->
          @elseif($cekJam > $a->timeA2)
            <!-- content jam sudah lewat -->
              <!-- list content -->
              <div class="list-content-info">
                <h5>{{$a->nm_agenda}}</h5>
                <p><b>Pelaksanaan :</b> {{ \Carbon\Carbon::now('Asia/Jakarta')->format('l, d F Y')  }} / Jam : {{ date('G:i', strtotime($a->timeA1)) }} - {{ date('G:i', strtotime($a->timeA2)) }} WIB</p>
                <div class="clear"></div>
              </div>
              <!-- /list-content -->
              
              <!-- content -->
              <div class="content-notfound">
                <img src="assets/images/warning-ico.png" alt="waring">
                <h3 class="text-muted fontArial capitalize">Waktu Pemilihan berakhir !</h3>
                <a href="/hitung cepat">Lihat Hasil Vote</a>
              </div>
              <!-- /content -->
            <!-- content jam sudah lewat -->
          @else
            <!-- content jam belum sesuai -->
            <!-- list content -->
            <div class="list-content-info">
              <h5>{{$a->nm_agenda}}</h5>
              <p><b>Pelaksanaan :</b> {{ \Carbon\Carbon::now('Asia/Jakarta')->format('l, d F Y')  }} / Jam : {{ date('G:i', strtotime($a->timeA1)) }} - {{ date('G:i', strtotime($a->timeA2)) }} WIB</p>
              <div class="clear"></div>
            </div>
            <!-- /list-content -->

            <!-- content -->
            <div class="content-notfound">
              <img src="assets/images/warning-ico.png" alt="waring">
              <h3 class="text-muted fontArial capitalize">Menunggu waktu pemilihan!</h3>
              <h3>Jam : {{ date('G:i', strtotime($a->timeA1)) }} - {{ date('G:i', strtotime($a->timeA2)) }} WIB</h3>
            </div>
             <!-- /content -->
            <!-- content jam belum sesuai -->
          @endif
        </div>
        @endif
      @endforeach
    </div>
    <!-- Tab panes -->
  @else
      @foreach($agenda as $a)
        {{! $cek = \App\Pemilih::where([['nim', Auth::user()->nim],['agenda_id', $a->id]])->get() }}
        @if(count($cek)!=0)
          {{! $idPemilih = \App\Pemilih::where([['nim', Auth::user()->nim],['agenda_id', $a->id]])->value('id') }}
          @if($cekJam >= $a->timeA1 && $cekJam <= $a->timeA2)
            <!-- content jam sudah sesuai -->
              <!-- list-content -->
              <div class="list-content-info">
                <h5>{{$a->nm_agenda}}</h5>
                <p><b>Pelaksanaan :</b> {{ \Carbon\Carbon::now('Asia/Jakarta')->format('l, d F Y')  }} / Jam : {{ date('G:i', strtotime($a->timeA1)) }} - {{ date('G:i', strtotime($a->timeA2)) }} WIB</p>
                <div class="clear"></div>
              </div>
              @if(Session::has('pesanVote'))
              <div class="alert alert-info">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ Session::get('pesanVote') }} !
              </div>
              @endif
              <!-- /list-content -->
            
              <!-- content-vote -->
              {{! $n=1 }}
              {{! $kandidat = (App\Kandidat::where([['agenda_id', $a->id],['keterangan', 'Diterima']])->get()) }}
              <div class="content-vote">
                @if(count($kandidat)!=0)
                @foreach($kandidat as $tb)
                <!-- panel kandidat -->
                <div class="panel-kandidat bg-light">
                  <div class="foto-kandidat">
                    <img src="/uploads/foto-kandidat/{{$tb->foto}}" style="width: 100%; height: 230px;" alt="">
                  </div>     
                  <div class="caption text-center" style="margin: 15px 0px 0px 0px;">
                    <h6 style="margin: 0px">{{$tb->nama}}</h6>
                    <small class="text-info"><i class="fa fa-thumbs-o-up"></i> 
                      <div style="display: none;">
                        {{! $nilVote = \App\Voting::where([['agenda_id',$a->id],['kandidat_id', $tb->id]])->value('jumlah') }}
                      </div>
                      {{ \Crypt::decrypt($nilVote) }}&nbsp;Votes
                    </small>
                    <div class="button-vote">    
                      {{! $Kvote = App\Pemilih::where([['nim', Auth::user()->nim],['agenda_id', $a->id]])->value('ket_vote') }}
                      {{! $cekK = \Crypt::decrypt($Kvote) }}
                      
                      @if($cekK=='belum memilih')
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_view{{ $tb->id }}"><i class="fa fa-eye"></i>&nbsp;View</button>
                      
                        <!-- tambahkan enkripsi -->
                        <form action="/vote/{{$a->id}}/{{$tb->id}}/{{$idPemilih}}" method="POST">
                          {{csrf_field()}}
                          <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-thumbs-o-up"></i> Vote</button>
                        </form>
                      @else
                        <a href="javascript::void(0)" class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal_view{{ $tb->id }}"><i class="fa fa-eye"></i>&nbsp;View</a>
                      @endif
                      <div class="clear"></div>
                    </div>
                  </div>
                </div>
                <!-- panel kandidat -->

                <!-- modal view kandidat-->
                <div class="modal" id="modal_view{{ $tb->id }}">
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
                          <img src="/uploads/foto-kandidat/{{$tb->foto}}" style="width: 125px; float: left; height: 140px;" alt="">
                          <div style="float: left;margin: 20px">
                            <h6 style="margin: 0px">{{$tb->nama}}</h6>
                            <small class="text-info"><i class="fa fa-thumbs-o-up"></i>
                            <div style="display: none;">
                              {{! $nilVote = \App\Voting::where([['agenda_id',$a->id],['kandidat_id', $tb->id]])->value('jumlah') }}
                            </div>
                            {{ \Crypt::decrypt($nilVote) }}&nbsp;Votes
                            </small> 
                          </div>
                          <div class="clear"></div>
                        </div> 

                        <div class="caption fontArial" style="margin-top: 15px;">          
                          <div>
                            <h6><b>Visi</b></h6> 
                            <p>&quot;{{$tb->visi}}&quot;</p>
                          </div>
                          <div>
                            <h6><b>Misi</b></h6>
                            {!! $tb->misi !!}
                          </div>
                        </div>
                      </div>   
                      <!-- Modal footer -->
                      <div class="modal-footer">
                      @if($cekK=='belum memilih')
                        <form action="/vote/{{$a->id}}/{{$tb->id}}/{{$idPemilih}}" method="POST">
                          {{csrf_field()}}
                          <button type="submit" data-action="reload" class="btn btn-danger btn-sm"><i class="fa fa-thumbs-o-up"></i> Vote </button>
                        </form>
                      @endif
                      </div>    
                    </div>
                  </div>
                </div>
                <!-- /modal view kandidat -->
                
                @endforeach
                @else
                  <h6 class="text-center text-muted">Kandidat Tidak Ada</h6>  
                @endif
                <div class="clear"></div>
              </div>
              <!-- /content-vote -->
            <!-- content jam sudah sesuai -->
          @elseif($cekJam > $a->timeA2)
            <!-- content jam sudah lewat -->
              <!-- list content -->
              <div class="list-content-info">
                <h5>{{$a->nm_agenda}}</h5>
                <p><b>Pelaksanaan :</b> {{ \Carbon\Carbon::now('Asia/Jakarta')->format('l, d F Y')  }} / Jam : {{ date('G:i', strtotime($a->timeA1)) }} - {{ date('G:i', strtotime($a->timeA2)) }} WIB</p>
                <div class="clear"></div>
              </div>
              <!-- /list-content -->
              
              <!-- content -->
              <div class="content-notfound">
                <img src="assets/images/warning-ico.png" alt="waring">
                <h3 class="text-muted fontArial capitalize">Waktu Pemilihan berakhir !</h3>
                <a href="/hitung cepat">Lihat Hasil Vote</a>
              </div>
              <!-- /content -->
            <!-- content jam sudah lewat -->
          @else
            <!-- content jam belum sesuai -->
            <!-- list content -->
            <div class="list-content-info">
              <h5>{{$a->nm_agenda}}</h5>
              <p><b>Pelaksanaan :</b> {{ \Carbon\Carbon::now('Asia/Jakarta')->format('l, d F Y')  }} / Jam : {{ date('G:i', strtotime($a->timeA1)) }} - {{ date('G:i', strtotime($a->timeA2)) }} WIB</p>
              <div class="clear"></div>
            </div>
            <!-- /list-content -->

            <!-- content -->
            <div class="content-notfound">
              <img src="assets/images/warning-ico.png" alt="waring">
              <h3 class="text-muted fontArial capitalize">Menunggu waktu pemilihan!</h3>
              <h3>Jam : {{ date('G:i', strtotime($a->timeA1)) }} - {{ date('G:i', strtotime($a->timeA2)) }} WIB</h3>
            </div>
             <!-- /content -->
            <!-- content jam belum sesuai -->
          @endif
        @else
          <!-- list-content Tidak Ada Jadwal -->
          <div class="list-content-info">
            <h5>tidak ada pemilihan terkait</h5>
            <p>{{ \Carbon\Carbon::now('Asia/Jakarta')->format('l, d F Y')  }}</p>
            <div class="clear"></div>
          </div>
          <!-- /list-content -->      
        @endif
      @endforeach
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

<script>
  $('#myTab a:first').tab('show');  
  $(document).ready(function(){
      $('#tabel-data').DataTable();
  });
</script>
@endsection
