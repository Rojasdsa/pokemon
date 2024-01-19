<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pokemons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            //AÑADIR TODOS LOS TIPOS, SUBTIPOS Y  REGIONES
            $table->enum('type', [
                'Bug',
                'Dark',
                'Dragon',
                'Electric',
                'Fairy',
                'Fighting',
                'Fire',
                'Flying',
                'Ghost',
                'Grass',
                'Ground',
                'Ice',
                'Normal',
                'Poison',
                'Psychic',
                'Rock',
                'Steel',
                'Water',
            ])->default('Bug');
            $table->enum('subtype', [
                'Bug',
                'Dark',
                'Dragon',
                'Electric',
                'Fairy',
                'Fighting',
                'Fire',
                'Flying',
                'Ghost',
                'Grass',
                'Ground',
                'Ice',
                'Normal',
                'Poison',
                'Psychic',
                'Rock',
                'Steel',
                'Water',
            ])->nullable()->default('Bug');
            $table->enum('region', [
                'Alola',
                'Galar',
                'Hoenn',
                'Johto',
                'Kanto',
                'Kalos',
                'Sinnoh',
                'Teselia'
            ]);
            $table->timestamps();
        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemons');
    }
};
