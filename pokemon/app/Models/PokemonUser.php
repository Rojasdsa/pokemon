<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PokemonUser extends Model
{
    use HasFactory;

    public function pokemon(){

        return $this->belongsTo(Pokemons::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }


}
