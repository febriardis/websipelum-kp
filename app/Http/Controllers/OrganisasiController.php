<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Fakultas;
use App\TbOrganisasi;

class OrganisasiController extends Controller
{
	//show in mahasiswa page
	function showOrganisasi($ket,$ket2){
		$cekJur = Jurusan::where('nm_jurusan',$ket2)->value('id');
		$cekFak = Fakultas::where('nm_fakultas',$ket2)->value('id');
	
		if (count($cekJur)!=0) {
			$cekOrg = TbOrganisasi::where([['ket_organisasi',$ket],['jur_id',$cekJur]])->get();	
		}elseif (count($cekFak)!=0) {
			$cekOrg = TbOrganisasi::where([['ket_organisasi',$ket],['fak_id',$cekFak]])->get();	
		}
		else { //else org=demaU atau semaU
			$cekOrg = TbOrganisasi::where('ket_organisasi',$ket)->get();	
		}

		return view('views_mahasiswa.organisasi')
		->with('ket',$ket)
		->with('ket2',$ket2)
		->with('id_fak',$cekFak)
		->with('id_jur',$cekJur)
		->with('tb', $cekOrg);
	}

	//show in admin page
	function showOrgU($ket) { //SEMA-U or DEMA-U
		$cekJur ='';
		$cekFak ='';
		$ket2   ='';
		$cekOrg = TbOrganisasi::where('ket_organisasi',$ket)->get();	
		
		return view('views_admin.organisasi_view')
		->with('ket',$ket)
		->with('ket2',$ket2)
		->with('id_fak',$cekFak)
		->with('id_jur',$cekJur)
		->with('tb', $cekOrg);
	}

	function show($ket, $ket2) {
		//karena ditabelnya null, jadi kalo jur_id=null itu terbaca;
		$cekJur = Jurusan::where('nm_jurusan',$ket2)->value('id');
		$cekFak = Fakultas::where('nm_fakultas',$ket2)->value('id');
	
		if (count($cekJur)!=0) {
			$cekOrg = TbOrganisasi::where([['ket_organisasi',$ket],['jur_id',$cekJur]])->get();	
		}elseif (count($cekFak)!=0) {
			$cekOrg = TbOrganisasi::where([['ket_organisasi',$ket],['fak_id',$cekFak]])->get();	
		}
		
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

		if($req->ket2!= ''){
        	return redirect()->action('OrganisasiController@show', ['ket' => $req->ket, 'ket2' => $req->ket2]);
    	}else{
        	return redirect()->action('OrganisasiController@showOrgU', ['ket' => $req->ket]);
    	}
	}
	
	function updateNama(Request $req, $id) {
		$tb = TbOrganisasi::find($id);
		$tb->nm_organisasi = $req->nmOrg;
		$tb->save();

		if($req->ket2!= ''){
        	return redirect()->action('OrganisasiController@show', ['ket' => $req->ket, 'ket2' => $req->ket2]);
    	}else{
        	return redirect()->action('OrganisasiController@showOrgU', ['ket' => $req->ket]);
    	}
	}

	function updateVisiMisi(Request $req, $id) {
		$tb = TbOrganisasi::find($id);
		$tb->visi = $req->visi;
		$tb->misi = $req->misi;
		$tb->save();

		if($req->ket2!= ''){
        	return redirect()->action('OrganisasiController@show', ['ket' => $req->ket, 'ket2' => $req->ket2]);
    	}else{
        	return redirect()->action('OrganisasiController@showOrgU', ['ket' => $req->ket]);
    	}
	}
}
