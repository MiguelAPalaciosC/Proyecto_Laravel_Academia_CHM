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

                $idusuario = (Auth::user()->id);

                $nota=DB::table('respuesta as r')
                ->join('tarea as t','r.id_tarea','=','t.id_tarea')
                ->join('users as u','r.id_usuario','=','u.id')
                ->join('asignatura as a','t.id_asignatura','=','a.id_asignatura')
                ->join('asignaturaUsuario as asiU','a.id_asignatura','=','asiU.id_asignatura')
                ->select('r.id_respuesta','t.id_tarea as id_tarea','u.id as id_usuario','a.id_asignatura as id_asignatura','a.nombre as nombre','r.nota')
                ->orderBy('id_respuesta','asc')
                ->paginate(10);

                $asignatura=DB::table('asignatura')->get();

                return view('academia.nota.index',["nota"=>$nota,"asignatura"=>$asignatura]);
            }
            else{
                return Redirect::to('home')->with('info','El usuario no cuenta con los permisos necesarios para acceder al modulo');
            }
        }
    }
}
