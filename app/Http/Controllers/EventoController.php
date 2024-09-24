<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Evento = Evento::all();
        
        return view('Evento.index', compact('Evento'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Evento.Create');//
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $evento = new Evento();
         
            $evento->nombre = $request->get('nombre');
           $evento->descripcion = $request->get('descripcion');
           $evento->fecha = $request->get('fecha');
           $evento->hora = $request->get('hora');
           $evento->estado = $request->get('estado');

           $evento->save();
           return redirect()->route('Evento.index'); //
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento, $id)
    {
        $evento = Evento::find($id);
        return view ("Evento.edit",compact('evento'));  //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evento $evento, $id)
    {
        $evento = Evento::find($id);
         
        $evento->nombre = $request->get('nombre');
           $evento->descripcion = $request->get('descripcion');
           $evento->fecha = $request->get('fecha');
           $evento->hora = $request->get('hora');
           $evento->estado = $request->get('estado');

           $evento->save();
           return redirect()->route('Evento.index');
  //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento, $id)
    {
        $evento = Evento::find($id);
        $evento->delete();
        return redirect()->route('Evento.index'); //
    }
}
