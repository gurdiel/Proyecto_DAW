<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    //
    public function escolare(){

        return $this->hasOne("App\Escolare");
    }

    public function docente(){

        return $this->belongsTo('App\Docente');
    }


    public function mensaje(){

        return $this->hasMany('App\Mensaje');
    }
}
