<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use App\Kandidat;
use App\Agenda;

class KandidatController extends Controller
{
    function daftar($nmAgenda){
        $tb = Agenda::where('nm_agenda',$nmAgenda)->first();
        return view('views_mahasiswa.form_daftar_calon')
        ->with('tb', $tb);
    }

    function insert(Request $req, $idAgenda){
        $tb              = new Kandidat;
        $tb->nim         = $req->nim;
        $tb->nama        = $req->nama;
        $tb->foto        = $req->foto;
        $tb->jurusan     = $req->jurusan;
        $tb->angkatan    = $req->th_angkatan;
        $tb->agenda_id   = $idAgenda;
        $tb->visi        = $req->visi;
        $tb->misi        = $req->misi;
        $tb->save();

        return redirect('/daftar calon')
        ->with('pesanNyalon','berhasil mendaftar');
    }


    // function show(){
    // 	$tb = Kandidat::all();

    // 	return view('views_admin.Kandidat_tabel')
    // 	->with('data', $tb);
    // }

    // function viewInsert(){
    // 	$tbAgenda = Agenda::all();

    // 	return view('views_admin.Kandidat_tambah')
    // 	->with('agenda', $tbAgenda);
    // }
    // function insert(Request $req) {
    //     // $this->validate($req, [
    //     //      'nim'     => 'required|integer|min:10|max:10',
    //     //      'nama'    => 'required|string|min:6|max:255',
    //     //      'foto'    => 'required|file|max:2000', //max 2MB
    //     //      'password' => 'required|string|min:6|regex:/^.*(?=.*[a-zA-Z])(?=.*[0-9]).*$/|confirmed',
    //     //  ]);
        
    //     $cekJurAg  = Agenda::find($req->agenda_id)->kat_jurusan; //cek kategori jurusan agenda 
    //     $cekFakAg  = Agenda::find($req->agenda_id)->kat_fakultas; //cek kategori jurusan agenda 

    //     //----------------------------------------------------------------- 
    //     $cekMhs1 = Mahasiswa::where('nim',$req->nim)->get();
    //     $cekMhs2 = Mahasiswa::where('nim',$req->nim)->where('fakultas', $cekFakAg)->get();
    //     $cekMhs3 = Mahasiswa::where('nim',$req->nim)->where('jurusan', $cekJurAg)->get();

    //     if ($cekFakAg=='Semua Mahasiswa') {
    //         if (count($cekMhs1)==0) {
    //             return redirect()->action('AgendaController@agendaview', ['id' => $req->agenda_id]) //return ke 
    //             ->with('pesanErr', 'NIM tidak ditemukan');
    //         }else{
    //             $tb = new Kandidat;
    //             $tb->nim        = $req->nim;
    //             $tb->nama       = Mahasiswa::where('nim',$req->nim)->first()->nama;

    //             $file = $req->file('foto');
    //             $ext  = $file->getClientOriginalExtension();
    //             $newName = rand(100000,1001238912).".".$ext;
    //             $file->move('uploads/file',$newName);

    //             $tb->foto       = $newName;
    //             $tb->jurusan    = Mahasiswa::where('nim',$req->nim)->first()->jurusan;;
    //             $tb->angkatan   = Mahasiswa::where('nim',$req->nim)->first()->th_angkatan;
    //             $tb->agenda_id  = $req->agenda_id;
    //             $tb->visi       = $req->visi;
    //             $tb->misi       = $req->misi;
    //             $tb->save();

    //             return redirect()->action('AgendaController@agendaview', ['id' => $req->agenda_id]) //return ke detail agenda
    //             ->with('pesan', 'Data berhasil disimpan');
    //         }
    //     }
    //     elseif ($cekJurAg=='Semua Jurusan') {
    //         if (count($cekMhs2)==0) {
    //             return redirect()->action('AgendaController@agendaview', ['id' => $req->agenda_id]) //return ke 
    //             ->with('pesanErr', 'NIM tidak terdaftar di fakultas');
    //         }else{
    //             $tb = new Kandidat;
    //             $tb->nim        = $req->nim;
    //             $tb->nama       = Mahasiswa::where('nim',$req->nim)->first()->nama;

    //             $file = $req->file('foto');
    //             $ext  = $file->getClientOriginalExtension();
    //             $newName = rand(100000,1001238912).".".$ext;
    //             $file->move('uploads/file',$newName);

    //             $tb->foto       = $newName;
    //             $tb->jurusan    = Mahasiswa::where('nim',$req->nim)->first()->jurusan;;
    //             $tb->angkatan   = Mahasiswa::where('nim',$req->nim)->first()->th_angkatan;
    //             $tb->agenda_id  = $req->agenda_id;
    //             $tb->visi       = $req->visi;
    //             $tb->misi       = $req->misi;
    //             $tb->save();

