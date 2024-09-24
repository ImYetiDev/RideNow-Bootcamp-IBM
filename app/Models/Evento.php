<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    // Definir la tabla asociada, aunque Laravel por defecto busca el plural de la clase
    protected $table = 'eventos';

    // Habilitar asignación masiva
    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha',
        'ubicacion',
        'organizador_id'
    ];

    // Definir relaciones

    /**
     * Relación con el modelo Usuario (organizador del evento)
     * Un evento es organizado por un usuario.
     */
    public function organizador()
    {
        return $this->belongsTo(User::class, 'organizador_id');
    }

    /**
     * Relación con el modelo Participacion.
     * Un evento puede tener múltiples participaciones (usuarios inscritos).
     */
    public function participaciones()
    {
        return $this->hasMany(Participacion::class, 'evento_id');
    }

    /**
     * Relación para obtener los usuarios que participan en el evento.
     * A través de la tabla participaciones.
     */
    public function participantes()
    {
        return $this->belongsToMany(User::class, 'participaciones', 'evento_id', 'usuario_id');
    }
}
