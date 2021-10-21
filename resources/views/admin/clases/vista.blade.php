
@extends('layouts.app')
@section('migasdepan')

<nav aria-label="breadcrumb migas">
  <ol class="breadcrumb migas">
    
    <li class="breadcrumb-item active"><a href="{{ url('/home') }}">Inicio</a></li>
    <li class="breadcrumb-item" aria-current="page">Edición</li>
  </ol>
</nav>

@endsection

@section('contenido')

        <div class="container-fluid pad">        
            <a href="../../archivos/{{$horario->ruta_horario}}" target="blank_">Ver documento</a>
        </div>
@endsection
