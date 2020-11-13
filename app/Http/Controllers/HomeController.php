<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    
    public function index()
    {
        if(Auth::user()->role_id == 2){
            $clases = Auth::user()->docente->clase;
        return view('home',compact('clases'));
        }
        elseif(Auth::user()->role_id == 3){

            $hijos = Auth::user()->progenitore->escolare;
            
            return view('home',compact('hijos'));
        }elseif(Auth::user()->role_id == 4){

            
        }
        
        return view('home');
    }
}
