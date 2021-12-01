<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escolare extends Model
{
    protected $fillable = [
        'user_id','clase_id', 'puntos','progenitore_id', 'nota_id',
    ];

    public function clase(){

        return $this->belongsTo("App\Clase");
    }

    //No Estoy usando esto????
    //En el usuario escolar no.
    //Demás usuarios?

    /*public function progenitore(){

        return $this->belongsTo('App\Progenitore');
    }
     
    */
    public function user(){

        return $this->belongsTo("App\User");
    }

    public function item(){

        return $this->hasMany("App\Item");//un escolar tiene muchos items.
    }
    public function nota(){

        return $this->belongsTo("App\Nota");
    }

}
