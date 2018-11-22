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
        $tbPemilih           = Pemilih::find($idPemilih);
        $tbPemilih->ket_vote = \Crypt::encrypt('sudah memilih');
        $tbPemilih->save();

        $nilTb = Voting::where([['agenda_id',$idAgenda],['kandidat_id',$idKandidat]])->value('jumlah'); //nilai di tabel database 
        $nilT = \Crypt::decrypt($nilTb); 
        $nil = $nilT+1;      
        $tbVote = Voting::where([['agenda_id',$idAgenda],['kandidat_id',$idKandidat]])->first(); 
        $tbVote->jumlah = \Crypt::encrypt($nil); 
        $tbVote->save();
        //return \Crypt::decrypt($tbVote->jumlah);

    	return redirect('/pemilihan')
        ->with('pesanVote','berhasil memilih');
    }
}
