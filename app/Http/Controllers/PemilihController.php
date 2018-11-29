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
            // return redirect()->action('AgendaController@agendaview', ['idAgenda' => \Crypt::encrypt($idAgenda)]) 
            return redirect()->back()
            ->with('pesanP', 'Data berhasil disimpan');  
        }else{
            // return redirect()->action('AgendaController@agendaview', ['idAgenda' => \Crypt::encrypt($idAgenda)])
            return redirect()->back()
            ->with('pesanE', 'Data gagal tersimpan');  
        }
    }

    function delete($id, $idAgenda) {
        Pemilih::find($id)->delete();

        // return redirect()->action('AgendaController@agendaview', ['idAgenda' => \Crypt::encrypt($idAgenda)]) //
        return redirect()->back()
        ->with('pesanP', 'Data berhasil dihapus');
    }

    function deleteChecked($IdAgenda) {
        Pemilih::where('agenda_id', $IdAgenda)->delete();

        // return redirect()->action('AgendaController@agendaview', ['idAgenda' => \Crypt::encrypt($IdAgenda)]) //
        return redirect()->back()
        ->with('pesanP', 'Data berhasil dihapus');
    }
}
