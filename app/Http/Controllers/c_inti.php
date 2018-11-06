<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;


class c_inti extends Controller
{
	
	function homeInti() {
		return view("inti.v_home");
	}

	function tambahPengajuan(){
		return view("inti.v_tambah_pengajuan");
	}
    function harga(){
        return view("inti.v_harga");
    }
    function sapi(){
        return view("inti.v_sapi");
    }

	function tambahSapi(){
		return view("inti.v_tambah_sapi");
	}	

	function pelunasan(){
		return view('inti.v_pelunasan');
	}

	function addCicilan(){
		return view('inti.add_cicilan');
	}
	function lihatPengajuan(){
		return view("inti.v_lihat_pengajuan");
	}

	function lihatDataSebelumPdf(){
	    return view('inti.v_lihat_data_sebelum_pdf');
    }

    function cetakPDF(){
        $data = [
            'tes' => 'Ini cuma buat tes saja'
        ];
        return $pdf->stream('document.pdf');
    }

	function pakan(){
		return view('inti.pakan');
	}

	public function tambah_detail_sapi(){
		return view('inti.tambah_detail_sapi');
	}
	
	
}


?>