    //             return redirect()->action('AgendaController@agendaview', ['id' => $req->agenda_id]) //return ke detail agenda
    //             ->with('pesan', 'Data berhasil disimpan');
    //         }
    //     }
    //     else{
    //         if (count($cekMhs3)==0) {
    //             return redirect()->action('AgendaController@agendaview', ['id' => $req->agenda_id]) //return ke 
    //             ->with('pesanErr', 'NIM tidak terdaftar di jurusan');
    //         }else{
    //             $tb = new Kandidat;
    //             $tb->nim        = $req->nim;
    //             $tb->nama       = Mahasiswa::where('nim',$req->nim)->first()->nama;

    //             $file = $req->file('foto');
    //             $ext  = $file->getClientOriginalExtension();
    //             $newName = rand(100000,1001238912).".".$ext;
    //             $file->move('uploads/file',$newName);

    //             $tb->foto       = $newName;
    //             $tb->jurusan    = Mahasiswa::where('nim',$req->nim)->first()->jurusan;;
    //             $tb->angkatan   = Mahasiswa::where('nim',$req->nim)->first()->th_angkatan;
    //             $tb->agenda_id  = $req->agenda_id;
    //             $tb->visi       = $req->visi;
    //             $tb->misi       = $req->misi;
    //             $tb->save();

    //             return redirect()->action('AgendaController@agendaview', ['id' => $req->agenda_id]) //return ke detail agenda
    //             ->with('pesan', 'Data berhasil disimpan');
    //         }
    //     }
    //     //-----------------------------------------------------------------
    // }
    
    function edit($id){
        $tb = Kandidat::find($id);
        $tbA = Agenda::all();

        return view('/Kandidat_edit')
        ->with('agenda', $tbA)
        ->with('data', $tb);
    }

    function update(Request $req, $id) {
        // $cekMhs1 = Mahasiswa::where('nim',$req->nim)->where('nama', $req->nama)->get();
        // $cekMhs2 = Mahasiswa::where('nim',$req->nim)->where('kat_jurusan',$req->jurusan)->get();
        // $cekJur1 = Agenda::where('id', $req->agenda_id)->where('kat_jurusan',$req->jurusan)->get();
        // $cekJur2 = Agenda::where('id', $req->agenda_id)->where('kat_jurusan','Semua Jurusan')->get();
        
        // if (count($cekMhs1)==0) {
        //     return redirect()->action('KandidatController@edit', ['id' => $id])
        //     ->with('pesan', 'NIM dan Nama tidak sesuai');
        // }

        // else if (count($cekMhs2)==0) {
        //     return redirect()->action('KandidatController@edit', ['id' => $id])
        //     ->with('pesan', 'NIM tidak terdaftar dijurusan');
        // }

        // else{
        //     if(count($cekJur1)!=0 || count($cekJur2)!=0) {
        //         $tb = Kandidat::find($id); //::create($req->all());
        //         $tb->nim        = $req->nim;
        //         $tb->nama       = $req->nama;

        //         if ($req->foto==null) {
        //             $tb->jurusan    = $req->jurusan;
        //             $tb->angkatan   = $req->angkatan;
        //             $tb->agenda_id  = $req->agenda_id;
        //             $tb->visi       = $req->visi;
        //             $tb->misi       = $req->misi;
        //             $tb->save();
        //         }else{
        //             $file = $req->file('foto');
        //             $ext  = $file->getClientOriginalExtension();
        //             $newName = rand(100000,1001238912).".".$ext;
        //             $file->move('uploads/file',$newName);
                    
        //             $tb->foto       = $newName;
        //             $tb->jurusan    = $req->jurusan;
        //             $tb->angkatan   = $req->angkatan;
        //             $tb->agenda_id  = $req->agenda_id;
        //             $tb->visi       = $req->visi;
        //             $tb->misi       = $req->misi;
        //             $tb->save();
        //         }
        //         return redirect()->action('AgendaController@agendaview', ['id' => $req->agenda_id]) //return ke detail agenda
        //         ->with('pesan', 'Data berhasil diupdate');
        //     }else{
        //         return redirect()->action('KandidatController@edit', ['id' => $id])
        //         ->with('pesan', 'Jurusan tidak terkategori');
        //     }
        // }
    }

    function delete($id, $agendaid) {
        Kandidat::find($id)->delete();

        return redirect()->action('AgendaController@agendaview', ['id' => $agendaid])
        ->with('pesan', 'Data berhasil dihapus');
    }
}
