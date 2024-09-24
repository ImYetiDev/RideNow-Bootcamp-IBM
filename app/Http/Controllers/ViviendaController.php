<?php

namespace App\Http\Controllers;

use App\Models\Vivienda;
use App\Models\Bloque;
use Illuminate\Http\Request;

class ViviendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Vivienda = Vivienda::all();
        $Bloque = Bloque::all();

        return view('Vivienda.index', compact('Vivienda', 'Bloque')); //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Vivienda = Vivienda::all();
        $bloque = Bloque::all();

        return view('Vivienda.Create', compact('bloque', 'Vivienda')); //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vivienda = new Vivienda();

        $vivienda->nomenclatura = $request->get('nomenclatura');
        $vivienda->bloque_id = $request->get('bloque_id');
        $vivienda->estado = $request->get('estado');
        $vivienda->telefono = $request->get('telefono');

        $vivienda->save();
        return redirect()->route('Vivienda.index'); //
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
        $Viviendas = Vivienda::with('bloque')->findOrFail($id);
        $bloques = Bloque::all();

        return view('Vivienda.edit', compact('Viviendas', 'bloques'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vivienda = Vivienda::find($id);

        $vivienda->nomenclatura = $request->get('nomenclatura');
        $vivienda->bloque_id = $request->get('bloque_id');
        $vivienda->estado = $request->get('estado');
        $vivienda->telefono = $request->get('telefono');

        $vivienda->save();
        return redirect()->route('Vivienda.index'); //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vivienda = Vivienda::find($id);
        $vivienda->delete();
        return redirect()->route('Vivienda.index'); //
    }
}
