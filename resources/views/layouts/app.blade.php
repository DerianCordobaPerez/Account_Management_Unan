<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>UNAN: {{$title ?? 'Inicio'}}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png"  href="{{ asset('img/logos/favicon.png') }}" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body>
    <div id="app">
        <!-- Navbar -->
        @auth
            <x-nav-bar title="{{$title ?? 'Inicio'}}" />
        @endauth

        <!-- Main -->
        <main id="main" class="container">
            <x-alert />
            @yield('content')
        </main>

        <!-- Footer -->
        @auth
            <x-footer />
        @endauth
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/0496ae07d8.js" crossorigin="anonymous"></script>
    @yield('js')
</body>

</html>
