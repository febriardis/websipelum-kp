<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;

class MhsController extends Controller
{
    function show(){
    	$tb = Mahasiswa::all();

    	return view('views_admin.mahasiswa_tabel')
    	->with('tbMhs', $tb);
    }
}
