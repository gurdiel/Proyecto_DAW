<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Escolare;


class AdminItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $item  = Item::findOrFail($id);
        $escolar = Escolare::findOrFail($item->escolare_id);


        if($item->fotoitem_id == 1){
            $entrada['puntos']=($escolar->puntos + 5);
            $escolar->update($entrada);
        }elseif($item->fotoitem_id == 2){
            $entrada['puntos']=($escolar->puntos + 4);
            $escolar->update($entrada);
        }elseif($item->fotoitem_id == 3){
            $entrada['puntos']=($escolar->puntos + 3);
            $escolar->update($entrada);
        }elseif($item->fotoitem_id == 4){
            $entrada['puntos']=($escolar->puntos + 2);
            $escolar->update($entrada);
        }

        
        
        Item::destroy($id);

        //$clases = Auth::user()->docente->clase;

        //return view('home',compact('clases'));
        return view('home');
    }
}
