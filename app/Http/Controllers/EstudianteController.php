<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;

use sisVentas\Http\Requests;
use sisVentas\Estudiante;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\EstudianteFormRequest;
use DB;


class EstudianteController extends Controller
{
    public function __construct(){

    }

    //Método que redirecciona a la vista Principal
    public function index(Request $request){

        if ($request){
            
            $estudiantes=DB::table('estudiante')
            ->orderBy('id_estudiante','asc')
            ->paginate(2);

            return view('almacen.estudiante.index',["estudiantes"=>$estudiantes]);
        }
    }

    
    //Método para redireccionar a una vista para el formulario de registro
    public function create(){
        return view("almacen.estudiante.create");
    }

    //Método que almacena los datos provenientes del formulario de una vista en una tabla de la bd
    public function store (EstudianteFormRequest $request){
        $estudiante=new Estudiante;
        $estudiante->nombre=$request->get('nombre');
        $estudiante->apellido=$request->get('apellido');
        $estudiante->codigo=$request->get('codigo');
        $estudiante->save();
        return Redirect::to('almacen/estudiante');
    }



    //Método para redireccionar a una vista
    public function show($id){
        return view("almacen.estudiante.show",["estudiante"=>Estudiante::findOrFail($id)]);
    }

    //Método para redireccionar a la vista del formulario de edición
    public function edit($id){
        return view("almacen.estudiante.edit",["estudiante"=>Estudiante::findOrFail($id)]);
    }

    //Método que actualiza los datos provenientes del formulario de una vista en una tabla de la bd
    public function update(EstudianteFormRequest $request,$id){
        $estudiante=Estudiante::findOrFail($id);
        $estudiante->nombre=$request->get('nombre');
        $estudiante->apellido=$request->get('apellido');
        $estudiante->codigo=$request->get('codigo');
        $estudiante->update();
        return Redirect::to('almacen/estudiante');
    }

    //Método para eliminar registros de una tabla, redirecciona a la vista que este indicada en el método index
    public function destroy($id){
        $estudiante=Estudiante::findOrFail($id);
        $estudiante->delete();
        return Redirect::to('almacen/estudiante');
    }

}
