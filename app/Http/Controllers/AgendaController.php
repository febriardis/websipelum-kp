<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita_acara;
use App\Agenda;
use App\Mahasiswa;
use App\Kandidat;
use App\Pemilih;
use \Crypt;

class AgendaController extends Controller
{   
    function verif_view($id){
        $tb = Berita_acara::find($id);
        return view('views_admin.agenda_tambah')
        ->with('tb', $tb);
    }
    
    function agendaview($nmAgenda){
        $idAgenda = Agenda::where('nm_agenda', $nmAgenda)->value('id');
        $cekJur = Agenda::where('nm_agenda', $nmAgenda)->value('kat_jurusan');
        $cekFak = Agenda::where('nm_agenda', $nmAgenda)->value('kat_fakultas');
        $cekMet = Agenda::where('nm_agenda', $nmAgenda)->value('sistem_vote');
        // $cekFak = Agenda::find($id)->kat_fakultas;
        // $cekMet = Agenda::find($id)->sistem_vote;
        
        if ($cekFak=='Semua Mahasiswa') {
            if ($cekMet=='Pemilu Raya') {
                $tbMahasiswa = Mahasiswa::all();   
            }else{
                $tbMahasiswa = Mahasiswa::where('fakultas', $cekFak);
            }
        }
        
        elseif ($cekJur=='Semua Jurusan') {
            if ($cekMet=='Pemilu Raya') {
                $tbMahasiswa = Mahasiswa::where('fakultas', $cekFak)->get();
            }else{
                $tbMahasiswa = Mahasiswa::where('fakultas', $cekFak);
            }
        }

        else{
            if ($cekMet=='Pemilu Raya') {
                $tbMahasiswa = Mahasiswa::where('jurusan', $cekJur)->get();
            }else{
                $tbMahasiswa = Mahasiswa::where('fakultas', $cekFak);
            }
        }

        $tbKandidat = Kandidat::where('agenda_id', $idAgenda)->get();
        $tbPemilih = Pemilih::where('agenda_id', $idAgenda)->get();
        
        //$encrypted = \Crypt::encrypt('secret');
        //$decrypted = \Crypt::decrypt($encrypted);

        return view('views_admin.agenda_view')
        ->with('IdAgenda', $idAgenda)
        ->with('tbMhs', $tbMahasiswa)
        ->with('tbP', $tbPemilih)
        ->with('tbK', $tbKandidat);
    }

    function show(){ //function agenda_tabel
    	$table = Agenda::all(); 
    	return view('views_admin.agenda_tabel')
    	->with("data", $table);
    }

    function insert(Request $req, $idAdmin){
        $tb = new Agenda;
        $tb->admin_id = $idAdmin;
        $tb->nm_agenda = $req->nm_agenda;
        $tb->sistem_vote = $req->sistem_pem;
        $tb->kat_fakultas   = $req->fakultas;
        $tb->kat_jurusan   = $req->jurusan;
        $tb->tgl_agenda= $req->tgl_agenda;
        $tb->save();

        $tb_berita = Berita_acara::find($req->id_bacara);
        $tb_berita->ket = 'sudah diverifikasi';
        $tb_berita->save();

    	return redirect('/tabel agenda')
        ->with('pesan','Agenda berhasil dibuat');
    }

    function edit($id){
        $tb = Agenda::find($id);

        return view('views_admin.agenda_edit')
        ->with('data', $tb);
    }

    function update(Request $req, $id) {
        $tb = Agenda::find($id);
        $tb->nm_agenda = $req->nm_agenda;
        $tb->kat_jurusan   = $req->jurusan;
        $tb->tgl_agenda= $req->tgl_agenda;
        $tb->save();

        return redirect('/tabel agenda')
        ->with('pesan', 'Data berhasil diupdate');
    }

    function delete($id) {
        Agenda::find($id)->delete();

        return redirect('/tabel agenda')
        ->with('pesan', 'Data berhasil dihapus');
    }
}
