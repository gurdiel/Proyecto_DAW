<?php

namespace App\Http\Controllers;

use App\Clase;
use App\Escolare;
use App\Mensaje;
use App\Horario;
use Illuminate\Http\Request; 

class AdminClasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clases = Clase::all();

        return view('admin.clases.index',compact('clases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
 
        return view('admin.clases.create');
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

        if($archivo=$request->file('horario_id')){

            $nombre = $archivo->getClientOriginalName();
            $archivo->move('archivos', $nombre);
            $horario = Horario::create(['nombre'=>$request->get('nombre'),
                                        'ruta_horario'=>$nombre]);
            $entrada['horario_id'] = $horario->id;

        }else{
            $entrada['horario_id'] = NULL;
        }

        
        Clase::create([
            'nombre' => $request['nombre'],
            'horarios' => $request['horarios'],
            'anuncios' => $request['anuncios'],
            'docente_id' => $request['docente_id'],
            'horario_id' => $entrada['horario_id'],
                ]);

            $clases = Clase::all();
        
        return view('admin.clases.index',compact('clases'));
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
        $clase = Clase::findOrFail($id);

        $horario = Horario::findOrFail($clase->horario_id);

        return view('admin.clases.vista',compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clase = Clase::findOrFail($id);

        return view('admin.clases.edit',compact('clase'));
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
        $clase = Clase::findOrFail($id);
        $entrada = $request->all();

        $clase->update($entrada);
        
        $clases = Clase::all();
        
        return view('admin.clases.index',compact('clases'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Bufff... si quitamos la clase hay que borrar los mensajes de esta clase. 
        //Lo alumnos modificarlos para que no tengan asignada la clase

        $alumnos = Escolare::all();

        foreach($alumnos as $alumno){
            if($alumno->clase_id == $id){
                $up['clase_id']=0;
                $alumno->update($up);
            }
        }

        $mensajes = Mensaje::all();

        foreach($mensajes as $mensaje){
            if($mensaje->clase_id == $id)
                Mensaje::destroy($mensaje->id);
        }

        Clase::destroy($id);

        $clases = Clase::all();

        return view('admin.clases.index',compact('clases'));


    }
}
