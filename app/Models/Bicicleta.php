<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bicicleta extends Model
{
    use HasFactory;

    protected $table = 'bicicletas';
    
    protected $fillable = [
        'id',
        'marca',
        'color',
        'estado',
        'precio',
        'ubicacion_actual'
    ];
    }