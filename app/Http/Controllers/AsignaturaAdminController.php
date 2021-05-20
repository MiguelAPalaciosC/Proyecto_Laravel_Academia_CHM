<?php

namespace sisVentas\Http\Controllers;

use sisVentas\Http\Requests\AsignaturaFormRequest;
use sisVentas\Models\Asignatura;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;

class AsignaturaAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request) {
            // $asignatura=DB::table('asignatura as a')
            // ->join('users as us','a.id_usuario','=','us.id')
            // ->select('a.id_asignatura','a.codigo','a.nombre','us.name as id_usuario')
            // ->orderBy('id_asignatura','asc')
            // ->paginate(10);
            $asignatura=DB::select('SELECT a.id_asignatura,a.codigo,a.nombre,u.name as id_usuario FROM asignatura as a JOIN users as u ON (a.id_usuario=u.id)');

            $users=DB::table('users')->get();

            return view('academia.asignatura.index',["asignatura"=>$asignatura,"users"=>$users]);
        }
    }

    //Método que almacena los datos provenientes del formulario de una vista en una tabla de la bd
    public function store (AsignaturaFormRequest $request){
        $asignatura=new Asignatura;
        $asignatura->codigo=$request->get('codigo');
        $asignatura->nombre=$request->get('nombre');
        $asignatura->id_usuario=$request->get('id_usuario');
        $asignatura->save();
        return Redirect::to('academia/asignatura');
    }

    //Método que actualiza los datos provenientes del formulario de una vista en una tabla de la bd
    public function update(asignaturaFormRequest $request,$id){
        $asignatura=Asignatura::findOrFail($id);
        $asignatura->codigo=$request->get('codigo');
        $asignatura->nombre=$request->get('nombre');
        $asignatura->id_usuario=$request->get('id_usuario');
        $asignatura->update();
        return Redirect::to('academia/asignatura');
    }

    //Método para eliminar registros de una tabla, redirecciona a la vista que este indicada en el método index
    public function destroy($id){
        $asignatura=Asignatura::findOrFail($id);
        $asignatura->delete();
        return Redirect::to('academia/asignatura');
    }
}
