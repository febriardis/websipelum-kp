<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;
use App\Pemilih;
use App\Voting;

class VoteController extends Controller 
{
    // function admin
    function tableQuickCount(){
        $tb = Agenda::all();

        return view('views_admin.quickcount_tabel')
        ->with('tbAgenda', $tb);
    }

    function viewQuickCount($idAgenda){
        $id = \Crypt::decrypt($idAgenda);
        $tb = Voting::latest()->where('agenda_id', $id)->get();

        return view('views_admin.quickcount_view')
        ->with('idAgenda', $id)
        ->with('tbVoting', $tb);
    }
    // ~/function admin

    function QuickCountView() {
        $agenda = Agenda::where('tgl_agenda', \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d'))->get();

        return view('views_mahasiswa.quick_count')
        ->with('agenda', $agenda);
    }

    function voteView(){
        $agenda = Agenda::where('tgl_agenda', \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d'))->get();

    	return view('views_mahasiswa.vote')
        ->with('agenda', $agenda);
    }

    function vote($idAgenda, $idKandidat, $idPemilih) {  
        $tbPemilih           = Pemilih::find($idPemilih);
        $tbPemilih->ket_vote = \Crypt::encrypt('sudah memilih');
        $tbPemilih->save();

        $nilTb = Voting::where([['agenda_id',$idAgenda],['kandidat_id',$idKandidat]])->value('jumlah'); //nilai di tabel database 
        $nilT  = \Crypt::decrypt($nilTb); 
        $nil   = $nilT+1;      
        
        $tbVote = Voting::where([['agenda_id',$idAgenda],['kandidat_id',$idKandidat]])->first(); 
        $tbVote->jumlah = \Crypt::encrypt($nil); 
        $tbVote->save();

    	// return redirect('/pemilihan')
        return redirect()->back()
        ->with('pesanVote','berhasil memilih');
    }
}
