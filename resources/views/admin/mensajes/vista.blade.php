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

Mensajes por clases.
</div>

<div class="list-group grupo">
@if($clases)
@foreach($clases as $clase)
<a href="{{route('mensajes.show', $clase->id)}}" class="list-group-item list-group-item-action text-info card text-center">{{$clase->nombre}}</a>
@endforeach
@endif
</div>
@endsection



