@extends('layouts_views.layout_admin')

@section('content')
<!-- Content -->
<div class="content" style="min-height: 450px">
  <div class="head-content" style="margin: 20px 0px">  

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
      <!-- form create nama organisasi -->
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
    <!-- form create nama organisasi --> 
    @endif
  </div>

  <div style="margin-top: 100px" class="tabbable">
    <ul class="nav nav-tabs nav-tabs-highlight">
      <li class="active"><a href="#highlighted-justified-tab1" data-toggle="tab">Visi & Misi</a></li>
      <li><a href="#highlighted-justified-tab2" data-toggle="tab">Struktur Organisasi</a></li>
    </ul>
    @if(count($tb)!=0)
    <div class="tab-content">
      <!-- tab 1 input content visi & misi -->
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
      <!-- /tab 1 input content visi & misi -->

      <!-- tab 2 input content struktur organisasi -->
      <div class="tab-pane" id="highlighted-justified-tab2">
        <div class="container-fluid">
        <!-- jabatan umum -->
          <h3>Jabatan Umum</h3>
          <a href="javascript:void(0)" class="btn btn-sm btn-default" onclick="showJabtumForm()"><i class="glyphicon glyphicon-pencil"></i> Tambah</a>
          <!-- panel form add jabtum -->
          <div class="panel panel-flat" id="jabtum" style="padding: 10px; display: none; width: 500px">
            <div>
              <a href="javascript:void(0)" style="float: right;" onclick="closeJabtumForm()"><i class="glyphicon glyphicon-remove"></i></a>
              <div class="clear"></div>
            </div>

            <form action="/insert jabtum/{{$tb->first()->id}}" method="POST">
              {{csrf_field()}}
              <input type="hidden" name="ket" value="{{$ket}}">
              <input type="hidden" name="ket2" value="{{$ket2}}">
              <div class="row">
                <div class="col-sm-5">
                  <label>Jabatan :</label>
                  <input type="text" name="nm_jabatan" placeholder="nama jabatan" class="form-control">
                </div>
                <div class="col-sm-7">
                  <label>Penjabat :</label>
                  <input type="text" name="nm_penjabat" placeholder="nama penjabat" class="form-control">
                </div>
                <div class="right" style="margin:10px 10px 0px 0px">
                  <input type="submit" value="Tambahkan" class="btn btn-info btn-sm">
                </div>
              </div>
            </form>
          </div>
          <!-- panel form add jabtum -->

          <!-- tabel jabatan umum -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Jabatan</th>
                <th>Nama Penjabat</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            <div style="display: none;">
              {{!$tbJ = \App\JabatanUmum::where('org_id', $tb->first()->id)->get()}}
              {{!$i=1}}
            </div>
            @foreach($tbJ as $d)
            <form action="/update jabtum/{{$d->id}}" method="POST">
              {{csrf_field()}}
              <input type="hidden" name="ket" value="{{$ket}}">
              <input type="hidden" name="ket2" value="{{$ket2}}">
              <tr>
                <td>{{$i++}}</td>
                <td width="200">
                  <input type="text" name="nm_jabatan" value="{{$d->nm_jabatan}}" placeholder="nama jabatan" class="form-control">
                </td>
                <td width="300">
                  <input type="text" name="nm_penjabat" value="{{$d->nm_penjabat}}" placeholder="nama penjabat" class="form-control">
                </td>
                <td>
                  <button type="submit" class="btn btn-sm btn-info"><i class="icon-pencil7"></i> Perbaharui</button>
                  <a href="/delete jabtum/{{$d->id}}/{{$ket}}/{{$ket2}}" onclick="ConfirmDelete()" class="btn btn-sm btn-danger"><i class="icon-trash"></i> Hapus</a>
                </td>
              </tr>
            </form>
            @endforeach
            </tbody>
          </table>
          <!-- /tabel jabatan umum -->
          <!-- /jabatan umum -->
          <hr>
          
          <!-- bidang-bidang -->
          <h3>Bidang</h3>
          <a href="javascript:void(0)" class="btn btn-sm btn-default" onclick="showBidangForm()"><i class="glyphicon glyphicon-pencil"></i> Tambah</a>
          <!-- panel form add bidang -->
          <div class="panel panel-flat" id="bidang" style="padding: 10px; display: none; width: 500px">
            <div>
              <a href="javascript:void(0)" style="float: right;" onclick="closeBidangForm()"><i class="glyphicon glyphicon-remove"></i></a>
              <div class="clear"></div>
            </div>
            <form action="/insert jabtum/{{$tb->first()->id}}" method="POST">
              {{csrf_field()}}
              <input type="hidden" name="ket" value="{{$ket}}">
              <input type="hidden" name="ket2" value="{{$ket2}}">
              <div class="row">
                <div class="col-sm-12">
                  <label>Nama Bidang :</label>
                  <input type="text" name="nm_bidang" placeholder="nama bidang" class="form-control">
                </div>
                <div class="right" style="margin:10px 10px 0px 0px">
                  <input type="submit" value="Tambahkan" class="btn btn-info btn-sm">
                </div>
              </div>
            </form>
          </div>
          <!-- panel form add bidang -->
          <!-- tabel bidang -->
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Bidang</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
            <div style="display: none;">
              {{!$tbJ = \App\JabatanUmum::where('org_id', $tb->first()->id)->get()}}
              {{!$i=1}}
            </div>
            @foreach($tbJ as $d)
            <form action="/update jabtum/{{$d->id}}" method="POST">
              {{csrf_field()}}
              <input type="hidden" name="ket" value="{{$ket}}">
              <input type="hidden" name="ket2" value="{{$ket2}}">
              <tr>
                <td>{{$i++}}</td>
                <td width="500">
                  <input type="text" name="nm_jabatan" value="" placeholder="nama jabatan" class="form-control">
                </td>
                <td>
                  <button type="submit" class="btn btn-sm btn-info"><i class="icon-pencil7"></i> Perbaharui</button>
                  <a href="/delete jabtum/{{$d->id}}/{{$ket}}/{{$ket2}}" onclick="ConfirmDelete()" class="btn btn-sm btn-danger"><i class="icon-trash"></i> Hapus</a>
                </td>
              </tr>
            </form>
            @endforeach
            </tbody>
          </table>
          <!-- /tabel bidang -->
          <!-- /bidang-bidang -->
          <hr>

          <!-- bidang-bidang -->
          <h3>Struktur Perbidang</h3>
          <a href="javascript:void(0)" class="btn btn-sm btn-default" onclick="showStrukBidForm()"><i class="glyphicon glyphicon-pencil"></i> Tambah</a>
          
          <!-- panel form add struktur bidang -->
          <div class="panel panel-flat" id="strukbid" style="padding: 10px; display: none; width: 500px">
            <div>
              <a href="javascript:void(0)" style="float: right;" onclick="closeStrukBidForm()"><i class="glyphicon glyphicon-remove"></i></a>
              <div class="clear"></div>
            </div>

            <form action="/insert jabtum/{{$tb->first()->id}}" method="POST">
              {{csrf_field()}}
              <input type="hidden" name="ket" value="{{$ket}}">
              <input type="hidden" name="ket2" value="{{$ket2}}">
              <div class="row">
                <div class="col-sm-5">
                  <label>Jabatan :</label>
                  <input type="text" name="nm_jabatan" placeholder="nama jabatan" class="form-control">
                </div>
                <div class="col-sm-7">
                  <label>Penjabat :</label>
                  <input type="text" name="nm_penjabat" placeholder="nama penjabat" class="form-control">
                </div>
                <div class="right" style="margin:10px 10px 0px 0px">
                  <input type="submit" value="Tambahkan" class="btn btn-info btn-sm">
                </div>
              </div>
            </form>
          </div>
          <!-- panel form add jabtum -->
          
          <!-- tabel bidang -->
          <h6>Nama Bidang</h6>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama Penjabat</th>
                <th>Jabatan</th>
              </tr>
            </thead>
            <tbody>
            <div style="display: none;">
              {{!$tbJ = \App\JabatanUmum::where('org_id', $tb->first()->id)->get()}}
              {{!$i=1}}
            </div>
            @foreach($tbJ as $d)
            <form action="/update jabtum/{{$d->id}}" method="POST">
              {{csrf_field()}}
              <input type="hidden" name="ket" value="{{$ket}}">
              <input type="hidden" name="ket2" value="{{$ket2}}">
              <tr>
                <td>{{$i++}}</td>
                <td width="300">
                  <input type="text" name="nm_jabatan" value="" placeholder="nama penjabat" class="form-control">
                </td>
                <td width="200">
                  <input type="text" name="nm_jabatan" value="" placeholder="nama jabatan" class="form-control">
                </td>
                <td>
                  <button type="submit" class="btn btn-sm btn-info"><i class="icon-pencil7"></i> Perbaharui</button>
                  <a href="/delete jabtum/{{$d->id}}/{{$ket}}/{{$ket2}}" onclick="ConfirmDelete()" class="btn btn-sm btn-danger"><i class="icon-trash"></i> Hapus</a>
                </td>
              </tr>
            </form>
            @endforeach
            </tbody>
          </table>
          <!-- /tabel bidang -->
          <!-- /bidang-bidang -->
        

        </div>
        <!-- container -->
      </div>
      <!-- tab 2 input content struktur organisasi -->
    </div>
    @else
      <!-- kosong -->
    @endif
  </div>
  
  <script type="text/javascript">
    function showJabtumForm() {
      document.getElementById("jabtum").style.display="block";
    }
    function closeJabtumForm() {
      document.getElementById("jabtum").style.display="none";
    }

    function showBidangForm() {
      document.getElementById("bidang").style.display="block";
    }
    function closeBidangForm() {
      document.getElementById("bidang").style.display="none";
    }

    function showStrukBidForm() {
      document.getElementById("strukbid").style.display="block";
    }
    function closeStrukBidForm() {
      document.getElementById("strukbid").style.display="none";
    }

    function ConfirmDelete() {
      var x = confirm("Yakin Akan Menghapus Data?");
      if (x)
        return true;
      else
        return false;
    }
  </script>

</div>
<!-- /Content -->
@endsection