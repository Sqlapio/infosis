<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- wireUI -->
        <wireui:scripts />

        <!-- Livewire V3 -->
        @livewireStyles

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">

        <!-- Notificaciones WireUI -->
        <x-notifications position="top-right" />
        <x-dialog z-index="z-50" blur="md" align="center" />

        <div class="min-h-screen flex flex-col justify-center items-center px-6 sm:pt-0 dark:bg-gray-900">
            <div class="flex justify-center text-gray-500">
                <img src="{{ asset('image/logoTesoro.png') }}" class="w-20 h-auto" alt="">
            </div>

            {{-- <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg"> --}}
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>

        <!-- Livewire V3 -->
        @livewireScripts
    </body>
</html>
