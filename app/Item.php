<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    protected $fillable = [
        'fotoitem_id', 'escolare_id',
    ];

    public function fotoitem(){

        return $this->belongsTo('App\Fotoitem');
    }

    
}
