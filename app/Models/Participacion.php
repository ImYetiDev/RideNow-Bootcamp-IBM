<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participacion extends Model
{
    use HasFactory;

    // Definir la tabla asociada
    protected $table = 'participaciones';

    // Habilitar asignación masiva
    protected $fillable = [
        'evento_id',
        'usuario_id',
    ];

    // Definir relaciones

    /**
     * Relación con el modelo Evento.
     * Una participación pertenece a un evento.
     */
    public function evento()
    {
        return $this->belongsTo(Evento::class, 'evento_id');
    }

    /**
     * Relación con el modelo Usuario.
     * Una participación pertenece a un usuario.
     */
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
