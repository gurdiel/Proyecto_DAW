<?php

namespace App\Http\Controllers;
use App\User;
use App\Foto;
use App\Item;
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
    public function registerDocente(){

        return view('register.docente');
    }
    public function registerProgenitor(){

        return view('register.progenitor');
    }
    public function registerEscolar(){

        return view('register.escolar');
    }
    public function registerAdministrador(){

        return view('register.administrador');
    }

    public function docente(){

        return view('usuarios.docente');
    }
    public function progenitor(){

        return view('usuarios.progenitor');
    }
    public function escolar(){

        return view('usuarios.escolar');
    }
    public function administrador(){

        return view('usuarios.administrador');
    }


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
        'nombre' => $request['nombre'],
        'role_id' => $request['role_id'],
        'email' => $request['email'],
        'password' => Hash::make($request['password']),
        'foto_id' => $entrada['foto_id'],
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
                'telefono' => $request['telefono'],
                'fam_aut' => $request['fam_aut'],
                'user_id' => $id,

            ]);

        }elseif($request['role_id']==4){

            

            Escolare::create([

                'nombre' => $request['nombre'],
                'user_id' => $id,
                'clase_id' => $request['clase_id'],
                'puntos' => 0,
                'progenitore_id' => $request['progenitore_id'],

                
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
        $escolar = Escolare::findOrFail($id);
        $items = Item::all();
        return view('admin.escolares.destroy',compact('escolar'),compact('items'));
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

            return view('admin.users.edit',compact('usuario'));
        
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
        $user=User::findOrFail($id);

        

        $entrada = $request->all();

        
        if($archivo=$request->file('foto_id')){

            $nombre=$archivo->getClientOriginalName();
            $archivo->move('images', $nombre);
            $foto=Foto::create(['ruta_foto'=>$nombre]);
            $entrada['foto_id']=$foto->id;

            }
        
        if($user->role->id == 2){
            $docente= Docente::findOrFail($user->docente->id);
            $docente->update($entrada);
        }elseif($user->role->id == 3){
            $progenitor = Progenitore::findOrFail($user->progenitore->id);
            $progenitor->update($entrada);
        }elseif($user->role->id == 4){

            $escolar = Escolare::findOrFail($user->escolare->id);
            $escolar->update($entrada);
        }

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

        if($user->role->id == 2){

            Docente::destroy($user->docente->id);
            
        }elseif($user->role->id == 3){


            $escolares = Escolare::all();

            foreach($escolares as $escolar)
                if($escolar->progenitore_id == $user->progenitore->id){
                    $up['progenitore_id'] =  0;
                    $escolar->update($up);
                }
                    
            Progenitore::destroy($user->progenitore->id);
            


            
                
            

            
        }elseif($user->role->id == 4){

            Escolare::destroy($user->escolare->id);
            
        }

        User::destroy($id);
        Foto::destroy($user->foto_id);

        $usuarios = User::all();
        return view('admin.users.index',compact('usuarios')); 
        //
    }
    public function vista()
    {
        //
        $usuarios = User::all();
        return view('admin.users.vista',compact('usuarios'));
    }
}
