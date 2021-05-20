<?php

namespace sisVentas;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table='estudiante';

    protected $primaryKey='id_estudiante';

    public $timestamps=false;


    protected $fillable =[
    	'nombre',
    	'apellido',
    	'codigo'
    ];

    protected $guarded =[

    ];

}