<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Img extends Model
{
    use HasFactory;

    public function pokemon(){

        return $this->belongsTo(Pokemons::class);
    }

    public function imagenes($id){

        return Img::where('pokemon_id',$id);
    }


}
