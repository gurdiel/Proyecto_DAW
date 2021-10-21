<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mensaje extends Model
{

    protected $fillable=[
        'titulo','mensaje','user_id','clase_id',
    ];

    public function user(){

        return $this->belongsTo("App\User");
    }

}
