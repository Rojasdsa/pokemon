<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListaController;
use App\Http\Controllers\CookieController;


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
    return view('lista');
})->middleware(['auth', 'verified']);


Route::prefix('')->middleware('auth')->group(function () {
    /* Rutas para lista de pokemons */
    // Mostrar || Al hacer login entrará en esta vista
    Route::get('/home', [ListaController::class, 'showPokemons'])->name('lista.show');

    // Eliminar
    Route::post('/delete/{id}', [ListaController::class, 'deletePokemon'])->name('lista.delete');

    // Editar
    Route::get('/editar/{id}', [ListaController::class, 'editPokemon'])->name('lista.edit');
    Route::put('/editar/{id}', [ListaController::class, 'updatePokemon'])->name('lista.update');
});

// Color seleccionado en la cookie
Route::post('/', [ListaController::class, 'updateColor'])->name('lista.color');
