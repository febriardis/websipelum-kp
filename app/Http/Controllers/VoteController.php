<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;

class VoteController extends Controller
{
    function voteView() {	
    	$tb = Agenda::all();
    	return view('views_pemilih.vote_view')
    	->with('tb', $tb);
    }
}
