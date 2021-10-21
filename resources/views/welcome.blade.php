@extends('layouts.app')

@section('migasdepan')

<nav aria-label="breadcrumb migas">
  <ol class="breadcrumb migas">
    <li class="breadcrumb-item" aria-current="page">Principal</li>
    @if(Route::has('login'))
    @auth
    <li class="breadcrumb-item active nosub">
    <a href="{{ url('/home') }}">Inicio</a></li>
    @endif
    @endauth
  </ol>
</nav>

@endsection

@section('contenido')

<div class="row">
<div class="col">
<div class="card-group">
<div class="centrado">PRESENTACIÓN</div>
<div class="row">
  <div class="card col-lg-4 col-xl-4">
    <img class="card-img-top" src="{{asset('images/gamificacion.jpg')}}" alt="Gamificación">
    <div class="card-body">
    <h5 class="card-title text-primary">GAMIFICACIÓN</h5>
      <p class="card-text">Aprendemos mientras nos divertimos.</p>
    </div>
  </div>
  <div class="card col-lg-4 col-xl-4">
    <img class="card-img-top" src="{{asset('images/pi.jpg')}}" alt="Campues y cursos">
    <div class="card-body">
      <h5 class="card-title text-primary">COOPERATING</h5>
      <p class="card-text">Campus y cursos en modalidad presencial y a distancia.</p>
    </div>
  </div>
  <div class="card col-lg-4 col-xl-4">
    <img class="card-img-top" src="{{asset('images/conectados.jpg')}}" alt="Conectados">
    <div class="card-body">
      <h5 class="card-title text-primary">CONECTADOS</h5>
      <p class="card-text">Siempre en contacto progenitores,educadores y Centro Educativo</p>
    </div>
  </div>
  </div>
</div>
</div>
</div>


@if(Route::has('login'))
    @auth
        <div class="div" style="text-align:center;padding-top:1%;">
        <button type="button" class="btn btn-danger" onclick="location.href='{{url('/home')}}';">Entrar</button>
        </div>
    @endif
    @endauth

@endsection