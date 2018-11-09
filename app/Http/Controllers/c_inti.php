<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\m_pengajuan;
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
		
		$data = DB::select('select * from pengajuan order by nama_peternak');
		return view("inti.v_lihat_pengajuan", compact('data'));
	}

	public function prosesTambahPengajuan(Request $request){
		$tambah = new m_pengajuan();
		$tambah->nama_peternak = $request['nama_peternak'];
		$tambah->alamat = $request['alamat'];
		$tambah->no_kk = $request['no_kk'];
		$tambah->jumlah_sapi = $request['jumlah_sapi'];
		
		$tambah->no_hp = $request['no_hp'];
		$tambah->foto_ktp = $request['foto_ktp'];
		 // Disini proses mendapatkan judul dan memindahkan letak gambar ke folder image
        $file       = $request->file('foto_ktp');
        $fileName   = $file->getClientOriginalName();
        $request->file('foto_ktp')->move("image/", $fileName);

        $tambah->foto_ktp = $fileName;
        $tambah->save();
        $request->session()->flash('input','Berhasil Menambahkan Data');
        return redirect()->to('/lihatPengajuan');
	}
	function detailPengajuanPeternak(){
		return view("inti.v_detail_pengajuan_peternak");
	}
	function editDetailSapi(){
		return view("inti.v_edit_detail_sapi");
	}
	function lihatDataSebelumPdf(){
	    return view('inti.v_lihat_data_sebelum_pdf');
    }

    function cetakPDF(){
        $data = [
            'tes' => 'Ini cuma buat tes saja'
        ];
        $pdf = PDF::loadView('inti.v_perjanjian', $data);
        return $pdf->stream('document.pdf');
    }

	function pakan(){
		return view('inti.pakan');
	}

	 public function editPengajuan($id){
        $data['pengajuan'] = DB::select('select * from main.pengajuan ');
         $tampiledit = m_pengajuan::where('id_pengajuan', $id)->first();
        return view('inti.edit_pengajuan', compact('data','tampiledit'));
    }

     public function prosesUpdatePengajuan(Request $request , $id){
     	// dd($request);

        $update = m_pengajuan::where('id_pengajuan', $id)->first();
        $update->nama_peternak = $request['nama_peternak'];
        $update->alamat = $request['alamat'];
        $update->no_kk = $request['no_kk'];
        $update->jumlah_sapi = $request['jumlah_sapi'];
        $update->no_hp = $request['no_hp'];

          // $update->frame = $request['frame'];
        if($request->file('foto_ktp') == "")
        {
            $update->foto_ktp = $update->foto_ktp;
        } 
        else
        {
            $file       = $request->file('foto_ktp');
            $fileName   = $file->getClientOriginalName();
            $request->file('foto_ktp')->move("image/", $fileName);
            $update->foto_ktp = $fileName;
        }
        
         $update->update();
        return redirect()->to('lihatPengajuan');

    }
	
	
}


?>