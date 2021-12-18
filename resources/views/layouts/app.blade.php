<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title ?? 'Inicio'}}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('css')
</head>

<body>
    <div id="app">
        <!-- Navbar -->
        @auth
            <x-nav-bar title="{{$title}}" />
        @endauth

        <!-- Main -->
        <main class="container">
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
    @yield('javascript')
</body>

</html>
