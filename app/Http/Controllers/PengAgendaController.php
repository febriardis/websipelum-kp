<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AgendaAjuan;

class PengAgendaController extends Controller {
    function show()
    {
    	$tb = AgendaAjuan::orderBy('created_at', 'DESC')->get();
    	return view('views_admin.pengajuan_agenda_tabel')
    	->with('tb', $tb);
    }
    
    // function Admin!=SuperAdmin
    function insert(Request $req, $AdminId)
    {
    	$tb = new AgendaAjuan;
    	$tb->admin_id = $AdminId;
    	$tb->nm_agenda = $req->nm_agenda;
    	$tb->sistem_vote = $req->sistem_pem;
        
        $file = $req->file('file');
        $ext  = $file->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $file->move('uploads/surat',$newName);

        $tb->file       = $newName;
        $tb->ket 		= 'belum diverifikasi'; //agenda sudah ada
        $tb->save();

    	return redirect('/pengajuan agenda')
        ->with('pesan','agenda berhasil diajukan');
    }

    function edit($id)
    {
    	$i  = \Crypt::decrypt($id);
        $tb = AgendaAjuan::find($i);

        return view('views_admin.pengajuan_agenda_edit')
        ->with('tb', $tb);
    }


    function update(Request $req, $id)
    {
        $tb = AgendaAjuan::find($id);
        $tb->nm_agenda   = $req->nm_agenda;
        $tb->sistem_vote = $req->sistem_pem;

        if ($req->file('file')!='') {
            $file = $req->file('file');
            $ext  = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $file->move('uploads/surat',$newName);

            $tb->file       = $newName;
        }
        $tb->save();

    	return redirect('/pengajuan agenda')
        ->with('pesan', 'Data berhasil disimpan');
    }

    function delete($id) {
    	AgendaAjuan::find($id)->delete();
    	return redirect('/pengajuan agenda')
    	->with('pesan', 'Data berhasil dihapus');
    } 
    // function Admin!=SuperAdmin


    function tolakAcara($id) {
        $tb = AgendaAjuan::find($id);
        $tb->ket = 'acara ditolak';
        $tb->save();
        
        return redirect('/pengajuan agenda')
        ->with('pesan', 'Data berhasil disimpan');
    } 
}
