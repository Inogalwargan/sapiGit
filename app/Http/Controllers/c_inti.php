<?php
namespace App\Http\Controllers;

use App\Http\Requests;
use App\pengambilan_pakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\m_pengajuan;
use App\m_sapi;
use App\pakan;
use App\produksi_pakan;
use PDF;


class c_inti extends Controller
{
	
	function homeInti() {
		return view("inti.v_home");
	}
    function lihat_pakan_inti(){
        $stok_pakan = pakan::all();
        $produksi_pakan = produksi_pakan::all();


        return view("inti.lihat_stok", compact('stok_pakan', 'produksi_pakan'));

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
      $data = DB::select('select count(s.id_sapi) as banyak, p.id_pengajuan,
        p.nama_peternak, p.alamat, no_kk, p.jumlah_sapi, p.foto_ktp, p.tanggal_pengajuan,
        p.jumlah_kredit, p.no_hp from main.pengajuan p left join main.sapi s on p.id_pengajuan = s.id_pengajuan
        group by p.id_pengajuan, p.nama_peternak,nama_peternak, p.alamat, no_kk, jumlah_sapi, foto_ktp, tanggal_pengajuan,
        jumlah_kredit, no_hp');

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
  function detailPengajuanPeternak($id)  {
    $detail_pengajuan = DB::select('SELECT * FROM main.sapi WHERE id_pengajuan = \''.$id.'\';');
    return view("inti.v_detail_pengajuan_peternak")->with('detail_pengajuan',$detail_pengajuan);

}

public function hapus_detailPengajuanPeternak($id){
   $detail_pengajuan = DB::select('SELECT * FROM main.sapi WHERE id_pengajuan = \''.$id.'\';');
   $hapus = m_sapi::find($id);
   $hapus->delete();
   return redirect()->back();
}

public function edit_detailPengajuanPeternak($id){
    $tampiledit = m_sapi::where('id_sapi', $id)->first();
    return view('inti.edit_detail_pengajuan_peternak')->with('tampiledit', $tampiledit);
}

public function proses_update_detailPengajuanPeternak(Request $request, $id){


    $update = m_sapi::where('id_sapi', $id)->first();

    $update->berat_awal = $request['berat_awal'];
    $update->berat_saat_ini = $request['berat_saat_ini'];
    $update->jenis_kelamin = $request['jenis_kelamin'];
    $update->jenis_sapi = $request['jenis_sapi'];
    $idPengajuan =$request['id_pengajuan'];

    $update->update();
    $pengajuan = DB::select('SELECT *
        FROM main.sapi WHERE id_pengajuan = \''.$idPengajuan.'\';');
    return redirect('detailPengajuanPeternak/'.$idPengajuan);
   //     return redirect()->to('detailPengajuanPeternak/'$as );
        // return view('inti.edit_detail_pengajuan_peternak')->with('id_pengajuan',$pengajuan);
}

public function berat_saat_ini($id){

    $data = DB::select('SELECT s.id_pengajuan, nama_peternak, id_sapi, berat_awal, berat_saat_ini, s.id_pengajuan, jenis_kelamin, jenis_sapi FROM main.pengajuan p join main.sapi s on p.id_pengajuan = s.id_pengajuan where id_sapi = \''.$id.'\';');

    return view('inti.v_berat_saat_ini')->with('data',$data);
}

public function proses_berat_saat_ini(Request $request){

    $id= $request['id_sapi'];
    $s = m_sapi::find($id);
    $s->berat_saat_ini = $request['berat_saat_ini'];
    $s->update;

    $pengajuan = DB::select('SELECT *
        FROM main.sapi WHERE id_sapi = \''.$id.'\';');
    $id_pengajuan = "";
    foreach ($pengajuan as $x) {
        $id_pengajuan =$x->id_pengajuan;
    }
    // $id_pengajuan = $request['id_pengajuan'];

    return redirect('detailPengajuanPeternak/'.$id_pengajuan);
}
public function tambah_detail_sapi($kk){

    $jumlah_sapi_otomatis = DB::select('SELECT count(id_sapi) as jumlah_sapi_otomatis
        FROM main.sapi s join main.pengajuan p on p.id_pengajuan = s.id_pengajuan WHERE p.no_kk = \''.$kk.'\';');
    $jsapi_otomatis=0;
    foreach ($jumlah_sapi_otomatis as $x) {
        $jsapi_otomatis = (int) $x->jumlah_sapi_otomatis;
    }

    $pengajuan = DB::select('SELECT *
        FROM main.pengajuan WHERE no_kk = \''.$kk.'\';');
    $jsapi_input=0;
    foreach ($pengajuan as $x) {
        $jsapi_input =(int) $x->jumlah_sapi;
    }
    $no_sapi = $jsapi_otomatis + 1;
    if ($jsapi_otomatis >= $jsapi_input) {
        return redirect('lihatPengajuan');
    }else{
        return view('inti.tambah_detail_sapi')->with('no_sapi',$no_sapi)->with('pengajuan',$pengajuan);
    }
}
function proses_tambah_detail_sapi(Request $request){
    $tambah = new m_sapi();
    $tambah->berat_awal = $request['berat_awal'];
    $tambah->id_pengajuan = $request['id_pengajuan'];
    $idPengajuan =$request['id_pengajuan'];
    $tambah->jenis_kelamin = $request['jenis_kelamin'];
    $tambah->jenis_sapi = $request['jenis_sapi'];

    $tambah->save();
    $pengajuan = DB::select('SELECT *
        FROM main.pengajuan WHERE id_pengajuan = \''.$idPengajuan.'\';');
    $kk = "";
    foreach ($pengajuan as $x) {
        $kk =$x->no_kk;
    }
        // $kk = $request['no_kk'];

    return redirect('tambah_detail_sapi/'.$kk);
}
function editDetailSapi(){
  return view("inti.v_edit_detail_sapi");
}
function lihatDataSebelumPdf($id){
        // $idPengajuan =$request['id_pengajuan'];
    $aa = $id;

    $jmlsapi = DB::select('SELECT count(id_sapi) as banyak FROM main.sapi 
        where id_pengajuan  = \''.$id.'\';');
    $js = 0;
    foreach ($jmlsapi as $j) {
        $js = (int) $j->banyak;
    }
    $jmljantan = DB::select('SELECT count(id_sapi) as jantan
        FROM main.sapi where jenis_kelamin =\'j\' and id_pengajuan = \''.$id.'\';');
    $jjantan = 0;
    foreach ($jmljantan as $j) {
        $jjantan = (int) $j->jantan;
    }
    $jbetina = $js - $jjantan;

    $jumlah_berat_sapi = DB::select('SELECT sum(berat_awal) as jumlahberat
        FROM main.sapi where id_pengajuan =  \''.$id.'\';');
    $jbs =0;
    foreach ($jumlah_berat_sapi as $j) {
        $jbs = (int) $j->jumlahberat;
    }
    $jmlkredit =(0.1*$jbs*3000);

    
    
    return view("inti.v_lihat_data_sebelum_pdf")->with('jmlsapi',$js)->with('jmlkredit',$jmlkredit)->with('jumlahberat',$jbs)->with('jmljantan',$jjantan)->with('jmlbetina',$jbetina)->with('id_pengajuan',$aa);
        //return redirect('cek_data_pengajuan');
	    //return view('inti.v_lihat_data_sebelum_pdf/');
}

function cetakPDF(Request $request){
    // $data = [
    //     'tes' => 'Ini cuma buat tes saja'
    // ];
    //return $pdf = PDF::redirect('../../cetak_data_pengajuan');
  $idPengajuan =$request['id_pengajuan'];
  //dd($idPengajuan);
  $nama_peternak = DB::select('SELECT nama_peternak, alamat FROM main.pengajuan 
        where id_pengajuan  = \''.$idPengajuan.'\';');
$alamat = DB::select('SELECT nama_peternak, alamat FROM main.pengajuan 
        where id_pengajuan  = \''.$idPengajuan.'\';');
$id_pengajuan = DB::select('SELECT id_pengajuan FROM main.pengajuan 
        where id_pengajuan  = \''.$idPengajuan.'\';');
  // $data = [
  //   'nama' => $nama_peternak,
  //   'alamat' =>$alamat,
  //   'id_pengajuan' => $id_pengajuan,
  // ];
   $pdf = PDF::loadView('inti.v_perjanjian', compact('nama_peternak'));
   //$pdf = PDF::redirect('cetakPDF/'.$idPengajuan);
   return $pdf->stream('document2.pdf');
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