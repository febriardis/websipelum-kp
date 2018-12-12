<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Kandidat;
use App\Agenda;
use App\Voting;

class KandidatController extends Controller
{
    // ----------------function views mahasiswa------------------
    function daftar($idAgenda){ //form daftar mahasiswa
        $id = \Crypt::decrypt($idAgenda);
        $tb = Agenda::find($id);
        
        return view('views_mahasiswa.form_daftar_calon')
        ->with('id', $id)
        ->with('tb', $tb);
    }

    function insert(Request $req, $idAgenda){ //insert oleh mahasiswa
        $this->validate($req, [
            'foto'     => 'required|mimes:jpeg,jpg,png|max:2000'
        ]);

        $cek = Kandidat::where([['nim', $req->nim],['agenda_id', $idAgenda]])->get();
        if (count($cek)==0) {
            $tb = new Kandidat;
            $tb->nim         = $req->nim;
            $tb->nama        = $req->nama;

            $file    = $req->file('foto');
            $ext     = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $file->move('uploads/foto-kandidat',$newName);

            $tb->foto        = $newName;
            $tb->jurusan     = $req->jurusan;
            $tb->angkatan    = $req->th_angkatan;
            $tb->agenda_id   = $idAgenda;
            $tb->visi        = $req->visi;
            $tb->misi        = $req->misi;
            $tb->keterangan  = 'Menunggu Verifikasi';
            $tb->save();
        }
        
        return redirect('/daftar calon')
        ->with('pesanKan','berhasil mendaftar');
    }

    function batalDaftar($nim, $idAgenda) { //hapus kandidat oleh mhs/pembatalan
        Kandidat::where([['nim',$nim],['agenda_id',$idAgenda]])->delete(); //tambahkan where agenda id

        return redirect()->back() //redirect('/daftar calon')
        ->with('pesanKan', 'Pendaftaran berhasil dibatalkan');
    }

    // ----------------function views admin------------------

    function ViewTambah($idAgenda){     
        $id = \Crypt::decrypt($idAgenda);
        $tb = Agenda::find($id);

        return view('views_admin.kandidat_tambah')
        ->with('tb', $tb);
    }

    function insertK(Request $req, $idAgenda){ //insert oleh admin
        $this->validate($req, [
            'foto'     => 'required|mimes:jpeg,jpg,png|max:2000'
        ]);

        $cekJurAg  = Agenda::find($idAgenda)->kat_jurusan; //cek kategori jurusan agenda 
        $cekFakAg  = Agenda::find($idAgenda)->kat_fakultas; //cek kategori jurusan agenda 

        $cekMhs    = Mahasiswa::where('nim',$req->nim)->get();
        $cekJurMhs = Mahasiswa::where('nim',$req->nim)->value('jurusan');
        $cekFakMhs = Mahasiswa::where('nim',$req->nim)->value('fakultas');
        
        $cekKandidat = Kandidat::where([['nim', $req->nim],['agenda_id', $idAgenda]])->get();

        if ($cekJurAg==$cekJurMhs && $cekFakAg==$cekFakMhs && count($cekMhs) !=0 || $cekJurAg=='Semua Jurusan' && $cekFakAg==$cekFakMhs && count($cekMhs) !=0 || $cekFakAg=='Semua Mahasiswa' && count($cekMhs) !=0) {
            if (count($cekKandidat)==0) {
                $Mhs = Mahasiswa::find($req->nim);

                $tb = new Kandidat;
                $tb->nim         = $req->nim;
                $tb->nama        = $Mhs->nama;

                $file    = $req->file('foto');
                $ext     = $file->getClientOriginalExtension();
                $newName = rand(100000,1001238912).".".$ext;
                $file->move('uploads/foto-kandidat',$newName);

                $tb->foto        = $newName;
                $tb->jurusan     = $Mhs->jurusan;
                $tb->angkatan    = $Mhs->th_angkatan;
                $tb->agenda_id   = $idAgenda;
                $tb->visi        = $req->visi;
                $tb->misi        = $req->misi;
                $tb->keterangan  = 'Diterima';
                $tb->save();
                
                return redirect()->action('AgendaController@agendaview', ['idAgenda' => \Crypt::encrypt($idAgenda)])
                ->with('pesanVerif', 'Data berhasil disimpan'); //return ke agenda view
            }else {
                //return redirect()->action('KandidatController@ViewTambah', ['idAgenda' => \Crypt::encrypt($idAgenda)])
                return redirect()->back()
                ->with('pesanEr', 'NIM Sudah Terdaftar'); 
            }
        }else {
            // return redirect()->action('KandidatController@ViewTambah', ['idAgenda' => \Crypt::encrypt($idAgenda)])
            return redirect()->back()
            ->with('pesanEr', 'NIM TIdak Sesuai');
        }
    }

    // show kandidat detail in admin views
    function viewKandidat($nim, $idAgenda){
        //$A = Agenda::where('nm_agenda', $nmAgenda)->value('id');
        $idA = \Crypt::decrypt($idAgenda);
        $tb  = Kandidat::where([['nim', $nim],['agenda_id', $idA]])->get()->first(); //tambah kondisi where agenda_id
        
        return view('views_admin.kandidat_detail')
        ->with('idAgenda', $idA)
        ->with('tbMhs', $tb);
    }

    function verifKandidat(Request $req, $id, $idAgenda){
        $tb = Kandidat::find($id);
        $tb->keterangan = 'Diterima';
        $tb->save();

        $tbV = new Voting;
        $tbV->agenda_id    = $idAgenda;
        $tbV->kandidat_id  = $id;
        $tbV->jumlah       = \Crypt::encrypt(0);
        $tbV->save();

        return redirect()->action('AgendaController@agendaview', ['idAgenda' => \Crypt::encrypt($idAgenda)])
        ->with('pesanVerif', 'Data berhasil disimpan'); //return ke agenda view
    }

    function tolakKandidat($id, $idAgenda){
        $tb = Kandidat::find($id);
        $tb->keterangan = 'Pendaftaran Tidak Diterima';
        $tb->save();
        //hapus tabel voting
        Voting::where([['agenda_id',$idAgenda],['kandidat_id',$id]])->delete();

        return redirect()->action('AgendaController@agendaview', ['idAgenda' => \Crypt::encrypt($idAgenda)])
        ->with('pesanVerif', 'Data berhasil disimpan');  //return ke agenda view
    }
    // end show kandidat detail in admin views

    function delete($id, $idAgenda) { //hapus kandidat oleh admin
        Kandidat::find($id)->delete();

        return redirect()->back()
        ->with('pesan', 'Data berhasil dihapus');
    }
    
    function edit($id){

    }

    function update(Request $req, $id) {
      
    }

}
