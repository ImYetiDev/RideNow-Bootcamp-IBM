<?php

use App\Http\Controllers\ZonasComunController;
use App\Http\Controllers\BloqueController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\PaqueteController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\ResidenteController;
use App\Http\Controllers\TiposViviendaController;
use App\Http\Controllers\ViviendaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Grupo de rutas que requieren autenticación
Route::middleware(['auth'])->group(function () {
    Route::resource('Evento', EventoController::class);
    Route::resource('Reserva', ReservaController::class);
    Route::resource('Residente', ResidenteController::class);
    Route::resource('Usuario', UsuarioController::class);

    Route::get('/eventos/{id}/participar', [EventoController::class, 'participar'])->name('eventos.participar');
    Route::get('/eventos/{id}', [EventoController::class, 'show'])->name('eventos.show');
    Route::get('/eventos/{evento}/inscribirse', [EventoController::class, 'inscribirse'])->name('eventos.inscribirse');


    // Ruta para mostrar el formulario de creación de eventos
    Route::get('/eventos/create', [EventoController::class, 'create'])->name('eventos.create');

    // Ruta para guardar el evento en la base de datos (formulario de creación)
    Route::post('/eventos', [EventoController::class, 'store'])->name('eventos.store');
});



// // Rutas para el admin
// Route::middleware('auth:admin')->group(function () {
//     Route::get('/eventos/create', [EventoController::class, 'create']);
//     Route::post('/eventos', [EventoController::class, 'store']);
// });

// Ruta para la vista principal
Route::get('/', function () {
    if (Auth::check()) {
        return view('index'); // Mostrar vista principal si está autenticado
    }
    return redirect()->route('login'); // Redirigir al login si no está autenticado
});

// Ruta para el login
Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('Residente'); // Redirigir si ya está autenticado
    }
    return view('login');
})->name('login');

// Ruta para el registro de nuevos usuarios
Route::get('/register', function () {
    return view('register');
})->name('register');

// Ruta para manejar el proceso de registro
Route::post('/register', [LoginController::class, 'register']);

// Ruta para manejar el proceso de autenticación
Route::post('/check', [LoginController::class, 'check']);

// Ruta de fallback para manejar URLs no encontradas
Route::fallback(function () {
    if (Auth::check()) {
        return redirect('/');
    }
    return redirect()->route('login');
});

// Ruta para cerrar sesión
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
