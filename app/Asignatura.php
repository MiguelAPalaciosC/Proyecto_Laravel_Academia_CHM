<?php

namespace sisVentas;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\Asignatura as Authenticatable;

class Asignatura extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo','nombre','id_usuario'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}
