<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;


class StartController extends Controller
{
   	public function __construct(){
		//$this->middleware('auth');	
	}

 	public function index(Request $request){
 		if ($request) {
 			$variable="variable";
 			return view('almacen.start.index',["variable"=>$variable]);
 		}
 	}
	 
}
