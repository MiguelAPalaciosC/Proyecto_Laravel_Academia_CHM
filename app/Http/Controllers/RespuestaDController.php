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

class RespuestaDController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request) {
            if((Auth::user()->usertype_id_usertype)==2){
                $idusuario = (Auth::user()->id);

                $respuesta=DB::table('respuesta as r')
                ->join('tarea as t','r.id_tarea','=','t.id_tarea')
                ->join('users as u','r.id_usuario','=','u.id')
                ->select('r.id_respuesta','r.nombre','r.descripcion','r.nota','t.nombre as id_tarea','u.name as id_usuario')
                ->orderBy('id_respuesta','asc')
                ->where('u.id','=',$idusuario)
                ->paginate(10);

                return view('academia.respuestas.index',["respuesta"=>$respuesta]);
            }
            else{
                return Redirect::to('home')->with('info','El usuario no cuenta con los permisos necesarios para acceder al modulo');
            }
        }
    }

    //Método que actualiza los datos provenientes del formulario de una vista en una tabla de la bd
    public function update(RespuestaFormRequest $request,$id){

        $respuesta=Respuesta::find($id);
        $respuesta->fill($request->all())->update();

        return Redirect::to('academia/respuestas');
    }

    //Método para eliminar registros de una tabla, redirecciona a la vista que este indicada en el método index
    public function destroy($id){
        $respuesta=Respuesta::findOrFail($id);
        $respuesta->delete();
        return Redirect::to('academia/respuestas');
    }
}
