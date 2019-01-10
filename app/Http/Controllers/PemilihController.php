<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mahasiswa;
use App\Agenda;
use App\Pemilih;
use App\Jurusan;
use App\Fakultas;
use \Crypt;

class PemilihController extends Controller
{
    //show in mahasiswa page
    function showPemilih($ket,$ket2){
        if ($ket=='HMJ') {
            $Agenda = Agenda::where([['kat_jurusan', $ket2] , ['tgl_agenda','>=', \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d')]])->get();
        }elseif ($ket=='Sema & Dema U') {
            $Agenda = Agenda::where([['kat_fakultas', 'Semua Mahasiswa'] , ['tgl_agenda','>=', \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d')]])->get();
        }elseif ($ket=='Sema & Dema F') {
            $Agenda = Agenda::where([['kat_fakultas', $ket2] , ['tgl_agenda','>=', \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d')]])->get();
        }

        return view('views_mahasiswa.info_dpt')
        ->with('Agenda', $Agenda);
    }
    // -/show in mahasiswa page

    
    // -/show in admin page
    function show(){
        $Agenda = Agenda::where('tgl_agenda','>=', \Carbon\Carbon::now('Asia/Jakarta')->format('Y-m-d'))->get();
        
        return view('views_admin.pemilih_tabel')
        ->with('Agenda', $Agenda);
    }

    function insert(Request $req, $idAgenda){
        $this->validate($req, [
            'nim' => 'required',
        ]);
        
        $loop = $req->nim;
        if (count($loop)!=0) {
            foreach ($loop as $value) {
                $cekMhs = Pemilih::where([['nim', $value],['agenda_id', $idAgenda]])->get();
                if (count($cekMhs)==0) {
                    $tb             = new Pemilih;
                    $tb->nim        = $value;
                    $tb->agenda_id  = $idAgenda;
                    $tb->ket_vote   = \Crypt::encrypt('belum memilih');
                    $tb->save();
                }    
            }
            return redirect()->back()
            ->with('pesanP', 'Data berhasil disimpan');  
        }else{
            return redirect()->back()
            ->with('pesanE', 'Data gagal tersimpan');  
        }
    }

    function delete($id) {
        Pemilih::find($id)->delete();

        return redirect()->back()
        ->with('pesanP', 'Data berhasil dihapus');
    }

    // function deleteChecked() {
    //     $loop = $req->id;
        
    //     if (count($loop)!=0) {
    //         foreach ($loop as $value) {
    //             $cekMhs = Pemilih::find($value)->delete();
    //         }

    //         return redirect()->back()
    //         ->with('pesanP', 'Data berhasil dihapus');  
    //     }else{
    //         return redirect()->back()
    //         ->with('pesanE', 'Tidak ada data yang berhasil dihapus!');  
    //     }
    // }
}
