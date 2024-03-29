<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pokemons;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        $pokemons = [
            [
                'name' => 'Bulbasaur',
                'type' => 'Grass',
                'subtype' => 'Poison',
                'region' => 'Kanto',
            ],
            [
                'name' => 'Charmander',
                'type' => 'Fire',
                'subtype' => 'Fire',
                'region' => 'Kanto',
            ],
            [
                'name' => 'Squirtle',
                'type' => 'Water',
                'subtype' => 'Water',
                'region' => 'Kanto',
            ],
            [
                'name' => 'Pidgey',
                'type' => 'Normal',
                'subtype' => 'Flying',
                'region' => 'Kanto',
            ],
            [
                'name' => 'Nidoqueen',
                'type' => 'Poison',
                'subtype' => 'Ground',
                'region' => 'Kanto',
            ],
            [
                'name' => 'Poliwrath',
                'type' => 'Water',
                'subtype' => 'Fighting',
                'region' => 'Kanto',
            ],
            [
                'name' => 'Kadabra',
                'type' => 'Psychic',
                'subtype' => 'Psychic',
                'region' => 'Kanto',
            ],
            [
                'name' => 'Geodude',
                'type' => 'Rock',
                'subtype' => 'Ground',
                'region' => 'Kanto',
            ],
            [
                'name' => 'Haunter',
                'type' => 'Ghost',
                'subtype' => 'Poison',
                'region' => 'Kanto',
            ],
            [
                'name' => 'Pikachu',
                'type' => 'Electric',
                'subtype' => 'Electric',
                'region' => 'Kanto',
            ]
        ];

        foreach ($pokemons as $pokemon) {
            Pokemons::create($pokemon);
        }

        $users = [
            [
                'name' => 'Manu',
                'username' => 'Ash',
                'email' => 'ash@example.com',
                'password' => bcrypt('manumanu'),
                'color_preference' =>'#fcba03',
                'email_verified_at' => now(),
            ],

            [
                'name' => 'Luis',
                'username' => 'Brock',
                'email' => 'brock@example.com',
                'password' => bcrypt('luisluis'),
                'color_preference' =>'#03fc6f',
                'email_verified_at' => now(),
            ],

            [
                'name' => 'Rafa',
                'username' => 'Misty',
                'email' => 'misty@example.com',
                'password' => bcrypt('rafarafa'),
                'color_preference' =>'#ab8cde',
                'email_verified_at' => now(),
            ]

        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
