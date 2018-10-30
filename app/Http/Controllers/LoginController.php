<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;//
use App\Admin;

class LoginController extends Controller
{
    function login(Request $req)
    {
    	if (Auth::guard('mahasiswa')->attempt([
    		'nim' => $req->nim,
    		'password' => $req->password
    	])) {
    		return redirect('/beranda');
    	}
    	elseif (Auth::guard('admin')->attempt([
    		'username' => $req->username,
    		'password' => $req->password
    	])) {
            return redirect('/dashboard');
    	}else{
    		return redirect('/')
            ->with('pesan','Username dan Password Salah');
    	}
    }

    function keluar(){
    	if (Auth::guard('mahasiswa')->check()) {
    		Auth::guard('mahasiswa')->logout();
            return redirect('/');
    	}elseif (Auth::guard('admin')->check()) {
    		Auth::guard('admin')->logout();    
            return redirect('/admin');
        }

    }
}
