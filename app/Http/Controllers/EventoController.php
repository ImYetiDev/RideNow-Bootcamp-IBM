<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Participacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // return view('eventos');
        return redirect()->route('Evento.index')->with('success', 'Evento creado correctamente');
    }

    // Mostrar los detalles del evento
    // Mostrar los detalles del evento
    public function show($evento_id)
    {
        // Obtener el evento por su ID
        $evento = Evento::findOrFail($evento_id);

        // Pasar el evento a la vista
        return view('eventos.show', compact('evento'));
    }



    // Guardar la inscripción al evento
    public function participar($evento_id)
    {
        // Obtener el ID del usuario desde la sesión
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


    // Mostrar el formulario para editar el evento
    public function edit($evento_id)
    {
        // Obtener el evento por su ID
        $evento = Evento::findOrFail($evento_id);

        // Retornar la vista para editar el evento
        return view('eventos.edit', compact('evento'));
    }

    // Actualizar los datos del evento
    public function update(Request $request, $evento_id)
    {
        // Validar los datos ingresados
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'fecha' => 'required|date',
            'ubicacion' => 'required|string|max:255',
        ]);

        // Obtener el evento y actualizar los campos
        $evento = Evento::findOrFail($evento_id);
        $evento->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'fecha' => $request->fecha,
            'ubicacion' => $request->ubicacion,
        ]);

        // Redirigir a la página de detalles del evento
        return redirect()->route('eventos.show', $evento->id)->with('warning', 'Evento actualizado correctamente.');
    }

    // Eliminar un evento
    public function destroy($evento_id)
    {
        // Obtener el evento y eliminarlo
        $evento = Evento::findOrFail($evento_id);
        $evento->delete();

        // Redirigir a la lista de eventos (o cualquier otra página)
        return redirect('/')
                ->with('danger', 'Evento eliminado con éxito.');
    }
}
