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
                ->join('asignatura as a','t.id_asignatura','=','a.id_asignatura')
                ->join('asignaturaUsuario as asiU','a.id_asignatura','=','asiU.id_asignatura')
                ->join('users as u','asiU.id_usuario','=','u.id')
                ->select('r.id_respuesta','t.id_tarea as id_tarea','u.id as id_usuario','a.id_asignatura as id_asignatura','a.nombre as nombre','r.nota')
                ->orderBy('id_respuesta','asc')
                ->paginate(10);

                $asignatura=DB::table('asignatura')->get();

                $tarea=DB::table('tarea as ta')
                ->join('asignatura as asi','ta.id_asignatura','=','asi.id_asignatura')
                ->join('asignaturaUsuario as asiU','asi.id_asignatura','=','asiU.id_asignatura')
                ->join('users as u','asiU.id_usuario','=','u.id')
                ->select('ta.id_tarea','ta.nombre','ta.descripcion','ta.fecha_entrega','asi.codigo as codigo','asi.nombre as id_asignatura','ta.estado')
                ->groupby('ta.id_tarea','ta.nombre','ta.descripcion','ta.fecha_entrega','asi.codigo','asi.nombre','ta.estado')
                ->where('u.id','=',$idusuario)
                ->orderBy('id_tarea','asc')
                ->paginate(10);

                return view('academia.nota.index',["nota"=>$nota,"asignatura"=>$asignatura,"tarea"=>$tarea]);
            }
            else{
                return Redirect::to('home')->with('info','El usuario no cuenta con los permisos necesarios para acceder al modulo');
            }
        }
    }
}
