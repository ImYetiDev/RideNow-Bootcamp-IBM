<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bicicleta;
use App\Models\Estacion;

class BicicletasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bicicleta = Bicicleta::all(); // Mostrar todos los eventos disponibles
        return view('bicicleta.index', compact('bicicleta'));
    }
    public  function map()
    {
        return view('map');
        // return "hola";
    }
    public  function maps()
    {

        return view('maps');
        // return "hola";
    }

    public function mostrarBicicletas($region)
    {
        // Supongamos que tienes una relación entre Regional y Bicicleta
        // Busca las bicicletas que pertenecen a la región
        $bicicletas = Bicicleta::where('region_id', $region)->get();

        // Retorna la vista con las bicicletas filtradas
        return view('bicicletas.index', compact('bicicletas', 'region'));
    }

    public function create()
    {
        $bicicleta = Bicicleta::all();
        return view('bicicleta.Create', compact('bicicleta')); //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bicicleta = new Bicicleta();

        $bicicleta->nombre = $request->get('nombre');
        $bicicleta->movil = $request->get('movil');
        $bicicleta->propietario = $request->get('propietario');
        $bicicleta->vivienda_id = $request->get('vivienda_id');
        $bicicleta->nombre_propietario = $request->get('nombre_propietario');
        $bicicleta->movil_propietario = $request->get('movil_propietario');
        $bicicleta->email_propietario = $request->get('email_propietario');
        $bicicleta->estado = $request->get('estado');

        $bicicleta->save();
        return redirect()->route('bicicleta.index'); //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $bicicleta = Bicicleta::with('vivienda')->findOrFail($id);

        return view('bicicleta.edit', compact('bicicleta', 'viviendas')); //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $bicicleta = Bicicleta::find($id);

        $bicicleta->nombre = $request->get('nombre');
        $bicicleta->movil = $request->get('movil');
        $bicicleta->vivienda_id = $request->get('vivienda_id');
        $bicicleta->propietario = $request->get('propietario');
        $bicicleta->nombre_propietario = $request->get('nombre_propietario');
        $bicicleta->movil_propietario = $request->get('movil_propietario');
        $bicicleta->email_propietario = $request->get('email_propietario');
        $bicicleta->estado = $request->get('estado');

        $bicicleta->save();
        return redirect()->route('bicicleta.index'); //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $bicicleta = Bicicleta::find($id);
        $bicicleta->delete();
        return redirect()->route('bicicleta.index'); //
    }
    public function ubicaciones()
    {
        // Suponemos que la tabla 'bicicletas' tiene columnas 'latitude' y 'longitude'
        $estaciones = Estacion::all(['nombre_estacion', 'direccion', 'latitud', 'longitud']);

        return response()->json($estaciones);
    }

    public function getBikeLocations()
    {
        // Supongamos que tienes un modelo "Bicicleta" con latitud y longitud almacenados
        $bicicletas = Bicicleta::select('id', 'latitud', 'longitud')->get();
        return response()->json($bicicletas);
    }

    
}
