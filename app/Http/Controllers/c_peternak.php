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
}


?>