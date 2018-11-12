<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\m_pengajuan;
use App\m_sapi;
use App\pengambilan_pakan;


class c_peternak extends Controller
{
	
	function homePeternak() {
	    $jumlahsapi = m_pengajuan::where('nama_peternak',session('username'))
            ->where('no_hp',session('password'))
            ->sum('jumlah_sapi');

	    $jsapibetina = m_sapi::join('pengajuan','sapi.id_pengajuan','=','pengajuan.id_pengajuan')
            ->where('jenis_kelamin','betina')
            ->where('nama_peternak',session('username'))
            ->where('no_hp',session('password'))
            ->count();

        $jsapijantan = m_sapi::join('pengajuan','sapi.id_pengajuan','=','pengajuan.id_pengajuan')
            ->where('jenis_kelamin','jantan')
            ->where('nama_peternak',session('username'))
            ->where('no_hp',session('password'))
            ->count();

        $pengambilanpakan = pengambilan_pakan::join('pengajuan','pengambilan_pakan.id_pengajuan','=','pengajuan.id_pengajuan')
            ->where('nama_peternak',session('username'))
            ->where('no_hp',session('password'))
            ->sum('jumlah_pakan_diambil');

		return view("peternak.peternak",compact('jumlahsapi','jsapibetina','jsapijantan','pengambilanpakan'));
	}
}


?>