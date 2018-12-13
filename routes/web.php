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

// #---------------------------GUEST---------------------------------#
Route::get('/', 'HomeController@home')->middleware('guest');
Route::get('/s', 'HomeController@search')->middleware('guest');
Route::get('/hc', 'VoteController@QuickCountView')->middleware('guest');
Route::get('/info dpt/{ket}/{ket2}', 'PemilihController@showPemilih')->middleware('guest');
Route::get('/admin/login',function(){
	return view('views_admin.login_form');
})->middleware('guest');
Route::post('/login', 'LoginController@login_mhs');
Route::post('/login admin', 'LoginController@login_admin');
Route::get('/keluar', 'LoginController@keluar');

// ------------------------------MAHASISWA------------------------------------
Route::get('/beranda', 'HomeController@home')->middleware('auth:mahasiswa');
Route::get('/search', 'HomeController@search')->middleware('auth:mahasiswa');
Route::get('/pemilihan', 'VoteController@voteView')->middleware('auth:mahasiswa');
Route::get('/hitung cepat', 'VoteController@QuickCountView')->middleware('auth:mahasiswa');
Route::get('/informasi dpt/{ket}/{ket2}', 'PemilihController@showPemilih')->middleware('auth:mahasiswa');
Route::get('/daftar calon', 'MhsController@ShowTabelAgenda')->middleware('auth:mahasiswa');
Route::get('/form pendaftaran/{IdAgenda}', 'KandidatController@daftar')->middleware('auth:mahasiswa');
Route::delete('/batal daftar/{nim}/{IdAgenda}', 'KandidatController@batalDaftar')->middleware('auth:mahasiswa');

//===================================ADMIN======================================
Route::get('/dashboard', 'HomeController@dashboard')->middleware('auth:admin');

//===============================ADMIN-CONTENT====================================
Route::get('/konten berita', 'ContentController@index')->middleware('auth:admin');
Route::get('/tambah slideshow', function(){
	return view('views_admin.konten_slide_tambah');	
})->middleware('auth:admin');
Route::post('/tambah slideshow', 'ContentController@createSlideshow')->middleware('auth:admin');
Route::get('/slideshow/{id}', 'ContentController@editSlideshow')->middleware('auth:admin');
Route::put('/slideshow/{id}', 'ContentController@updateSlideshow')->middleware('auth:admin');
Route::delete('/slideshow/{id}', 'ContentController@deleteSlideshow')->middleware('auth:admin');

Route::get('/tambah berita', function(){
	return view('views_admin.konten_berita_tambah');	
})->middleware('auth:admin');
Route::post('/tambah berita', 'ContentController@createBerita')->middleware('auth:admin');
Route::get('/berita/{id}', 'ContentController@editBerita')->middleware('auth:admin');
Route::put('/berita/{id}', 'ContentController@updateBerita')->middleware('auth:admin');
Route::delete('/berita/{id}', 'ContentController@deleteBerita')->middleware('auth:admin');

// ================================ADMIN-AGENDA_AJUAN==============================
Route::get('/pengajuan agenda','PengAgendaController@show')->middleware('auth:admin');
Route::get('/upload pengajuan agenda',function(){
	return view('views_admin.pengajuan_agenda_form');
})->middleware('auth:admin');
Route::post('/upload ajuan/{id}','PengAgendaController@insert')->middleware('auth:admin');
Route::get('/edit pengajuan agenda/{id}','PengAgendaController@edit')->middleware('auth:admin');
Route::post('/edit ajuan/{id}','PengAgendaController@update')->middleware('auth:admin');
Route::delete('/cancel/{id}','PengAgendaController@delete')->middleware('auth:admin');
Route::get('/tolak/{id}','PengAgendaController@tolakAcara')->middleware('auth:admin');

// ================================ADMIN-KELOLA-ADMIN==================================
Route::get('/tabel admin','AdminController@show')->middleware('auth:admin');
Route::get('/tambah admin',function(){
	return view('views_admin.admin_tambah');
 })->middleware('auth:admin');
Route::post('/tambah admin','AdminController@insert');
Route::delete('/hapus admin/{id}', 'AdminController@delete');

// ==================================ADMIN-AGENDA`==================================
Route::get('/verifikasi/{id}','AgendaController@verif_view')->middleware('auth:admin');
Route::post('/tambah agenda/{idAdmin}', 'AgendaController@insert');
Route::get('/edit agenda/{id}', 'AgendaController@edit')->middleware('auth:admin');
Route::post('/edit agenda/{id}', 'AgendaController@update');
Route::delete('/hapus agenda/{id}', 'AgendaController@delete')->middleware('auth:admin');
Route::post('/update syaratK/{id}', 'AgendaController@updateSyaratK');
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
Route::delete('/hapus kandidat/{id}/{idAgenda}', 'KandidatController@delete')->middleware('auth:admin');

// ==================================ADMIN-PEMILIH==================================
Route::get('/tabel pemilih', 'PemilihController@show')->middleware('auth:admin');
Route::post('/tambah pemilih/{idAgenda}','PemilihController@insert');
Route::delete('/hapus pemilih/{id}', 'PemilihController@delete')->middleware('auth:admin');
// Route::delete('/hapus checked', 'PemilihController@deleteChecked')->middleware('auth:admin');

// ==================================ADMIN-QUICKCOUNT==================================
Route::get('/data quick count', 'VoteController@tableQuickCount')->middleware('auth:admin');
Route::get('/detail quick count/{idAgenda}', 'VoteController@viewQuickCount')->middleware('auth:admin');

// =============================ADMIN-SHOW-MAHASISWA================================
Route::get('/tabel mahasiswa', 'MhsController@show')->middleware('auth:admin');

// ==================================VOTE==================================
Route::group(['middleware' => 'throttle:1'], function () {
	Route::post('/vote/{Idagenda}/{IdKandidat}/{IdPemilih}', 'VoteController@vote')->middleware('auth:mahasiswa');
});
