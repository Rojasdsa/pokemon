<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pokemons;
use App\Models\User;
use App\Models\Img;
use Illuminate\Support\Facades\Auth;

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


    // CREAR DATOS DEL POKEMON
    public function newPokemon()
    {

        $types = [
            'Bug', 'Dark', 'Dragon', 'Electric', 'Fairy',
            'Fighting', 'Fire', 'Flying', 'Ghost', 'Grass',
            'Ground', 'Ice', 'Normal', 'Poison', 'Psychic',
            'Rock', 'Steel', 'Water'
        ];

        $subtypes = $types;
        $regions = [
            'Kanto', 'Johto', 'Hoenn', 'Sinnoh', 'Teselia',
            'Kalos', 'Alola', 'Galar'
        ];

        return view('crear', compact('types', 'subtypes', 'regions'));
    }

    public function createPokemon(Request $request)
    {
        // Creamos el objeto Pokemon
        $pokemon = new Pokemons();

        // Asigna los datos recibidos
        $pokemon->name = $request->input('name');
        $pokemon->type = $request->input('type');
        $pokemon->subtype = $request->input('subtype');
        $pokemon->region = $request->input('region');

        // Guarda los datos en la bbdd
        $pokemon->save();
        // Guardamos varias imágenes
        $i = 0;
        foreach ($request->img as $imagen) {
            $img = new Img();

            $imageName = $pokemon->id . '_' . $i . '.' . $imagen->extension();
            $img->name = $imageName;
            $imagen->move(public_path('assets/img/' . $pokemon->id), $imageName);
            $img->pokemon_id = $pokemon->id;
            $img->save();
            $i++;
        }

        return redirect()->route('lista.show')->with('success', 'Pokemon created successfully');
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

        $subtypes = $types;
        $regions = [
            'Kanto', 'Johto', 'Hoenn', 'Sinnoh', 'Teselia',
            'Kalos', 'Alola', 'Galar'
        ];

        return view('editar', compact('pokemon', 'types', 'subtypes', 'regions'));
    }


    public function updatePokemon($id, Request $request)
    {
        $pokemon = Pokemons::findOrFail($id);

        $pokemon->name = $request->input('name');
        $pokemon->type = $request->input('type');
        $pokemon->subtype = $request->input('subtype');
        $pokemon->region = $request->input('region');


        $pokemon->save();

        return redirect()->route('lista.show')->with('success', 'Pokemon updated successfully');
    }

    // ELIMINAR EL POKEMON SELECCIONADO
    public function deletePokemon($id)
    {
        $pokemon = Pokemons::findOrFail($id);

        // Primero eliminamos las imágenes 
        $imgs = Img::where('pokemon_id', $id)->get();

        foreach ($imgs as $img) {
            $img->forceDelete();
        }

        // Sin imágenes, eliminamos al pokemon
        $pokemon->forceDelete();

        return back()->with('success', 'Pokemon deleted successfully');
    }


    // ELEGIR COLOR FAVORITO
    // Registra el color perfectamente, pero no es una cookie
    public function updateColor(Request $request)
    {
        $user = Auth::user();
        $user->color_preference = $request->input('color');
        $user->save();

        $response = [
            'success' => true,
            'message' => 'Color actualizado exitosamente.',
            'elementId' => 'colorPrefElem', // Agrega el ID del elemento aquí
            'color' => $request->input('color'),
        ];

        return response()->json($response);
    }
}
