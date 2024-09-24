<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TiposVivienda extends Model
{
    use HasFactory;

    protected $table = 'tipos_viviendas';
    protected $fillable = [
        'nombre',
        'estado',];
}
