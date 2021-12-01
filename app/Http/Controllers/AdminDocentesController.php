<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clase;
use App\Escolare;
use App\Foto;
use App\Docente;
use App\Item;
use App\User;
use App\Mensaje;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminDocentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        //No la estamos usando,
        //return view('admin.docentes.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('admin.docentes.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        
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
            Docente::create([

                'telefono' => $request['telefono'],
                'user_id' => $id,
        
                    ]);

                
            $usuarios = User::all();
            return view('admin.users.index',compact('usuarios'));
        
        //
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

        
         return view('admin.docentes.index',compact('alumnos'),compact('clase'));
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

        return view('admin.docentes.edit',compact('usuario'));
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

        $docente= Docente::findOrFail($user->docente->id);

        $docente->update($entrada);
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
        /*Código para eliminar los items de un escolar 
        y luego eliminar el escolar y el usuario devolviendo la vista home del docente
        con sus clase. Donde lo reubico? Aquí es para eliminar a los docentes, de ahí su nombre.
        $items = Item::all();

        foreach($items as $item){
            if($item->escolare_id == $id)
                Item::destroy($item->id);
        }
        $escolar = Escolare::findOrFail($id);
        User::destroy($escolar->user_id);
        Escolare::destroy($id);
        

        $clases = Auth::user()->docente->clase;

        return view('home',compact('clases'));*/
        
        $usuario = User::findOrFail($id);
        $aulas = Clase::all();
        $mensajes = Mensaje::all();

            foreach($mensajes as $mensaje)

                if($mensaje->user_id == $usuario->id)
                    Mensaje::destroy($mensaje->id);
                

                foreach($aulas as $aula)
            
                    if($aula->docente_id == $usuario->docente->id){//Hacemos esto para poner a cero en la clase el docente
                        $up['docente_id'] = 0;
                        $aula->update($up);
                    }

        Docente::destroy($usuario->docente->id);
        User::destroy($id);
        Foto::destroy($usuario->foto_id);

        return view('home');
        //
    }
}
