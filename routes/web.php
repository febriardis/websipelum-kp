<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
// */

// #----------------------------------------GUEST-------------------------------------------#
Route::get('/', function(){return view('views_mahasiswa.beranda');})->middleware('guest');
Route::get('/hc', 'VoteController@QuickCountView')->middleware('guest');
Route::get('/org/{ket}/{ket2}', 'OrganisasiController@showOrganisasi')->middleware('guest');
Route::get('/admin/login',function(){return view('views_admin.login_form');})->middleware('guest');
Route::post('/login', 'LoginController@login_mhs');
Route::post('/login admin', 'LoginController@login_admin');
Route::get('/keluar', 'LoginController@keluar');

// ------------------------------MAHASISWA------------------------------------
Route::get('/beranda', function(){return view('views_mahasiswa.beranda');})->middleware('auth:mahasiswa');
Route::get('/pemilihan', 'VoteController@voteView')->middleware('auth:mahasiswa');
Route::get('/hitung cepat', 'VoteController@QuickCountView')->middleware('auth:mahasiswa');
Route::get('/show organisasi/{ket}/{ket2}', 'OrganisasiController@showOrganisasi')->middleware('auth:mahasiswa');
Route::get('/daftar calon', 'MhsController@ShowTabelAgenda')->middleware('auth:mahasiswa');
Route::get('/form pendaftaran/{IdAgenda}', 'KandidatController@daftar')->middleware('auth:mahasiswa');
Route::get('/batal daftar/{nim}/{IdAgenda}', 'KandidatController@batalDaftar')->middleware('auth:mahasiswa'); //pembatalan

//======================================ADMIN======================================
Route::get('/dashboard', function () {return view('views_admin.dashboard_admin');})->middleware('auth:admin');

// ================================ADMIN-BERITA-ACARA==============================
Route::get('/pengajuan agenda','PengAgendaController@show')->middleware('auth:admin');
Route::get('/upload pengajuan agenda',function(){return view('views_admin.pengajuan_agenda_form');})->middleware('auth:admin');
Route::post('/upload ajuan/{id}','PengAgendaController@insert')->middleware('auth:admin');
Route::get('/edit pengajuan agenda/{id}','PengAgendaController@edit')->middleware('auth:admin');
Route::post('/edit ajuan/{id}','PengAgendaController@update')->middleware('auth:admin');
Route::get('/cancel/{id}','PengAgendaController@delete')->middleware('auth:admin'); // oleh admin!=superadmin
Route::get('/tolak/{id}','PengAgendaController@tolakAcara')->middleware('auth:admin'); // oleh admin!=superadmin

// ================================ADMIN-KELOLA-ADMIN==================================
Route::get('/tabel admin','AdminController@show')->middleware('auth:admin');
Route::get('/tambah admin',function(){return view('views_admin.admin_tambah');})->middleware('auth:admin');
Route::post('/tambah admin','AdminController@insert');
Route::get('/hapus admin/{id}', 'AdminController@delete');

// ==================================ADMIN-AGENDA`==================================
Route::get('/verifikasi/{id}','AgendaController@verif_view')->middleware('auth:admin');
Route::post('/tambah agenda/{idAdmin}', 'AgendaController@insert');
Route::get('/edit agenda/{id}', 'AgendaController@edit')->middleware('auth:admin');
Route::post('/edit agenda/{id}', 'AgendaController@update');
Route::get('/hapus agenda/{id}', 'AgendaController@delete')->middleware('auth:admin');
Route::get('/tabel agenda', 'AgendaController@show')->middleware('auth:admin');
Route::get('/detail agenda/{IdAgenda}', 'AgendaController@agendaview')->middleware('auth:admin');
//----------------------------------------------------------------------------------
Route::get('/detail kandidat/{nim}/{IdAgenda}', 'KandidatController@viewKandidat')->middleware('auth:admin');
Route::post('/terima kandidat/{id}/{IdAgenda}', 'KandidatController@verifKandidat')->middleware('auth:admin');
Route::get('/tolak kandidat/{id}/{Idagenda}', 'KandidatController@tolakKandidat')->middleware('auth:admin');

