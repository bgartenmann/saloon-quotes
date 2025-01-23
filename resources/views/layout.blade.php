<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Styles / Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="relative p-4 bg-lime-50 flex justify-center items-center min-h-screen">
        @session('success')
            <div class="absolute top-10 py-1 px-4 bg-lime-100 rounded border border-lime-200 text-lime-800">
                {{ $value }}
            </div>
        @endsession
            
        @session('error')
            <div class="absolute top-10 py-1 px-4 bg-red-100 rounded border border-red-200 text-red-800">
                {{ $value }}
            </div>
        @endsession

        <main class="2xl:w-2/3 mx-auto p-4">
            @yield('content')
        </main>
    </body>
</html>
