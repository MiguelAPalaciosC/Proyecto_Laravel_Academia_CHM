<?php

namespace sisVentas\Http\Controllers;

use sisVentas\Http\Requests;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request){
            $idusuario = (Auth::user()->id);
            $asignatura=DB::table('asignatura as asi')
            ->join('asignaturaUsuario as asiU','asi.id_asignatura','=','asiU.id_asignatura')
            ->join('users as u','asiU.id_usuario','=','u.id')
            ->select('asi.id_asignatura','asi.codigo','asi.nombre')
            ->where('u.id','=',$idusuario)
            ->orderBy('id_asignatura','asc')
            ->paginate(10);

            $usuario=DB::table('users as u')
                ->join('usertype as ust','u.usertype_id_usertype','=','ust.id_usertype')
                ->select('u.id','u.name','u.email','ust.name as usertype_id_usertype')
                ->orderBy('id','asc')
                ->paginate(10);
            
            return view('home',["asignatura"=>$asignatura,'usuario'=>$usuario]);
        }
    }
}
