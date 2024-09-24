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
        return view('Eventos.create'); // Vista para crear un evento
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

    public function participar($id)
    {
        // Aquí obtienes el evento por su ID, asegúrate de que exista
        $evento = Evento::find($id);

        if (!$evento) {
            return redirect()->route('eventos.index')->with('error', 'Evento no encontrado.');
        }

        // Aquí pones la lógica para participar en el evento
        // Puedes pasar el evento a la vista, por ejemplo:
        return view('Eventos.participar', compact('evento'));
    }

    // Mostrar los detalles de un evento específico
    public function show($id)
    {
        // Encuentra el evento por su ID
        $evento = Evento::find($id);
    
        // Si el evento no se encuentra, redirige con un mensaje de error
        if (!$evento) {
            return redirect('/eventos')->with('error', 'Evento no encontrado');
        }
    
        // Obtén los participantes inscritos en el evento
        $participantes = $evento->participantes;
    
        // Retorna la vista 'eventos.show' con los datos del evento y los participantes
        return view('eventos.show', compact('evento', 'participantes'));
    }
    
}
