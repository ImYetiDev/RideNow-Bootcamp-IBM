<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participacion extends Model
{
    use HasFactory;

    protected $table = 'participaciones';

    protected $fillable = [
        'evento_id',
        'usuario_id',
    ];

    // Relación con Evento
    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }

    // Relación con Usuario
    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}

