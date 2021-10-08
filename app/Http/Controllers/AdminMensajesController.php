<?php

namespace App\Http\Controllers;

use App\Mensaje;
use App\Clase;
use Auth;

use Illuminate\Http\Request;

class AdminMensajesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clases = Clase::all();

        return view('admin.mensajes.vista', compact('clases'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //

        return view('admin.mensajes.create', compact('id'));
        
    }
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        Mensaje::create([
            'titulo' => $request['titulo'],
            'mensaje' => $request['mensaje'],
            'user_id' => $request['user_id'],
            'clase_id' => $request['clase_id'],
                ]);
            $mensajes=Mensaje::all();
            $clase =Clase::find($request['clase_id']);
        
        return view('admin.mensajes.index',compact('mensajes'),compact('clase'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mensajes= Mensaje::all();
        $clase = Clase::find($id);


        return view('admin.mensajes.index', compact('mensajes'),compact('clase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.mensajes.create', compact('id'));
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
        Mensaje::destroy($id);

        $clases = Auth::user()->docente->clase;
        return view('home',compact('clases'));
        //
    }
}
