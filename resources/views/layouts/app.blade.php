<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>window.Laravel = { csrfToken: '{{ csrf_token() }}' }</script>

    <title>{{ config('app.name', 'Laravel') }}</title>

    @guest 
    <!-- Styles -->
    <link href="{{ asset('css/public.css') }}" rel="stylesheet">
    @else 
    <!-- Styles -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icofont.min.css') }}" rel="stylesheet">
    @endguest

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway:600" rel="stylesheet">

    
</head>
<body>
    <div id="app">
        @guest 
            @include( 'layouts.public' )
        @else 
            @include( 'layouts.admin' )
        @endguest
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
