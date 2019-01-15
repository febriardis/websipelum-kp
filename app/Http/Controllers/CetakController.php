<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kandidat;
use App\Pemilih;
use App\Agenda;

use PDF;

class CetakController extends Controller
{
    function cetakKandidat($idAgenda) 
    {
        $agenda    = Agenda::find($idAgenda)->nm_agenda;
        $kandidats = Kandidat::where('agenda_id', $idAgenda)->get();
        $pdf       = PDF::loadView('report.kandidat', compact('kandidats','idAgenda'));
        $pdf->setPaper('A4', 'portrait');

        return $pdf->download('daftar-kandidat('.$agenda.").".'pdf');
    }

    function cetakPemilih($idAgenda) 
    {
    	$agenda   = Agenda::find($idAgenda)->nm_agenda;
        $pemilihs = Pemilih::where('agenda_id', $idAgenda)->get();
        $pdf      = PDF::loadView('report.pemilih', compact('pemilihs','idAgenda'));
        $pdf->setPaper('A4', 'portrait');

        return $pdf->download('daftar-pemilih('.$agenda.").".'pdf');
    }
}
