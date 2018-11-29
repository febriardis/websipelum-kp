@extends('layouts_views.layout_admin')

@section('link')
	<li class="active">Quick Count</li>
@endsection

@section('content')
  <div style="display: none;">
    {{! $cekTgl = \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d') }}

    {{! $tglAgenda = \App\Agenda::find($idAgenda)->tgl_agenda }}
    
    {{! $jamAgenda = \App\Agenda::find($idAgenda)->timeA2 }}
    {{! $cekJam = \Carbon\Carbon::now('Asia/Jakarta')->format('G:i') }} 
    <!-- cek jumlah DPT -->
    {{ $jum_dpt = \App\Pemilih::where('agenda_id', $idAgenda)->count() }}
    <!-- /cek jumlah DPT -->

    {{! $tot1=0 }}
    {{! $tot2=0 }}  
    
    <!-- cek total suara -->
    {{! $tot=0  }}
    @foreach($tbVoting as $d)
      {{! $point = \Crypt::decrypt($d->jumlah) }}
      {{! $nil_p = $point/$jum_dpt*100 }}
      {{! $tot+=$nil_p }}
    @endforeach 
    <!-- /cek total suara --> 
  </div>

  <!-- jika total sudah seratus atau tanggal agenda seudah lewat maka tampilkan resultsnya -->
  
  <div class="content" style="min-height: 450px; margin-bottom: 60px">
    
    <div style="padding: 0px 20px; background-color: #ffffff; border-radius: 5px">
      <h1 class="fontArial capitalize" style="float: left;margin-top: 8px; padding: 0px 10px; background-color: #f2f2f2;">{{\App\Agenda::find($idAgenda)->nm_agenda }}</h1>
      
      <h4 style="float: right; margin-top: 14px; padding: 0px 5px; background-color: #f2f2f2;">{{ date( 'l, d F Y', strtotime(\App\Agenda::find($idAgenda)->tgl_agenda)) }}</h4>
      <div class="clear"></div>
    </div>
    
    <div class="content-quickcount">
      @if($tot==100 || $cekJam > $jamAgenda)
          <!-- border quick count text -->
          <div class="list-text-qcl">
            <hr><h3>Quick Count Results</h3><hr>
            <div class="clear"></div>
          </div>
          <!-- /border quick count text -->

          <div style="display: none;">
            {{! $c = \App\Voting::where('agenda_id', $idAgenda)->max('jumlah') }}
            {{! $large = \Crypt::decrypt($c) }}
          </div>
          
          <div class="content-counting">
            @foreach($tbVoting as $dt)        
            <div style="display: none;">
              {{! $tb = \App\Kandidat::find($dt->kandidat_id) }}
              {{! $point = \Crypt::decrypt($dt->jumlah) }}
            </div>
            @if($point == $large)
              <div class="panel-count">
                <div class="head-panel-count">
                  <img src="/uploads/fotomhs/{{$tb->foto}}" style="" width="100%" height="100%">
                  <div class="bg-text-count">
                    <div style="display: none;">{{! $nil_p = $point/$jum_dpt*100 }}</div>
                    <h1 style="margin-top: 10px; font-size: 30px">{{ number_format($nil_p) }}<span style="font-size: 24px">%</span></h1>
                    <h2 class="fontArial" style="margin-top: -10px"> {{$point}} <span style="font-size: 20px">Votes</span></h2>
                  </div>
                </div>
                <div class="foot-panel-count">
                  <div class="foot-count">
                    <h4 class="capitalize">{{$tb->nama}}</h4>
                  </div>
                </div>
              </div>
            @else
              <div class="panel-count"> <!-- style="margin-top: 50px" -->
                <div class="head-panel-count">
                  <img src="/uploads/fotomhs/{{$tb->foto}}" style="" width="100%" height="100%">
                  <div class="bg-text-count">
                    <div style="display: none;">{{! $nil_p = $point/$jum_dpt*100 }}</div>
                    <h1 style="margin-top: 10px; font-size: 30px">{{ number_format($nil_p) }}<span style="font-size: 24px">%</span></h1>
                    <h2 class="fontArial" style="margin-top: -10px"> {{$point}} <span style="font-size: 20px">Votes</span></h2>
                  </div>
                </div>
                <div class="foot-panel-count">
                  <div class="foot-count">
                    <h4 class="capitalize">{{$tb->nama}}</h4>
                  </div>
                </div>
              </div>
            @endif
            <div style="display: none;">
              {{! $tot1+=$nil_p }}
              {{! $tot2+=$point }}
            </div>
            @endforeach
            <div class="clear"></div>
          </div>
          <hr>
          <div class="progress" style="height: 40px">
            <div class="progress-bar progress-bar-striped active" style="width:{{number_format($tot1)}}%"><h2 style="margin-top: 3px">Total Suara Masuk : {{number_format($tot1)}}<span style="font-size: 22px">%</span> / {{$tot2}}</h2></div>
          </div>
          <br>
          <div class="progress" style="height: 40px">
            <div class="progress-bar progress-bar-striped active" style="width:25%"><h2 style="margin-top: 3px">Jumlah Pemilih : {{ $jum_dpt }} </h2></div>
          </div>
      @else
          <meta http-equiv="refresh" content="30"/>
          <!-- border quick count text -->
          <div class="list-text-qc">
            <hr><h3>Quick Count</h3><hr>
            <div class="clear"></div>
          </div>
          <!-- /border quick count text -->

          <div class="content-counting">
            @foreach($tbVoting as $dt)
            <div style="display: none;">
              {{! $tb = \App\Kandidat::find($dt->kandidat_id) }}
              {{! $point = \Crypt::decrypt($dt->jumlah) }}
            </div>
            <div class="panel-count">
              <div class="head-panel-count">
                <img src="/uploads/fotomhs/{{$tb->foto}}" style="" width="100%" height="100%">
                <div class="bg-text-count">
                  <div style="display: none;">{{! $nil_p = $point/$jum_dpt*100 }}</div>
                  <h1 style="margin-top: 10px; font-size: 30px">{{ number_format($nil_p) }}<span style="font-size: 24px">%</span></h1>
                  <h2 class="fontArial" style="margin-top: -10px"> {{$point}} <span style="font-size: 20px">Votes</span></h2>
                </div>
              </div>
              <div class="foot-panel-count">
                <div class="foot-count">
                  <h4 class="capitalize">{{$tb->nama}}</h4>
                </div>
              </div>
            </div>
            <div style="display: none;">
              {{! $tot1+=$nil_p }}
              {{! $tot2+=$point }}
            </div>
            @endforeach
            <div class="clear"></div>
          </div>

          <div class="progress" style="height: 40px">
            <div class="progress-bar progress-bar-striped progress-bar-animated" style="width:{{number_format($tot1)}}%"><h2 style="margin-top: 3px">Suara Masuk : {{number_format($tot1)}}<span style="font-size: 22px">%</span> / {{$tot2}}</h2></div>
          </div>
      @endif
    </div>
  </div>
@endsection