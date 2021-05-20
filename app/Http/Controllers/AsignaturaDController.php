<?php

namespace sisVentas\Http\Controllers;

use sisVentas\Http\Requests\AsignaturaFormRequest;
use sisVentas\Models\Asignatura;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AsignaturaDController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request) {
            if((Auth::user()->usertype_id_usertype)==2){
            $asignatura=DB::table('asignatura')->get();

            return view('academia.docente.index',["asignatura"=>$asignatura]);
        }
        else{
            return Redirect::to('home')->with('info','El usuario no cuenta con los permisos necesarios para acceder al modulo');
        }
    }
}

}
