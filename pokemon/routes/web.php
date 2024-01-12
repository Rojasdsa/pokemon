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

Route::get('/', function () {
    return view('lista');
});

// Mostrar
Route::get('/', [ListaController::class,'showPokemons'])->name('lista.show');

// Eliminar
Route::post('/delete/{id}',[ListaController::class,'deletePokemon'])->name('lista.delete');

// Editar
Route::get('/editar/{id}',[ListaController::class,'editPokemon'])->name('lista.edit');
Route::post('/editar/{id}',[ListaController::class,'updatePokemon'])->name('lista.update');
