@extends('layouts.app')
@section('migasdepan')

<nav aria-label="breadcrumb migas">
  <ol class="breadcrumb migas">
    
    <li class="breadcrumb-item active"><a href="{{ url('/home') }}">Inicio</a></li>
    @if(Auth::user()->role_id == 1)
    <li class="breadcrumb-item active"><a href="{{ url('/admin/clases') }}">Clases</a></li>
    @endif
    <li class="breadcrumb-item" aria-current="page">Crear Clase</li>
  </ol>
</nav>

@endsection

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-warning">{{ __('Nueva Clase') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{url('admin/clases')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre:') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" maxlength="4" required pattern="\d\s[A-Z]+" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="horarios" class="col-md-4 col-form-label text-md-right">{{ __('Horarios:') }}</label>

                            <div class="col-md-6">
                                <input id="horarios" type="text" class="form-control @error('horarios') is-invalid @enderror" name="horarios" value="{{ old('horarios') }}" required autocomplete="horarios" autofocus>

                                @error('horarios')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="horario_id" class="col-md-4 col-form-label text-md-right">{{ __('Horarios:') }}</label>

                            <div class="col-md-6">
                                <input id="horario_id" type="file" accept="application/pdf" class="form-control @error('horarios') is-invalid @enderror" name="horario_id" value="{{ old('horarios') }}" required autocomplete="horarios" autofocus>

                                @error('horarios')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="anuncios" class="col-md-4 col-form-label text-md-right">{{ __('Anuncios:') }}</label>

                            <div class="col-md-6">
                                <input id="anuncios" type="text" class="form-control @error('anuncios') is-invalid @enderror" name="anuncios" value="{{ old('anuncios') }}" required autocomplete="anuncios" autofocus>

                                @error('anuncios')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="docente_id" class="col-md-4 col-form-label text-md-right">{{ __('Docente id.:') }}</label>

                            <div class="col-md-6">
                                <input id="docente_id" type="number" class="form-control @error('docente_id') is-invalid @enderror" name="docente_id" value="{{ old('docente_id') }}" required autocomplete="docente_id" autofocus>
                                @error('docente_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success text-dark">
                                    {{ __('Registrar') }}
                                </button>
                                @if(Auth::user()->role_id == 1)
                                <button type="button" class="btn btn-info" onclick="location.href='{{url('/admin/clases')}}';">Atrás</button>
                                @elseif(Auth::user()->role_id == 2)
                                <button type="button" class="btn btn-info" onclick="location.href='{{url('/home')}}';">Atrás</button>
                                @endif

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection