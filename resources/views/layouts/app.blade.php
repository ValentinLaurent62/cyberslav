<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href={{ asset('img/Favicon.ico') }} />
        <title>HistoroBot</title>
        <!-- Styles -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>

        <body>
        @include('layouts.navbar')
        <!-- Authentication Links -->
        <div id="main">
            @yield('content')
        </div>
        @include('layouts.footer')
        <!-- Scripts -->
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>


        </body>

</html>