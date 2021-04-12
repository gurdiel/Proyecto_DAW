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
<div class="card-header text-warning">EDITANDO...</div>
  <div class="card-body">
    <form method="POST" action="{{ url('/admin/docentes/'.$usuario->id) }}" enctype="multipart/form-data">
      {{ csrf_field() }}
      {{ method_field('PATCH') }}
      <div class="form-group row justify-content-center">
        <div class="col-md-4 justify-content-center">
          @if($usuario->foto)
            <img src="../../../images/{{$usuario->foto->ruta_foto}}" width="50%"/>
          @else
            <img src="{{asset('images/nofoto.jpg')}}" width="50%"/>
          @endif
        </div>
      </div>
      
      <div class="form-group row">
        <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
          <div class="col-md-6">
            <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{$usuario->docente->nombre}}" required autocomplete="nombre" autofocus>

            @error('nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
      </div>

      <div class="form-group row">
          <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

          <div class="col-md-6">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $usuario->docente->email }}" required autocomplete="email">

              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
          </div>
      </div>
      <div class="form-group row">
          <label for="telefono" class="col-md-4 col-form-label text-md-right">{{ __('Telefono') }}</label>

          <div class="col-md-6">
              <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ $usuario->docente->telefono}}" required autocomplete="telefono" autofocus>
          </div>
      </div>
      <div class="form-group row">
          <label for="foto_id" class="col-md-4 col-form-label text-md-right">{{ __('Foto:') }}</label>

          <div class="col-md-6 foto">
              <input id="foto_id" type="file" name="foto_id" accept="image/png, .jpeg, .jpg, image/gif">
          </div>
      </div>
      <div class="centrado">
          <div class="centrado">
              <button type="submit" class="btn btn-warning">
                  {{ __('Confirmar edición') }}
              </button>
          </div>
      </div>
    </form>
  </div>
@endsection