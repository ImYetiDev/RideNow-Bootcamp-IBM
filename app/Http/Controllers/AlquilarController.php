<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alquilar;
use App\Models\Bicicleta;
use App\Models\Estacion;
use App\Models\Regionales;

class AlquilarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Alquilar = Alquilar::all(); // Mostrar todos los eventos disponibles

        $Bicicletas = Bicicleta::all();
        $Regionales = Regionales::all();
        return view('alquilar.index', compact('Alquilar', 'Bicicletas', 'Regionales'));
    }

    public function mostrarBicicletas($region_id)
    {
        // Obtener la región seleccionada
        $region = Regionales::find($region_id);

        // Verificar si la región existe
        if (!$region) {
            return abort(404, 'Región no encontrada');
        }

        // Obtener el tipo de usuario desde la sesión
        $tipoUsuario = session('tipo_usuario');

        // Verificar el tipo de usuario
        if ($tipoUsuario == 3) {
            // Si es administrador, mostrar todas las bicicletas
            $bicicletas = Bicicleta::where('region_id', $region_id)->get();
        } else {
            // Si es usuario normal, mostrar solo las bicicletas con estado 'Libre'
            $bicicletas = Bicicleta::where('region_id', $region_id)
                ->where('estado', 'Libre')  // Filtrar por el estado "Libre"
                ->get();
        }

        // Retornar la vista con las bicicletas y la región
        return view('alquilar.bicicletas', compact('bicicletas', 'region'));
    }



    public function alquilarBicicleta($bicicleta_id)
    {
        // Obtener la bicicleta por su ID
        $bicicleta = Bicicleta::find($bicicleta_id);

        // Verificar si la bicicleta existe y si está disponible
        if (!$bicicleta || $bicicleta->estado !== 'Libre') {
            return redirect()->back()->with('error', 'La bicicleta no está disponible para alquilar.');
        }

        // Cambiar el estado a 'alquilada'
        $bicicleta->estado = 'Alquilada';
        $bicicleta->save();

        // Redirigir a la página anterior con un mensaje de éxito
        return redirect()->back()->with('success', 'Has alquilado la bicicleta con éxito.');
    }

    // Mostrar formulario para alquilar bicicleta
    public function formulario($bicicleta_id)
    {
        // Obtener la bicicleta seleccionada
        $bicicleta = Bicicleta::find($bicicleta_id);

        // Obtener todas las estaciones (esto lo puedes modificar según tus necesidades)
        $estaciones = Estacion::all();

        // Retornar la vista con la bicicleta y las estaciones
        return view('alquilar.formulario', compact('bicicleta', 'estaciones'));
    }

    // Guardar los datos del alquiler
    public function guardar(Request $request)
    {
        try {
            Alquilar::create([
                'usuario_id' => session('usuario_id'),
                'bicicleta_id' => $request->bicicleta_id,
                'estacion_inicio_id' => $request->estacion_inicio_id,
                'estacion_fin_id' => $request->estacion_fin_id,
                'fecha_inicio' => $request->fecha_inicio,
                'fecha_fin' => $request->fecha_fin,
            ]);

            // Actualizar el estado de la bicicleta a 'Alquilada'
            $bicicleta = Bicicleta::find($request->bicicleta_id);
            $bicicleta->estado = 'Alquilada';
            $bicicleta->save();

            return redirect('/')
                ->with('success', '¡Felicidades! Alquiler completado con éxito.');
        } catch (\Exception $e) {
            return redirect('/')
                ->with('error', 'Error al completar el alquiler. Inténtalo de nuevo.');
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Alquilar = Alquilar::all();
        return view('Alquilar.Create', compact('Alquilar')); //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $Alquilar = new Alquilar();

        $Alquilar->nombre = $request->get('nombre');
        $Alquilar->movil = $request->get('movil');
        $Alquilar->propietario = $request->get('propietario');
        $Alquilar->vivienda_id = $request->get('vivienda_id');
        $Alquilar->nombre_propietario = $request->get('nombre_propietario');
        $Alquilar->movil_propietario = $request->get('movil_propietario');
        $Alquilar->email_propietario = $request->get('email_propietario');
        $Alquilar->estado = $request->get('estado');

        $Alquilar->save();
        return redirect()->route('Alquilar.index'); //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $Alquilar = Alquilar::with('vivienda')->findOrFail($id);

        return view('Alquilar.edit', compact('Alquilar', 'viviendas')); //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Alquilar = Alquilar::find($id);

        $Alquilar->nombre = $request->get('nombre');
        $Alquilar->movil = $request->get('movil');
        $Alquilar->vivienda_id = $request->get('vivienda_id');
        $Alquilar->propietario = $request->get('propietario');
        $Alquilar->nombre_propietario = $request->get('nombre_propietario');
        $Alquilar->movil_propietario = $request->get('movil_propietario');
        $Alquilar->email_propietario = $request->get('email_propietario');
        $Alquilar->estado = $request->get('estado');

        $Alquilar->save();
        return redirect()->route('Alquilar.index'); //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Alquilar = Alquilar::find($id);
        $Alquilar->delete();
        return redirect()->route('Alquilar.index'); //
    }
}
