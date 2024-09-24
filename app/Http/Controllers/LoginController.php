<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function register(Request $datos)
    {
        $usuario['nombre'] = strtolower($datos->get('nombre'));
        $usuario['email'] = strtolower($datos->get('email'));
        // Hashear la contraseña antes de guardarla
        $usuario['password'] = Hash::make($datos->get('password'));

        Usuario::create($usuario);

        return view('./login');
    }

    public function check(Request $request)
    {
        // Validación de los datos
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intentar iniciar sesión
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            // Guardar el nombre del usuario en la sesión
            $user = Auth::user();
            $request->session()->put('nombre', $user->nombre);

            // Redirige a la página de inicio
            return redirect()->intended('index');
        }

        // Si las credenciales son incorrectas
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        // Cerrar sesión
        Auth::logout();

        // Eliminar el nombre del usuario de la sesión
        $request->session()->forget('nombre');

        // Redirigir al login u otra página
        return redirect('/login')->with('message', 'Has cerrado sesión correctamente.');
    }
}
