@extends('layouts_views.layout_admin')

@section('content')
<!-- Content -->
<div class="content" style="min-height: 450px">
  <div class="head-content" style="margin: 20px 0px">
    
    <h3>{{ $ket }}<br>{{ $ket2 }}hh</h3>

    {{ $cekFak = App\Fakultas::where('nm_fakultas',$ket2)->value('id'),
       $cekJur = App\Jurusan::where('nm_jurusan',$ket2)->value('id') }}

    fakultas
    {{ $cekOrg = App\TbOrganisasi::where([['fak_id','=', $cekFak], ['ket_organisasi','=', $ket]])->get() }}<br>

    jurusan
    {{ $cekOrg = App\TbOrganisasi::where([['jur_id','=', $cekJur], ['ket_organisasi','=', $ket]])->get() }}

    @if(count($cekOrg)!=0)
      <h3>Ada</h3>
    @else
      <h3>Tidak Ada</h3>
    @endif

    @if(count($tb)!=0)
      <!-- form update nama organisasi -->
      <form action="/UpnmOrganisasi/{{$tb->first()->id}}" method="POST"> <!-- set nama organisasi -->
        {{ csrf_field() }}
        <input type="hidden" name="ket" value="{{$ket}}">
        <input type="hidden" name="ket2" value="{{$ket2}}">
        <div class="form-group">      
          <div class="col-lg-11">
            <input type="text" class="form-control" value="{{$tb->first()->nm_organisasi}}" name="nmOrg" required="" placeholder="Masukan nama organisasi">
          </div>
          <input type="submit" class="btn btn-info btn-sm col-lg-1" value="set">
        </div>  
      </form>
    @else
      <!-- jika tb_org kosong maka jalankan -->
      <!-- form buat nama organisasi -->
      <form action="/nmOrganisasi" method="POST"> <!-- set nama organisasi -->
        {{ csrf_field() }}
        <input type="hidden" name="ket" value="{{$ket}}">
        <input type="hidden" name="ket2" value="{{$ket2}}">
        <input type="hidden" name="idFak" value="{{$id_fak}}">
        <input type="hidden" name="idJur" value="{{$id_jur}}">
        <div class="form-group">      
          <div class="col-lg-11">
            <input type="text" class="form-control" name="nmOrg" required="" placeholder="Masukan nama organisasi">
            <input type="hidden" name="ketOrg" value="{{Auth::user()->ket}}">
          </div>
          <input type="submit" class="btn btn-info btn-sm col-lg-1" value="set">
        </div>  
      </form> 
    @endif
  </div>

  <div style="margin-top: 100px" class="tabbable">
    <ul class="nav nav-tabs nav-tabs-highlight">
      <li class="active"><a href="#highlighted-justified-tab1" data-toggle="tab">Visi & Misi</a></li>
      <li><a href="#highlighted-justified-tab2" data-toggle="tab">Struktur Organisasi</a></li>
    </ul>
    @if(count($tb)!=0)
    <div class="tab-content">
      <div class="tab-pane active" id="highlighted-justified-tab1">
        <form action="/UpVMOrganisasi/{{$tb->first()->id}}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" name="ket" value="{{$ket}}">
          <input type="hidden" name="ket2" value="{{$ket2}}">
          <div class="form-group">
            <label class="control-label">Visi</label>
            <input type="text" class="form-control" name="visi" value="{{$tb->first()->visi}}" required="" placeholder="Masukan visi organisasi">
          </div>
          <div class="form-group">
            <label class="control-label">Misi</label>
            <textarea name="misi" required="" class="ckeditor" id="ckedtor">{{$tb->first()->misi}}</textarea>
          </div>
          <div style="float: right">
            <input type="submit" class="btn btn-info btn-sm" value="Simpan">
          </div>
        </form>
      </div>

      <div class="tab-pane" id="highlighted-justified-tab2">
        Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid laeggin.
      </div>
    </div>
    @else
      <!-- kosong -->
    @endif
  </div>
  
</div>
<!-- /Content -->
@endsection