@extends('layouts.app')
@section('migasdepan')

<nav aria-label="breadcrumb migas">
  <ol class="breadcrumb migas">
    
    <li class="breadcrumb-item active"><a class="noSub" href="{{ url('/home') }}">Inicio</a></li>
    <li class="breadcrumb-item" aria-current="page">Usuarios</li>
  </ol>
</nav>

@endsection

@section('contenido')
        @if(Auth::user())
        @if(Auth::user()->role_id == 1)
        <div class="container-fluid pad peq2">        
        <div class="title-card text-warning grande">Lista completa de usuarios registrados</div>
                        <table class="table table-hover pad">

                        <tr class="text-success">
                            <th class="tdth1" scope="col">Id</th>
                            <th class="tdth1" scope="col">Foto</th>
                            <th class="tdth2" scope="col">Tipo</th>
                            <th class="tdth2" scope="col">Nombre</th>
                            <th scope="col">Email</th>
                            <th class="tdth2" scope="col">Teléfono</th>
                            <th class="tdth2" scope="col">Acciones</th>
                        </tr>
                        <tbody>
                        @if($usuarios)
                            @foreach($usuarios as $user)
                        @if($user->id != 1)
                        <tr>
                            <td class="tdth1" style="vertical-align:middle;">{{$user->id}}</td>
                            @if($user->foto)
                            <td class="tdth1 img-responsive">
                            <!--ESTO ES LO QUE PONÍA EN EL HOMESTEAD...<img src="images/{{$user->foto->ruta_foto}}" width="100%"/>-->
                            <img src = "{{asset('images/' . $user->foto->ruta_foto)}}" width = "100%"/>
                            </td>
                            @else
                            <td class="tdth1 img-responsive"><img src="{{asset('images/nofoto.jpg')}}" width="100%"/></td>

                            @endif
                            <td class="tdth2" style="vertical-align:middle;">{{$user->role->nombre}}</td>
                            <td class="tdth2" style="vertical-align:middle;">{{$user->name}}<br>{{$user->lastname}}</td>
                            <td style="vertical-align:middle;">{{$user->email}}</td>

                            @if($user->role_id == '2')
                            <td class="tdth2" style="vertical-align:middle;">{{$user->docente->telefono}}</td>
                            @elseif($user->role_id == '1')
                            <td class="tdth2" style="vertical-align:middle;">{{'No tiene'}}</td>
                            @elseif($user->role_id == '3')
                            <td class="tdth2" style="vertical-align:middle;">{{$user->progenitore->telefono}}</td>
                            @elseif($user->role_id == '4')
                            <td class="tdth2" style="vertical-align:middle;">{{'No tiene'}}</td>
                            @endif

                            <td class="tdth2" style="vertical-align:middle;">
                            @if($user->role_id == '1')
                            <a href="{{route('users.edit',$user->id)}}" class="btn btn-warning">Editar</a>
                            <form method="POST" action="{{ url('/admin/users/'.$user->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" onclick="return confirm('¿Seguro desea borrar este elemento?');" class="btn btn-danger">
                                    {{ __('Eliminar') }}
                                    </button>
                            </form>
                            @elseif($user->role_id == '2')
                            <a href="{{route('docentes.edit',$user->id)}}" class="btn btn-warning">Editar</a>
                            <form method="POST" action="{{ url('/admin/docentes/'.$user->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" onclick="return confirm('¿Seguro desea borrar este elemento?');" class="btn btn-danger">
                                    {{ __('Eliminar') }}
                                    </button>
                            </form>
                            @elseif($user->role_id == '3')
                            <a href="{{route('progenitores.edit',$user->id)}}" class="btn btn-warning">Editar</a>
                            <form method="POST" action="{{ url('/admin/progenitores/'.$user->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" onclick="return confirm('¿Seguro desea borrar este elemento?');" class="btn btn-danger">
                                    {{ __('Eliminar') }}
                                    </button>
                            </form>
                            @elseif($user->role_id == '4')
                            <a href="{{route('escolares.edit',$user->id)}}" class="btn btn-warning">Editar</a>
                            <form method="POST" action="{{ url('/admin/escolares/'.$user->id) }}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" onclick="return confirm('¿Seguro desea borrar este elemento?');" class="btn btn-danger">
                                    {{ __('Eliminar') }}
                                    </button>
                            </form>
                            @endif
                            </td>
                        </tr>
                        @endif
                            @endforeach
                        @endif
                        </tbody>
                        </table>
        </div>
        <div class="div" style="text-align:center;">
        <button type="button" class="btn btn-info" onclick="location.href='#arriba';">Ir arriba</button>
        <button type="button" class="btn btn-info" onclick="location.href='{{ url()->previous() }}';">Atrás</button>
        </div>
        @else
        MENSAJE DE ERRROR ??? Devolver a la página anterior?
        NO ESTáS REGISTRADO
        @endif
        @else
        <p>Accede a tu área personal.</p>
        

        @endif
        
@endsection

