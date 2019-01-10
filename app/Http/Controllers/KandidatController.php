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
            'foto'              => 'required|mimes:jpeg,jpg,png|max:2000',
            'transkrip_nilai'   => 'required|mimes:doc,docx,pdf|max:2000',
            'riwayat_hidup'     => 'required|mimes:doc,docx,pdf|max:2000',
        ]);
        $cek = Kandidat::where([['nim', $req->nim],['agenda_id', $idAgenda]])->get();
        if (count($cek)==0) {
            $tb = new Kandidat;
            $tb->nama        = $req->nama;
            $tb->jen_kelamin = $req->jen_kelamin;
            $tb->tmp_lahir   = $req->tmp_lahir;
            $tb->tgl_lahir   = $req->tgl_lahir;
            $tb->nim         = $req->nim;
            $tb->jurusan     = $req->jurusan;
            $tb->fakultas    = $req->fakultas;
            $file    = $req->file('foto');
            $ext     = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $file->move('uploads/foto-kandidat',$newName);
            $tb->foto        = $newName;
            $tb->agama       = $req->agama;
            $tb->no_hp       = $req->no_hp;
            $tb->email       = $req->email;
            $tb->medsos1     = $req->medsos1;
            $tb->medsos2     = $req->medsos2;
            $tb->medsos3     = $req->medsos3;
            $tb->blog        = $req->blog;
            $tb->anak_ke     = $req->anak_ke;
            $tb->jum_saudara = $req->jum_saudara;
            $tb->asal_sma    = $req->asal_sma;
            $tb->asal_daerah = $req->asal_daerah;
            $tb->motto       = $req->motto;
            $tb->motivasi    = $req->motivasi;

            $file2    = $req->file('transkrip_nilai');
            $ext2     = $file2->getClientOriginalExtension();
            $newName2 = rand(100000,1001238912).".".$ext2;
            $file2->move('uploads/transkrip_nilai',$newName2);
            $tb->transkrip_nilai = $newName2;
            
            $tb->agenda_id   = $idAgenda;
            $tb->visi        = $req->visi;
            $tb->misi        = $req->misi;

            $file3    = $req->file('riwayat_hidup');
            $ext3     = $file3->getClientOriginalExtension();
            $newName3 = rand(100000,1001238912).".".$ext3;
            $file3->move('uploads/riwayat_hidup',$newName3);
            $tb->riwayat_hidup = $newName3;
            
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
                // $Mhs = Mahasiswa::find($req->nim);

                $tb = new Kandidat;
                $tb->nama        = $req->nama;
                $tb->jen_kelamin = $req->jen_kelamin;
                $tb->tmp_lahir   = $req->tmp_lahir;
                $tb->tgl_lahir   = $req->tgl_lahir;
                $tb->nim         = $req->nim;
                $tb->jurusan     = $req->jurusan;
                $tb->fakultas    = $req->fakultas;
                $file    = $req->file('foto');
                $ext     = $file->getClientOriginalExtension();
                $newName = rand(100000,1001238912).".".$ext;
                $file->move('uploads/foto-kandidat',$newName);
                $tb->foto        = $newName;
                $tb->agama       = $req->agama;
                $tb->no_hp       = $req->no_hp;
                $tb->email       = $req->email;
                $tb->medsos1     = $req->medsos1;
                $tb->medsos2     = $req->medsos2;
                $tb->medsos3     = $req->medsos3;
                $tb->blog        = $req->blog;
                $tb->anak_ke     = $req->anak_ke;
                $tb->jum_saudara = $req->jum_saudara;
                $tb->asal_sma    = $req->asal_sma;
                $tb->asal_daerah = $req->asal_daerah;
                $tb->motto       = $req->motto;
                $tb->motivasi    = $req->motivasi;

                $file2    = $req->file('transkrip_nilai');
                $ext2     = $file2->getClientOriginalExtension();
                $newName2 = rand(100000,1001238912).".".$ext2;
                $file2->move('uploads/transkrip_nilai',$newName2);
                $tb->transkrip_nilai = $newName2;
                
                $tb->agenda_id   = $idAgenda;
                $tb->visi        = $req->visi;
                $tb->misi        = $req->misi;

                $file3    = $req->file('riwayat_hidup');
                $ext3     = $file3->getClientOriginalExtension();
                $newName3 = rand(100000,1001238912).".".$ext3;
                $file3->move('uploads/riwayat_hidup',$newName3);
                $tb->riwayat_hidup = $newName3;
                
                $tb->keterangan  = 'Menunggu Verifikasi';
                $tb->save();
                
                return redirect()->action('AgendaController@agendaview', ['idAgenda' => \Crypt::encrypt($idAgenda)])
                ->with('pesanVerif', 'Data berhasil disimpan'); //return ke agenda view
            }else {
                return redirect()->back()
                ->with('pesanEr', 'NIM Sudah Terdaftar'); 
            }
        }else {
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
    
}
