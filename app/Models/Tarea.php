<?php

namespace sisVentas\Models;

use Illuminate\Database\Eloquent\Model;

class Tarea extends Model
{
    protected $table='tarea';

    protected $primaryKey='id_tarea';

    public $timestamps=false;


    protected $fillable =[
        'nombre','descripcion','fecha_entrega','id_asignatura','estado',
    ];

    protected $guarded =[

    ];
}
