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
            //'nama'     => 'required|string|max:255',
            //'username' => 'required|string|min:6|max:255',
            'foto'     => 'required'
        ]);
        $cek = Kandidat::where([['nim', $req->nim],['agenda_id', $idAgenda]])->get();
        if (count($cek)==0) {
            $tb = new Kandidat;
            //tambahkan jika nim sudah ada tidak dapat daftar
            $tb->nim         = $req->nim;
            $tb->nama        = $req->nama;
            $tb->foto        = $req->foto;
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

        return redirect('/daftar calon')
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
                $tb->foto        = $Mhs->foto;
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
                return redirect()->action('KandidatController@ViewTambah', ['idAgenda' => \Crypt::encrypt($idAgenda)])
                ->with('pesanEr', 'NIM Sudah Terdaftar'); 
            }
        }else {
            return redirect()->action('KandidatController@ViewTambah', ['idAgenda' => \Crypt::encrypt($idAgenda)])
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

        return redirect()->action('AgendaController@agendaview', ['idAgenda' => \Crypt::encrypt($idAgenda)])
        ->with('pesan', 'Data berhasil dihapus');
    }



    // function insert(Request $req) {
    //     // $this->validate($req, [
    //     //      'nim'     => 'required|integer|min:10|max:10',
    //     //      'nama'    => 'required|string|min:6|max:255',
    //     //      'foto'    => 'required|file|max:2000', //max 2MB
    //     //      'password' => 'required|string|min:6|regex:/^.*(?=.*[a-zA-Z])(?=.*[0-9]).*$/|confirmed',
    //     //  ]);
        
    //     $cekJurAg  = Agenda::find($req->agenda_id)->kat_jurusan; //cek kategori jurusan agenda 
    //     $cekFakAg  = Agenda::find($req->agenda_id)->kat_fakultas; //cek kategori jurusan agenda 

    //     //----------------------------------------------------------------- 
    //     $cekMhs1 = Mahasiswa::where('nim',$req->nim)->get();
    //     $cekMhs2 = Mahasiswa::where('nim',$req->nim)->where('fakultas', $cekFakAg)->get();
    //     $cekMhs3 = Mahasiswa::where('nim',$req->nim)->where('jurusan', $cekJurAg)->get();

    //     if ($cekFakAg=='Semua Mahasiswa') {
    //         if (count($cekMhs1)==0) {
    //             return redirect()->action('AgendaController@agendaview', ['id' => $req->agenda_id]) //return ke 
    //             ->with('pesanErr', 'NIM tidak ditemukan');
    //         }else{
    //             $tb = new Kandidat;
    //             $tb->nim        = $req->nim;
    //             $tb->nama       = Mahasiswa::where('nim',$req->nim)->first()->nama;

    //             $file = $req->file('foto');
    //             $ext  = $file->getClientOriginalExtension();
    //             $newName = rand(100000,1001238912).".".$ext;
    //             $file->move('uploads/file',$newName);

    //             $tb->foto       = $newName;
    //             $tb->jurusan    = Mahasiswa::where('nim',$req->nim)->first()->jurusan;;
    //             $tb->angkatan   = Mahasiswa::where('nim',$req->nim)->first()->th_angkatan;
    //             $tb->agenda_id  = $req->agenda_id;
    //             $tb->visi       = $req->visi;
    //             $tb->misi       = $req->misi;
    //             $tb->save();

    //             return redirect()->action('AgendaController@agendaview', ['id' => $req->agenda_id]) //return ke detail agenda
    //             ->with('pesan', 'Data berhasil disimpan');
    //         }
    //     }
    //     elseif ($cekJurAg=='Semua Jurusan') {
    //         if (count($cekMhs2)==0) {
    //             return redirect()->action('AgendaController@agendaview', ['id' => $req->agenda_id]) //return ke 
    //             ->with('pesanErr', 'NIM tidak terdaftar di fakultas');
    //         }else{
    //             $tb = new Kandidat;
    //             $tb->nim        = $req->nim;
    //             $tb->nama       = Mahasiswa::where('nim',$req->nim)->first()->nama;

    //             $file = $req->file('foto');
    //             $ext  = $file->getClientOriginalExtension();
    //             $newName = rand(100000,1001238912).".".$ext;
    //             $file->move('uploads/file',$newName);

    //             $tb->foto       = $newName;
    //             $tb->jurusan    = Mahasiswa::where('nim',$req->nim)->first()->jurusan;;
    //             $tb->angkatan   = Mahasiswa::where('nim',$req->nim)->first()->th_angkatan;
    //             $tb->agenda_id  = $req->agenda_id;
    //             $tb->visi       = $req->visi;
    //             $tb->misi       = $req->misi;
    //             $tb->save();

    //             return redirect()->action('AgendaController@agendaview', ['id' => $req->agenda_id]) //return ke detail agenda
    //             ->with('pesan', 'Data berhasil disimpan');
    //         }
    //     }
    //     else{
    //         if (count($cekMhs3)==0) {
    //             return redirect()->action('AgendaController@agendaview', ['id' => $req->agenda_id]) //return ke 
    //             ->with('pesanErr', 'NIM tidak terdaftar di jurusan');
    //         }else{
    //             $tb = new Kandidat;
    //             $tb->nim        = $req->nim;
    //             $tb->nama       = Mahasiswa::where('nim',$req->nim)->first()->nama;

    //             $file = $req->file('foto');
    //             $ext  = $file->getClientOriginalExtension();
    //             $newName = rand(100000,1001238912).".".$ext;
    //             $file->move('uploads/file',$newName);

    //             $tb->foto       = $newName;
    //             $tb->jurusan    = Mahasiswa::where('nim',$req->nim)->first()->jurusan;;
    //             $tb->angkatan   = Mahasiswa::where('nim',$req->nim)->first()->th_angkatan;
    //             $tb->agenda_id  = $req->agenda_id;
    //             $tb->visi       = $req->visi;
    //             $tb->misi       = $req->misi;
    //             $tb->save();

    //             return redirect()->action('AgendaController@agendaview', ['id' => $req->agenda_id]) //return ke detail agenda
    //             ->with('pesan', 'Data berhasil disimpan');
    //         }
    //     }
    //     //-----------------------------------------------------------------
    // }
    
    function edit($id){

    }

    function update(Request $req, $id) {
      
    }

}
