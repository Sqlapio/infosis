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
    <body class="font-sans text-gray-900 antialiased h-dvh">

        <!-- Notificaciones WireUI -->
        <x-notifications position="top-right" />
        <x-dialog z-index="z-50" blur="md" align="center" />

            <div class="flex flex-col min-h-screen justify-center items-center px-6 mt-auto sm:pt-0 dark:bg-gray-900 overflow-hidden">
                <div class="items-center">
                    <img src="{{ asset('image/logoTesoro.png') }}" class="w-auto h-auto" alt="">
                </div>

                {{-- <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg"> --}}
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden sm:rounded-lg">
                    {{ $slot }}
                </div>
                <footer class="bg-white rounded-lg dark:bg-gray-900 m-4">
                    <div class="w-full max-w-screen-md mx-auto p-5 md:py-8">
                        <span class="block text-sm text-gray-500 text-center dark:text-gray-400">© 2024 <a href="https://flowbite.com/" class="hover:underline">Desarrollado por: SqlapioTechnology LLC™</a>. All Rights Reserved.</span>
                    </div>
                </footer>
            </div>

        <!-- Livewire V3 -->
        @livewireScripts
    </body>
</html>
