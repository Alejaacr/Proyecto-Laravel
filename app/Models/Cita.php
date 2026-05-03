<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = [
        'nombre',
        'documento',
        'tipo_cita',
        'eps',
        'edad',
        'fecha',
        'hora'
    ];
}
