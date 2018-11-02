<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class c_peternak extends Controller
{
	
	function homePeternak() {
		return view("peternak.peternak");
	}
}


?>