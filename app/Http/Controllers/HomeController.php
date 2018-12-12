<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;

class HomeController extends Controller
{
    function dashboard() {
    	$tb = Agenda::latest()->get();//orderBy('created_at', 'ASC')->get(); 
    	return view('views_admin.index')
    	->with("tbAgenda", $tb);
    }
}
