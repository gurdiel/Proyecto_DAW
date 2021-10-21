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
                <div class="card-header text-warning text-center">
                    <h2>Panel de control del {{Auth::user()->role->nombre}}</h2>
                </div>
                <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                            <!--Panel de control del administrador-->
                        @if(Auth::user()->role_id == 1)
                            <spam class="text-success">Bienvenido, {{ Auth::user()->name }} que deseas hacer?</spam>
                   
                                <div class="list-group grupo">
                                    <a href="{{url('/admin/users/')}}" class="list-group-item list-group-item-action text-info card text-center">Listar usuarios</a>
                                    <a href="{{url('admin/users/create')}}" class="list-group-item list-group-item-action text-info card text-center">Crear usuario</a>
                                    <a href="{{url('admin/users/vista')}}" class="list-group-item list-group-item-action text-info card text-center">Modificar/Eliminar usuario</a>
                                    <a href="{{url('/admin/mensajes/')}}" class="list-group-item list-group-item-action text-info card text-center">Listar Mensajes</a>
                                    <a href="{{url('/admin/clases/')}}" class="list-group-item list-group-item-action text-info card text-center">Listar Clases</a>
                                </div>

                            <!--Panel de control del docente.-->
                        @elseif(Auth::user()->role_id == 2)

                            @if(count($clases) !=0)
                                <div class="container grupo pad">
                                
                                        @foreach($clases as $clase)
                                            <div class="row pad">
                                            
                                                <div class="col-3">
                                                   Aula: {{$clase->nombre}}
                                                </div>
                                                <div class="div col-9 peq1">
                                                    Comentarios: {{$clase->horarios}}
                                                </div>
                                            </div>
                                            <div class="row pad">

                                                <div class="col-4">
                                                    <a href="{{route('escolares.show', $clase->id)}}" class="list-group-item list-group-item-action list-group-item-danger peq">Ver Alumnos</a>
                                                </div>
                                                <div class="col-4">
                                                    <a href="{{route('mensajes.show', $clase->id)}}" class="list-group-item list-group-item-action list-group-item-warning peq">Mensajes</a>
                                                </div>
                                                <div class="col-4">
                                                    <a href="archivos/{{$clase->horario->ruta_horario}}" target="blank_" class="list-group-item list-group-item-action list-group-item-warning peq">Ver Horario</a>
                                                </div>
                                            </div>
                                        @endforeach
                                @else
                                    <div class="container grupo pad">
                                        <div class="row pad">
                                            <div class="col-12 text-info">
                                                <div class="d-flex justify-content-center pad">
                                                    <p class="text-warning">No tiene clase. Puede empezar a crear su clase...</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                    <div class="container grupo pad">
                                        <div class="row pad">
                                            <div class="col-12 text-info">
                                                <div class="d-flex justify-content-center pad">
                                                    <a href="{{route('clases.create')}}" class="btn btn-success text-dark">Nueva Clase</a>
                                                </div>
                                            </div>
                                        </div>                                
                                    </div>


                            @elseif(Auth::user()->role_id == 3)
                            <spam class="text-success">Bienvenido, {{ Auth::user()->name }}:</spam>
                            
                                @if(count($hijos) !=0)
                                    @foreach($hijos as $hijo) 
                                        <div class="container grupo text-center">
                                            <p class="text-info">Tu hijo {{ $hijo->user->name }} va a la clase: {{$hijo->clase->nombre}}</p>
                                                <div class="row">
                                                        <div class="col-3"></div>
                                                        <div class="col-3">
                                                            <a href="{{route('mensajes.show', $hijo->clase->id)}}" class="list-group-item list-group-item-action list-group-item-info peq">Ver Mensajes</a>
                                                        </div>
                                                        <div class="col-3">
                                                            <a href="{{route('users.show', $hijo->id)}}" class="list-group-item list-group-item-action list-group-item-warning peq">Ver Logros</a>
                                                        </div> 
                                                </div>
                                        </div>
                                    @endforeach
                                @else
                                <div class="container grupo pad">
                                    <div class="row pad">
                                        <div class="col-12 text-info">
                                            <div class="d-flex justify-content-center pad">
                                                <p class="text-warning">No tiene asignado ningún alumno. Espere que desde el centro creen el perfil.</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif       
                                <!--Presentación de los ítems del escolar.-->
                            @elseif(Auth::user()->role_id == 4)
                            <spam class="text-success grande">Bienvenido {{ Auth::user()->name }}! , estos son tus ítems:</spam>
                                    <!--<div class="row">
                                        <div class="col-12">-->
                                    <div class="card-group padtop">
                                        <div class="row justify-content-center">
                                            @foreach($items as $item)
                                                @if($item->escolare_id == $escolar->id)
                                                
                                                    <div class="card col-md-8 col-lg-8 col-xl-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-primary">Nombre.</h5>
                                                            <p class="card-text">Comentario</p>
                                                        </div>
                                                        <img class="card-img-top" src="images/{{$item->fotoitem->ruta_foto}}" alt="{{$item->id}}">
                                                        
                                                    </div>
                                                
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                    <p>Te quedan {{$escolar->puntos}} puntos.</p>
                                        <!--
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
                                                                                    <td class="tdth2">{{$escolar->user->name}}</td>
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
                                            </div>-->
                        
                        @endif
                </div>
            </div>
                
        </div>
    </div>
</div>
@endsection
