<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Progenitore;
use App\Escolare;
use App\Foto;
use Illuminate\Support\Facades\Hash;

class AdminProgenitoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.progenitores.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $entrada = $request->all();

        if($archivo=$request->file('foto_id')){

            $nombre=$archivo->getClientOriginalName();
            $archivo->move('images', $nombre);
            $foto=Foto::create(['ruta_foto'=>$nombre]);
            $entrada['foto_id']=$foto->id;

            }else{
                $entrada['foto_id'] = NULL;
            }

            User::create([
                'name' => $request['name'],
                'lastname'=> $request['lastname'],
                'role_id' => $request['role_id'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'foto_id' => $entrada['foto_id'],
                    ]);
        
                    $usuarios = User::all();
                    $id = $usuarios->last()->id;
                    $escolareid = 0;
            Progenitore::create([

                'telefono' => $request['telefono'],
                'fam_aut' => $request['fam_aut'],
                'user_id' => $id,
        
                    ]);

                
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
        $usuario = User::findOrFail($id);

        return view('admin.progenitores.edit',compact('usuario'));
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
        $user=User::findOrFail($id);

        $entrada = $request->all();

        if($archivo=$request->file('foto_id')){

            $nombre=$archivo->getClientOriginalName();
            $archivo->move('images', $nombre);
            $foto=Foto::create(['ruta_foto'=>$nombre]);
            $entrada['foto_id']=$foto->id;

            }

        $progenitor= Progenitore::findOrFail($user->progenitore->id);

        $progenitor->update($entrada);
        $user->update($entrada);
        $usuarios = User::all();

        return view('admin.users.index',compact('usuarios'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $user=User::findOrFail($id);
        $escolares = Escolare::all();

            foreach($escolares as $escolar)
                if($escolar->progenitore_id == $user->progenitore->id){
                    $up['progenitore_id'] =  0;
                    $escolar->update($up);
                }
                    
        Progenitore::destroy($user->progenitore->id);
        User::destroy($id);
        Foto::destroy($user->foto_id);

        $usuarios = User::all();
        return view('admin.users.index',compact('usuarios'));
    }
}
