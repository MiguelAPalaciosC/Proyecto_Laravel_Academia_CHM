<?php

namespace sisVentas;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Tarea as Authenticatable;

class Tarea extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','descripcion','fecha_entrega','id_asignatura'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
