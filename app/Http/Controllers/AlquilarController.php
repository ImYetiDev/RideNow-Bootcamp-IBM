<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alquilar;
use App\Models\Bicicleta;
use App\Models\Estacion;
use App\Models\Regionales;
use Carbon\Carbon;

class AlquilarController extends Controller
{
    public function index()
    {
        // Obtener el ID del usuario logueado
        $usuario_id = session('usuario_id');
        $Regionales = Regionales::all();

        // Buscar el alquiler activo del usuario
        $alquilerActivo = Alquilar::where('usuario_id', $usuario_id)
            ->whereHas('bicicleta', function ($query) {
                $query->where('estado', 'Alquilada');  // Verificar el estado de la bicicleta
            })
            ->first();

        // Mostrar todas las bicicletas disponibles (si no hay alquiler activo)
        $bicicletasDisponibles = Bicicleta::where('estado', 'Libre')->get();

        // Pasar los alquileres activos y bicicletas a la vista
        return view('alquilar.index', compact('alquilerActivo', 'bicicletasDisponibles', 'Regionales'));
    }

    /**
     * Mostrar todas las bicicletas disponibles por región
     */
    public function mostrarBicicletas($region_id)
    {
        // Obtener la región seleccionada
        $region = Regionales::find($region_id);

        // Verificar si la región existe
        if (!$region) {
            return abort(404, 'Región no encontrada');
        }

        // Obtener el tipo de usuario desde la sesión
        $tipoUsuario = session('tipo_usuario');
        $usuario_id = session('usuario_id');

        // Verificar si el usuario ya tiene una bicicleta alquilada
        $alquilerActivo = Alquilar::where('usuario_id', $usuario_id)
            ->whereHas('bicicleta', function ($query) {
                $query->where('estado', 'Alquilada');  // Verificar el estado de la bicicleta en la tabla bicicletas
            })
            ->exists();

        // Filtrar las bicicletas según el tipo de usuario
        if ($tipoUsuario == 3) {
            // Si es administrador, mostrar todas las bicicletas
            $bicicletas = Bicicleta::where('region_id', $region_id)->get();
        } else {
            // Si es usuario normal, mostrar solo las bicicletas libres
            $bicicletas = Bicicleta::where('region_id', $region_id)
                ->where('estado', 'Libre')
                ->get();
        }

        // Retornar la vista con las bicicletas, la región, y si tiene un alquiler activo
        return view('alquilar.bicicletas', compact('bicicletas', 'region', 'alquilerActivo'));
    }

    /**
     * Función para alquilar una bicicleta.
     */
    public function alquilarBicicleta($bicicleta_id)
    {
        $usuario_id = session('usuario_id');

        // Verificar si el usuario ya tiene una bicicleta alquilada
        $alquilerActivo = Alquilar::where('usuario_id', $usuario_id)
            ->whereHas('bicicleta', function ($query) {
                $query->where('estado', 'Alquilada');  // Verificar el estado de la bicicleta en la tabla bicicletas
            })
            ->exists();

        if ($alquilerActivo) {
            return redirect()->back()->with('error', 'Ya tienes una bicicleta alquilada. No puedes alquilar otra.');
        }

        // Verificar si la bicicleta está disponible
        $bicicleta = Bicicleta::find($bicicleta_id);

        if (!$bicicleta || $bicicleta->estado !== 'Libre') {
            return redirect()->back()->with('error', 'La bicicleta no está disponible para alquilar.');
        }

        // Alquilar la bicicleta
        Alquilar::create([
            'usuario_id' => $usuario_id,
            'bicicleta_id' => $bicicleta_id,
            'fecha_inicio',
            'estado' => 'pendiente',
            'tarifa' => 100,
        ]);

        // Cambiar el estado de la bicicleta a 'Alquilada'
        $bicicleta->estado = 'Alquilada';
        $bicicleta->save();

        return redirect()->route('alquilar.show', ['region_id' => $bicicleta->region_id])
            ->with('success', 'Has alquilado la bicicleta con éxito.');
    }

