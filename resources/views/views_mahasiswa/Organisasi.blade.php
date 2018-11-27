@extends('layouts_views.layout_user')

@section('content')
<!-- Content -->
<div class="content" style="min-height: 450px">
  <div class="head-content" style="margin: 20px">
    @if(count($tb)!=0)
      <h3>{{$tb->first()->nm_organisasi}}</h3>
    @else  
      <h5 class="text-muted">Content Not Found!!</h5>
    @endif
  </div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">Visi & Misi</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">Struktur Organisasi</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <!-- visi & misi -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
      @if(count($tb)!=0)
      <!-- visi organisasi -->
      <div class="content-visi" style="border: 1px ">
        <div style="margin: 20px;">
          <hr><h4 class="text-center">Visi</h4><hr>
          <p>&quot;{{$tb->first()->visi}}&quot;</p>
        </div>
      </div>
      <!-- visi organisasi -->
      <!-- misi organisasi -->
      <div class="content-misi" style="border: 1px ">
        <div style="margin: 20px;">
          <hr><h4 class="text-center">Misi</h4><hr>
          {!! $tb->first()->misi !!}
        </div>
      </div>
      <!-- misi organisasi -->
      @else
        <h5 class="text-muted">Content Not Found!!</h5>
      @endif
    </div>
    <!-- /visi & misi -->

    <!-- struktur organisasi -->
    <div id="menu1" class="container tab-pane fade"><br>
    @if(count($tb)!=0) <!-- cek tb_agenda -->
      <div style="display: none;">
        {{ !$tbJ = \App\JabatanUmum::where('org_id', $tb->first()->id)->get() }}
      </div>
      @if(count($tbJ)!=0)
      <div class="content-s" style="border: 1px ">
        <div class="text-center" style="margin: 20px;">
          <hr><h4>Struktur Organisasi</h4><hr>
          <!-- struktur umum -->
          <div class="item-SO">
            @foreach($tbJ as $d)
            <div class="capitalize">
              <b>{{$d->nm_jabatan}}</b> <p>{{$d->nm_penjabat}}<p>
            </div>
            @endforeach
          </div>
          <!-- struktur umum -->

          <!-- struktur bidang+penjabat -->
          @for($i=0; $i<=8; $i++)
          <div style="width:336px; margin:5px; float: left;border:1px solid black">
            <table class="table table-sm">
              <thead>
                <tr>
                  <th>Bidang blabla</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Juhana Nur Hidayat</td>
                  <td>Ketua Bidang</td>
                </tr>
              </tbody>
            </table>
          </div>          
          @endfor
          <div class="clear"></div>
          <!-- struktur bidang+penjabat -->
        </div>
      </div>
      @else
        <h5 class="text-muted">Content Not Found!!</h5>
      @endif
    @else
        <h5 class="text-muted">Content Not Found!!</h5>
    @endif
    </div>
    <!-- /struktur organisasi -->
  </div>
  <!-- Tab panes -->    
</div>
<!-- /Content -->
@endsection