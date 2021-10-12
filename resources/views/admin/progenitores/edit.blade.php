@extends('layouts.app')
@section('migasdepan')

<nav aria-label="breadcrumb migas">
  <ol class="breadcrumb migas">
    
    <li class="breadcrumb-item active"><a href="{{ url('/home') }}">Inicio</a></li>
    @if(Auth::user()->role_id == 1)
    <li class="breadcrumb-item active"><a href="{{ url('/admin/users') }}">Listado</a></li>
    @endif
    <li class="breadcrumb-item" aria-current="page">Progenitores</li>
  </ol>
</nav>

@endsection

@section('contenido')

<div class="card-header text-warning">EDITANDO...</div>
<div class="card-body">
    <form method="POST" action="{{ url('/admin/progenitores/'.$usuario->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        
        <div class="form-group row justify-content-center">
            <div class="col-md-4 justify-content-center">
                @if($usuario->foto)
                <img src="../../../images/{{$usuario->foto->ruta_foto}}" width="50%"/>
                @else <img src="{{asset('images/nofoto.jpg')}}" width="50%"/>
                @endif
            </div>
        </div>
        
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$usuario->name}}" required autocomplete="name" autofocus>

                @error('name')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
        </div>
        <div class="form-group row">
            <label for="lastname" class="col-md-4 col-form-label text-md-right">{{ __('Apellido') }}</label>

            <div class="col-md-6">
                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{$usuario->lastname}}" required autocomplete="lastname" autofocus>

                @error('lastname')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo Electrónico') }}</label>

            <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $usuario->email}}" required autocomplete="email">

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
                <input id="telefono" type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" value="{{ $usuario->progenitore->telefono}}" required autocomplete="telefono" autofocus>
            </div>
        </div>
        <div class="form-group row">
            <label for="foto_id" class="col-md-4 col-form-label text-md-right">{{ __('Foto:') }}</label>

            <div class="col-md-6 foto">
                <input id="foto_id" type="file" name="foto_id" accept="image/png, .jpeg, .jpg, image/gif">
            </div>
        </div>
        <div class="form-group row">
            <label for="fam_aut" class="col-md-4 col-form-label text-md-right">{{ __('fam_aut') }}</label>

            <div class="col-md-6">
                <input id="fam_aut" type="text" name="fam_aut" class="form-control" value="{{$usuario->progenitore->fam_aut}}"
                 onclick="if(this.value=='Abuelos,cuidador...') this.value=''" onblur="if(this.value=='') this.value='Abuelos,cuidador...'">
            </div>
        </div>

        <div class="centrado">
            <button type="submit" class="btn btn-warning">
                {{ __('Confirmar edición') }}
            </button>
            <button type="button" class="btn btn-info" onclick="location.href='{{url()->previous()}}';">Atrás</button>
        </div>
    </form>
</div>
@endsection