<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    use HasFactory;

    protected $table = 'permisos';
    protected $fillable = [
        'nombre visitante',
        'documento visitante',
        'estado',];

        public function vivienda()
{
    return $this->belongsTo(Vivienda::class);
}
}
