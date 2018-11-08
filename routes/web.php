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

Route::get('tambah_detail_sapi', 'c_inti@tambah_detail_sapi');

Route::get('harga', 'c_inti@harga');


Route::get('lihatPengajuan', 'c_inti@lihatPengajuan');
Route::get('cetakPDF','c_inti@cetakPDF');


Route::get('lihatPengajuan', 'c_inti@lihatPengajuan');
Route::get('detailPengajuanPeternak', 'c_inti@detailPengajuanPeternak');
Route::get('edit_detail_sapi', 'c_inti@editDetailSapi');


Route::get('/pabrik/beranda', 'c_pabrik@beranda');
Route::get('/pabrik/tambah_bahan', 'c_pabrik@tambah_bahan_baku');
Route::get('/pabrik/lihat_bahan', 'c_pabrik@lihat_bahan_baku');
Route::get('/pabrik/beli_bahan', 'c_pabrik@beli_bahan_baku');

Route::get('/', 'c_petani@homePetani');

Route::get('homePeternak', 'c_peternak@homePeternak');

Route::get('pelunasan', 'c_inti@pelunasan');

Route::get('pakan', 'c_inti@pakan');

Route::get('addCicilan', 'c_inti@addCicilan');

Route::get('cek_data_pengajuan', 'c_inti@lihatDataSebelumPdf');

Route::get('/tambahPakan', 'c_pabrik@tambahPakan');

Route::get('/lihatPakan', 'c_pabrik@lihatPakan');
Route::get('/lihatDetail', 'c_pabrik@lihatDetail');
Route::get('/ubahDetail', 'c_pabrik@ubahDetail');

