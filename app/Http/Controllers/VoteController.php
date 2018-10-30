<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoteController extends Controller
{
    function voteView()
    {
    	return view('views_pemilih.vote_view');
    }
}
