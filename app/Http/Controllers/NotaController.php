<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use sisVentas\Http\Requests\AsignaturaFormRequest;
use sisVentas\Models\Asignatura;

class NotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request) {
            if((Auth::user()->usertype_id_usertype)==3){
                $nota=DB::table('respuesta')->get();
                $nota=DB::select('SELECT r.id_respuesta,t.id_tarea,u.id as id_usuario,a.id_asignatura,a.nombre,r.nota  FROM respuesta as r JOIN tarea as t ON (r.id_tarea=t.id_tarea) JOIN users as u ON (r.id_usuario=u.id) JOIN asignatura as a ON (t.id_asignatura=a.id_asignatura)');

                $asignatura=DB::table('asignatura')->get();

                return view('academia.nota.index',["nota"=>$nota,"asignatura"=>$asignatura]);
            }
            else{
                return Redirect::to('home')->with('info','El usuario no cuenta con los permisos necesarios para acceder al modulo');
            }
        }
    }
}
