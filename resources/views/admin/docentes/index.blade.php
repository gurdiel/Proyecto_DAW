@extends('layouts.app')
@section('migasdepan')

<nav aria-label="breadcrumb migas">
  <ol class="breadcrumb migas">
    
    <li class="breadcrumb-item active"><a href="{{ url('/home') }}">Inicio</a></li>
    <li class="breadcrumb-item" aria-current="page">Alumnos</li>
  </ol>
</nav>

@endsection

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
    <p>Estos son los alumnos del {{$clase->nombre}}</p>
        <div class="col-md-10">
        
        <table class="table table-hover">

                        <tr>
                            <th class="tdth1" scope="col">ID Clase</th>
                            <th class="tdth2" scope="col">Nombre</th>
                            <th class="tdth1" scope="col">Pts.</th>
                            <th class="tdth2" scope="col">Items</th>
                            <th class="tdth1" scope="col">User</th>
                        </tr>
                        <tbody>
                        @if($alumnos)
                            @foreach($alumnos as $alumno)
                                @if($alumno->clase_id == $clase->id)

                                    <tr>
                                        <td class="tdth1">{{$alumno->id}}</td>
                                        <td class="tdth2">{{$alumno->nombre}}</td>
                                        <td class="tdth1">{{$alumno->puntos}}</td>
                                        <td class="tdth2">{{$alumno->items}}</td>
                                        <td class="tdth1">{{$alumno->user_id}}</td>
                                        
                                    </tr>
                                    @endif
                            @endforeach
                        @endif
                        </tbody>
        </table>
        </div>
    </div>
</div>

@endsection