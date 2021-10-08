<?php

namespace App\Http\Controllers;

use App\Clase;
use App\Escolare;
use App\Mensaje;
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
        Clase::create([
            'nombre' => $request['nombre'],
            'horarios' => $request['horarios'],
            'anuncios' => $request['anuncios'],
            'docente_id' => $request['docente_id'],
            'mensaje_id' => 0,//Esto para que funciones quitamos de aquí cuando hagamos la tabla bien.
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
