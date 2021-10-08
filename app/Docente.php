<?php


namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    //
    
    protected $fillable = [
     'telefono', 'user_id'
    ];

    public function clase(){

        return $this->hasMany("App\Clase");
    }
}
