@extends('layouts.app')
@section('migasdepan')

<nav aria-label="breadcrumb migas">
  <ol class="breadcrumb migas">
    
    <li class="breadcrumb-item active"><a href="{{ url('/home') }}">Inicio</a></li>
    @if(Auth::user()->role_id == 1)
    <li class="breadcrumb-item active"><a href="{{ url('/admin/users/create') }}">Menu</a></li>
    @endif
    <li class="breadcrumb-item" aria-current="page">Crear Escolar</li>
  </ol>
</nav>

@endsection

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-info">{{ __('Nuevo Escolar') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{url('admin/escolares')}}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre:') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Apellido:') }}</label>

                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @if(empty($clase))<!--Aquí comprobamos que la variable no esté vacía, es el caso q se crea un alumno sin clase
                                                si tuviera clase significa que la crea el profesor desde una clase en concreto.-->
                        <div class="form-group row">
                            <label for="clase_id" class="col-md-4 col-form-label text-md-right">{{ __('Clase núm:') }}</label>

                            <div class="col-md-6">
                                <input id="clase_id" type="number" name="clase_id" class="form-control">
                            </div>
                        </div>
                        @else
                        
                        <div class="form-group row">
                            <label for="clase_id" class="col-md-4 col-form-label text-md-right">{{ __('Clase núm:') }}</label>

                            <div class="col-md-6">
                                <input id="clase_id" type="number" name="clase_id" value="{{$clase->id}}" class="form-control">
                            </div>
                        </div>
                        @endif
                        <div class="form-group row">
                            <label for="progenitore_id" class="col-md-4 col-form-label text-md-right">{{ __('Progenitor núm:') }}</label>

                            <div class="col-md-6">
                                <input id="progenitore_id" type="number" name="progenitore_id"  class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="role_id" class="col-md-4 col-form-label text-md-right">{{ __('Rol núm:') }}</label>

                            <div class="col-md-6">
                                <input id="role_id" type="number" class="form-control @error('role_id') is-invalid @enderror" name="role_id" value="4" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto_id" class="col-md-4 col-form-label text-md-right">{{ __('Foto:') }}</label>

                            <div class="col-md-6 foto">
                                <input id="foto_id" type="file" name="foto_id" accept="image/png, .jpeg, .jpg, image/gif">
                            </div>
                            </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email:') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña:') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirma contraseña:') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success text-dark">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
