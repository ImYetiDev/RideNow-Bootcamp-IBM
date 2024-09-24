<?php

namespace App\Http\Controllers;

use App\Models\Bloque;
use Illuminate\Http\Request;

class BloqueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { $Bloque = Bloque::all();
        
        return view('Bloque.index', compact('Bloque'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Bloque.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $bloque = new Bloque();
         
        $bloque->nombre = $request->get('nombre');
           $bloque->estado = $request->get('estado');

           $bloque->save();
           return redirect()->route('Bloque.index');   //
    }

    /**
     * Display the specified resource.
     */
    public function show(Bloque $bloque)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bloque $bloque, $id)
    {
        $bloque = Bloque::find($id);
        return view ("Bloque.edit",compact('bloque'));;
         //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bloque $bloque, $id)
    {
        $bloque = Bloque::find($id);
         
        $bloque->nombre = $request->get('nombre');
           $bloque->estado = $request->get('estado');

           $bloque->save();
           return redirect()->route('Bloque.index'); //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bloque $bloque, $id)
    {
        $bloque = Bloque::find($id);
        $bloque->delete();
        return redirect()->route('Bloque.index');  //
    }
}
