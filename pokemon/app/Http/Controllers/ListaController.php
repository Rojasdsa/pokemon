<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    // filtro para requisitos concretos
    // $pokemons=Pokemons::where('type','Fire')->get();


    // ELIMINAR EL POKEMON SELECCIONADO
    public function deletePokemon($id)
    {
        $pokemon = Pokemons::findOrFail($id);

        $pokemon->forceDelete();

        return back()->with('success', 'Pokémon elimnado correctamente.');
    }


    // EDITAR DATOS DEL POKEMON
    public function editPokemon($id)
    {
        $pokemon = Pokemons::findOrFail($id);

        $types = [
            'Bug', 'Dark', 'Dragon', 'Electric', 'Fairy',
            'Fighting', 'Fire', 'Flying', 'Ghost', 'Grass',
            'Ground', 'Ice', 'Normal', 'Poison', 'Psychic',
            'Rock', 'Steel', 'Water'
        ];

        $typesTranslations = [
            'Bug' => 'Bicho',
            'Dark' => 'Siniestro',
            'Dragon' => 'Dragón',
            'Electric' => 'Eléctrico',
            'Fairy' => 'Hada',
            'Fighting' => 'Lucha',
            'Fire' => 'Fuego',
            'Flying' => 'Volador',
            'Ghost' => 'Fantasma',
            'Grass' => 'Planta',
            'Ground' => 'Tierra',
            'Ice' => 'Hielo',
            'Normal' => 'Normal',
            'Poison' => 'Veneno',
            'Psychic' => 'Psíquico',
            'Rock' => 'Roca',
            'Steel' => 'Acero',
            'Water' => 'Agua'
        ];

        $subtypes = $types;
        $regions = [
            'Kanto', 'Johto', 'Hoenn', 'Sinnoh', 'Teselia',
            'Kalos', 'Alola', 'Galar'
        ];

        return view('editar', compact('pokemon', 'types', 'subtypes', 'regions', 'typesTranslations'));
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
