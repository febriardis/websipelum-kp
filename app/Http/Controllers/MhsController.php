<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class MhsController extends Controller
{
    function show(){
    	$tb = Mahasiswa::all();

    	return view('mhs_tabel')
    	->with('tbMhs', $tb);
    }
}
