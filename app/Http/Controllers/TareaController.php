<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use sisVentas\Http\Requests;
use DB;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\TareaFormRequest;
use sisVentas\Models\Tarea;
use sisVentas\Http\Requests\AsignaturaFormRequest;
use sisVentas\Models\Asignatura;


class TareaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        if ($request){
            if((Auth::user()->usertype_id_usertype)==2){
                $tarea=DB::table('tarea as ta')
                ->join('asignatura as asi','ta.id_asignatura','=','asi.id_asignatura')
                ->select('ta.id_tarea','ta.nombre','ta.descripcion','ta.fecha_entrega','asi.nombre as id_asignatura','ta.estado')
                ->orderBy('id_tarea','asc')
                ->paginate(10);
    
                $asignatura=DB::table('asignatura')->get();
    
                
                return view('academia.tarea.index',["tarea"=>$tarea, "asignatura"=>$asignatura]);
            }
            else{
                return Redirect::to('home')->with('info','El usuario no cuenta con los permisos necesarios para acceder al modulo');
            }

        }
    }
    //Método que almacena los datos provenientes del formulario de una vista en una tabla de la bd
    public function store (TareaFormRequest $request){
        $tarea=new Tarea();
        $tarea->nombre=$request->get('nombre');
        $tarea->descripcion=$request->get('descripcion');
        $tarea->fecha_entrega=$request->get('fecha_entrega');
        $tarea->id_asignatura=$request->get('id_asignatura');
        $tarea->estado=$request->get('estado');
        $tarea->save();
        return Redirect::to('academia/tarea')->with('info','Tarea Agregada Correctamente');
    }

    //Método que actualiza los datos provenientes del formulario de una vista en una tabla de la bd
    public function update(TareaFormRequest $request,$id){
        $tarea=Tarea::findOrFail($id);
        $tarea->nombre=$request->get('nombre');
        $tarea->descripcion=$request->get('descripcion');
        $tarea->fecha_entrega=$request->get('fecha_entrega');
        $tarea->id_asignatura=$request->get('id_asignatura');
        $tarea->estado=$request->get('estado');
        $tarea->update();
        return Redirect::to('academia/tarea')->with('info','Tarea Actualizada Correctamente');
    }

    //Método para eliminar registros de una tabla, redirecciona a la vista que este indicada en el método index
    public function destroy($id){
        $tarea=Tarea::findOrFail($id);
        $tarea->delete();
        return Redirect::to('academia/tarea')->with('info','Tarea Eliminada Correctamente');
    }
}
