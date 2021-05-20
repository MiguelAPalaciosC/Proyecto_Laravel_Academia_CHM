<?php

namespace sisVentas\Models;

use Illuminate\Database\Eloquent\Model;

class AsignaturaUsuario extends Model
{
    protected $table='asignaturaUsuario';

    protected $primaryKey='id_relacion';

    public $timestamps=false;


    protected $fillable =[
        'id_asignatura','id_usuario'
    ];

    protected $guarded =[

    ];
}
