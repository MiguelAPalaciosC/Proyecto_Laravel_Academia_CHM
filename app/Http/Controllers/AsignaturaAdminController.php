<?php

namespace sisVentas\Http\Controllers;

use sisVentas\Http\Requests\AsignaturaFormRequest;
use sisVentas\Models\Asignatura;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
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
            if((Auth::user()->usertype_id_usertype)==1){
            $asignatura=DB::table('asignatura')->get();

            $users=DB::table('users')->get();

            return view('academia.asignatura.index',["asignatura"=>$asignatura,"users"=>$users]);
        }
        else{
            return Redirect::to('home')->with('info','El usuario no cuenta con los permisos necesarios para acceder al modulo');
        }
    }
}

    //Método que almacena los datos provenientes del formulario de una vista en una tabla de la bd
    public function store (AsignaturaFormRequest $request){

        $asignatura=Asignatura::create($request->all());

        return Redirect::to('academia/asignatura');
    }

    //Método que actualiza los datos provenientes del formulario de una vista en una tabla de la bd
    public function update(asignaturaFormRequest $request,$id){

        $asignatura=Asignatura::find($id);
        $asignatura->fill($request->all())->update();

        return Redirect::to('academia/asignatura');
    }

    //Método para eliminar registros de una tabla, redirecciona a la vista que este indicada en el método index
    public function destroy($id){
        $asignatura=Asignatura::findOrFail($id);
        $asignatura->delete();
        return Redirect::to('academia/asignatura');
    }
}
