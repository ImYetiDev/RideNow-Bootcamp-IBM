<?php

namespace App\Http\Controllers;
use App\Models\Vivienda;
use App\Models\Permisos;
use Illuminate\Http\Request;

class PermisosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Permiso = Permisos::all();
        $Vivienda = Vivienda::all();
        
        return view('Permisos.index', compact('Permiso','Vivienda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $Permisos = Permisos::all();
        $viviendas = vivienda::all();

        return view('Permisos.Create', compact('Permisos','viviendas')); //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $permiso = new Permisos();
         
        $permiso->vivienda_id = $request->get('vivienda_id');
        $permiso->nombre_visitante = $request->get('nombre_visitante');
           $permiso->documento_visitante = $request->get('documento_visitante');
           $permiso->estado = $request->get('estado');

           $permiso->save();
           return redirect()->route('Permisos.index');  //
    }

    /**
     * Display the specified resource.
     */
    public function show(Permisos $permiso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permisos $permiso, $id)
    {
        $Permisos = Permisos::with('vivienda')->findOrFail($id);
        $viviendas = Vivienda::all();

    return view('Permisos.edit', compact('Permisos', 'viviendas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permisos $permiso, $id)
    {
        $permiso = Permisos::find($id);
         
        $permiso->nombre_visitante = $request->get('nombre_visitante');
           $permiso->documento_visitante = $request->get('documento visitante');
           $permiso->estado = $request->get('estado');

           $permiso->save();
           return redirect()->route('Permisos.index'); //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permisos $permiso, $id)
    {
        $permiso = Permisos::find($id);
        $permiso->delete();
        return redirect()->route('Permisos.index');   //
    }
}
