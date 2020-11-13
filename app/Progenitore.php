<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progenitore extends Model
{
    //
    public function escolare(){

        return $this->hasMany("App\Escolare");
    }
}
