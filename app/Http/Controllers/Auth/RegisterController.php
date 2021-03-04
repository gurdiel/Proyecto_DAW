<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Docente;
use App\Escolare;
use App\Progenitore;
use App\Foto;
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
            'nombre' => ['required', 'string', 'max:255'],
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

        if($archivo=$data['foto_id']){

            $nombre=$archivo->getClientOriginalName();
            $archivo->move('images', $nombre);
            $foto=Foto::create(['ruta_foto'=>$nombre]);
            $data['foto_id']=$foto->id;

            }

        User::create([
            'nombre' => $data['nombre'],
            'role_id' => $data['role_id'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'foto_id' => $data['foto_id'],
        ]);

        $usuarios = User::all();
        $ultimo = $usuarios->last(); 
        $id = $ultimo->id;
    

        if($data['role_id']==2){

            Docente::create([

                'nombre' => $data['nombre'],
                'email' => $data['email'],
                'telefono' => $data['telefono'],
                'user_id' => $id,

            ]);


        }elseif($data['role_id']==3){

            Progenitore::create([
                'nombre' => $data['nombre'],
                'email' => $data['email'],
                'telefono' => $data['telefono'],
                'fam_aut' => $data['fam_aut'],
                'user_id' => $id,

            ]);

        }elseif($data['role_id']==4){

            Escolare::create([

                'nombre' => $data['nombre'],
                'user_id' => $id,
                'clase_id' => $data['clase_id'],
                'puntos' => 0,
                'items' => 'Ninguno, aún',
                'progenitore_id' => $data['progenitore_id'],

                
            ]);

        }
        return $ultimo;        
    }
}