    /**
     * Mostrar formulario para alquilar bicicleta.
     */
    public function formulario($bicicleta_id)
    {
        // Obtener la bicicleta seleccionada
        $bicicleta = Bicicleta::find($bicicleta_id);

        // Obtener todas las estaciones
        $estaciones = Estacion::all();

        // Retornar la vista con la bicicleta y las estaciones
        return view('alquilar.formulario', compact('bicicleta', 'estaciones'));
    }

    /**
     * Guardar los datos del alquiler.
     */

    public function guardar(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'bicicleta_id' => 'required|exists:bicicletas,id',
            'estacion_inicio_id' => 'required|exists:estaciones,id',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'nullable|date|after_or_equal:fecha_inicio',
        ]);

        // Obtener el usuario
        $usuario_id = session('usuario_id');

        // Verificar si el usuario ya tiene una bicicleta alquilada
        $alquilerActivo = Alquilar::where('usuario_id', $usuario_id)
            ->where('estado', 'pendiente')  // O estado 'alquilada'
            ->exists();

        if ($alquilerActivo) {
            return redirect()->back()->with('error', 'Ya tienes una bicicleta alquilada. No puedes alquilar otra.');
        }

        try {
            // Obtener la bicicleta y su precio
            $bicicleta = Bicicleta::find($request->bicicleta_id);
            $precioPorHora = $bicicleta->precio;  // Asumiendo que el campo 'precio' es el precio por hora

            // Convertir las fechas a instancias de Carbon
            $fechaInicio = Carbon::parse($request->fecha_inicio);
            $fechaFin = Carbon::parse($request->fecha_fin ?? now());  // Usar 'now()' si no se especifica la fecha de fin

            // Calcular la duración en horas (redondeado hacia arriba)
            $duracionHoras = ceil($fechaInicio->diffInMinutes($fechaFin) / 60);

            // Calcular la tarifa total
            $tarifa = $duracionHoras * $precioPorHora;

            // Crear el registro de alquiler
            Alquilar::create([
                'usuario_id' => $usuario_id,
                'bicicleta_id' => $request->bicicleta_id,
                'estacion_inicio_id' => $request->estacion_inicio_id,
                'estacion_fin_id' => $request->estacion_fin_id,
                'fecha_inicio' => $fechaInicio,
                'fecha_fin' => $fechaFin,
                'estado' => 'pendiente',
                'tarifa' => $tarifa,
            ]);

            // Actualizar el estado de la bicicleta a 'Alquilada'
            $bicicleta->estado = 'Alquilada';
            $bicicleta->save();

            return redirect('/')->with('success', '¡Felicidades! Alquiler completado con éxito. Tarifa total: $' . $tarifa);
        } catch (\Exception $e) {
            return redirect('/')->with('error', 'Error al completar el alquiler. Inténtalo de nuevo.');
        }
    }



    /**
     * Crear un nuevo registro de alquiler.
     */
    public function create()
    {
        $Alquilar = Alquilar::all();
        return view('Alquilar.Create', compact('Alquilar'));
    }

    /**
     * Guardar un nuevo registro en la base de datos.
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
        return redirect()->route('Alquilar.index');
    }

    /**
     * Mostrar el formulario de edición de un alquiler.
     */
    public function edit(string $id)
    {
        $Alquilar = Alquilar::with('vivienda')->findOrFail($id);
        return view('Alquilar.edit', compact('Alquilar'));
    }

    /**
     * Actualizar los datos de un alquiler.
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
        return redirect()->route('Alquilar.index');
    }

    /**
     * Eliminar un alquiler.
     */
    public function destroy(string $id)
    {
        $Alquilar = Alquilar::find($id);
        $Alquilar->delete();
        return redirect()->route('Alquilar.index');
    }
}