// ==================================ADMIN-KANDIDAT==================================
Route::get('/tambah kandidat/{idAgenda}', 'KandidatController@ViewTambah')->middleware('auth:admin');
Route::post('/tambah kandidat/{idAgenda}', 'KandidatController@insertK');

Route::post('/daftar kandidat/{idAgenda}', 'KandidatController@insert');
Route::get('/hapus kandidat/{id}/{idAgenda}', 'KandidatController@delete')->middleware('auth:admin');

// Route::get('/edit balon/{id}', 'KandidatController@edit')->middleware('auth:admin');
// Route::post('/edit balon/{id}', 'KandidatController@update');


// ==================================ADMIN-ORGANISASI==================================
Route::get('/organisasi univ/{ket}', 'OrganisasiController@showOrgU')->middleware('auth:admin');
Route::get('/organisasi/{ket}/{ket2}', 'OrganisasiController@show')->middleware('auth:admin');
Route::post('/nmOrganisasi', 'OrganisasiController@insertNama')->middleware('auth:admin');
Route::post('/UpnmOrganisasi/{id}', 'OrganisasiController@updateNama')->middleware('auth:admin');
Route::post('/UpVMOrganisasi/{id}', 'OrganisasiController@updateVisiMisi')->middleware('auth:admin');
Route::post('/insert jabtum/{idOrg}', 'OrganisasiController@insertJabtum')->middleware('auth:admin');
Route::post('/update jabtum/{id}', 'OrganisasiController@updateJabtum')->middleware('auth:admin');
Route::get('/delete jabtum/{id}/{ket}/{ket2}', 'OrganisasiController@deleteJabtum')->middleware('auth:admin');


// ==================================ADMIN-PEMILIH==================================
Route::post('/tambah pemilih/{idAgenda}','PemilihController@insert');
Route::get('/hapus pemilih/{id}/{idAgenda}', 'PemilihController@delete')->middleware('auth:admin');

// Route::get('/reset pemilih/{IdAgenda}', 'PemilihController@reset')->middleware('auth:admin');

// ==================================ADMIN-QUICKCOUNT==================================
Route::get('/data quick count', 'VoteController@tableQuickCount')->middleware('auth:admin');
Route::get('/detail quick count/{idAgenda}', 'VoteController@viewQuickCount')->middleware('auth:admin');


// =============================ADMIN-SHOW-MAHASISWA================================
Route::get('/tabel mahasiswa', 'MhsController@show')->middleware('auth:admin');


// ==================================VOTE==================================
Route::group(['middleware' => 'throttle:1'], function () {
	Route::post('/vote/{Idagenda}/{IdKandidat}/{IdPemilih}', 'VoteController@vote')->middleware('auth:mahasiswa');
});

//////////////////////////////////AGENDADETAIL////////////////////////////////////////////////
// Route::get('/detail agenda/{id}', 'AgendaDetailController@agendaview')->middleware('auth:admin');
// Route::post('/tambah balon', 'AgendaDetailController@insert');

//////////////////////////////////PEMILIH////////////////////////////////////////////////
// Route::get('/tabel pemilih', 'PemilihController@show')->middleware('auth:admin');
// Route::get('/tambah pemilih', 'PemilihController@viewInsert')->middleware('auth:admin');

// Route::post('/tambah pemilih','PemilihController@insert');
// // Route::get('/hapus pemilih/{id}', 'PemilihController@delete')->middleware('auth:admin');
// Route::get('/reset pemilih/{IdAgenda}', 'PemilihController@reset')->middleware('auth:admin');

//Route::get('/edit pemilih/{id}', 'PemilihController@edit')->middleware('auth:admin');
//Route::post('/edit pemilih/{id}', 'PemilihController@update');
//////////////////////////////////NO URUT////////////////////////////////////////////////
//Route::get('/tambah nourut', 'NourutController@viewInsert')->middleware('auth:admin');
//Route::get('/tabel nourut', function () {return view('nourut_tabel');});