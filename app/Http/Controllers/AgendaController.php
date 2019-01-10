<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AgendaAjuan;
use App\Agenda;
use App\Mahasiswa;
use App\Kandidat;
use App\Pemilih;
use \Crypt;

class AgendaController extends Controller
{   
    function verif_view($id){
        $i = \Crypt::decrypt($id);
        $tb = AgendaAjuan::find($i);
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
    	$table = Agenda::latest()->get();//orderBy('created_at', 'ASC')->get(); 
    	return view('views_admin.agenda_tabel')
    	->with("data", $table);
    }

    function insert(Request $req, $idAdmin){
        $tb = new Agenda;
        $tb->admin_id    = $idAdmin;
        $tb->nm_agenda   = $req->nm_agenda;
        $tb->sistem_vote = $req->sistem_pem;
        $tb->kat_fakultas= $req->fakultas;
        $tb->kat_jurusan = $req->jurusan;
        $tb->tgl_agenda  = $req->tgl_agenda;
        $tb->timeA1      = $req->timeA1;
        $tb->timeA2      = $req->timeA2;
        $tb->StartDaftarK= $req->StartDaftarK;
        $tb->LastDaftarK = $req->LastDaftarK;
        $tb->tgl_filtering= $req->tgl_filtering;
        $tb->syaratketentuan = '';
        $tb->temp_riwayat_hidup = '';
        $tb->surat_pernyataan ='';

        $tb->save();

        $tb_berita = AgendaAjuan::find($req->id_bacara);
        $tb_berita->ket = 'sudah diverifikasi';
        $tb_berita->save();

        return redirect('/tabel agenda')
        ->with('pesan','Agenda berhasil dibuat');
    }

    function edit($id){
        $i = \Crypt::decrypt($id);
        $tb = Agenda::find($i);

        return view('views_admin.agenda_edit')
        ->with('data', $tb);
    }

    function update(Request $req, $id) {    
        $tb = Agenda::find($id);

        $tb->sistem_vote = $req->sistem_pem;
        $tb->tgl_agenda  = $req->tgl_agenda;
        $tb->timeA1      = $req->timeA1;
        $tb->timeA2      = $req->timeA2;
        $tb->StartDaftarK= $req->StartDaftarK;
        $tb->LastDaftarK = $req->LastDaftarK;
        $tb->tgl_filtering= $req->tgl_filtering;
        $tb->save();
        //tambahkan
        $tb->save();
    
        return redirect('/tabel agenda')
        ->with('pesanA', 'Data berhasil disimpan');

    }

    function delete($id) {
        Agenda::find($id)->delete();

        // return redirect('/tabel agenda')
        return redirect()->back()
        ->with('pesan', 'Data berhasil dihapus');
    }

    function updateSyaratK(Request $req, $id) {
        $tb = Agenda::find($id);
        $tb->syaratketentuan = $req->syaratketentuan;
        $tb->save();
    
        return redirect('/tabel agenda')
        ->with('pesanA', 'Data berhasil disimpan');
    }

    function updateSuratPernyataan(Request $req, $id) {
        $tb = Agenda::find($id);
        
        $file = $req->file('surat_pernyataan');
        $ext  = $file->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $file->move('uploads/surat_pernyataan',$newName);
        $tb->surat_pernyataan = $newName;
        $tb->save();

        return redirect('/tabel agenda')
        ->with('pesanA', 'Data berhasil disimpan');
    }

    function updateTempRiwayatHidup(Request $req, $id) {
        $tb = Agenda::find($id);
        
        $file = $req->file('temp_riwayat_hidup');
        $ext  = $file->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $file->move('uploads/temp_riwayat_hidup',$newName);
        $tb->temp_riwayat_hidup = $newName;
        $tb->save();

        return redirect('/tabel agenda')
        ->with('pesanA', 'Data berhasil disimpan');
    }
}
