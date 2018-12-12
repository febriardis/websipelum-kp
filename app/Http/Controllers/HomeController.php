<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use App\Banner;
use App\Content;

class HomeController extends Controller
{
    function home(){
		$banners  = Banner::all();
        $contents = Content::all();

		return view('views_mahasiswa.index')
		->with('banners', $banners)
        ->with('contents', $contents);
	}

    function dashboard() {
    	$tb = Agenda::latest()->get();//orderBy('created_at', 'ASC')->get(); 
    	return view('views_admin.index')
    	->with("tbAgenda", $tb);
    }
}
