<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;//
use App\Mahasiswa;
use App\Agenda;

class MhsController extends Controller
{
    function show(){ //show table mahasiswa
        if (Auth::user()->ket=='HMJ') {
            $tb = Mahasiswa::where('jurusan', Auth::user()->ket2)->get();
        }elseif (Auth::user()->ket=='KPU F'){
            $tb = Mahasiswa::where('fakultas', Auth::user()->ket2)->get();
        }else {
            $tb = Mahasiswa::all();
        }

    	return view('views_admin.tabel_mahasiswa')
    	->with('tbMhs', $tb);
    }


    function ShowTabelAgenda(){
    	$tb = Agenda::all();
    	return view('views_mahasiswa.tabel_agenda')
    	->with('tbAgenda', $tb);
    }
}
