<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estacion extends Model
{
    use HasFactory;

    protected $table = 'estaciones';
    protected $fillable = [
        'nombre_estacion',
        'direccion',
        'latitud',
        'longitud',
        'capacidad',
    ];
}

