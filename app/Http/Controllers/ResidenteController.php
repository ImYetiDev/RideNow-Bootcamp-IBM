<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Residente;
use App\Models\Vivienda;

class ResidenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Residente = Residente::all();
        
        return view('Residente.index', compact('Residente'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Residente = Residente::all();
        $viviendas = vivienda::all();
        return view('Residente.Create', compact('Residente','viviendas')); //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $residente = new Residente();
         
        $residente->nombre = $request->get('nombre');
           $residente->movil = $request->get('movil');
           $residente->propietario = $request->get('propietario');
           $residente->vivienda_id = $request->get('vivienda_id');
           $residente->nombre_propietario = $request->get('nombre_propietario');
           $residente->movil_propietario = $request->get('movil_propietario');
           $residente->email_propietario = $request->get('email_propietario');
           $residente->estado = $request->get('estado');

           $residente->save();
           return redirect()->route('Residente.index'); //
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
        
        $Residente = Residente::with('vivienda')->findOrFail($id);
    $viviendas = Vivienda::all();

    return view('Residente.edit', compact('Residente', 'viviendas'));//
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $residente = Residente::find($id);
         
        $residente->nombre = $request->get('nombre');
        $residente->movil = $request->get('movil');
        $residente->vivienda_id = $request->get('vivienda_id');
        $residente->propietario = $request->get('propietario');
        $residente->nombre_propietario = $request->get('nombre_propietario');
        $residente->movil_propietario = $request->get('movil_propietario');
        $residente->email_propietario = $request->get('email_propietario');
        $residente->estado = $request->get('estado');

           $residente->save();
           return redirect()->route('Residente.index'); //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $residente = Residente::find($id);
        $residente->delete();
        return redirect()->route('Residente.index'); //
    }
}
