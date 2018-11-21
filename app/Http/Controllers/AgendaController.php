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
        $i = \Crypt::decrypt($id);
        $tb = Berita_acara::find($i);
        return view('views_admin.agenda_tambah')
        ->with('tb', $tb);
    }
    
    function agendaview($idAgenda){
        $id         = \Crypt::decrypt($idAgenda);
        //$idAgenda   = Agenda::where('nm_agenda', $nmAgenda)->value('id');
        $tbKandidat = Kandidat::where('agenda_id', $id)->get();
        $tbPemilih  = Pemilih::where('agenda_id', $id)->get();
        
        //$encrypted = \Crypt::encrypt('secret');
        //$decrypted = \Crypt::decrypt($encrypted);

        return view('views_admin.agenda_view')
        ->with('IdAgenda', $id)
        ->with('tbP', $tbPemilih)
        ->with('tbK', $tbKandidat);
    }

    function show(){ //function agenda_tabel
    	$table = Agenda::all(); 
    	return view('views_admin.agenda_tabel')
    	->with("data", $table);
    }

    function insert(Request $req, $idAdmin){
        $cek = Agenda::where('tgl_agenda', $req->tgl_agenda)->get();

        if (count($cek)==0) {
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
        }else{
            return redirect()->action('AgendaController@verif_view', ['id' => $req->id_bacara])
            ->with('pesan','Tanggal agenda sudah ada');
        }
    }

    function edit($id){
        $i = \Crypt::decrypt($id);
        $tb = Agenda::find($i);

        return view('views_admin.agenda_edit')
        ->with('data', $tb);
    }

    function update(Request $req, $id) {
        $tb = Agenda::find($id);
        $tb->nm_agenda = $req->nm_agenda;
        $tb->sistem_vote = $req->sistem_pem;
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
