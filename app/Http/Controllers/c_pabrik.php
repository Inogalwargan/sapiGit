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
}
