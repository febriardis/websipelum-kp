<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Admin;
use App\Agenda;
use  App\Kandidat;

class AdminController extends Controller
{
    function show(){
    	$tb = Admin::all();
    	return view('views_admin.admin_tabel')
    	->with('tbAdmin',$tb);
    }

    function insert(Request $req){
    	$tbCek = Admin::where('username', $req->username)->get();

    	if (count($tbCek)==0) {
    		$tb = new Admin;
    		$tb->nama 	  = $req->nama;
    		$tb->username = $req->username;
    		$tb->password = Hash::make($req->password);
    		$tb->ket      = $req->ket;
            $tb->ket2     = $req->ket2;
    		$tb->save();

		    return redirect('/tabel admin')
		   	->with('pesan', 'Data berhasil disimpan');
    	}else{
    		return redirect()->back()
    		->with('pesan', 'Username Sudah Terdaftar');
    	}
    }
    
    function edit($id){
        $tb = Admin::find($id);

        return view('views_admin.admin_edit')
        ->with('admin', $tb);
    }
    
    function update(){

    }
    
    function delete($id){
        Admin::find($id)->delete();
        
        return redirect()->back()
        ->with('pesan', 'Data berhasil dihapus');
    }
}
