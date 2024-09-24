<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Participacion;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::all(); // Mostrar todos los eventos disponibles
        return view('eventos.index', compact('eventos'));
    }

    public function create()
    {
        return view('eventos.create'); // Vista para crear un evento
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'fecha' => 'required|date',
            'ubicacion' => 'required',
        ]);

        Evento::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'fecha' => $request->fecha,
            'ubicacion' => $request->ubicacion,
            'organizador_id' => auth()->id(),
        ]);

        return redirect('/eventos')->with('success', 'Evento creado correctamente');
    }

    public function participar(Evento $evento)
    {
        // Verificar si el usuario ya está registrado en el evento
        if (Participacion::where('evento_id', $evento->id)->where('usuario_id', auth()->id())->exists()) {
            return redirect('/eventos')->with('error', 'Ya estás registrado en este evento');
        }

        Participacion::create([
            'evento_id' => $evento->id,
            'usuario_id' => auth()->id(),
        ]);

        return redirect('/eventos')->with('success', 'Te has registrado en el evento');
    }

    // Mostrar los detalles de un evento específico
    public function show(Evento $evento)
    {
        $participantes = $evento->participantes; // Obtener todos los participantes del evento
        return view('eventos.show', compact('evento', 'participantes'));
    }
}
