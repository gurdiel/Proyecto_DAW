@extends('layouts.app')
@section('migasdepan')

<nav aria-label="breadcrumb migas">
  <ol class="breadcrumb migas">
    <li class="breadcrumb-item" aria-current="page">Inicio</li>
  </ol>
</nav>
@endsection

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-info">Panel de control del {{Auth::user()->role->nombre}}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if(Auth::user()->role_id == 1)
                    <spam class="text-success">Bienvenido, {{ Auth::user()->nombre }} que deseas hacer?</spam>
                   
                    <div class="list-group grupo">
                        <a href="{{url('/admin/users/')}}" class="list-group-item list-group-item-action text-info card text-center">Listar usuarios</a>
                        <a href="{{url('admin/users/create')}}" class="list-group-item list-group-item-action text-info card text-center">Crear usuario</a>
                        <a href="{{url('admin/users/vista')}}" class="list-group-item list-group-item-action text-info card text-center">Modificar/Eliminar usuario</a>
                    </div>
                    
                    @elseif(Auth::user()->role_id == 2)
                    <div class="container grupo pad">
                            <div class="row pad">

                                <div class="col-2 text-info">
                                    Nombre
                                </div>
                                <div class="col-4 text-info">
                                    Horarios
                                </div>
                                <div class="col-6 text-info">
                                    Opciones:
                                </div>
                            
                            </div>
                        @if($clases)
                                @foreach($clases as $clase)
                        
                            <div class="row pad">
                            
                                <div class="col-2">
                                    {{$clase->nombre}}
                                </div>
                                <div class="div col-4 peq1">
                                    {{$clase->horarios}}
                                </div>
                                <div class="col-3">
                                <a href="{{route('escolares.show', $clase->id)}}" class="list-group-item list-group-item-action list-group-item-danger peq">Ver Alumnos</a>
                                </div>
                                <div class="col-3">
                                <a href="{{route('mensajes.show', $clase->id)}}" class="list-group-item list-group-item-action list-group-item-warning peq">Mensajes</a>
                                </div>
                                
                            </div>
                           
                            @endforeach
                            @endif
                            </div>
                            @elseif(Auth::user()->role_id == 3)
                            <spam class="text-success">Bienvenido, {{ Auth::user()->nombre }} que deseas hacer?</spam>
                            <div class="container grupo">
                                <div class="row">
                                    <div class="card-body">

                                    </div>
                                </div>
                                @if($hijos)
                                @foreach($hijos as $hijo)
                                    <div class="container grupo">
                                    <p class="text-info">Tu hijo {{$hijo->nombre}} va a la clase: {{$hijo->clase->nombre}}</p>
                                        <div class="row">
                                                <div class="col-3">
                                                    <a href="{{route('mensajes.show', $hijo->clase->id)}}" class="list-group-item list-group-item-action list-group-item-info peq">Ver Mensajes</a>
                                                </div>
                                                <div class="col-3">
                                                    <a href="{{route('users.show', $hijo->id)}}" class="list-group-item list-group-item-action list-group-item-warning peq">Ver Logros</a>
                                                </div>
                                            
                                        </div>
                                    </div>
                                @endforeach
                                @endif

                            

                            @elseif(Auth::user()->role_id == 4)
                            <spam class="text-success">Bienvenido {{ Auth::user()->nombre }}! , aquí puedes ver tus logros.</spam>
                        <div class="container grupo">
                            <div class="row">
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    {{Auth::user()->escolare->clase->anuncios}}

                                    <div class="container">
                                    <div class="row justify-content-center">
                                    
                                        <div class="col-md-10 pad">
                                        
                                        <table class="table table-hover">

                                                        <tr>
                                                            <th class="tdth1" scope="col">ID Clase</th>
                                                            <th class="tdth2" scope="col">Nombre</th>
                                                            <th class="tdth1" scope="col">Pts.</th>
                                                            <th class="tdth2" scope="col">Items</th>
                                                            <th class="tdth1" scope="col">User</th>
                                                        </tr>
                                                        <tbody>
                                                                    <tr>
                                                                        <td class="tdth1">{{$escolar->id}}</td>
                                                                        <td class="tdth2">{{$escolar->nombre}}</td>
                                                                        <td class="tdth1">{{$escolar->puntos}}</td>
                                                                        <td class="tdth2">
                                                                        @foreach($items as $item)
                                                                        @if($item->escolare_id == $escolar->id)
                                                                            <img src="images/{{$item->fotoitem->ruta_foto}}" width="50%"/>
                                                                        @endif
                                                                        @endforeach
                                                                        </td>
                                                                        <td class="tdth1">{{$escolar->user_id}}</td>
                                                                        
                                                                    </tr>
                                                                    
                                                        </tbody>
                                        </table>
                                        </div>
                                    </div>
                                    </div>
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
