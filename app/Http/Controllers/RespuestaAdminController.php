<?php

namespace App\Http\Controllers;

use App\Http\Requests\RespuestaFormRequest;
use App\Respuesta;
use App\Models\Respuesta;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;

class RespuestaAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request) {

            $respuesta=DB::table('respuesta')->get();
            $respuesta=DB::select('SELECT r.id_respuesta,r.nombre,r.descripcion,r.nota,t.nombre as id_tarea,u.name as id_usuario,r.archivo FROM respuesta as r JOIN tarea as t ON (r.id_tarea=t.id_tarea) JOIN users as u ON (r.id_usuario=u.id)')
            
        }
    }

    //Método que almacena los datos provenientes del formulario de una vista en una tabla de la bd
    public function store (RespuestaFormRequest $request){
    }
}