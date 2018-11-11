@extends('layouts_views.layout_user')

@section('content')
<!-- Content -->
<div class="content">
    <div class="head-content" style="margin: 20px">
      <h3>Dewan Mahasiswa UIN Sunan Gunung Djati Bandung</h3>
    </div>

    <!-- struktur organisasi -->
    <div class="content-s" style="border: 1px ">
      <div class="text-center" style="margin: 20px;">
        <hr><h4>Struktur Organisasi</h4><hr>
        <div class="item-SO">
          <b>Ketua Umum</b> <p>Yanto<p>
          <b>Sekretaris Umum</b> <p>Subhan</p>
          <b>Bendahara Umum</b> <p>Harist</p>
        </div>
      </div>
    </div>
    <!-- /struktur organisasi -->

    <!-- visi organisasi -->
    <div class="content-visi" style="border: 1px ">
      <div style="margin: 20px;">
        <hr><h4 class="text-center">Visi</h4><hr>
        <p>&quot; Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. &quot;</p>
      </div>
    </div>
    <!-- visi organisasi -->

    <!-- misi organisasi -->
    <div class="content-misi" style="border: 1px ">
      <div style="margin: 20px;">
        <hr><h4 class="text-center">Misi</h4><hr>
        <ul>
          <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</li>
          <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</li>
          <li>Lorem ipsum dolor sit amet</li>
          <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit</li>
        </ul>
      </div>
    </div>
    <!-- visi organisasi -->
    
</div>
<!-- /Content -->
@endsection