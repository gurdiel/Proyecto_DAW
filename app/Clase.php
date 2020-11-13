<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    //
    public function escolare(){

        return $this->hasMany("App\Escolare");
    }

    public function docente(){

        return $this->belongsTo('App\Docente');
    }

    public function menaje(){

        return $this->belongsTo('App\Role');
    }

    public function mensaje(){

        return $this->hasMany('App\Mensaje');
    }
}
