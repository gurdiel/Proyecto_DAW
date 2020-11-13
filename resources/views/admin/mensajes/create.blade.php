<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>KTC</title>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <p>Página para agregar mensajes</p>
        </div>

        <form action="{{url('admin/mensajes')}}" method="post">
        {{ csrf_field() }}
            <p>Mensaje: <input type="text" name="mensaje" size="600"></p>
            <p>
                <input type="submit" value="Enviar">
                <input type="reset" value="Borrar">
            </p>
        </form>
    </body>
</html>
