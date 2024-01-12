<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pokemons;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $pokemons = [
            [
                'name' => 'Charmander',
                'type' => 'fire',
                'subtype' => 'fighting',
                'region' => 'Kanto',

            ],
            [
                'name' => 'Squirtle',
                'type' => 'water',
                'subtype' => 'psychic',
                'region' => 'Kanto',

            ],
            [
                'name' => 'Bulbasaur',
                'type' => 'grass',
                'subtype' => 'poison',
                'region' => 'Kanto',

            ],
            [
                'name' => 'Totodile',
                'type' => 'water',
                'subtype' => 'poison',
                'region' => 'Kanto',

            ],
            [
                'name' => 'moltres',
                'type' => 'fire',
                'subtype' => 'poison',
                'region' => 'Kanto',

            ]
        ];

        foreach ($pokemons as $pokemon) {
            Pokemons::create($pokemon);
        }
    }
}
