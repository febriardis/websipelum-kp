<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Fakultas;
use App\TbOrganisasi;

class OrganisasiController extends Controller
{
	function showOrganisasi($ket,$ket2){
		$cekFak = Fakultas::where('nm_fakultas',$ket2)->value('id');
		$cekJur = Jurusan::where('nm_jurusan',$ket2)->value('id');
		//$cekOrg = TbOrganisasi::where([['fak_id',$cekFak],['jur_id',$cekJur]])->get();
		$cekOrg = TbOrganisasi::where(function ($q) use($cekFak, $cekJur, $ket){
			$q->where([['fak_id','=', $cekFak], ['ket_organisasi','=', $ket]])
			->orWhere([['jur_id','=', $cekJur], ['ket_organisasi','=', $ket]]);
		})->get();

		return view('views_mahasiswa.organisasi')
		->with('ket',$ket)
		->with('ket2',$ket2)
		->with('id_fak',$cekFak)
		->with('id_jur',$cekJur)
		->with('tb', $cekOrg);
	}

	function show($ket,$ket2) {
		$cekFak = Fakultas::where('nm_fakultas',$ket2)->value('id');
		$cekJur = Jurusan::where('nm_jurusan',$ket2)->value('id');
		//$cekOrg = TbOrganisasi::where([['fak_id',$cekFak],['jur_id',$cekJur]])->get();	
		$cekOrg = TbOrganisasi::where(function ($q) use($cekFak, $cekJur, $ket){
			$q->where([['ket_organisasi','=', $ket],['fak_id','=', $cekFak]])
			->orWhere([['ket_organisasi','=', $ket],['jur_id','=', $cekJur]]);
		})->get();

		return view('views_admin.organisasi_view')
		->with('ket',$ket)
		->with('ket2',$ket2)
		->with('id_fak',$cekFak)
		->with('id_jur',$cekJur)
		->with('tb', $cekOrg);
	}

	function insertNama(Request $req) {
		$tb = new TbOrganisasi;
		$tb->fak_id = $req->idFak;
		$tb->jur_id = $req->idJur;
		$tb->nm_organisasi = $req->nmOrg;
		$tb->ket_organisasi = $req->ketOrg;
		$tb->visi = '';
		$tb->misi = '';
		$tb->save();

        return redirect()->action('OrganisasiController@show', ['ket' => $req->ket, 'ket2' => $req->ket2]);
	}
	
	function updateNama(Request $req, $id) {
		$tb = TbOrganisasi::find($id);
		$tb->nm_organisasi = $req->nmOrg;
		$tb->save();

        return redirect()->action('OrganisasiController@show', ['ket' => $req->ket, 'ket2' => $req->ket2]);
	}

	function updateVisiMisi(Request $req, $id) {
		$tb = TbOrganisasi::find($id);
		$tb->visi = $req->visi;
		$tb->misi = $req->misi;
		$tb->save();

        return redirect()->action('OrganisasiController@show', ['ket' => $req->ket, 'ket2' => $req->ket2]);
	}
}
