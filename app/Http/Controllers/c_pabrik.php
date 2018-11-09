<?php

namespace App\Http\Controllers;

use App\bahan_baku;
use App\history_pembelian;
use App\pengambilan_pakan;
use Illuminate\Http\Request;

class c_pabrik extends Controller
{
    public function beranda()
    {
        return view('pabrik.v_beranda');
    }

    public function store_bahan_baku(Request $request)
    {

    }

    public function lihat_bahan_baku()
    {
        $bahan_baku = bahan_baku::orderBy('nama_bahan_baku', 'ASC')->get();
        $bahan_saat_ini = $bahan_baku[0]->id_bahan_baku;
        $stok_saat_ini = bahan_baku::where('id_bahan_baku', $bahan_saat_ini)->first();
        $history_pembelian = history_pembelian::where('id_bahan_baku', $bahan_saat_ini)->get();
        return view('pabrik.v_lihat_bahan_baku', compact('bahan_baku', 'history_pembelian', 'stok_saat_ini', 'bahan_saat_ini'));
    }

    public function lihat_bahan(Request $request)
    {
        $bahan_baku = bahan_baku::orderBy('nama_bahan_baku', 'ASC')->get();
        $bahan_saat_ini = $request->id_bahan_baku;
        $stok_saat_ini = bahan_baku::where('id_bahan_baku', $bahan_saat_ini)->first();
        $history_pembelian = history_pembelian::where('id_bahan_baku', $bahan_saat_ini)->get();
        return view('pabrik.v_lihat_bahan_baku', compact('bahan_baku', 'history_pembelian', 'stok_saat_ini', 'bahan_saat_ini'));
    }

    public function store_pembelian(Request $request)
    {
        $stock_lama = bahan_baku::where('id_bahan_baku', $request->id_bahan_baku)->first();
        $check_history = history_pembelian::where('id_bahan_baku', $request->id_bahan_baku)->orderBy('tanggal_pembelian', 'DESC')->get();
        if (count($check_history) > 0) {
            $harga_lama = $check_history[0]->harga_rata;
        } else {
            $harga_lama = $request->harga_beli;
        }

        $history = new history_pembelian();
        $history->id_bahan_baku = $request->id_bahan_baku;
        $history->stok_lama = $stock_lama->stok;
        $history->harga_lama = $harga_lama;
        $history->beli_baru = $request->banyak_beli;
        $history->harga_baru = $request->harga_beli;
        $history->total_stok = $stock_lama->stok + $request->banyak_beli;
        $history->harga_rata = ($harga_lama + $request->harga_beli) / 2;
        $history->save();

        $bahan = bahan_baku::where('id_bahan_baku', $request->id_bahan_baku)->first();
        $bahan->stok = $stock_lama->stok + $request->banyak_beli;
        $bahan->update();
        return redirect()->back();
    }

    public function beli_bahan_baku()
    {
        $bahan_baku = bahan_baku::orderBy('nama_bahan_baku', 'ASC')->get();
        return view('pabrik.v_beli_bahan', compact('bahan_baku'));
    }

    public function lihat_rekap(){
        $total_pengeluaran = history_pembelian::sum('harga_baru');
        $total_pemasukan = pengambilan_pakan::sum('harga_pengambilan');

        $history_pengeluaran = history_pembelian::all();
        $history_pemasukan = pengambilan_pakan::all();
        return view('pabrik.v_rekap', compact('total_pengeluaran', 'total_pemasukan', 'history_pemasukan', 'history_pengeluaran'));
    }

    public function tambahPakan()
    {
        return view("pabrik.v_tambah_pakan");
    }

    public function lihatPakan()
    {
        return view("pabrik.v_daftar_pakan");
    }

    public function lihatDetail()
    {
        return view("pabrik.v_detail_pakan");
    }

    public function ubahDetail()
    {
        return view("pabrik.v_ubah_detail");
    }

    public function lihatPengambilanPakan()
    {
        return view("pabrik.v_pengambilan_pakan");
    }

    public function tambahPengambilan()
    {
        return view("pabrik.v_tambah_pengambilan");
    }
}
