<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use App\Banner;
use App\Content;

class HomeController extends Controller
{
    function search(Request $req){
        $search   = $req->q;
        $banners  = Banner::where('id',0)->get();
        $contents = Content::where('title', 'like', '%'.$search.'%')->orWhere('content', 'like', '%'.$search.'%')->get();
        $agendasT = Agenda::latest()->where('tgl_agenda', '>=', \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d'))->limit(10)->get();
        $agendasL  = Agenda::latest()->where('tgl_agenda', '<', \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d'))->limit(10)->get();

        return view('views_mahasiswa.index')
        ->with('banners', $banners)
        ->with('contents', $contents)
        ->with('agendasT', $agendasT)
        ->with('agendasL', $agendasL);
    }

    function more(){
        $banners  = Banner::where('id',0)->get();
        $contents = Content::all();
        $agendasT = Agenda::latest()->where('tgl_agenda', '>=', \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d'))->limit(10)->get();
        $agendasL  = Agenda::latest()->where('tgl_agenda', '<', \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d'))->limit(10)->get();

        return view('views_mahasiswa.index')
        ->with('banners', $banners)
        ->with('contents', $contents)
        ->with('agendasT', $agendasT)
        ->with('agendasL', $agendasL);
    }

    function home(){
		$banners  = Banner::all();
        $contents = Content::latest()->limit(6)->get();
        $agendasT  = Agenda::latest()->where('tgl_agenda', '>=', \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d'))->limit(10)->get();
        $agendasL  = Agenda::latest()->where('tgl_agenda', '<', \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d'))->limit(10)->get();

		return view('views_mahasiswa.index')
		->with('banners', $banners)
        ->with('contents', $contents)
        ->with('agendasT', $agendasT)
        ->with('agendasL', $agendasL);
	}

    function dashboard() {
    	$tb = Agenda::latest()->get();//orderBy('created_at', 'ASC')->get(); 
        $agenda = Agenda::where('tgl_agenda', \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d'))->get();

    	return view('views_admin.index')
    	->with("tbAgenda", $tb)
        ->with('agenda', $agenda);
    }
}
