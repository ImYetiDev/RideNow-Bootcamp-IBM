<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alquilar extends Model
{
    use HasFactory;

    protected $table = 'alquileres';
    
    protected $fillable = [
        'usuario_id',
        'bicicleta_id',
        'estacion_inicio_id',
        'estacion_fin_id',
        'fecha_inicio',
        'fecha_fin',
        'estado'
    ];
    }