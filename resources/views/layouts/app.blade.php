<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ __('index.Rawasi') }} | {{ __('dashboard.Dashboard') }}</title>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <style>
        body {
            position: relative; /* Needed for positioning pseudo-element */
            background-image: url("{{ asset('assets/img/login-bg.jpg') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            width: 100%;
            height: 100vh;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Adjust the color and opacity as needed */
            z-index: -1;
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">

        <main class="py-4">
            @yield('content')
        </main>
        
    </div>
</body>
</html>
