<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">

        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif

            <div class="max-w-7xl mx-auto p-6 lg:p-8">

                <div class="p-4">
                    <input type="checkbox" id="prueba" class="hidden peer">
                    <label for="prueba" class="inline-flex justify-center items-center text-center w-full h-full p-2
                                    bg-white border border-gray-200 
                                    rounded-full cursor-pointer
                                    peer-checked:bg-black
                                    peer-checked:shadow-[0_3px_10px_rgb(0,0,0,0.2)]
                                    peer-checked:text-black">
                        <div class="block">
                            <div class="w-full text-black text-md font-extrabold">prueba en vivo</div>
                        </div>
                    </label>
                </div>

                    <h3 class="mb-5 text-lg font-medium text-green-900 dark:text-white">Choose technology:</h3>
                    <ul class="grid w-full gap-6 md:grid-cols-3">
                        <li>
                            <input type="checkbox" id="flowbite-option" value="" class="hidden peer">
                            <label for="flowbite-option" class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 peer-checked:border-green-800 hover:text-gray-600 dark:peer-checked:text-gray-300 peer-checked:text-gray-600 hover:bg-gray-50 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                <div class="block">
                                    <svg class="mb-2 text-green-400 w-7 h-7" fill="currentColor" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M356.9 64.3H280l-56 88.6-48-88.6H0L224 448 448 64.3h-91.1zm-301.2 32h53.8L224 294.5 338.4 96.3h53.8L224 384.5 55.7 96.3z"/></svg>
                                    <div class="w-full text-lg font-semibold">Vue Js</div>
                                    <div class="w-full text-sm"></div>
                                </div>
                            </label>
                        </li>
                        
                    </ul>

            </div>
        </div>
    </body>
</html>
