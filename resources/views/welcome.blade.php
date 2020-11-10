@extends('layouts.app')

@section('contenido')

<div class="container">
    <div class="row row-cols-1 row-cols-md-3">
                            
                                <div class="col mb-4">
                                <div class="card h-100">
                                <img src="{{asset('images/gamificacion.jpg')}}" class="card-img-top" alt="Gamificacion">
                                <div class="card-body">
                                    <h5 class="card-title">Gamificacion</h5>
                                    <p class="card-text">Aprendemos mientras nos divertimos.</p>
                                </div>
                                </div>
                                </div>
                                <div class="col mb-4">
                                <div class="card h-100">
                                <img src="{{asset('images/pi.jpg')}}" class="card-img-top" alt="Conectados">
                                <div class="card-body">
                                    <h5 class="card-title">Cooperating</h5>
                                    <p class="card-text">Campus y cursos en modalidad presencial y a distancia.</p>
                                </div>
                                </div>
                                </div>
                                <div class="col mb-4">
                                <div class="card h-100">
                                <img src="{{asset('images/conectados.jpg')}}" class="card-img-top" alt="Campus y Cursos">
                                <div class="card-body">
                                    <h5 class="card-title">Conectados</h5>
                                    <p class="card-text">Siempre en contacto progenitores,educadores y Centro Educativo</p>
                                </div>
                                </div>
                                </div>
    </div>
</div>

@endsection