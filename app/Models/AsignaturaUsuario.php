<?php

namespace sisVentas\Models;

use Illuminate\Database\Eloquent\Model;

class AsignaturaUsuario extends Model
{
    protected $table='asignaturaUsuario';

    

    public $timestamps=false;


    protected $fillable =[
        'id_asignatura','id_usuario'
    ];

    protected $guarded =[

    ];
}
