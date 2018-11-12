<?php

namespace App\Http\Controllers;

use App\bahan_baku;
use App\history_pembelian;
use App\m_pengajuan;
use App\pakan;
use App\pengambilan_pakan;
use App\produksi_pakan;
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

    public function lihat_rekap()
    {
        $total_pengeluaran = history_pembelian::sum('harga_baru');
        $total_pemasukan = pengambilan_pakan::sum('harga_pengambilan');

        $history_pengeluaran = history_pembelian::all();
        $history_pemasukan = pengambilan_pakan::all();
        return view('pabrik.v_rekap', compact('total_pengeluaran', 'total_pemasukan', 'history_pemasukan', 'history_pengeluaran'));
    }

    public function viewTambahPakan()
    {
        $stok_pakan = pakan::all();

        return view("pabrik.v_tambah_pakan", compact('stok_pakan'));
    }

    public function tambahPakan(Request $request)
    {
        $pesan = "bahan tidak cukup! ";
        $BungkilKopra = 0;
        $BungkilSawit = 0;
        $Calsium = 0;
        $CGF = 0;
        $DedakBekatul = 0;
        $EliotSingkong = 0;
        $Garam = 0;
        $SBM = 0;
        $OnggokKering = 0;
        $Premix = 0;
        $cek = 0;
        $bahanbaku = bahan_baku::all();
        foreach ($bahanbaku as $item) {
            if ($item->nama_bahan_baku == "Bungkil Kopra") {
                if ($item->stok >= $request->jumlah_produksi * 10 / 100) {
                    $BungkilKopra = $request->jumlah_produksi * 10 / 100; //10%
                } else {
                    $BungkilKopra = ($request->jumlah_produksi * 10 / 100) - $item->stok;
                    $pesan .= ", Bungkil Kopra kurang " . $BungkilKopra;
                    $cek = 1;
                }
            } elseif ($item->nama_bahan_baku == "Bungkil Sawit") {
                if ($item->stok >= $request->jumlah_produksi * 12 / 100) {
                    $BungkilSawit = $request->jumlah_produksi * 12 / 100; //12%
                } else {
                    $BungkilSawit = ($request->jumlah_produksi * 12 / 100) - $item->stok;
                    $pesan .= ", Bungkil Sawit kurang " . $BungkilSawit;
                    $cek = 1;
                }
            } elseif ($item->nama_bahan_baku == "Calsium") {
                if ($item->stok >= $request->jumlah_produksi * 2 / 100) {
                    $Calsium = $request->jumlah_produksi * 2 / 100; //2%
                } else {
                    $Calsium = ($request->jumlah_produksi * 2 / 100) - $item->stok;
                    $pesan .= ", Calsium kurang " . $Calsium;
                    $cek = 1;
                }
            } elseif ($item->nama_bahan_baku == "CGF (Corn Gluten Feed)") {
                if ($item->stok >= $request->jumlah_produksi * 10 / 100) {
                    $CGF = $request->jumlah_produksi * 10 / 100; //10%
                } else {
                    $CGF = ($request->jumlah_produksi * 10 / 100) - $item->stok;
                    $pesan .= ", CGF kurang " . $CGF;
                    $cek = 1;
                }
            } elseif ($item->nama_bahan_baku == "Dedak Bekatul") {
                if ($item->stok >= $request->jumlah_produksi * 4 / 100) {
                    $DedakBekatul = $request->jumlah_produksi * 4 / 100; //4%
                } else {
                    $DedakBekatul = ($request->jumlah_produksi * 4 / 100) - $item->stok;
                    $pesan .= ", Dedak bekatul kurang " . $DedakBekatul;
                    $cek = 1;
                }
            } elseif ($item->nama_bahan_baku == "Elliot Singkong") {
                if ($item->stok >= $request->jumlah_produksi * 10 / 100) {
                    $EliotSingkong = $request->jumlah_produksi * 10 / 100; //10%
                } else {
                    $EliotSingkong = ($request->jumlah_produksi * 10 / 100) - $item->stok;
                    $pesan .= ", Eliot Singkong kurang " . $EliotSingkong;
                    $cek = 1;
                }
            } elseif ($item->nama_bahan_baku == "Garam") {
                if ($item->stok >= $request->jumlah_produksi * 5.5 / 100) {
                    $Garam = $request->jumlah_produksi * 5.5 / 100; //5.5%
                } else {
                    $Garam = ($request->jumlah_produksi * 5.5 / 100) - $item->stok;
                    $pesan .= ", Garam kurang " . $Garam;
                    $cek = 1;
                }
            } elseif ($item->nama_bahan_baku == "SBM (Soybean Meal)") {
                if ($item->stok >= $request->jumlah_produksi * 6 / 100) {
                    $SBM = $request->jumlah_produksi * 6 / 100; //6%
                } else {
                    $SBM = ($request->jumlah_produksi * 6 / 100) - $item->stok;
                    $pesan .= ", SBM kurang " . $SBM;
                    $cek = 1;
                }
            } elseif ($item->nama_bahan_baku == "Onggok Kering") {
                if ($item->stok >= $request->jumlah_produksi * 40 / 100) {
                    $OnggokKering = $request->jumlah_produksi * 40 / 100; //40%
                } else {
                    $OnggokKering = ($request->jumlah_produksi * 40 / 100) - $item->stok;
                    $pesan .= ", Onggok Kering Kurang " . $OnggokKering;
                    $cek = 1;
                }
            } elseif ($item->nama_bahan_baku == "Premix") {
                if ($item->stok >= $request->jumlah_produksi * 0.5 / 100) {
                    $Premix = $request->jumlah_produksi * 0.5 / 100; //0.5%
                } else {
                    $Premix = ($request->jumlah_produksi * 0.5 / 100) - $item->stok;
                    $pesan .= ", Premix kurang " . $Premix;
                    $cek = 1;
                }
            }
        }


        if ($cek == 0) {
            foreach ($bahanbaku as $item) {
                if ($item->nama_bahan_baku == "Bungkil Kopra") {
                    $baku = bahan_baku::where('nama_bahan_baku', $item->nama_bahan_baku)->first();
                    $baku->stok = $baku->stok - $BungkilKopra;
                    $baku->update();
                } elseif ($item->nama_bahan_baku == "Bungkil Sawit") {
                    $baku = bahan_baku::where('nama_bahan_baku', $item->nama_bahan_baku)->first();
                    $baku->stok = $baku->stok - $BungkilSawit;
                    $baku->update();
                } elseif ($item->nama_bahan_baku == "Calsium") {
                    $baku = bahan_baku::where('nama_bahan_baku', $item->nama_bahan_baku)->first();
                    $baku->stok = $baku->stok - $Calsium;
                    $baku->update();
                } elseif ($item->nama_bahan_baku == "CGF (Corn Gluten Feed)") {
                    $baku = bahan_baku::where('nama_bahan_baku', $item->nama_bahan_baku)->first();
                    $baku->stok = $baku->stok - $CGF;
                    $baku->update();
                } elseif ($item->nama_bahan_baku == "Dedak Bekatul") {
                    $baku = bahan_baku::where('nama_bahan_baku', $item->nama_bahan_baku)->first();
                    $baku->stok = $baku->stok - $DedakBekatul;
                    $baku->update();
                } elseif ($item->nama_bahan_baku == "Elliot Singkong") {
                    $baku = bahan_baku::where('nama_bahan_baku', $item->nama_bahan_baku)->first();
                    $baku->stok = $baku->stok - $EliotSingkong;
                    $baku->update();
                } elseif ($item->nama_bahan_baku == "Garam") {
                    $baku = bahan_baku::where('nama_bahan_baku', $item->nama_bahan_baku)->first();
                    $baku->stok = $baku->stok - $Garam;
                    $baku->update();
                } elseif ($item->nama_bahan_baku == "SBM (Soybean Meal)") {
                    $baku = bahan_baku::where('nama_bahan_baku', $item->nama_bahan_baku)->first();
                    $baku->stok = $baku->stok - $SBM;
                    $baku->update();
                } elseif ($item->nama_bahan_baku == "Onggok Kering") {
                    $baku = bahan_baku::where('nama_bahan_baku', $item->nama_bahan_baku)->first();
                    $baku->stok = $baku->stok - $OnggokKering;
                    $baku->update();
                } elseif ($item->nama_bahan_baku == "Premix") {
                    $baku = bahan_baku::where('nama_bahan_baku', $item->nama_bahan_baku)->first();
                    $baku->stok = $baku->stok - $Premix;
                    $baku->update();
                }
            }


            $stock_lama = pakan::where('id_pakan', $request->id_pakan)->first();

            $produksi = new produksi_pakan();
            $produksi->id_pakan = $request->id_pakan;
            $produksi->jumlah_produksi = $request->jumlah_produksi;
            $produksi->harga_jual = $request->jumlah_produksi * 3000;
            $produksi->save();

            $stok = pakan::where('id_pakan', $request->id_pakan)->first();
            $stok->stok_pakan = $stock_lama->stok_pakan + $request->jumlah_produksi;
            $stok->update();
            return redirect()->back();
        } elseif ($cek == 1) {
            //echo "<script>alert($pesan); window.history.back();</script>";
            return redirect()->back()->with('alert', $pesan);
        }


    }

    public function lihatPakan()
    {
        $stok_pakan = pakan::all();
        $produksi_pakan = produksi_pakan::all();


        return view("pabrik.v_daftar_pakan", compact('stok_pakan', 'produksi_pakan'));
    }//-----------------------------------------------------------------


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
        $pengambilan_pakan = pengambilan_pakan::all();
        foreach ($pengambilan_pakan as $value) {
            $total_jumlah = pengambilan_pakan::where('id_pengajuan', $value->id_pengajuan)->sum('jumlah_pakan_diambil');
            $total_harga = pengambilan_pakan::where('id_pengajuan', $value->id_pengajuan)->sum('harga_pengambilan');
            array_add($value, 'total_ambil', $total_jumlah);
            array_add($value, 'harga_ambil', $total_harga);
        }

        return view("pabrik.v_pengambilan_pakan", compact('pengambilan_pakan'));
    }

    public function viewFormTambahPengambilan()
    {
        $pengajuan = m_pengajuan::all();
        $pakan = pakan::all();

        return view("pabrik.v_tambah_pengambilan", compact('pengajuan', 'pakan'));
    }

    public function tambahPengambilan(request $request)
    {
        $stock_lama = pakan::where('id_pakan', $request->id_pakan)->first();

        $pengambilan = new pengambilan_pakan();
        $pengambilan->id_pakan = $request->id_pakan;
        $pengambilan->id_pengajuan = $request->id_pengajuan;
        $pengambilan->jumlah_pakan_diambil = $request->jumlah_pengambilan;
        $pengambilan->harga_pengambilan = $request->jumlah_pengambilan * $stock_lama->harga;
        $pengambilan->save();

        $stok = pakan::where('id_pakan', $request->id_pakan)->first();
        $stok->stok_pakan = $stock_lama->stok_pakan - $request->jumlah_pengambilan;
        $stok->update();
        return redirect()->back();
    }
}
