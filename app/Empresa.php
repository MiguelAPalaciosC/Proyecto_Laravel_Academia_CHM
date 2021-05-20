<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table='detalle_empresa';

    protected $primaryKey='id_detalle';

    public $timestamps=false;


    protected $fillable =[
    	'nombre_empresa',
    	'nit',
    	'direccion',
    	'telefono',
    	'correo',
    	'informacion'
    ];

    protected $guarded =[

    ];

}
