@extends('layouts.app')
@section('migasdepan')

<nav aria-label="breadcrumb migas">
  <ol class="breadcrumb migas">
    
    <li class="breadcrumb-item active"><a href="{{ url('/home') }}">Inicio</a></li>
    <li class="breadcrumb-item active"><a href="{{ url('/admin/mensajes', $id) }}">Mensajes</a></li>
    <li class="breadcrumb-item" aria-current="page">Nuevo Mensaje</li>
  </ol>
</nav>

@endsection


@section('contenido')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-warning">NUEVO MENSAJE</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('admin/mensajes') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="titulo" class="col-md-4 col-form-label text-md-right">Titulo</label>

                            <div class="col-md-6">
                                <input id="titulo" type="text" class="form-control @error('name') is-invalid @enderror" name="titulo" value="{{ old('name') }}" required autocomplete="titulo" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="mensaje" class="col-md-4 col-form-label text-md-right">Mensaje</label>

                            <div class="col-md-8">
                                <textarea id="mensaje" rows="10" type="text" class="form-control @error('name') is-invalid @enderror" name="mensaje" value="{{ old('mensaje') }}" required autocomplete="mensaje" autofocus></textarea>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="user_id" class="col-md-4 col-form-label text-md-right">Usuario id:</label>

                            <div class="col-md-6">
                                <input id="user_id" type="number" class="form-control @error('user_id') is-invalid @enderror" name="user_id" value="{{Auth::user()->id}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="clase_id" class="col-md-4 col-form-label text-md-right">Clase id:</label>

                            <div class="col-md-6">
                                <input id="clase_id" type="number" class="form-control @error('clase_id') is-invalid @enderror" name="clase_id" value="{{$id}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Enviar
                                </button>
                                <button type="button" class="btn btn-primary" onclick="location.href='{{url('/admin/mensajes', $id)}}';">Atrás</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection