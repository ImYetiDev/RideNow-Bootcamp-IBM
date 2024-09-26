<?php

namespace App\Http\Controllers;

use App\Models\Alquilar;
use App\Models\Participacion;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $usuario_id = session('usuario_id');

        // Obtener la bicicleta alquilada si la tiene
        $alquilerActivo = Alquilar::where('usuario_id', $usuario_id)
            ->whereHas('bicicleta', function ($query) {
                $query->where('estado', 'Alquilada');
            })
            ->with('bicicleta')
            ->first();

        // Obtener el evento en el que el usuario está inscrito, si lo tiene
        $eventoParticipado = Participacion::where('usuario_id', $usuario_id)
            ->with('evento')
            ->first();

        // Retornar la vista 'index' pasando ambas variables
        return view('index', compact('alquilerActivo', 'eventoParticipado'));
    }
}
