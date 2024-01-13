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
                'type' => 'Rock',
                'subtype' => 'fighting',
                'region' => 'Kanto',

            ],
            [
                'name' => 'Squirtle',
                'type' => 'Water',
                'subtype' => 'psychic',
                'region' => 'Kanto',

            ],
            [
                'name' => 'Bulbasaur',
                'type' => 'Grass',
                'subtype' => 'poison',
                'region' => 'Kanto',

            ],
            [
                'name' => 'Totodile',
                'type' => 'Water',
                'subtype' => 'poison',
                'region' => 'Kanto',

            ],
            [
                'name' => 'moltres',
                'type' => 'Fire',
                'subtype' => 'poison',
                'region' => 'Kanto',

            ]
        ];

        foreach ($pokemons as $pokemon) {
            Pokemons::create($pokemon);
        }
    }
}
