<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agenda;

class HomeController extends Controller
{
    function dashboard() {
    	$tb = Agenda::orderBy('created_at', 'ASC')->get(); 
    	return view('views_admin.dashboard_admin')
    	->with("tbAgenda", $tb);
    }

}
