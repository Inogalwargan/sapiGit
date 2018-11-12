<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;

class C_login extends Controller{

    public function halaman_login(){
        return view('login');
    }

    public function cek_login(Request $request){
        $tes = User::where('nama',$request->nama)->where('no_telp',$request->no)->first();
        if($tes){
            session(['username' => $request->nama]);
            session(['password' => $request->no]);
            session(['jabatan' => $tes->jabatan]);
            if($tes->jabatan == "1"){
                return redirect('/homeInti');
            }elseif($tes->jabatan == "2"){
                return redirect('/pabrik/beranda');
            }else{
                return redirect('/homePeternak');
            }
        }else{
            return redirect('/');
        }
    }


}