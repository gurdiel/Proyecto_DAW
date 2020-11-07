<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    //

    public function clase(){

        return $this->hasOne("App\Clase");
    }
}
