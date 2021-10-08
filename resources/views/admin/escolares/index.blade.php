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
                            <th class="tdth2" scope="col">ID Clase</th>
                            <th class="tdth2" scope="col">Nombre</th>
                            <th class="tdth1" scope="col">Pts.</th>
                            <th class="tdth2" scope="col">Items</th>
                            <th class="tdth2" scope="col">Núm. Usuario</th>
                            <th class="tdth2" scope="col">Opciones</th>
                        </tr>
                        <tbody>
                        @if($alumnos)
                            @foreach($alumnos as $alumno)
                                @if($alumno->clase_id == $clase->id)

                                    <tr>
                                        <td class="tdth1">{{$alumno->id}}</td>
                                        <td class="tdth2">{{$alumno->user->name}}</td>
                                        <td class="tdth1">{{$alumno->puntos}}</td>
                                        <td class="tdth2">
                                        @foreach($alumno->item as $items)
                                        
                                        <img src="../../images/{{$items->fotoitem->ruta_foto}}" width="30%"/></div>
                                        @endforeach
                                        
                                        </td>

                                        <td class="tdth1">{{$alumno->user_id}}</td>
                                        <td class="tdth2" style="vertical-align:middle;">
                            <a href="{{route('escolares.edit',$alumno->user_id)}}" class="btn btn-warning">Editar</a>
                            <form method="POST" action="{{ url('/admin/docentes/'.$alumno->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" onclick="return confirm('BORRAR?');" class="btn btn-danger">
                                    {{ __('Eliminar') }}
                                </button>
                            </form>
                            </td>
                                        
                                    </tr>
                                    @endif
                            @endforeach
                        @endif
                        </tbody>
        </table>

            <div class="d-flex justify-content-center pad">
                <a href="{{route('escolares.create',$clase->id)}}" class="card-link bg-success text-dark">Añadir Escolar</a>
            </div>
        </div>
    </div>
</div>

@endsection