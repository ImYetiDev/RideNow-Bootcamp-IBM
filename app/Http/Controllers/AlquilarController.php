<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alquilar;
use App\Models\Bicicleta;
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

        // Obtener las bicicletas disponibles en esa región
        $bicicletas = Bicicleta::where('region_id', $region_id)->get();

        // Retornar la vista con las bicicletas y la región
        return view('alquilar.bicicletas', compact('bicicletas', 'region'));
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
