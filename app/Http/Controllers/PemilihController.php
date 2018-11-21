<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mahasiswa;
use App\Agenda;
use App\Pemilih;
use \Crypt;

class PemilihController extends Controller
{
    function insert(Request $req, $idAgenda){
        $no = 1;
        for($i=1; $i<=$req->jumArr; $i++) {
            $cekMhs = Pemilih::where([['nim', $req->nim[$i]],['agenda_id', $req->agenda_id[$i]]])->get();

            if (count($cekMhs)==0) {
                $tb             = new Pemilih;
                $tb->nim        = $req->nim[$i];
                $tb->agenda_id  = $req->agenda_id[$i];
                $tb->ket_vote   = \Crypt::encrypt('belum memilih');
                $tb->save();        
            } 
        }

        return redirect()->action('AgendaController@agendaview', ['idAgenda' => \Crypt::encrypt($idAgenda)]) //
        ->with('pesanP', 'Data berhasil disimpan');  

    }

    function delete($id, $idAgenda) {
        Pemilih::find($id)->delete();

        return redirect()->action('AgendaController@agendaview', ['idAgenda' => \Crypt::encrypt($idAgenda)]) //
        ->with('pesanP', 'Data berhasil dihapus');
    }

    // function reset($IdAgenda) {
    //     Pemilih::where('agenda_id', $IdAgenda)->delete();

    //     return redirect()->action('AgendaController@agendaview', ['idAgenda' => \Crypt::encrypt($IdAgenda)]) //
    //     ->with('pesanP', 'Data berhasil dihapus');
    // }

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


}
