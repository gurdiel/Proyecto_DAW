<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>KIT TOOL CLASS</title>
        <!-- Fonts -->
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">
    </head>


    <body>

    @yield('contenido')


    <footer>
        <p>KTC<br><br><small>by</small> Rafael Gurdiel Sanchez - 2020</p>
    </footer>


    </body>
</html>
