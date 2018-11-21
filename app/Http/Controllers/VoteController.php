<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pemilih;
use App\Voting;

class VoteController extends Controller 
{

    function voteView(){
    	return view('views_mahasiswa.vote');
    }

    function QuickCountView() {
    	return view('views_mahasiswa.quick_count');
    }

    function vote(Request $req, $idAgenda, $idKandidat, $idPemilih) {
    	$tb = new Voting;
    	$tb->agenda_id	  = $idAgenda;
    	$tb->kandidat_id  = $idKandidat;
    	$tb->jumlah		  = \Crypt::encrypt(1);
    	$tb->save();

    	$tbPemilih 			 = Pemilih::find($idPemilih);
    	$tbPemilih->ket_vote = \Crypt::encrypt('sudah memilih');
    	$tbPemilih->save();

    	//ganti keterangan voting di tb_pemilih

    	return redirect('/pemilihan');
    }
}
