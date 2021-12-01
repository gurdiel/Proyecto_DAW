<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'lastname','role_id','email', 'password', 'foto_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function docente(){

        return $this->hasOne("App\Docente");
    }
    
    public function role(){

        return $this->belongsTo('App\Role');
    }
    
    public function escolare(){

        return $this->hasOne('App\Escolare');
    }
    public function nota(){

        return $this->belongsTo('App\Nota');
    }

    public function progenitore(){

        return $this->hasOne('App\Progenitore');
    }

    public function mensaje(){

        return $this->hasMany('App\Mensaje');
    }
    public function foto(){

        return $this->belongsTo('App\Foto');
    }


}
