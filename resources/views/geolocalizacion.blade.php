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

        <!-- Livewire V3 -->
        @livewireStyles

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <button onclick="getLocation()">Try It</button>
        <p id="demo"></p>

        <!-- Livewire V3 -->
        @livewireScripts

        <script>
            if(navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    ({ coords: {latitude, longitude} }) => {
                        const coords = {
                            lat: latitude,
                            lng: longitude,
                        };
                        console.log(coords);
                    },
                    () => {
                        alert("tu navegador esta bien, pero hay un peo");
                    }
                );
            }else{
                alert("tu navegador no va para el Baile");
            }
        </script>
    </body>
</html>
