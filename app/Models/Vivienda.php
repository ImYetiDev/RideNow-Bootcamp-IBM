<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paquete;
use App\Models\Bloque;

class Vivienda extends Model
{
    use HasFactory;

    protected $table = 'viviendas';
    protected $fillable = [
        'nomenclatura',
        'bloque id',
        'estado',
        'telefono',];



public function bloque()
{
    return $this->belongsTo(Bloque::class);
}

}
