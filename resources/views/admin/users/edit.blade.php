@extends('layouts.app')
@section('migasdepan')

<nav aria-label="breadcrumb migas">
  <ol class="breadcrumb migas">
    
    <li class="breadcrumb-item active"><a href="{{ url('/home') }}">Inicio</a></li>
    <li class="breadcrumb-item active"><a href="{{ url('/admin/users/vista') }}">Edición</a></li>
    <li class="breadcrumb-item" aria-current="page">Editar Usuario</li>
  </ol>
</nav>

@endsection

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @if($usuario->role_id == 2)
                <div class="card-header text-warning">EDITANDO...</div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/admin/users/'.$usuario->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    <div class="form-group row justify-content-center">
                        <div class="col-md-4 justify-content-center">
                    @if($usuario->foto)
                    <img src="{{$usuario->foto->ruta_foto}}" width="50%"/>
                    @else <img src="{{asset('images/nofoto.jpg')}}" width="50%"/>
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
                        @elseif($usuario->role_id == 3)

                        <div class="card-header text-primary">EDITANDO...</div>
                            <div class="card-body">
                                <form method="POST" action="{{ url('/admin/users/'.$usuario->id) }}" enctype="multipart/form-data">
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
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{$usuario->progenitore->nombre}}" required autocomplete="nombre" autofocus>

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
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $usuario->progenitore->email}}" required autocomplete="email">

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
                        @elseif($usuario->role_id == 3)
                        <div class="card-header text-primary">EDITANDO...</div>
                <div class="card-body">
                    <form method="POST" action="{{ url('/admin/users/'.$usuario->id) }}" enctype="multipart/form-data">
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
                        @elseif($usuario->role_id == 4)

                        <div class="card-header text-primary">EDITANDO...</div>
                            <div class="card-body">
                                <form method="POST" action="{{ url('/admin/users/'.$usuario->id) }}" enctype="multipart/form-data">
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
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{$usuario->escolare->nombre}}" required autocomplete="nombre" autofocus>

                                @error('nombre')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="clase_id" class="col-md-4 col-form-label text-md-right">{{ __('Clase:') }}</label>

                            <div class="col-md-6">
                                <input id="clase_id" type="number" class="form-control @error('clase_id') is-invalid @enderror" name="clase_id" value="{{$usuario->escolare->clase_id}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="progenitore_id" class="col-md-4 col-form-label text-md-right">{{ __('Progenitor:') }}</label>

                            <div class="col-md-6">
                                <input id="progenitore_id" type="number" class="form-control @error('progenitore_id') is-invalid @enderror" name="progenitore_id" value="{{$usuario->escolare->progenitore_id}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto_id" class="col-md-4 col-form-label text-md-right">{{ __('Foto:') }}</label>

                            <div class="col-md-6 foto">
                                <input id="foto_id" type="file" name="foto_id" accept="image/png, .jpeg, .jpg, image/gif">
                            </div>
                        </div>
                        @endif
                        

                        <div class="centrado">
                            <div class="centrado">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('Confirmar edición') }}
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