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
    	return view('admin_tabel')
    	->with('tbAdmin',$tb);
    }

    function tambah(){
        return view('admin_tambah')
        ->with('agenda', Kandidat::where('agenda_id',1)->get())
        ->with('tps', Admin::all());

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
    		return redirect('/tambah admin')
    		->with('pesan', 'Username Sudah Terdaftar');
    	}
    }
    
    function edit(){

    }
    
    function update(){

    }
    
    function delete(){

    }
}
