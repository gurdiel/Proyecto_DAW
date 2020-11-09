<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>KIT TOOL CLASS</title>
        <!-- Fonts -->
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    </head>


    <body>
    <img src="{{ asset ('images/tablero.jpg')}}" id="fondoImagen">
    @yield("contenido")

    </body>
</html>
