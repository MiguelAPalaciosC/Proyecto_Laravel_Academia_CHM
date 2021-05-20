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
                
                $asigus=DB::select('SELECT au.id_relacion,a.nombre as id_asignatura,u.name as id_usuario FROM asignaturaUsuario as au JOIN users as u ON (au.id_usuario=u.id) JOIN asignatura as a on (au.id_asignatura=a.id_asignatura)');

                $respuesta=DB::table('respuesta as r')
                ->join('tarea as t','r.id_tarea','=','t.id_tarea')
                ->join('users as u','r.id_usuario','=','u.id')
                ->select('r.id_respuesta','r.nombre','r.descripcion','r.nota','t.nombre as id_tarea','u.name as id_usuario')
                ->orderBy('id_respuesta','asc')
                ->where('u.id','=',$idusuario)
                ->paginate(10);

                $tarea=DB::table('tarea')->get();
                return view('academia.respuesta.index',["respuesta"=>$respuesta,"asigus"=>$asigus,"tarea"=>$tarea]);
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
