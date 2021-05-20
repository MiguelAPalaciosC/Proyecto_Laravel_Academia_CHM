<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use sisVentas\Http\Requests;
use DB;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\UsuarioFormRequest;
use sisVentas\User;
use App\Models\UserType;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request){
            if((Auth::user()->usertype_id_usertype)==1){
                $usuario=DB::table('users as u')
                ->join('usertype as ust','u.usertype_id_usertype','=','ust.id_usertype')
                ->select('u.id','u.name','u.email','u.password','ust.name as usertype_id_usertype')
                ->orderBy('id','asc')
                ->paginate(10);
    
                $usertype=DB::table('usertype')->get();
    
                
                return view('usuario.index',["usuario"=>$usuario, "usertype"=>$usertype]);
            }
            else{
                return Redirect::to('home')->with('info','El usuario no cuenta con los permisos necesarios para acceder al modulo');
            }

        }
    }

    //Método que almacena los datos provenientes del formulario de una vista en una tabla de la bd
    public function store (UsuarioFormRequest $request){
        $usuario=new User();
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->usertype_id_usertype=$request->get('usertype_id_usertype');
        $usuario->save();
        return Redirect::to('usuario')->with('info','Usuario Agregado Correctamente');
    }

    //Método que actualiza los datos provenientes del formulario de una vista en una tabla de la bd
    public function update(UsuarioFormRequest $request,$id){
        $usuario=User::findOrFail($id);
        $usuario->name=$request->get('name');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->usertype_id_usertype=$request->get('usertype_id_usertype');
        $usuario->update();
        return Redirect::to('usuario')->with('info','Usuario Actualizado Correctamente');
    }

    //Método para eliminar registros de una tabla, redirecciona a la vista que este indicada en el método index
    public function destroy($id){
        $usuario=User::findOrFail($id);
        $usuario->delete();
        return Redirect::to('usuario')->with('info','Usuario Eliminado Correctamente');
    }
}
