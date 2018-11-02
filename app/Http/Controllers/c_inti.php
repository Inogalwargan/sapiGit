<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class c_inti extends Controller
{
	
	function homeInti() {
		return view("inti.v_home");
	}

	function tambahPengajuan(){
		return view("inti.v_tambah_pengajuan");
	}

	function tambahSapi(){
		return view("inti.v_tambah_sapi");
	}
	function lihatPengajuan(){
		return view("inti.v_lihat_pengajuan");
	}

	
}


?>