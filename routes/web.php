<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EspecieController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\Api\EventoController as ApiEventoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', function () {
    return 'Hello, World!';
});

Route::get('saludo/{nombre?}/{id?}', function($nombre = "invitado", $id = 0){
    return 'Hola, tu nombre es: ' . $nombre . ' y tu código es el ' . $id;
})->name('ruta_saludo');

Route::middleware('api')->group(function () {
    Route::get('api/eventos', [ApiEventoController::class, 'index']);
    Route::get('api/eventos/{id}', [ApiEventoController::class, 'show']);
    Route::post('api/eventos', [ApiEventoController::class, 'store']);
    Route::put('api/eventos/{id}', [ApiEventoController::class, 'update']);
    Route::delete('api/eventos/{id}', [ApiEventoController::class, 'destroy']);
});

Route::get('/login', [UsuarioController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [UsuarioController::class, 'login'])->name('login');
Route::post('/logout', [UsuarioController::class, 'logout'])->name('logout');

Route::middleware('auth')->get('/perfil', [UsuarioController::class, 'perfil'])->name('perfil');

Route::resource('usuarios', UsuarioController::class)->except(['show']);
Route::get('usuarios/{usuario}', [UsuarioController::class, 'show'])->name('usuarios.show');

Route::resource('especies', EspecieController::class);

Route::resource('eventos', EventoController::class);

Route::post('eventos/{evento}/participar', [EventoController::class, 'participar'])
    ->middleware('auth')
    ->name('eventos.participar');