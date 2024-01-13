<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use App\Models\Pokemons;

class ListaController extends Controller
{
    // MOSTRAR TODOS LOS POKEMON
    public function showPokemons(Request $request)
    {
        // Obtén el parámetro de order desde la URL
        $order = $request->get('order');
        $orderField = $request->get('orderField');

        // Mostrará como default el orden por ID al entrar en la vista
        if (empty($order)) {
            $pokemons =  Pokemons::all();
        } else {
            $pokemons = Pokemons::orderBy($orderField, $order)->get();
        }

        return view('lista', @compact('order', 'pokemons'));
    }

    // filtros para requisitos concretos
    // $pokemons=Pokemons::where('type','fire')->get();

    // ELIMINAR EL POKEMON SELECCIONADO
    public function deletePokemon($id)
    {
        $pokemon = Pokemons::findOrFail($id);

        $pokemon->forceDelete();

        return back()->with('Pokemon asesinado');
    }

    // EDITAR DATOS DEL POKEMON
    public function editPokemon($id)
    {
        $pokemon = Pokemons::findOrFail($id);

        $types = Pokemons::getEnumValues('pokemons', 'type');
        $subtypes = Pokemons::getEnumValues('pokemons', 'subtype');
        $regions = Pokemons::getEnumValues('pokemons', 'region');

        dd($types, $subtypes, $regions);

        return view('editar', @compact('pokemon', 'types', 'subtypes', 'regions'));
    }


    // GUARDAR DATOS EDITADOS DEL POKEMON
    public function updatePokemon($id, Request $request)
    {
        $pokemon = Pokemons::findOrFail($id);

        $pokemon->name = $request->input('name');
        $pokemon->type = $request->input('type');
        $pokemon->subtype = $request->input('subtype');
        $pokemon->region = $request->input('region');

        $pokemon->save();

        return redirect()->route('lista.show')->with('success', 'Pokémon actualizado correctamente.');
    }
}
