<?php

namespace sisVentas\Http\Controllers;

use Illuminate\Http\Request;
use sisVentas\Http\Requests;
use sisVentas\Empresa;
use Illuminate\Support\Facades\Redirect;
use sisVentas\Http\Requests\EmpresaFormRequest;
use DB;


class EmpresaController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if ($request){

            $empresa=DB::table('detalle_empresa')
            ->orderBy('id_detalle','desc')
            ->paginate(7);

            $id=1;
            
            return view('almacen.empresa.index',["empresa"=>$empresa, "empresa2"=>Empresa::findOrFail($id)]);
        }
    }


    //Método que actualiza los datos provenientes del formulario de una vista en una tabla de la bd
    public function update(EmpresaFormRequest $request,$id){
        $empresa=Empresa::findOrFail($id);
        $empresa->nombre_empresa=$request->get('nombre_empresa');
        $empresa->nit=$request->get('nit');
        $empresa->direccion=$request->get('direccion');
        $empresa->telefono=$request->get('telefono');
        $empresa->correo=$request->get('correo');
        $empresa->informacion=$request->get('informacion');
        $empresa->update();
        return Redirect::to('almacen/empresa');
    }
   
}
