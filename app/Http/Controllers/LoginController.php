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
            return redirect()->back()->withInput()->with('error_code', 5)
            ->with('pesan','Nim atau password salah');
    	}
    }

    function login_admin(Request $req) {
        if (Auth::guard('admin')->attempt([
            'username' => $req->username,
            'password' => $req->password
        ])) {
            return redirect('/dashboard');
        }else{
            return redirect()->back()->withInput()
            ->with('pesan','Username atau password salah');
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
