<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;//
use App\Admin;

class LoginController extends Controller
{
    function login_mhs(Request $req) {
    	if (Auth::guard('mahasiswa')->attempt([
    		'nim' => $req->nim,
    		'password' => $req->password 
        ])) {
    		return redirect('/beranda');
    	}else{
    		return redirect('/')
            ->with('pesan','Nim atau Password Salah');
    	}
    }

    function login_admin(Request $req) {
        if (Auth::guard('admin')->attempt([
            'username' => $req->username,
            'password' => $req->password
        ])) {
            return redirect('/dashboard');
        }else{
            return redirect('/admin/login')
            ->with('pesan','Username atau Password Salah');
        }
    }

    function keluar(){
    	if (Auth::guard('mahasiswa')->check()) {
    		Auth::guard('mahasiswa')->logout();
            return redirect('/');
    	}elseif (Auth::guard('admin')->check()) {
    		Auth::guard('admin')->logout();    
            return redirect('/admin/login');
        }

    }
}
