<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <p>Página para agragar usuarios</p>
        </div>

        <form action="{{url('admin/users')}}" method="post">
        {{ csrf_field() }}
            <p>Nombre: <input type="text" name="nombre" size="40"></p>
            <p>Email: <input type="text" name="email" size="40"></p>
            <p>Telefono: <input type="text" name="telefono" size="40"></p>
            
            <p>
                <input type="submit" value="Enviar">
                <input type="reset" value="Borrar">
            </p>
        </form>
    </body>
</html>
