<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clase extends Model
{
    protected $fillable = [
        'nombre','horarios','anuncios','docente_id','horario_id'
    ];

    public function mensaje(){

        return $this->hasMany('App\Mensaje');
    }

    public function horario(){

        return $this->belongsTo('App\Horario');
    }

    // En el usuario progenitor no lo estoy usando.
    
    /*public function escolare(){

        return $this->hasOne("App\Escolare");
    }
    

    public function docente(){

        return $this->belongsTo('App\Docente');
    }
    En esta clase no hace falta referenciar al profesor???
    HOME CONTROLLER
    if(Auth::user()->role_id == 2){
            $clases = Auth::user()->docente->clase;
        return view('home',compact('clases'));
        }

    Le paso las clases mediante la Clase Docente donde tiene un metodo clases que dice que 
    un docente hasmany Clase
    */

    
}
