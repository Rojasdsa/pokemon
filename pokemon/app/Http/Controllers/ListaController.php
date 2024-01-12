<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemons;

class ListaController extends Controller
{

    // Mostrar todos los pokemon
    public function showPokemons()
    {

        $pokemons = Pokemons::all();

        return view('lista', @compact('pokemons'));
    }

    // filtros para requisitos concretos
    // $pokemons=Pokemons::where('type','fire')->get();

    // ELiminar un pokemon
    public function deletePokemon($id)
    {
        $pokemon = Pokemons::findOrFail($id);

        $pokemon->forceDelete();

        return back()->with('Pokemon asesinado');
    }

    public function editPokemon($id)
    {
        $pokemon = Pokemons::findOrFail($id);

        return view('editar', @compact('pokemon'));
    }

    public function updatePokemon($id, Request $request)
    {
        $pokemon = Pokemons::findOrFail($id);
        
        $pokemon->name=$request->input('name');
        $pokemon->type=$request->input('type');
        $pokemon->subtype=$request->input('subtype');
        $pokemon->region=$request->input('region');
        
        $pokemon->save();

        return redirect()->route('lista.show')->with('success', 'Pokémon actualizado correctamente.');

    }
}
