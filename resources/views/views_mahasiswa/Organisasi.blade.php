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
      <div class="content-s" style="border: 1px ">
        <div class="text-center" style="margin: 20px;">
          <hr><h4>Struktur Organisasi</h4><hr>
          <div class="item-SO">
            <b>Ketua Umum</b> <p>Yanto<p>
            <b>Sekretaris Umum</b> <p>Subhan</p>
            <b>Bendahara Umum</b> <p>Harist</p>
          </div>
        </div>

        <table>
          <thead>
            <th>
              <td></td>
            </th>
          </thead>
          <tbody>
            <tr>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- /struktur organisasi -->
  </div>
  <!-- Tab panes -->    
</div>
<!-- /Content -->
@endsection