<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Banner;

class ContentController extends Controller
{
   	function index(){
   		$banners = Banner::all();
   		$contents = Content::all();

    	return view('views_admin.konten_tabel')
    	->with('banners', $banners)
    	->with('contents', $contents);
    }

    function createSlideshow(Request $req){
    	$this->validate($req, [
            'image'     => 'required|mimes:jpeg,jpg,png|max:2000'
        ]);

    	$tb = new Banner;

    	$file = $req->file('image');
        $ext  = $file->getClientOriginalExtension();
        $newName = rand(100000,1001238912).".".$ext;
        $file->move('uploads/gambar-slide',$newName);

        $tb->image        = $newName;
      	$tb->head_caption = $req->head;
      	$tb->body_caption = $req->body;
      	$tb->save();

    	return redirect('/konten berita')
    	->with('pesanK', 'Data berhasil ditambahkan');
    }

    function editSlideshow($id){
    	$banners = Banner::find($id);

    	return view('views_admin.konten_slide_edit')
    	->with('banners', $banners);
    }

    function updateSlideshow(Request $req, $id){
    	$this->validate($req, [
            'image'     => 'mimes:jpeg,jpg,png|max:2000'
        ]);

    	$tb = Banner::find($id);
    	if ($req->image!='') {
	    	$file = $req->file('image');
	        $ext  = $file->getClientOriginalExtension();
	        $newName = rand(100000,1001238912).".".$ext;
	        $file->move('uploads/gambar-slide',$newName);

	        $tb->image        = $newName;
    	}

      	$tb->head_caption = $req->head;
      	$tb->body_caption = $req->body;
      	$tb->save();

    	return redirect('/konten berita')
    	->with('pesanK', 'Data berhasil diupdate');
    }

    function deleteSlideshow($id) {
    	Banner::find($id)->delete();

    	return redirect('/konten berita')
    	->with('pesanK', 'Data berhasil dihapus');
    }

    // ============= berita ===================

    function createBerita(Request $req){
    	$tb          = new Content;
      	$tb->title   = $req->title;
      	$tb->content = $req->content;
      	$tb->save();

    	return redirect('/konten berita')
    	->with('pesanK', 'Data berhasil ditambahkan');
    }

    function editBerita($id){
    	$contents = Content::find($id);

    	return view('views_admin.konten_berita_edit')
    	->with('contents', $contents);
    }

    function updateBerita(Request $req, $id){
    	$tb          = Content::find($id);
      	$tb->title   = $req->title;
      	$tb->content = $req->content;
      	$tb->save();

    	return redirect('/konten berita')
    	->with('pesanK', 'Data berhasil diupdate');
    }

    function deleteBerita($id) {
    	Content::find($id)->delete();

    	return redirect('/konten berita')
    	->with('pesanK', 'Data berhasil dihapus');
    }

}
