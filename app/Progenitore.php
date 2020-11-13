<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progenitore extends Model
{
    
    protected $fillable = [
        'nombre','email', 'fam_aut', 'user_id','escolare_id'
    ];
    //
    public function escolare(){

        return $this->hasMany("App\Escolare");
    }
}
