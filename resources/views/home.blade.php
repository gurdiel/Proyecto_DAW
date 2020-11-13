@extends('layouts.app')

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Panel de control de {{Auth::user()->role->nombre}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Bienvenido, {{ Auth::user()->name }} que deseas hacer?
                    @if(Auth::user()->role_id == 1)
                    
                   
                    <div class="list-group grupo">
                        <a href="{{url('/admin/users/')}}" class="list-group-item list-group-item-action active">Listar usuarios</a>
                        <a href="{{url('admin/users/create')}}" class="list-group-item list-group-item-action active">Crear usuario</a>
                        <a href="#" class="list-group-item list-group-item-action active">Modificar usuario</a>
                        <a href="#" class="list-group-item list-group-item-actiona active">Eliminar usuario</a>
                        <a href="#" class="list-group-item list-group-item-action disabled" tabindex="-1" aria-disabled="true">Nueva funcionalidad</a>
                    </div>
                    
                    @elseif(Auth::user()->role_id == 2)

                        <div class="container grupo">
                            <div class="row">
                                <div class="card-body col-8">
                                    Esto es lo que sale en el else.                    
                                </div>
                                <div class="col-4">
                                    MEtemos los  niños aqui por ejemplo
                                </div>
                            </div>
                        </div>
                        @if($clases)
                                @foreach($clases as $clase)
                        <div class="container grupo">
                            <div class="row">
                            
                                <div class="col-2">
                                    {{$clase->nombre}}
                                </div>
                                <div class="div col-6">
                                    {{$clase->horarios}}
                                </div>
                                
                            </div>
                            </div>
                            @endforeach
                            @endif
                            @elseif(Auth::user()->role_id == 3)

                            <div class="container grupo">
                                <div class="row">
                                    <div class="card-body">
                                        Esto es lo que sale cuando eres PROGENITOR.                    
                                    </div>
                                </div>
                                @if($hijos)
                                @foreach($hijos as $hijo)
                                    <div class="container grupo">
                                        <div class="row">
                            
                                            <div class="col-2">
                                                {{$hijo->clase->nombre}}
                                            </div>
                                            <div class="div col-6">
                                            {{$hijo->clase->anuncios}}
                                            </div>                              
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <p>Tu hijo va a la clase: {{$hijo->clase->nombre}}</p>

                                                <p>Estos son los anuncios:  {{$hijo->clase->anuncios}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                @endforeach
                                @endif

                            

                            @elseif(Auth::user()->role_id == 4)

                        <div class="container grupo">
                            <div class="row">
                                <div class="card-body">
                                    Esto es lo que sale cuando eres alumno.                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    {{Auth::user()->escolare->clase->anuncios}}
                                    <p>Tienes algún item: {{Auth::user()->escolare->items}}</p>
                                    <p>Tienes : {{Auth::user()->escolare->puntos}} puntos</p>
                                </div>
                            </div>
                        </div>
                        
                    @endif
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
