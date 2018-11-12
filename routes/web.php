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
Route::get('/hc', function(){return view('views_mahasiswa.quick_count');})->middleware('guest');
Route::get('/org', function(){return view('views_mahasiswa.organisasi');})->middleware('guest');
Route::get('/admin/login',function(){return view('views_admin.login_form');})->middleware('guest');
Route::post('/login', 'LoginController@login_mhs');
Route::post('/login admin', 'LoginController@login_admin');
Route::get('/keluar', 'LoginController@keluar');

// ----------------------------------------MAHASISWA------------------------------------------
Route::get('/beranda', function(){return view('views_mahasiswa.beranda');})->middleware('auth:mahasiswa');
Route::get('/pemilihan', function(){return view('views_mahasiswa.vote');})->middleware('auth:mahasiswa');
Route::get('/hitung cepat', function(){return view('views_mahasiswa.quick_count');})->middleware('auth:mahasiswa');
Route::get('/organisasi', function(){return view('views_mahasiswa.organisasi');})->middleware('auth:mahasiswa');
Route::get('/daftar calon', function(){return view('views_mahasiswa.tabel_agenda');})->middleware('auth:mahasiswa');
Route::get('/form pendaftaran', function(){return view('views_mahasiswa.form_daftar_calon');})->middleware('auth:mahasiswa');

//=========================================ADMIN==========================================
Route::get('/dashboard', function () {return view('views_admin.dashboard_admin');})->middleware('auth:admin');

// ==================================ADMIN-BERITA-ACARA================================
Route::get('/berita acara',function(){return view('views_admin.beritaacara_tabel');})->middleware('auth:admin');
Route::get('/upload berita acara',function(){return view('views_admin.beritaacara_form');})->middleware('auth:admin');
Route::get('/verifikasi berita', function () {return view('views_admin.agenda_tambah');})->middleware('auth:admin');

// ================================ADMIN-KELOLA-ADMIN==================================
Route::get('/tabel admin','AdminController@show')->middleware('auth:admin');
Route::get('/tambah admin','AdminController@tambah')->middleware('auth:admin');
Route::post('/tambah admin','AdminController@insert');

// ==================================ADMIN-QUICKCOUNT==================================
Route::get('/data quick count', function () {return view('views_admin.quickcount_tabel');})->middleware('auth:admin');
Route::get('/quick count', function () {return view('views_admin.quickcount_view');})->middleware('auth:admin');



////////////////////////////////////////MAHASISWA/////////////////////////////////
Route::get('/tabel mahasiswa', 'MhsController@show')->middleware('auth:admin');

//////////////////////////////////AGENDA////////////////////////////////////////////////
Route::get('/detail agenda/{id}', 'AgendaController@agendaview')->middleware('auth:admin');
Route::get('/tabel agenda', 'AgendaController@show')->middleware('auth:admin');
Route::get('/tambah agenda', function () {return view('views_admin.agenda_tambah');})->middleware('auth:admin');
Route::post('/tambah agenda', 'AgendaController@insert');
Route::get('/edit agenda/{id}', 'AgendaController@edit')->middleware('auth:admin');
Route::post('/edit agenda/{id}', 'AgendaController@update');
Route::get('/hapus agenda/{id}', 'AgendaController@delete')->middleware('auth:admin');



//////////////////////////////////AGENDADETAIL////////////////////////////////////////////////
// Route::get('/detail agenda/{id}', 'AgendaDetailController@agendaview')->middleware('auth:admin');
// Route::post('/tambah balon', 'AgendaDetailController@insert');

//////////////////////////////////BALON////////////////////////////////////////////////
Route::get('/tabel balon', 'KandidatController@show')->middleware('auth:admin');
Route::get('/tambah kandidat', 'KandidatController@viewInsert')->middleware('auth:admin');
Route::post('/tambah kandidat', 'KandidatController@insert');
Route::get('/edit balon/{id}', 'KandidatController@edit')->middleware('auth:admin');
Route::post('/edit balon/{id}', 'KandidatController@update');
Route::get('/hapus balon/{id}/{IdAgenda}', 'KandidatController@delete')->middleware('auth:admin');

//////////////////////////////////PEMILIH////////////////////////////////////////////////
Route::get('/tabel pemilih', 'PemilihController@show')->middleware('auth:admin');
Route::get('/tambah pemilih', 'PemilihController@viewInsert')->middleware('auth:admin');
Route::post('/tambah pemilih','PemilihController@insert');
//Route::get('/edit pemilih/{id}', 'PemilihController@edit')->middleware('auth:admin');
//Route::post('/edit pemilih/{id}', 'PemilihController@update');
Route::get('/hapus pemilih/{id}', 'PemilihController@delete')->middleware('auth:admin');
Route::get('/reset pemilih/{IdAgenda}', 'PemilihController@reset')->middleware('auth:admin');


//////////////////////////////////NO URUT////////////////////////////////////////////////
//Route::get('/tambah nourut', 'NourutController@viewInsert')->middleware('auth:admin');
//Route::get('/tabel nourut', function () {return view('nourut_tabel');});