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
*/

//Route::get('/', function () {
//    return view('welcome');
//});


Route::get('homeInti', 'c_inti@homeInti');

Route::get('tambahPengajuan', 'c_inti@tambahPengajuan');

Route::get('sapi', 'c_inti@sapi');

Route::get('tambahSapi', 'c_inti@tambahSapi');
Route::post('prosesTambahPengajuan', 'c_inti@prosesTambahPengajuan');

Route::get('tambah_detail_sapi/{kk}', 'c_inti@tambah_detail_sapi');
Route::get('editPengajuan/{id}', 'c_inti@editPengajuan');
Route::post('prosesUpdatePengajuan/{id}', 'c_inti@prosesUpdatePengajuan');
Route::post('proses_tambah_detail_sapi', 'c_inti@proses_tambah_detail_sapi');
Route::get('detailPengajuanPeternak/{id}', 'c_inti@detailPengajuanPeternak');
Route::get('beratSaatIni/{id}', 'c_inti@berat_saat_ini');
Route::post('prosesBeratSaatIni', 'c_inti@proses_berat_saat_ini');
Route::get('hapus_detailPengajuanPeternak/{id}', 'c_inti@hapus_detailPengajuanPeternak');
Route::get('edit_detailPengajuanPeternak/{id}', 'c_inti@edit_detailPengajuanPeternak');
Route::post('proses_update_detailPengajuanPeternak/{id}', 'c_inti@proses_update_detailPengajuanPeternak');
Route::get('cek_data_pengajuan/{id}', 'c_inti@lihatDataSebelumPdf');
Route::get('lihat_pakan_inti', 'c_inti@lihat_pakan_inti');



Route::get('harga', 'c_inti@harga');


Route::get('lihatPengajuan', 'c_inti@lihatPengajuan');
Route::get('cetakPDF','c_inti@cetakPDF');


Route::get('lihatPengajuan', 'c_inti@lihatPengajuan');

Route::get('edit_detail_sapi', 'c_inti@editDetailSapi');


Route::get('/pabrik/beranda', 'c_pabrik@beranda');
Route::get('/pabrik/tambah_bahan', 'c_pabrik@tambah_bahan_baku');
Route::get('/pabrik/lihat_bahan', 'c_pabrik@lihat_bahan_baku');
Route::post('/pabrik/lihat_bahan', 'c_pabrik@lihat_bahan');
Route::get('/pabrik/beli_bahan', 'c_pabrik@beli_bahan_baku');
Route::post('/pabrik/beli_bahan', 'c_pabrik@store_pembelian');
Route::get('/pabrik/rekap', 'c_pabrik@lihat_rekap');


Route::get('/', 'c_petani@homePetani');

Route::get('homePeternak', 'c_peternak@homePeternak');

Route::get('pelunasan', 'c_inti@pelunasan');

Route::get('pakan', 'c_inti@pakan');

Route::get('addCicilan', 'c_inti@addCicilan');



Route::get('/tambahPakan', 'c_pabrik@tambahPakan');

Route::get('/lihatPakan', 'c_pabrik@lihatPakan');
Route::get('/lihatDetail', 'c_pabrik@lihatDetail');
Route::get('/ubahDetail', 'c_pabrik@ubahDetail');

Route::get('/lihatPengambilanPakan', 'c_pabrik@lihatPengambilanPakan');
Route::get('/tambahPengambilan', 'c_pabrik@tambahPengambilan');

Route::get('/tambahPakan', 'c_pabrik@viewTambahPakan');
//------------------------------------------
Route::get('/lihatPakan', 'c_pabrik@lihatPakan');
Route::get('/lihatDetail', 'c_pabrik@lihatDetail');
Route::get('/ubahDetail', 'c_pabrik@ubahDetail');

Route::get('/lihatPengambilanPakan', 'c_pabrik@lihatPengambilanPakan');
Route::get('/tambahPengambilan', 'c_pabrik@viewFormTambahPengambilan');
Route::post('/tambahPengambilan', 'c_pabrik@tambahPengambilan');

//-------------------------------------------------baru
Route::post('/tambahPakan', 'c_pabrik@tambahPakan');