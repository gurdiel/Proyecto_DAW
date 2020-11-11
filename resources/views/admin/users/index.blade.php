@extends('layouts.app')

@section('contenido')

        <div class="card-body">
            <p>EN construcción</p>
        

        <table width="700" border="1">

        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tipo</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Número de USUARIO</th>
        </tr>
        @if($usuarios)
            @foreach($usuarios as $user)

        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->role->nombre}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->telefono}}</td>
            <td>{{$user->user_id}}</td>
        </tr>
            @endforeach
        @endif
        </table>
        </div>
@endsection

