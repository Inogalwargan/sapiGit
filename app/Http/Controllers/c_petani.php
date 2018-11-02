<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class c_petani extends Controller
{
    public function homePetani(){
        return view('petani');
    }
}
