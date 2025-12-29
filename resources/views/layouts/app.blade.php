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

    <div class="page-wrapper">
        @include('components.main.sidebar')

        <div class="main-content">
            @include('components.main.nav')

            <div class="body-content">
                @yield('header')
                @yield('content')
            </div>

            @include('components.main.footer')
        </div>
    </div>

    @include('libraries.scripts')
    @stack('modals')

    @livewireScripts
</body>

</html>
