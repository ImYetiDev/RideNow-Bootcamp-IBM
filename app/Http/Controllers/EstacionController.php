<?php

namespace App\Http\Controllers;

use App\Models\Estacion;
use Illuminate\Http\Request;

class EstacionController extends Controller
{
    // Método para listar todas las estaciones
    public function index()
    {
        $estaciones = Estacion::all();
        return view('estaciones.index', compact('estaciones'));
    }

    // Método para mostrar el formulario de creación de una nueva estación
    public function create()
    {
        return view('estaciones.create');
    }

    // Método para guardar una nueva estación
    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'nombre_estacion' => 'required|string|max:100',
            'direccion' => 'required|string|max:255',
            'latitud' => 'required|numeric|between:-90,90',
            'longitud' => 'required|numeric|between:-180,180',
            'capacidad' => 'required|integer|min:1',
        ]);

        // Crear la estación
        Estacion::create($request->all());

        // Redirigir con mensaje de éxito
        return redirect()->route('estaciones.index')->with('success', 'Estación creada correctamente.');
    }

    // Método para mostrar el formulario de edición de una estación
    public function edit($id)
    {
        $estacion = Estacion::findOrFail($id);
        return view('estaciones.edit', compact('estacion'));
    }

    // Método para actualizar una estación
    public function update(Request $request, $id)
    {
        // Validar los datos
        $request->validate([
            'nombre_estacion' => 'required|string|max:100',
            'direccion' => 'required|string|max:255',
            'latitud' => 'required|numeric|between:-90,90',
            'longitud' => 'required|numeric|between:-180,180',
            'capacidad' => 'required|integer|min:1',
        ]);

        // Actualizar la estación
        $estacion = Estacion::findOrFail($id);
        $estacion->update($request->all());

        // Redirigir con mensaje de éxito
        return redirect()->route('estaciones.index')->with('success', 'Estación actualizada correctamente.');
    }

    // Método para eliminar una estación
    public function destroy($id)
    {
        $estacion = Estacion::findOrFail($id);
        $estacion->delete();

        return redirect()->route('estaciones.index')->with('success', 'Estación eliminada correctamente.');
    }

    public function getStationLocations()
    {
        // Supongamos que tienes un modelo "Bicicleta" con latitud y longitud almacenados
        $estaciones = Estacion::select('nombre_estacion', 'latitud', 'longitud')->get();
        return response()->json($estaciones);
    }
}