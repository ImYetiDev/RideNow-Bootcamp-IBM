<?php

namespace App\Http\Controllers;

use App\Models\TiposVivienda;
use Illuminate\Http\Request;

class TiposViviendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $TiposVivienda = TiposVivienda::all();
        
        return view('TiposVivienda.index', compact('TiposVivienda')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('TiposVivienda.Create'); //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tipos_vivienda = new TiposVivienda();
         
        $tipos_vivienda->nombre = $request->get('nombre');
           $tipos_vivienda->estado = $request->get('estado');

           $tipos_vivienda->save();
           return redirect()->route('TiposVivienda.index'); //
    }

    /**
     * Display the specified resource.
     */
    public function show(TiposVivienda $tipos_vivienda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TiposVivienda $tipos_vivienda, $id)
    {
        $TiposVivienda = TiposVivienda::find($id);
        return view ("TiposVivienda.edit",compact('TiposVivienda'));  //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TiposVivienda $tipos_vivienda, $id)
    {
        $tipos_vivienda = TiposVivienda::find($id);
           
        $tipos_vivienda->nombre = $request->get('nombre');
           $tipos_vivienda->estado = $request->get('estado');

           $tipos_vivienda->save();
           return redirect()->route('TiposVivienda.index');  //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TiposVivienda $tipos_vivienda, $id)
    {
        $tipos_vivienda = TiposVivienda::find($id);
        $tipos_vivienda->delete();
        return redirect()->route('TiposVivienda.index');  //
    }
}
