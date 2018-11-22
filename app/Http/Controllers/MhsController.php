<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Agenda;

class MhsController extends Controller
{
    function show(){ //show table mahasiswa
    	$tb = Mahasiswa::all();

    	return view('views_admin.tabel_mahasiswa')
    	->with('tbMhs', $tb);
    }


    function ShowTabelAgenda(){
    	$tb = Agenda::all();
    	return view('views_mahasiswa.tabel_agenda')
    	->with('tbAgenda', $tb);
    }
}
