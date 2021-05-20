<?php

namespace sisVentas\Http\Controllers;

use sisVentas\Http\Requests\AsignaturaUsuarioFormRequest;
use sisVentas\Models\AsignaturaUsuario;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\UsuarioFormRequest;
use sisVentas\User;
use sisVentas\Http\Requests\AsignaturaFormRequest;
use sisVentas\Models\Asignatura;

class AsignaturaUsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request) {
            if((Auth::user()->usertype_id_usertype)==1){

                $asigus=DB::select('SELECT au.id_relacion,a.nombre as id_asignatura,u.name as id_usuario FROM asignaturaUsuario as au JOIN users as u ON (au.id_usuario=u.id) JOIN asignatura as a on (au.id_asignatura=a.id_asignatura)');

                $asignatura=DB::table('asignatura')->get();

                $users=DB::table('users')->get();

                return view('academia.inscribir.index',["asigus"=>$asigus,"asignatura"=>$asignatura,"users"=>$users]);
            }
            else{
                return Redirect::to('home')->with('info','El usuario no cuenta con los permisos necesarios para acceder al modulo');
            }
        }
    }

    //Método que almacena los datos provenientes del formulario de una vista en una tabla de la bd
    public function store (AsignaturaUsuarioFormRequest $request){

        $asigus=AsignaturaUsuario::create($request->all());

        return Redirect::to('academia/inscribir');
    }

    //Método que actualiza los datos provenientes del formulario de una vista en una tabla de la bd
    public function update(asignaturaFormRequest $request,$id){

        $asigus=AsignaturaUsuario::find($id);
        $asigus->fill($request->all())->update();

        return Redirect::to('academia/inscribir');
    }

    //Método para eliminar registros de una tabla, redirecciona a la vista que este indicada en el método index
    public function destroy($id){
        $asigus=AsignaturaUsuario::findOrFail($id);
        $asigus->delete();
        return Redirect::to('academia/inscribir');
    }
}
