<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Escolare;
use App\Clase;
use App\User;
use App\Item;
use App\Foto;
use Auth;

use Illuminate\Support\Facades\Hash;

class AdminEscolaresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.escolares.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.escolares.create');//Aquí hay q cambiar la vista pero no sé donde dejará de funcionar.
    }
    public function createConAula($claseid)

    {
        //
        $clase = Clase::findOrFail($claseid);


        return view('admin.escolares.create',compact('clase'));//Aquí hay q cambiar la vista pero no sé donde dejará de funcionar.
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
                'lastname' => $request['lastname'],
                'role_id' => $request['role_id'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
                'foto_id' => $entrada['foto_id'],
                     ]);
    
        $usuarios = User::all();
        $id = $usuarios->last()->id;
        
        Escolare::create([

            'user_id' => $id,
            'clase_id' => $request['clase_id'],
            'puntos' => 0,
            'progenitore_id' => $request['progenitore_id'],

            
        ]);
        //Diferenciamos cuando creamos con admin o cuando creamos desde una clase con profesor.
        if(Auth::user()->role_id == 1){

            $usuarios = User::all();
            return view('admin.users.index',compact('usuarios'));

        }else{ 

            $clases = Auth::user()->docente->clase;
            return view('home',compact('clases'));
        }


    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $alumnos = Escolare::all();
        $clase = Clase::findOrFail($id);
        
  
         return view('admin.escolares.index',compact('alumnos'),compact('clase'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
 
        $user = User::findOrFail($id);
        $escolar = Escolare::findOrFail($user->escolare->id);
        $items = $escolar->item;

        return view('admin.escolares.edit', compact('user'), compact('items'));
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
        $escolar= Escolare::findOrFail($id);
        $user = User::findOrFail($escolar->user_id);

        $entrada = $request->all();

        if($archivo=$request->file('foto_id')){

            $nombre=$archivo->getClientOriginalName();
            $archivo->move('images', $nombre);
            $foto=Foto::create(['ruta_foto'=>$nombre]);
            $entrada['foto_id']=$foto->id;

            }

        if($request['heroe']!= ''){
        Item::create([

            'fotoitem_id'=> $request['heroe'],
            'escolare_id'=> $request['id'],

        ]);

        if($request['heroe'] == 1){
            $entrada['puntos']=($escolar->puntos - 5);
            
        }elseif($request['heroe']== 2){
            $entrada['puntos']=($escolar->puntos - 4);
            
        }elseif($request['heroe'] == 3){
            $entrada['puntos']=($escolar->puntos - 3);
           
        }elseif($request['heroe'] == 4){
            $entrada['puntos']=($escolar->puntos - 2);
            
        }
    }
        $escolar->update($entrada);
        $user->update($entrada);

        //Aquí mostraba las clases del docente. Pero ahora muestra HOME.
        $clases = Auth::user()->docente->clase;
        return view('home',compact('clases'));

        //return view('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $items = Item::all();
        $usuario = User::findOrFail($id);
        $escolar = Escolare::findOrFail($usuario->escolare->id);
        foreach($items as $item){
            if($item->escolare_id == $escolar->id)
                Item::destroy($item->id);
        }

        User::destroy($id);
        Escolare::destroy($escolar->id);
        Foto::destroy($usuario->foto_id);

        return view('home');
    }
}
