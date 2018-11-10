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

//////////////////////////////////MAHASISWA////////////////////////////////////////////////
//Route::get('/', function(){return view('HomePage');})->middleware('guest');
Route::get('/admin/login', function(){return view('login_form');})->middleware('guest');
Route::post('/login', 'LoginController@login');
Route::get('/keluar', 'LoginController@keluar');

//////////////////////////////////PEMILIH////////////////////////////////////////////////

Route::get('/', function(){return view('views_mahasiswa.Beranda');})->middleware('guest');
Route::get('/hc', function(){return view('views_mahasiswa.QuickCount');})->middleware('guest');
Route::get('/org', function(){return view('views_mahasiswa.Organisasi');})->middleware('guest');

Route::get('/beranda', function(){return view('views_mahasiswa.Beranda');})->middleware('auth:mahasiswa');
Route::get('/pemilihan', function(){return view('views_mahasiswa.VoteView');})->middleware('auth:mahasiswa');
Route::get('/hitung cepat', function(){return view('views_mahasiswa.QuickCount');})->middleware('auth:mahasiswa');
Route::get('/organisasi', function(){return view('views_mahasiswa.Organisasi');})->middleware('auth:mahasiswa');


//======================================ADMINROUTE======================================
Route::get('/dashboard', function () {return view('dashboard_admin');})->middleware('auth:admin');
Route::get('/quick count', function () {return view('quick_count');})->middleware('auth:admin');

////////////////////////////////////////////////////////////////////////////////////////

Route::get('/tabel admin', 'AdminController@show')->middleware('auth:admin');
Route::get('/tambah admin', 'AdminController@tambah')->middleware('auth:admin');//function() {return view('admin_tambah');})->middleware('auth:admin');
Route::post('/tambah admin', 'AdminController@insert');

//////////////////////////////////////////MAHASISWA/////////////////////////////////
Route::get('/tabel mahasiswa', 'MhsController@show')->middleware('auth:admin');

//////////////////////////////////AGENDA////////////////////////////////////////////////
Route::get('/detail agenda/{id}', 'AgendaController@agendaview')->middleware('auth:admin');
Route::get('/tabel agenda', 'AgendaController@show')->middleware('auth:admin');
Route::get('/tambah agenda', function () {return view('agenda_tambah');})->middleware('auth:admin');
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

//////////////////////////////////PASLON////////////////////////////////////////////////
// Route::get('/tabel paslon', 'PaslonController@show')->middleware('auth:admin');
// Route::get('/tambah paslon', 'PaslonController@viewInsert')->middleware('auth:admin');
// Route::post('/tambah paslon', 'PaslonController@insert');
// Route::get('/edit paslon/{id}', 'PaslonController@edit')->middleware('auth:admin');
// Route::post('/edit paslon/{id}', 'PaslonController@update');
// Route::get('/hapus paslon/{id}', 'PaslonController@delete')->middleware('auth:admin');

//////////////////////////////////NO URUT////////////////////////////////////////////////
Route::get('/tambah nourut', 'NourutController@viewInsert')->middleware('auth:admin');
//Route::get('/tabel nourut', function () {return view('nourut_tabel');});

//////////////////////////////////PEMILIH////////////////////////////////////////////////
Route::get('/tabel pemilih', 'PemilihController@show')->middleware('auth:admin');
Route::get('/tambah pemilih', 'PemilihController@viewInsert')->middleware('auth:admin');
Route::post('/tambah pemilih','PemilihController@insert');
//Route::get('/edit pemilih/{id}', 'PemilihController@edit')->middleware('auth:admin');
//Route::post('/edit pemilih/{id}', 'PemilihController@update');
Route::get('/hapus pemilih/{id}', 'PemilihController@delete')->middleware('auth:admin');
Route::get('/reset pemilih/{IdAgenda}', 'PemilihController@reset')->middleware('auth:admin');

//////////////////////////////////TPS////////////////////////////////////////////////
// Route::get('/tabel tps', 'TpsController@show')->middleware('auth:admin');
// Route::get('/tambah tps', 'TpsController@viewInsert')->middleware('auth:admin');
// Route::post('/tambah tps', 'TpsController@insert');
// Route::get('/edit tps/{id}', 'TpsController@edit')->middleware('auth:admin');
// Route::post('/edit tps/{id}', 'TpsController@update');
// Route::get('/hapus tps/{id}', 'TpsController@delete')->middleware('auth:admin');

//==========================================================================================