<?php

namespace App\Http\Controllers;

use App\bahan_baku;
use App\history_pembelian;
use App\m_pengajuan;
use App\pakan;
use App\pengambilan_pakan;
use App\produksi_pakan;
use Illuminate\Http\Request;
use Session;

class c_pabrik extends Controller
{
    function __construct(){
        $this->middleware(function ($request, $next) {
            if(!session()->has('username') || session('jabatan') != "2"){
                return redirect()->back();
            }
            return $next($request);
        });
    }

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
        $pesanku = "";
        $alert = false;
        return view("pabrik.v_tambah_pakan", compact('stok_pakan','pesanku','alert'));
    }

    public function tambahPakan(Request $request)
    {
        $pesan="bahan tidak cukup! ";
        $TebonJagung=0;
        $Jerami=0;
        $Molase=0;
        $BungkilKopra=0;
        $BungkilSawit=0;
        $Calsium=0;
        $CGF=0;
        $DedakBekatul=0;
        $EliotSingkong=0;
        $Garam=0;
        $SBM=0;
        $OnggokKering=0;
        $Premix=0;

        $hTebonJagung=0;
        $hJerami=0;
        $hMolase=0;
        $hBungkilKopra=0;
        $hBungkilSawit=0;
        $hCalsium=0;
        $hCGF=0;
        $hDedakBekatul=0;
        $hEliotSingkong=0;
        $hGaram=0;
        $hSBM=0;
        $hOnggokKering=0;
        $hPremix=0;

        $cek=0;
        $bahanbaku=bahan_baku::all();
        $stock_lama = pakan::where('id_pakan', $request->id_pakan)->first();
        if ($stock_lama->nama_pakan=="Silase Jagung") {

            foreach($bahanbaku as $item){
                if ($item->nama_bahan_baku == "Tebon Jagung") {
                    if ($item->stok>= $request->jumlah_produksi*90/100) {
                        $TebonJagung=$request->jumlah_produksi*90/100; //90%
                        $pembelian=history_pembelian::where('id_bahan_baku', $item->id_bahan_baku)->orderBy('tanggal_pembelian', 'DESC')->first();
                        if (!isset($pembelian)) {
                            $hTebonJagung=0;
                            $cek=1;
                            $pesan.=", Tebon Jagung belum dibeli";
                        }else{
                            $hTebonJagung=($pembelian->harga_rata/$pembelian->total_stok)*$TebonJagung;
                        }
                    }else{
                        $TebonJagung= ($request->jumlah_produksi*90/100) - $item->stok;
                        $pesan.=", Tebon Jagung kurang ".$TebonJagung;
                        $cek=1;
                    }
                }elseif ($item->nama_bahan_baku == "Dedak Bekatul") {
                    if ($item->stok>= $request->jumlah_produksi*7/100) {
                        $DedakBekatul=$request->jumlah_produksi*7/100; //7%
                        $pembelian=history_pembelian::where('id_bahan_baku', $item->id_bahan_baku)->orderBy('tanggal_pembelian', 'DESC')->first();
                        if (!isset($pembelian)) {
                            $hDedakBekatul=0;
                            $cek=1;
                            $pesan.=", Dedak Bekatul belum dibeli";
                        }else{
                            $hDedakBekatul=($pembelian->harga_rata/$pembelian->total_stok)*$DedakBekatul;
                        }
                    }else{
                        $DedakBekatul= ($request->jumlah_produksi*7/100) - $item->stok;
                        $pesan.=", Dedak Bekatul kurang ".$DedakBekatul;
                        $cek=1;
                    }
                }elseif ($item->nama_bahan_baku == "Tetes (Molase)") {
                    if ($item->stok>= $request->jumlah_produksi*3/100) {
                        $Molase=$request->jumlah_produksi*3/100; //3%
                        $pembelian=history_pembelian::where('id_bahan_baku', $item->id_bahan_baku)->orderBy('tanggal_pembelian', 'DESC')->first();
                        if (!isset($pembelian)) {
                            $hMolase=0;
                            $cek=1;
                            $pesan.=", Molase belum dibeli";
                        }else{
                            $hMolase=($pembelian->harga_rata/$pembelian->total_stok)*$Molase;
                        }
                    }else{
                        $Molase= ($request->jumlah_produksi*3/100) - $item->stok;
                        $pesan.=", Molase kurang ".$Molase;
                        $cek=1;
                    }
                }
            }
            if ($cek==0) {
                foreach($bahanbaku as $item){
                    if ($item->nama_bahan_baku == "Jerami") {
                        $baku=bahan_baku::where('nama_bahan_baku', $item->nama_bahan_baku)->first();
                        $baku->stok= $baku->stok - $Jerami;
                        $baku->update();
                    }elseif ($item->nama_bahan_baku == "Dedak Bekatul") {
                        $baku=bahan_baku::where('nama_bahan_baku', $item->nama_bahan_baku)->first();
                        $baku->stok= $baku->stok - $DedakBekatul;
                        $baku->update();
                    }elseif ($item->nama_bahan_baku == "Tetes (Molase)") {
                        $baku=bahan_baku::where('nama_bahan_baku', $item->nama_bahan_baku)->first();
                        $baku->stok= $baku->stok - $Molase;
                        $baku->update();
                    }
                }
                $produksi = new produksi_pakan();
                $produksi->id_pakan = $request->id_pakan;
                $produksi->jumlah_produksi = $request->jumlah_produksi;
                $produksi->harga_jual = ($hTebonJagung+$hDedakBekatul+$hMolase);
                $produksi->save();

                $stok = pakan::where('id_pakan', $request->id_pakan)->first();
                $stok->stok_pakan = $stock_lama->stok_pakan + $request->jumlah_produksi;
                $stok->harga= ($hTebonJagung+$hDedakBekatul+$hMolase)/$request->jumlah_produksi;
                $stok->update();

                $stok_pakan = pakan::all();
                $pesanku = "";
                $alert = false;
                return view("pabrik.v_tambah_pakan", compact('stok_pakan', 'pesanku', 'alert'));
            }elseif ($cek==1) {
                $stok_pakan = pakan::all();
                $pesanku = $pesan;
                $alert = true;
                return view("pabrik.v_tambah_pakan", compact('stok_pakan', 'pesanku', 'alert'));
            }



        }elseif ($stock_lama->nama_pakan=="Silase Jerami") {

            foreach($bahanbaku as $item){
                if ($item->nama_bahan_baku == "Jerami") {
                    if ($item->stok>= $request->jumlah_produksi*85/100) {
                        $Jerami=$request->jumlah_produksi*85/100; //85%
                        $pembelian=history_pembelian::where('id_bahan_baku', $item->id_bahan_baku)->orderBy('tanggal_pembelian', 'DESC')->first();
                        if (!isset($pembelian)) {
                            $hJerami=0;
                            $cek=1;
                            $pesan.=", Jerami belum dibeli";
                        }else{
                            $hJerami=($pembelian->harga_rata/$pembelian->total_stok)*$Jerami;
                        }
                    }else{
                        $Jerami= ($request->jumlah_produksi*85/100) - $item->stok;
                        $pesan.=", Jerami kurang ".$Jerami;
                        $cek=1;
                    }
                }elseif ($item->nama_bahan_baku == "Dedak Bekatul") {
                    if ($item->stok>= $request->jumlah_produksi*10/100) {
                        $DedakBekatul=$request->jumlah_produksi*10/100; //10%
                        $pembelian=history_pembelian::where('id_bahan_baku', $item->id_bahan_baku)->orderBy('tanggal_pembelian', 'DESC')->first();
                        if (!isset($pembelian)) {
                            $hDedakBekatul=0;
                            $cek=1;
                            $pesan.=", Dedak Bekatul belum dibeli";
                        }else{
                            $hDedakBekatul=($pembelian->harga_rata/$pembelian->total_stok)*$DedakBekatul;
                        }
                    }else{
                        $DedakBekatul= ($request->jumlah_produksi*10/100) - $item->stok;
                        $pesan.=", Dedak Bekatul kurang ".$DedakBekatul;
                        $cek=1;
                    }
                }elseif ($item->nama_bahan_baku == "Tetes (Molase)") {
                    if ($item->stok>= $request->jumlah_produksi*5/100) {
                        $Molase=$request->jumlah_produksi*5/100; //5%
                        $pembelian=history_pembelian::where('id_bahan_baku', $item->id_bahan_baku)->orderBy('tanggal_pembelian', 'DESC')->first();
                        if (!isset($pembelian)) {
                            $hMolase=0;
                            $cek=1;
                            $pesan.=", Molase belum dibeli";
                        }else{
                            $hMolase=($pembelian->harga_rata/$pembelian->total_stok)*$Molase;
                        }
                    }else{
                        $Molase= ($request->jumlah_produksi*5/100) - $item->stok;
                        $pesan.=", Molase kurang ".$Molase;
                        $cek=1;
                    }
                }
            }
            if ($cek==0) {
                foreach($bahanbaku as $item){
                    if ($item->nama_bahan_baku == "Jerami") {
                        $baku=bahan_baku::where('nama_bahan_baku', $item->nama_bahan_baku)->first();
                        $baku->stok= $baku->stok - $Jerami;
                        $baku->update();
                    }elseif ($item->nama_bahan_baku == "Dedak Bekatul") {
                        $baku=bahan_baku::where('nama_bahan_baku', $item->nama_bahan_baku)->first();
                        $baku->stok= $baku->stok - $DedakBekatul;
                        $baku->update();
                    }elseif ($item->nama_bahan_baku == "Tetes (Molase)") {
                        $baku=bahan_baku::where('nama_bahan_baku', $item->nama_bahan_baku)->first();
                        $baku->stok= $baku->stok - $Molase;
                        $baku->update();
                    }
                }
                $produksi = new produksi_pakan();
                $produksi->id_pakan = $request->id_pakan;
                $produksi->jumlah_produksi = $request->jumlah_produksi;
                $produksi->harga_jual = ($hJerami+$hDedakBekatul+$hMolase);
                $produksi->save();

                $stok = pakan::where('id_pakan', $request->id_pakan)->first();
                $stok->stok_pakan = $stock_lama->stok_pakan + $request->jumlah_produksi;
                $stok->harga= ($hJerami+$hDedakBekatul+$hMolase)/$request->jumlah_produksi;
                $stok->update();

                $stok_pakan = pakan::all();
                $pesanku = "";
                $alert = false;
                return view("pabrik.v_tambah_pakan", compact('stok_pakan', 'pesanku', 'alert'));
            }elseif ($cek==1) {
                $stok_pakan = pakan::all();
                $pesanku = $pesan;
                $alert = true;
                return view("pabrik.v_tambah_pakan", compact('stok_pakan', 'pesanku', 'alert'));
            }


        }elseif ($stock_lama->nama_pakan=="Konsentrat") {

            foreach ($bahanbaku as $item) {
                if ($item->nama_bahan_baku == "Bungkil Kopra") {
                    if ($item->stok >= $request->jumlah_produksi * 10 / 100) {
                        $BungkilKopra = $request->jumlah_produksi * 10 / 100; //10%
                        $pembelian = history_pembelian::where('id_bahan_baku', $item->id_bahan_baku)->orderBy('tanggal_pembelian', 'DESC')->first();
                        if (!isset($pembelian)) {
                            $hBungkilKopra = 0;
                            $cek = 1;
                            $pesan .= ", Bungkil Kopra belum dibeli";
                        } else {
                            $hBungkilKopra = ($pembelian->harga_rata / $pembelian->total_stok) * $BungkilKopra;
                        }
                    } else {
                        $BungkilKopra = ($request->jumlah_produksi * 10 / 100) - $item->stok;
                        $pesan .= ", Bungkil Kopra kurang " . $BungkilKopra;
                        $cek = 1;
                    }
                } elseif ($item->nama_bahan_baku == "Bungkil Sawit") {
                    if ($item->stok >= $request->jumlah_produksi * 12 / 100) {
                        $BungkilSawit = $request->jumlah_produksi * 12 / 100; //12%
                        $pembelian = history_pembelian::where('id_bahan_baku', $item->id_bahan_baku)->orderBy('tanggal_pembelian', 'DESC')->first();
                        if (!isset($pembelian)) {
                            $hBungkilSawit = 0;
                            $cek = 1;
                            $pesan .= ", Bungkil Sawit belum dibeli";
                        } else {
                            $hBungkilSawit = ($pembelian->harga_rata / $pembelian->total_stok) * $BungkilSawit;
                        }
                    } else {
                        $BungkilSawit = ($request->jumlah_produksi * 12 / 100) - $item->stok;
                        $pesan .= ", Bungkil Sawit kurang " . $BungkilSawit;
                        $cek = 1;
                    }
                } elseif ($item->nama_bahan_baku == "Calsium") {
                    if ($item->stok >= $request->jumlah_produksi * 2 / 100) {
                        $Calsium = $request->jumlah_produksi * 2 / 100; //2%
                        $pembelian = history_pembelian::where('id_bahan_baku', $item->id_bahan_baku)->orderBy('tanggal_pembelian', 'DESC')->first();
                        if (!isset($pembelian)) {
                            $hCalsium = 0;
                            $cek = 1;
                            $pesan .= ", Calsium belum dibeli";
                        } else {
                            $hCalsium = ($pembelian->harga_rata / $pembelian->total_stok) * $Calsium;
                        }
                    } else {
                        $Calsium = ($request->jumlah_produksi * 2 / 100) - $item->stok;
                        $pesan .= ", Calsium kurang " . $Calsium;
                        $cek = 1;
                    }
                } elseif ($item->nama_bahan_baku == "CGF (Corn Gluten Feed)") {
                    if ($item->stok >= $request->jumlah_produksi * 10 / 100) {
                        $CGF = $request->jumlah_produksi * 10 / 100; //10%
                        $pembelian = history_pembelian::where('id_bahan_baku', $item->id_bahan_baku)->orderBy('tanggal_pembelian', 'DESC')->first();
                        if (!isset($pembelian)) {
                            $hCGF = 0;
                            $cek = 1;
                            $pesan .= ", CGF belum dibeli";
                        } else {
                            $hCGF = ($pembelian->harga_rata / $pembelian->total_stok) * $CGF;
                        }
                    } else {
                        $CGF = ($request->jumlah_produksi * 10 / 100) - $item->stok;
                        $pesan .= ", CGF kurang " . $CGF;
                        $cek = 1;
                    }
                } elseif ($item->nama_bahan_baku == "Dedak Bekatul") {
                    if ($item->stok >= $request->jumlah_produksi * 4 / 100) {
                        $DedakBekatul = $request->jumlah_produksi * 4 / 100; //4%
                        $pembelian = history_pembelian::where('id_bahan_baku', $item->id_bahan_baku)->orderBy('tanggal_pembelian', 'DESC')->first();
                        if (!isset($pembelian)) {
                            $hDedakBekatul = 0;
                            $cek = 1;
                            $pesan .= ", Dedak Bekatul belum dibeli";
                        } else {
                            $hDedakBekatul = ($pembelian->harga_rata / $pembelian->total_stok) * $DedakBekatul;
                        }
                    } else {
                        $DedakBekatul = ($request->jumlah_produksi * 4 / 100) - $item->stok;
                        $pesan .= ", Dedak bekatul kurang " . $DedakBekatul;
                        $cek = 1;
                    }
                } elseif ($item->nama_bahan_baku == "Elliot Singkong") {
                    if ($item->stok >= $request->jumlah_produksi * 10 / 100) {
                        $EliotSingkong = $request->jumlah_produksi * 10 / 100; //10%
                        $pembelian = history_pembelian::where('id_bahan_baku', $item->id_bahan_baku)->orderBy('tanggal_pembelian', 'DESC')->first();
                        if (!isset($pembelian)) {
                            $hEliotSingkong = 0;
                            $cek = 1;
                            $pesan .= ", Eliot Singkong belum dibeli";
                        } else {
                            $hEliotSingkong = ($pembelian->harga_rata / $pembelian->total_stok) * $EliotSingkong;
                        }
                    } else {
                        $EliotSingkong = ($request->jumlah_produksi * 10 / 100) - $item->stok;
                        $pesan .= ", Eliot Singkong kurang " . $EliotSingkong;
                        $cek = 1;
                    }
                } elseif ($item->nama_bahan_baku == "Garam") {
                    if ($item->stok >= $request->jumlah_produksi * 5.5 / 100) {
                        $Garam = $request->jumlah_produksi * 5.5 / 100; //5.5%
                        $pembelian = history_pembelian::where('id_bahan_baku', $item->id_bahan_baku)->orderBy('tanggal_pembelian', 'DESC')->first();
                        if (!isset($pembelian)) {
                            $hGaram = 0;
                            $cek = 1;
                            $pesan .= ", Garam belum dibeli";
                        } else {
                            $hGaram = ($pembelian->harga_rata / $pembelian->total_stok) * $Garam;
                        }
                    } else {
                        $Garam = ($request->jumlah_produksi * 5.5 / 100) - $item->stok;
                        $pesan .= ", Garam kurang " . $Garam;
                        $cek = 1;
                    }
                } elseif ($item->nama_bahan_baku == "SBM (Soybean Meal)") {
                    if ($item->stok >= $request->jumlah_produksi * 6 / 100) {
                        $SBM = $request->jumlah_produksi * 6 / 100; //6%
                        $pembelian = history_pembelian::where('id_bahan_baku', $item->id_bahan_baku)->orderBy('tanggal_pembelian', 'DESC')->first();
                        if (!isset($pembelian)) {
                            $hSBM = 0;
                            $cek = 1;
                            $pesan .= ", SBM belum dibeli";
                        } else {
                            $hSBM = ($pembelian->harga_rata / $pembelian->total_stok) * $SBM;
                        }
                    } else {
                        $SBM = ($request->jumlah_produksi * 6 / 100) - $item->stok;
                        $pesan .= ", SBM kurang " . $SBM;
                        $cek = 1;
                    }
                } elseif ($item->nama_bahan_baku == "Onggok Kering") {
                    if ($item->stok >= $request->jumlah_produksi * 40 / 100) {
                        $OnggokKering = $request->jumlah_produksi * 40 / 100; //40%
                        $pembelian = history_pembelian::where('id_bahan_baku', $item->id_bahan_baku)->orderBy('tanggal_pembelian', 'DESC')->first();
                        if (!isset($pembelian)) {
                            $hOnggokKering = 0;
                            $cek = 1;
                            $pesan .= ", Onggok Kering belum dibeli";
                        } else {
                            $hOnggokKering = ($pembelian->harga_rata / $pembelian->total_stok) * $OnggokKering;
                        }
                    } else {
                        $OnggokKering = ($request->jumlah_produksi * 40 / 100) - $item->stok;
                        $pesan .= ", Onggok Kering Kurang " . $OnggokKering;
                        $cek = 1;
                    }
                } elseif ($item->nama_bahan_baku == "Premix") {
                    if ($item->stok >= $request->jumlah_produksi * 0.5 / 100) {
                        $Premix = $request->jumlah_produksi * 0.5 / 100; //0.5%
                        $pembelian = history_pembelian::where('id_bahan_baku', $item->id_bahan_baku)->orderBy('tanggal_pembelian', 'DESC')->first();
                        if (!isset($pembelian)) {
                            $hPremix = 0;
                            $cek = 1;
                            $pesan .= ", Premix belum dibeli";
                        } else {
                            $hPremix = ($pembelian->harga_rata / $pembelian->total_stok) * $Premix;
                        }
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

                $produksi = new produksi_pakan();
                $produksi->id_pakan = $request->id_pakan;
                $produksi->jumlah_produksi = $request->jumlah_produksi;
                $produksi->harga_jual = ($hBungkilKopra + $hDedakBekatul + $hPremix + $hOnggokKering + $hSBM + $hGaram + $hEliotSingkong + $hCGF + $hCalsium + $hBungkilSawit);
                $produksi->save();

                $stok = pakan::where('id_pakan', $request->id_pakan)->first();
                $stok->stok_pakan = $stock_lama->stok_pakan + $request->jumlah_produksi;
                $stok->harga = ($hBungkilKopra + $hDedakBekatul + $hPremix + $hOnggokKering + $hSBM + $hGaram + $hEliotSingkong + $hCGF + $hCalsium + $hBungkilSawit) / $request->jumlah_produksi;
                $stok->update();

                $stok_pakan = pakan::all();
                $pesanku = "";
                $alert = false;
                return view("pabrik.v_tambah_pakan", compact('stok_pakan', 'pesanku', 'alert'));
            } elseif ($cek == 1) {
                //echo "<script>alert($pesan); window.history.back();</script>";
                $stok_pakan = pakan::all();
                $pesanku = $pesan;
                $alert = true;
                return view("pabrik.v_tambah_pakan", compact('stok_pakan', 'pesanku', 'alert'));
            }
        }


    }

    public function lihatPakan()
    {
        $stok_pakan = pakan::orderBy('nama_pakan', 'ASC')->get();
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
        $pesanku = "";
        $alert = false;

        return view("pabrik.v_tambah_pengambilan", compact('pengajuan', 'pakan','pesanku','alert'));
    }

    public function tambahPengambilan(request $request)
    {
        $stock_lama = pakan::where('id_pakan', $request->id_pakan)->first();
        if ($stock_lama->stok_pakan>=$request->jumlah_pengambilan){
            $pengambilan = new pengambilan_pakan();
            $pengambilan->id_pakan = $request->id_pakan;
            $pengambilan->id_pengajuan = $request->id_pengajuan;
            $pengambilan->jumlah_pakan_diambil = $request->jumlah_pengambilan;
            $pengambilan->harga_pengambilan = $request->jumlah_pengambilan * $stock_lama->harga;
            $pengambilan->save();

            $stok = pakan::where('id_pakan', $request->id_pakan)->first();
            $stok->stok_pakan = $stock_lama->stok_pakan - $request->jumlah_pengambilan;
            $stok->update();

            $pengajuan = m_pengajuan::all();
            $pakan = pakan::all();
            $pesanku = "";
            $alert = false;

            return view("pabrik.v_tambah_pengambilan", compact('pengajuan', 'pakan','pesanku','alert'));
        }else{
            $pesan="stok pakan tidak cukup, kurang ".($request->jumlah_pengambilan-$stock_lama->stok_pakan)." kg";

            $pengajuan = m_pengajuan::all();
            $pakan = pakan::all();
            $pesanku = $pesan;
            $alert = true;

            return view("pabrik.v_tambah_pengambilan", compact('pengajuan', 'pakan','pesanku','alert'));
        }


    }
}
