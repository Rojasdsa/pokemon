<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListaController;

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

// Ruta inicial
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Rutas auth
Route::get('/home', function () {
    return view('auth.dashboard');
})->middleware(['auth', 'verified']);


/* Rutas para lista de pokemons */
// Mostrar
Route::get('/list', [ListaController::class, 'showPokemons'])->name('lista.show');

// Eliminar
Route::post('/delete/{id}', [ListaController::class, 'deletePokemon'])->name('lista.delete');

// Editar
Route::get('/editar/{id}', [ListaController::class, 'editPokemon'])->name('lista.edit');
Route::put('/editar/{id}', [ListaController::class, 'updatePokemon'])->name('lista.update');
