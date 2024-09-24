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

        // Intentar iniciar sesión utilizando el campo 'email_propietario' en lugar de 'email'
        if (Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']])) {
            // Si las credenciales son correctas, redirige a la página de inicio
            return redirect()->intended('index');
        }

        // Si las credenciales son incorrectas, redirigir de vuelta al login con un error
        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->withInput();
    }
}
