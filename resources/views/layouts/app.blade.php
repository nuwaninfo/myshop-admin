<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    @include('libraries.styles')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <div>
        @include('components.main.sidebar')
        @include('components.main.nav')
        @yield('content')
        @include('compoents.main.footer')
    </div>

    @include('libraries.scripts')
    @stack('modals')

    @livewireScripts
</body>

</html>
