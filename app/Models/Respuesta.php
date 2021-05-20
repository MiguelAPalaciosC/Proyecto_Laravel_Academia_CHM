<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $table='respuesta';

    protected $primaryKey='id_respuesta';

    public $timestamps=false;


    protected $fillable =[
        'nombre','descripcion','nota','id_tarea','id_usuario','archivo'
    ];

    protected $guarded =[

    ];
}
