<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vivienda;

class Permisos extends Model
{
    use HasFactory;

    protected $table = 'permisos';
    protected $fillable = [
        'vivienda_id',
        'nombre_visitante',
        'documento_visitante',
        'estado',];

        
}
