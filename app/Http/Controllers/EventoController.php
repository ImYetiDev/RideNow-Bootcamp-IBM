<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Participacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventoController extends Controller
{
    // Función para mostrar el listado de eventos
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
        // Validar el formulario
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'fecha' => 'required|date',
            'ubicacion' => 'required',
        ]);

        // Crear el evento
        Evento::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'fecha' => $request->fecha,
            'ubicacion' => $request->ubicacion,
            'organizador_id' => auth()->id(), // El usuario autenticado como organizador
        ]);

        return redirect()->route('Evento.index')->with('success', 'Evento creado correctamente');
    }

    // Mostrar los detalles del evento
    public function show($evento_id)
    {
        // Obtener el evento por su ID
        $evento = Evento::findOrFail($evento_id);

        // Verificar si el usuario está participando en el evento
        $usuario_id = session('usuario_id');
        $participacion = Participacion::where('evento_id', $evento_id)->where('usuario_id', $usuario_id)->first();

        // Pasar el evento y la participación a la vista
        return view('eventos.show', compact('evento', 'participacion'));
    }

    // Función para participar en el evento
    public function participar($evento_id)
    {
        $usuario_id = session('usuario_id');

        // Verificar si ya está inscrito
        $participado = Participacion::where('evento_id', $evento_id)->where('usuario_id', $usuario_id)->exists();

        if (!$participado) {
            // Crear la participación
            Participacion::create([
                'evento_id' => $evento_id,
                'usuario_id' => $usuario_id,
            ]);

            return redirect()->route('eventos.show', $evento_id)->with('success', 'Te has inscrito correctamente al evento.');
        } else {
            return redirect()->route('eventos.show', $evento_id)->with('info', 'Ya estás inscrito en este evento.');
        }
    }

    // Función para cancelar la participación en el evento
    public function cancelarParticipacion($evento_id)
    {
        $usuario_id = session('usuario_id');

        // Eliminar la participación
        Participacion::where('evento_id', $evento_id)->where('usuario_id', $usuario_id)->delete();

        return redirect()->route('eventos.show', $evento_id)->with('success', 'Has cancelado tu participación en el evento.');
    }

    // Mostrar el formulario para editar el evento
    public function edit($evento_id)
    {
        $evento = Evento::findOrFail($evento_id);
        return view('eventos.edit', compact('evento'));
    }

    public function update(Request $request, $evento_id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'ubicacion' => 'required|string|max:255',
        ]);

        $evento = Evento::findOrFail($evento_id);
        $evento->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'fecha' => $request->fecha,
            'ubicacion' => $request->ubicacion,
        ]);

        return redirect()->route('eventos.show', $evento->id)->with('warning', 'Evento actualizado correctamente.');
    }

    public function destroy($evento_id)
    {
        $evento = Evento::findOrFail($evento_id);
        $evento->delete();

        return redirect('/')->with('danger', 'Evento eliminado con éxito.');
    }
}
