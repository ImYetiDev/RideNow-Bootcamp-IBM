<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vivienda;

class Paquete extends Model
{
    use HasFactory;

    protected $table = 'paquetes';
    protected $fillable = [
        'destinatario',
        'recibido por',
        'entregado a',
        'estado',];

        public function vivienda()
{
    return $this->belongsTo(Vivienda::class);
}

        
}


