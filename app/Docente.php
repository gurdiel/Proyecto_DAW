<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    //
    
    protected $fillable = [
        'tipo', 'nombre','email', 'telefono', 'user_id'
    ];

    public function clase(){

        return $this->hasMany("App\Clase");
    }
}
