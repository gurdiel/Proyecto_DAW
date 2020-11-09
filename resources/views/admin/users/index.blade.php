<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <p>EN construcción</p>
        </div>

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
            <td>{{$user->tipo}}</td>
            <td>{{$user->nombre}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->telefono}}</td>
            <td>{{$user->user_id}}</td>
        </tr>
            @endforeach
        @endif
        </table>
    </body>
</html>
