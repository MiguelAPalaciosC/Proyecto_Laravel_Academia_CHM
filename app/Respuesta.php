<?php

namespace sisVentas;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Respuesta as Authenticatable;

class Respuesta extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','descripcion','nota','id_tarea','id_usuario','archivo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
