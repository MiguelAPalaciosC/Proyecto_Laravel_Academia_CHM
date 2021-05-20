<?php

namespace sisVentas\Http\Controllers;

use sisVentas\Http\Requests\TareaFormRequest;
use sisVentas\Tarea;
use sisVentas\Models\Tarea;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;

class TareaAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request) {
            $tarea=DB::table('tarea')-get();
            $tarea=DB::select('SELECT t.id_tarea,t.nombre,t.descripcion,t.fecha_entrega,a.nombre as id_asignatura FROM tarea as t JOIN asignatura as a on (t.id_asignatura=a.id_asignatura)');
        }
    }

    //Método que almacena los datos provenientes del formulario de una vista en una tabla de la bd
    public function store (TareaFormRequest $request){
    }
}
