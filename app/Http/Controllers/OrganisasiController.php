<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Fakultas;
use App\Organisasi;
use App\OrgJabtum;
use App\OrgBidang;
use App\OrgStrukBid;

class OrganisasiController extends Controller
{
	//show in mahasiswa page
	function showOrganisasi($ket,$ket2){
		$cekJur = Jurusan::where('nm_jurusan',$ket2)->value('id');
		$cekFak = Fakultas::where('nm_fakultas',$ket2)->value('id');
	
		if (count($cekJur)!=0) {
			$cekOrg = Organisasi::where([['ket_organisasi',$ket],['jur_id',$cekJur]])->get();	
		}elseif (count($cekFak)!=0) {
			$cekOrg = Organisasi::where([['ket_organisasi',$ket],['fak_id',$cekFak]])->get();	
		}
		else { //else org=demaU atau semaU
			$cekOrg = Organisasi::where('ket_organisasi',$ket)->get();	
		}

		return view('views_mahasiswa.organisasi')
		->with('id_fak',$cekFak)
		->with('id_jur',$cekJur)
		->with('tb', $cekOrg);
	}
	// -/show in mahasiswa page

	//show in admin page
	function showOrgU($ket) { //SEMA-U or DEMA-U
		$cekJur ='';
		$cekFak ='';
		$cekOrg = Organisasi::where('ket_organisasi',$ket)->get();	
		
		return view('views_admin.organisasi_view')
		->with('id_fak',$cekFak)
		->with('id_jur',$cekJur)
		->with('tb', $cekOrg);
	}

	function show($ket, $ket2) {
		$cekJur = Jurusan::where('nm_jurusan',$ket2)->value('id');
		$cekFak = Fakultas::where('nm_fakultas',$ket2)->value('id');
	
		if (count($cekJur)!=0) {
			$cekOrg = Organisasi::where([['ket_organisasi',$ket],['jur_id',$cekJur]])->get();	
		}elseif (count($cekFak)!=0) {
			$cekOrg = Organisasi::where([['ket_organisasi',$ket],['fak_id',$cekFak]])->get();	
		}
		
		return view('views_admin.organisasi_view')
		->with('id_fak',$cekFak)
		->with('id_jur',$cekJur)
		->with('tb', $cekOrg);
	}

	function insertNama(Request $req) {
		$tb = new Organisasi;
		$tb->fak_id = $req->idFak;
		$tb->jur_id = $req->idJur;
		$tb->nm_organisasi = $req->nmOrg;
		$tb->ket_organisasi = $req->ketOrg;
		$tb->visi = '';
		$tb->misi = '';
		$tb->save();

		return redirect()->back();
	}
	
	function updateNama(Request $req, $id) {
		$tb = Organisasi::find($id);
		$tb->nm_organisasi = $req->nmOrg;
		$tb->save();

		return redirect()->back();
	}

	function updateVisiMisi(Request $req, $id) {
		$tb = Organisasi::find($id);
		$tb->visi = $req->visi;
		$tb->misi = $req->misi;
		$tb->save();

		return redirect()->back();
	}

	// jabatan umum

	function insertJabtum(Request $req, $id) {
		$tb             = new OrgJabtum;
		$tb->org_id     = $id;
		$tb->nm_jabatan = $req->nm_jabatan;
		$tb->nm_penjabat= $req->nm_penjabat;
		$tb->save();

		return redirect()->back();
	}

	function updateJabtum(Request $req, $id) {
		$tb             = OrgJabtum::find($id);
		$tb->nm_jabatan = $req->nm_jabatan;
		$tb->nm_penjabat= $req->nm_penjabat;
		$tb->save();

		return redirect()->back();
	}

	function deleteJabtum($id) {
		OrgJabtum::find($id)->delete();
		
		return redirect()->back();
	}
	// jabatan umum

	// bidang - bidang
	function insertBidang(Request $req, $id) {
		$tb             = new OrgBidang;
		$tb->org_id     = $id;
		$tb->nm_bidang = $req->nm_bidang;
		$tb->save();

		return redirect()->back();
	}

	function updateBidang(Request $req, $id) {
		$tb             = OrgBidang::find($id);
		$tb->nm_bidang = $req->nm_bidang;
		$tb->save();

		return redirect()->back();
	}

	function deleteBidang($id) {
		OrgBidang::find($id)->delete();

		return redirect()->back();
	}
	// bidang - bidang

	// struktur bidang
	function insertStrukBid(Request $req, $idBidang) {
		$tb             = new OrgStrukBid;
		$tb->bidang_id  = $idBidang;
		$tb->nm_penjabat= $req->nm_penjabat;
		$tb->nm_jabatan = $req->nm_jabatan;
		$tb->angkatan   = $req->angkatan;
		$tb->save();

		return redirect()->back();
	}

	function updateStrukBid(Request $req, $id) {
		$tb             = OrgStrukBid::find($id);
		$tb->nm_penjabat= $req->nm_penjabat;
		$tb->nm_jabatan = $req->nm_jabatan;
		$tb->angkatan   = $req->angkatan;
		$tb->save();

		return redirect()->back();
	}

	function deleteStrukBid($id) {
		OrgStrukBid::find($id)->delete();

		return redirect()->back();
	}
	// struktur bidang
}
