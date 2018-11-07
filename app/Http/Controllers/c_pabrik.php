<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_pabrik extends Controller
{
    public function beranda(){
        return view('pabrik.v_beranda');
    }

    public function tambah_bahan_baku(){
        return view('pabrik.v_tambah_bahan_baku');
    }

    public function lihat_bahan_baku(){
        return view('pabrik.v_lihat_bahan_baku');
    }

    public function beli_bahan_baku(){
        return view('pabrik.v_beli_bahan');
    }

    public function tambahPakan(){
		return view("pabrik.v_tambah_pakan");
	}

	public function lihatPakan(){
		return view("pabrik.v_daftar_pakan");
	}
    public function lihatDetail(){
        return view("pabrik.v_detail_pakan");
    }
     public function ubahDetail(){
        return view("pabrik.v_ubah_detail");
    }

    public function lihatPengambilanPakan(){
        return view("pabrik.v_pengambilan_pakan");
    }
    public function tambahPengambilan(){
        return view("pabrik.v_tambah_pengambilan");
    }
}
