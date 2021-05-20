<?php

namespace sisVentas\Http\Controllers;

use sisVentas\Http\Requests\RespuestaFormRequest;
use sisVentas\Models\Respuesta;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use sisVentas\Http\Requests\TareaFormRequest;
use sisVentas\Models\Tarea;
use sisVentas\Http\Requests\UsuarioFormRequest;
use sisVentas\User;

class RespuestaEController extends Controller
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
                
                $respuesta=DB::table('respuesta as r')
                ->join('tarea as t','r.id_tarea','=','t.id_tarea')
                ->join('asignatura as asi','t.id_asignatura','=','asi.id_asignatura')
                ->join('asignaturaUsuario as asiU','asi.id_asignatura','=','asiU.id_asignatura')
                ->join('users as us','asiU.id_usuario','=','us.id')
                ->select('r.id_respuesta','r.nombre','r.descripcion','r.nota','t.nombre as id_tarea','us.name as id')
                ->where('us.id','=','16')
                ->orderBy('id_respuesta','asc')
                ->paginate(10);

                $tarea=DB::table('tarea as ta')
                ->join('asignatura as asi','ta.id_asignatura','=','asi.id_asignatura')
                ->join('asignaturaUsuario as asiU','asi.id_asignatura','=','asiU.id_asignatura')
                ->join('users as u','asiU.id_usuario','=','u.id')
                ->select('ta.id_tarea','ta.nombre','ta.descripcion','ta.fecha_entrega','asi.codigo as codigo','ta.id_asignatura','ta.estado')
                ->where('u.id','=',$idusuario)
                ->orderBy('id_tarea','asc')
                ->paginate(10);

                return view('academia.respuesta.index',["respuesta"=>$respuesta,"tarea"=>$tarea]);
            }
            else{
                return Redirect::to('home')->with('info','El usuario no cuenta con los permisos necesarios para acceder al modulo');
            }
        }
    }

    //Método que almacena los datos provenientes del formulario de una vista en una tabla de la bd
    public function store (RespuestaFormRequest $request){

        $respuesta=Respuesta::create($request->all());

        return Redirect::to('academia/respuesta');
    }
}
