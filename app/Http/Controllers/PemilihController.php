<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mahasiswa;
use App\Agenda;
use App\Tps;
use App\Pemilih;
use \Crypt;

class PemilihController extends Controller
{
    function show() {
        $tb = Pemilih::all();

        return view('pemilih_tabel')
        ->with('data', $tb);
    }

    function viewInsert(){
        $tb1 = Agenda::all();
        $tb2 = Tps::all();

        return view('pemilih_tambah')
        ->with('tps', $tb2)
        ->with('agenda', $tb1);
    }

    function insert(Request $req){
        $no = 1;

        for($i=1; $i<=$req->jumArr; $i++) {
            $char  = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            $pin   = mt_rand(1000,103912) . $char[rand(0, strlen($char) - 1)] . $char[rand(0, strlen($char) - 1)] . $char[rand(0, strlen($char) - 1)] . $char[rand(0, strlen($char) - 1)];
            $pwd_rand  = str_shuffle($pin);
            $tb             = new Pemilih;
            $tb->nim        = $req->nim[$i];
            $tb->nama       = $req->nama[$i];
            $tb->agenda_id  = $req->agenda_id[$i];
            $tb->username   = $req->nim[$i];
            $tb->password   = Hash::make($pwd_rand);//\Crypt::encrypt($pwd_rand);
            $tb->passwordshow   = $pwd_rand;
            $tb->ket_vote   = 'belum memilih';
            $tb->save();        
        }

        return redirect()->action('AgendaController@agendaview', ['id' => $req->agenda_id[1]]) //
        ->with('pesanP', 'Data berhasil disimpan');  

    }

    // function insert(Request $req){
    //     $cekMhs  = Mahasiswa::where('nim',$req->nim)->where('nama', $req->nama)->get();
    //     $cekjurM = Mahasiswa::where('nim', $req->nim)->first()->jurusan;
    //     $cekJur1 = Agenda::where('id', $req->agenda_id)->where('jurusan', $cekjurM)->get();
    //     $cekJur2 = Agenda::where('id', $req->agenda_id)->where('jurusan', 'Semua Jurusan')->get();
     
    //     if (count($cekMhs)==0) {
    //          return redirect('/tambah pemilih')
    //         ->with('pesan', 'NIM dan Nama tidak sesuai');
    //     }
    //     else{
    //         if(count($cekJur1)!=0 || count($cekJur2)!=0) {
    //             $char  = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    //             $pin   = mt_rand(1000,103912) . $char[rand(0, strlen($char) - 1)] . $char[rand(0, strlen($char) - 1)] . $char[rand(0, strlen($char) - 1)] . $char[rand(0, strlen($char) - 1)];
    //             $pwd_rand  = str_shuffle($pin);
                
    //             $tb             = new Pemilih;
    //             $tb->nim        = $req->nim;
    //             $tb->nama       = $req->nama;
    //             $tb->agenda_id  = $req->agenda_id;
    //             $tb->tps_id     = $req->tps_id;
    //             $tb->username   = $req->nim;
    //             $tb->password   = Hash::make($pwd_rand);
    //             $tb->ket_vote   = 'belum memilih';
    //             $tb->save();

    //             return redirect('/tabel pemilih')
    //             ->with('pesan', 'Data berhasil disimpan')
    //             ->with('username', $req->nim)
    //             ->with('password', $pwd_rand);  
    //         }else{
    //             return redirect('/tambah pemilih')
    //             ->with('pesan', 'Jurusan tidak terkategori');
    //         }
    //     }   
    // }

    function delete($id) {
        Pemilih::find($id)->delete();

        return redirect('/tabel pemilih')
        ->with('pesanP', 'Data berhasil dihapus');
    }

    function reset($IdAgenda) {
        Pemilih::where('agenda_id', $IdAgenda)->delete();

        return redirect()->action('AgendaController@agendaview', ['id' => $IdAgenda]) //
        ->with('pesanP', 'Data berhasil dihapus');
    }
}
