<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita_acara;

class BeritaAcaraController extends Controller {
    function show()
    {
    	$tb = Berita_acara::orderBy('created_at', 'DESC')->get();
    	return view('views_admin.beritaacara_tabel')
    	->with('tb', $tb);
    }
    
    // function Admin!=SuperAdmin
    function insert(Request $req, $AdminId)
    {
    	$tb = new Berita_acara;
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

    	return redirect('/berita acara')
        ->with('pesan','Surat berhasil diupload');
    }

    function edit()
    {
    	# code...
    }


    function update()
    {
    	# code...
    }

    function delete($id) {
    	Berita_acara::find($id)->delete();
    	return redirect('/berita acara')
    	->with('pesan', 'Data berhasil dihapus');
    } 
    // function Admin!=SuperAdmin


    function tolakAcara($id) {
        $tb = Berita_acara::find($id);
        $tb->ket = 'acara ditolak';
        $tb->save();
        
        return redirect('/berita acara')
        ->with('pesan', 'Data berhasil disimpan');
    } 
}
