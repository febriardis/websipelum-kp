<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests\ErrorFormRequest;
use App\AgendaAjuan;
use App\Rules\DocType;

class PengAgendaController extends Controller {
    function show()
    {
    	$tb = AgendaAjuan::latest()->get();//orderBy('created_at', 'DESC')->get();
    	return view('views_admin.pengajuan_agenda_tabel')
    	->with('tb', $tb);
    }
    
    // function Admin!=SuperAdmin
    function insert(Request $req, $AdminId)
    {
        $this->validate($req, [
            'file' => 'required|max:2000|mimes:doc,docx,pdf' //new DocType() //
            ]
        );
    	
        $tb = new AgendaAjuan;
    	$tb->admin_id    = $AdminId;
    	$tb->nm_agenda   = $req->nm_agenda;
    	$tb->sistem_vote = $req->sistem_pem;

        $file = $req->file('file');
        $ext  = $file->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $file->move('uploads/surat',$newName);

        $tb->file       = $newName;
        // 
        $tb->kat_jurusan = $req->jurusan;
        $tb->kat_fakultas= $req->fakultas;
        $tb->tgl_agenda  = $req->tgl_agenda;
        $tb->timeA1      = $req->timeA1;
        $tb->timeA2      = $req->timeA2;
        
        $tb->ket 		 = 'belum diverifikasi'; //agenda sudah ada
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
        $this->validate($req, [
            'file' => 'max:2000|mimes:doc,docx,pdf' //new DocType() //
            ]
        );
        $tb = AgendaAjuan::find($id);
        $tb->nm_agenda   = $req->nm_agenda;
        $tb->sistem_vote = $req->sistem_pem;

        if ($req->file('file')!='') {
            $file = $req->file('file');
            $ext  = $file->getClientOriginalExtension();
            $newName = rand(100000,1001238912).".".$ext;
            $file->move('uploads/surat',$newName);

            $tb->file       = $newName;
        }elseif($req->fakultas!=''){
            $tb->kat_jurusan = $req->jurusan;
            $tb->kat_fakultas= $req->fakultas;
        }
        $tb->tgl_agenda  = $req->tgl_agenda;
        $tb->timeA1      = $req->timeA1;
        $tb->timeA2      = $req->timeA2;
        $tb->ket         = 'belum diverifikasi'; //agenda sudah ada
        $tb->save();

    	return redirect('/pengajuan agenda')
        ->with('pesan', 'Data berhasil disimpan');
    }

    function delete($id) {
    	AgendaAjuan::find($id)->delete();
    	
    	return redirect()->back()
        ->with('pesan', 'Data berhasil dihapus');
    } 
    // function Admin!=SuperAdmin


    function tolakAcara($id) {
        $tb = AgendaAjuan::find($id);
        $tb->ket = 'agenda ditolak';
        $tb->save();
        
        return redirect()->back()
        ->with('pesan', 'Data berhasil disimpan');
    } 
}
