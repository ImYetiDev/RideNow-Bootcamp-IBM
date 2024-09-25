<?php

namespace App\Http\Controllers;

use App\Models\Participacion;
use Illuminate\Http\Request;

class ParticipacionController extends Controller
{
    // Función para participar en un evento
    public function participar($evento_id)
    {
        $usuario_id = session('usuario_id');

        // Verificar si el usuario ya está participando en el evento
        $participacion = Participacion::where('evento_id', $evento_id)
                                      ->where('usuario_id', $usuario_id)
                                      ->first();

        if ($participacion) {
            // Si ya está participando, eliminar la participación (Cancelar)
            $participacion->delete();
            return redirect()->back()->with('success', 'Has cancelado tu participación en el evento.');
        } else {
            // Si no está participando, registrar la participación
            Participacion::create([
                'evento_id' => $evento_id,
                'usuario_id' => $usuario_id,
            ]);
            return redirect()->back()->with('success', 'Te has registrado para el evento.');
        }
    }
}
