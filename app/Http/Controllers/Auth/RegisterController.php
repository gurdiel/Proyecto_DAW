<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Docente;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {      
        $usuarios = User::all();
            $ultimo = $usuarios->last();
            $id = $ultimo->id +1; 
    

        if($data['role_id']=2){

            

            Docente::create([

                'nombre' => $data['name'],
                'email' => $data['email'],
                'telefono' => $data['telefono'],
                'user_id' => $id,

            
            ]);


        }elseif($data['role_id']=3){

            Progenitore::create([
                'nombre' => $data['name'],
                'fam_aut' => $data['fam_aut'],
                'user_id' => $id,
                'escolare_id' => $data['escolare_id'],
            ]);

        }
        return User::create([
                'name' => $data['name'],
                'role_id' => $data['role_id'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);        
    }
}
