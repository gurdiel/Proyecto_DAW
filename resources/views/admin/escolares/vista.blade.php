
@extends('layouts.app')
@section('migasdepan')

<nav aria-label="breadcrumb migas">
  <ol class="breadcrumb migas">
    
    <li class="breadcrumb-item active"><a href="{{ url('/home') }}">Inicio</a></li>
    <li class="breadcrumb-item" aria-current="page">Edición</li>
  </ol>
</nav>

@endsection

@section('contenido')

        <div class="container-fluid pad">        
        
                        <table class="table table-hover">

                        <tr>
                            <th class="tdth1" scope="col">ID</th>
                            <th class="tdth1" scope="col">Foto</th>
                            <th class="tdth2" scope="col">Tipo</th>
                            <th class="tdth2" scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th class="tdth2" scope="col">Teléfono</th>
                        </tr>
                        <tbody>
                        @if($usuarios)
                            @foreach($usuarios as $user)

                        <tr>
                            <td class="tdth1">{{$user->id}}</td>
                            @if($user->foto)
                            <td class="tdth1 img-responsive"><img src="{{asset('images/$user->foto->ruta_foto')}}" width="100%"/></td>
                            @else
                            <td class="tdth1 img-responsive"><img src="{{asset('images/nofoto.jpg)}}" width="100%"/></td>

                            @endif
                            
                            <td class="tdth2">{{$user->role->nombre}}</td>
                            <td class="tdth2"><a href="{{route('users.edit',$user->id)}}" class="text-success">{{$user->nombre}}</a></td>
                            <td>{{$user->email}}</td>

                            @if($user->role_id == '2')
                            <td class="tdth2">{{$user->docente->telefono}}</td>
                            @elseif($user->role_id == '1')
                            <td class="tdth2">{{'No tiene'}}</td>
                            @elseif($user->role_id == '3')
                            <td class="tdth2">{{$user->progenitore->telefono}}</td>
                            @elseif($user->role_id == '4')
                            <td class="tdth2">{{'No tiene'}}</td>
                            @endif
                        </tr>
                            @endforeach
                        @endif
                        </tbody>
                        </table>
        </div>
@endsection
