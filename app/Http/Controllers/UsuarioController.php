<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;


class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Usuario = Usuario::all();
        
        return view('Usuario.index')->with('Usuario', $Usuario);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Usuario.Create'); //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $usuarios = new Usuario();
         
         $usuarios->nombre = $request->get('nombre');
            $usuarios->email = $request->get('email');
            $usuarios->password = $request->get('password');
            $usuarios->estado = $request->get('estado');
            $usuarios->remember_token = $request->get('remember_token');

            $usuarios->save();
            return redirect()->route('Usuario.index');
         
         //
    }

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usuario $usuario, $id)
    {
        $usuario = Usuario::find($id);
        return view ("usuario.edit",compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usuario $usuario, $id)
    {
        // $datos = $request->all();

        // $datos = $request->all();

        // $usuario->update($datos);
             
        // return redirect('Usuario.index')
        // ->with('type','warning')
        // ->with('message','Registro Actualizado con exito');
        $usuarios = Usuario::find($id);
         
        $usuarios->nombre = $request->get('nombre');
           $usuarios->email = $request->get('email');
           $usuarios->password = $request->get('password');
           $usuarios->estado = $request->get('estado');

           $usuarios->save();
           return redirect()->route('Usuario.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usuario $usuario, $id)
    {
        // Usuario::destroy($usuario);
        // return redirect('usuarios')
        // ->with('type','danger')
        //      ->with('message','Registro Eliminado con exito');
        
        $usuarios = Usuario::find($id);
        $usuarios->delete();
        return redirect()->route('Usuario.index');
        
    }
}
