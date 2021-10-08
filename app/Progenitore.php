<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progenitore extends Model
{
    
    protected $fillable = [
        'telefono', 'fam_aut', 'user_id',
    ];
    //
    public function escolare(){

        return $this->hasMany("App\Escolare");
    }
}
