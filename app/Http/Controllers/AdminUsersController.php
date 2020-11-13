<?php

namespace App\Http\Controllers;
use App\User;
use App\Docente;
use App\Progenitore;
use App\Escolare;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     
    
    public function index()
    {   

        /*$docentes = User::all();

        foreach ($docentes as $d)
            $usuarios[]= $d->docente;*/

        $usuarios = User::all();


        
        return view('admin.users.index',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function vista(){

        return view('admin.users.vista');
    }
    public function store(Request $request)
    {      
         User::create([
        'name' => $request['nombre'],
        'role_id' => $request['role_id'],
        'email' => $request['email'],
        'password' => Hash::make($request['password']),
            ]);

            $usuarios = User::all();
            $id = $usuarios->last()->id;
             
    

        if($request['role_id']==2){

            Docente::create([

                'nombre' => $request['nombre'],
                'email' => $request['email'],
                'telefono' => $request['telefono'],
                'user_id' => $id,

            ]);


        }elseif($request['role_id']==3){

            Progenitore::create([
                'nombre' => $request['nombre'],
                'email' => $request['email'],
                'fam_aut' => $request['fam_aut'],
                'user_id' => $id,
                'escolare_id' => $request['escolare_id'],

            ]);

        }elseif($request['role_id']==4){

            Escolare::create([

                'nombre' => $request['nombre'],
                'user_id' => $id,
                'clase_id' => $request['clase_id'],
                'puntos' => 0,
                'items' => 'Ninguno, aún',

                
            ]);

        }

        
        $usuarios = User::all();
        return view('admin.users.index',compact('usuarios'));

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
