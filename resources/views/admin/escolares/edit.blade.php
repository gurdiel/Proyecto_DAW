@extends('layouts.app')
@section('migasdepan')

<nav aria-label="breadcrumb migas">
  <ol class="breadcrumb migas">
    
    <li class="breadcrumb-item active"><a href="{{ url('/home') }}">Inicio</a></li>
    @if(Auth::user()->role_id == 1)
    <li class="breadcrumb-item active"><a href="{{ url('/admin/users') }}">Listado</a></li>
    @elseif(Auth::user()->role_id == 2)
    <li class="breadcrumb-item active"><a href="{{ url('/admin/escolares/'.$user->escolare->clase_id) }}">Listado</a></li>
    @endif
    <li class="breadcrumb-item" aria-current="page">Editar Usuario</li>
  </ol>
</nav>

@endsection

@section('contenido')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-header text-warning">EDITANDO...</div>
                    <div class="card-body">
                        <form method="POST" action="{{ url('/admin/escolares/'.$user->escolare->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('PATCH') }}
                                <div class="form-group row justify-content-center">
                                    <div class="col-md-4 justify-content-center">
                                         @if($user->foto)
                                            <img src="../../../images/{{$user->foto->ruta_foto}}" width="50%"/>
                                        @else 
                                            <img src="{{asset('images/nofoto.jpg')}}" width="50%"/>
                                         @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>
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
                                        <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{$user->lastname}}" required autocomplete="lastname" autofocus>
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
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email}}" required autocomplete="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>
                        <div class="form-group row">
                            <label for="clase_id" class="col-md-4 col-form-label text-md-right">{{ __('Clase') }}</label>

                            <div class="col-md-6">
                                <input id="clase_id" type="number" class="form-control @error('clase_id') is-invalid @enderror" name="clase_id" value="{{ $user->escolare->clase_id }}" required autocomplete="clase_id">

                                @error('clase_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="id" class="col-md-4 col-form-label text-md-right">{{ __('ID') }}</label>

                            <div class="col-md-6">
                                <input id="id" type="number" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ $user->escolare->id }}" readonly>

                                @error('id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="puntos" class="col-md-4 col-form-label text-md-right">{{ __('Puntos') }}</label>

                            <div class="col-md-6">
                                <input id="puntos" type="number" class="form-control @error('puntos') is-invalid @enderror" name="puntos" value="{{ $user->escolare->puntos }}" required autocomplete="puntos">

                                @error('puntos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="puntos" class="col-md-4 col-form-label text-md-right">{{ __('Selecciona un ítem') }}</label>
                            <div class="col-md-6">
                                <select id="heroe" name="heroe">

                                <option value="">Elige una opción</option>

                                <option value="3">Iron Man</option>

                                <option value="1">Capitán América</option>

                                <option value="4">Hulk</option>

                                <option value="2">Thor</option>

                                </select>
                            </div>
                        </div>                 
                        <div class="centrado pad">
                            <div class="centrado">
                                <button type="submit" class="btn btn-warning">
                                    {{ __('Confirmar edición') }}
                                </button>
                                <button type="button" class="btn btn-info" onclick="location.href='{{url()->previous()}}';">Atrás</button>
                            </div>
                        </div>
                    </form>

                    <!--<div class="container pad text-success text-center">Items en propiedad</div>-->
                    @if(!empty($items))
                            <div class="form-group row justify-content-center">
                                <div class="col-7 justify-content-center">
                                <div class="title-card text-light text-center pad">Lista de ítems</div>
                                    <div class="table-responsive justify-content-center">
                                        <table class="table table-responsive table-striped table-bordered table-hover">
                                            <tr>
                                    <th>Heroe</th>
                                    <th>Opción</th>
                                </tr>
                                @foreach($items as $item)
                                <tr>
		                            <td>
                                    <img src="../../../images/{{$item->fotoitem->ruta_foto}}" width="50%"/>
                                    </td>
                                    <td>
                                    <form method="POST" action="{{ url('/admin/items/'.$item->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" onclick="return confirm('¿Desea borrar este ítem?');" class="btn btn-warning">
                                    {{ __('Canjear por puntos') }}
                                    </button>
                                    </form>
                                    </td>
                                </tr>
                                @endforeach
                                </table>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if(sizeof($items)==0)
                            <tr><td></td><td>
                            <div class="form-group row justify-content-center text-info">
                             {{'No tiene items'}}
                            </div>
                            </td></tr>

                            @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection