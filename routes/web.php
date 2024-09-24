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
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/index', function () {
        return view('index');
    })->name('index');
    // Route::resource('Bloque', BloqueController::class);
    Route::resource('Evento', EventoController::class);
    // Route::resource('Paquete', PaqueteController::class);
});


Route::middleware('auth:admin')->group(function () {
    Route::get('/eventos/crear', 'EventoController@create');
    Route::post('/eventos', 'EventoController@store');
});

Route::middleware('auth')->group(function () {
    Route::get('/eventos', 'EventoController@index');
    Route::post('/eventos/{evento}/participar', 'EventoController@participar');
});








Route::get('/', function () {
    if(Auth::check()){
        return redirect('residentes');}
    return view('login');
});

Route::get('/login', function () {
    if(Auth::check()){
        return redirect('residentes');}
    return view('login');
})->name('login');


Route::get('/logout', function () {
    Auth::logout();
    return redirect('residentes');
})->name('logout');

Route::get('/register', function(){
    return view('register');
});

Route::post('/register', [LoginController::class, 'register']);
Route::post('/check', [LoginController::class, 'check']);



