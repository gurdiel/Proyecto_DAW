@extends('layouts.app')
@section('migasdepan')

<nav aria-label="breadcrumb migas">
  <ol class="breadcrumb migas">
    
    <li class="breadcrumb-item active"><a href="{{ url('/home') }}">Inicio</a></li>
    <li class="breadcrumb-item" aria-current="page">Mensajes</li>
  </ol>
</nav>

@endsection

@section('contenido')
<A name="arriba"></A>
<div class="container text-success grande" style="text-align: center;">

Mensajes del {{$clase->nombre}}
</div>


@if($mensajes)
@foreach($mensajes as $msn)
@if($msn->clase_id == $clase->id)
<div class="card lineado pad">
  <div class="card-body">
    <h5 class="card-title"><spam class="text-info">Titulo:</spam> {{$msn->titulo}}</h5>
    <p class="card-text lineado"><p class="text-info">Mensaje:</p> {{$msn->mensaje}}</p>
    @if(Auth::user()->docente)
    <form method="POST" action="{{ url('/admin/mensajes/'.$msn->id) }}">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
        <button type="submit" onclick="return confirm('¿Desea borrar el mensaje?');" class="btn btn-danger">
        {{ __('Eliminar') }}
    </button>
</form>
@endif
  </div>
</div>
@endif
@endforeach
@endif
<div class="d-flex justify-content-center pad">
<a href="{{route('mensajes.create', $clase->id)}}" class="card-link bg-success text-dark">Nuevo Mensaje</a>
</div>
<div class="div pad" style="text-align:center;">
        <button type="button" class="btn btn-info" onclick="location.href='#arriba';">Ir arriba</button>
        </div>
@endsection

