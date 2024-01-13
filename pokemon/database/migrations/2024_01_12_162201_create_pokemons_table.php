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
            $table->enum('type',['fire','water','grass']);
            $table->enum('subtype',['fighting','psychic','poison']);
            $table->enum('region',['Kanto','Johto','Hoenn']);
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
