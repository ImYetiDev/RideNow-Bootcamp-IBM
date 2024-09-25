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

        // Obtener el tipo de usuario del formulario
        $usuario['tipo_usuario'] = (int)$datos->get('tipo_usuario'); // Tipo de usuario

        // Obtener el estrato socioeconómico
        $usuario['estrato'] = (int)$datos->get('estrato'); // Estrato socioeconómico

        // Crear el usuario en la base de datos
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
            $nombreInicialMayuscula = ucfirst($user->nombre);
            $request->session()->put('nombre', $nombreInicialMayuscula);
            $tipoUsuarioInicialMayuscula = ucfirst($user->tipo_usuario);
            $request->session()->put('tipo_usuario', $tipoUsuarioInicialMayuscula);
            // Al autenticar al usuario
            session(['usuario_id' => auth()->user()->id]);
            session(['estrato' => auth()->user()->estrato]);


            switch (session('tipo_usuario')) {
                case 1:
                    $request->session()->put('tipo_usuario_string', 'Aprendiz');
                    break;
                case 2:
                    $request->session()->put('tipo_usuario_string', 'Funcionario');
                    break;
                case 3:
                    $request->session()->put('tipo_usuario_string', 'Administrador');
                    break;
                default:
                    $request->session()->put('tipo_usuario_string', 'Desconocido'); // Opcional para manejar casos no esperados
            }




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
