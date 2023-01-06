<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        
        @livewireStyles
        <style>
            @font-face {
                font-family: 'Myfont';
                src: url('../fonts/NotoSansThai-Regular.ttf');
                /* font-weight: 300px;
                font-style: normal; */
            }
            body {
                font-family: 'Myfont', sans-serif;
                /* color: #000000; */
            }
        </style>
    </head>
    <body class="" x-data="{ darkMode: false }" x-init="
    if (!('darkMode' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches) {
      localStorage.setItem('darkMode', JSON.stringify(true));
    }
    darkMode = JSON.parse(localStorage.getItem('darkMode'));
    $watch('darkMode', value => localStorage.setItem('darkMode', JSON.stringify(value)))" x-cloak>
        <div x-bind:class="{'dark' : darkMode === true}" class="min-h-screen bg-gray-100">
            {{-- <x-jet-banner /> --}}

            <div class="min-h-screen bg-gray-100 dark:bg-neutral-900">
                @livewire('navigation-menu')

                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-white shadow dark:bg-neutral-900">
                        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif
                    
                <!-- Page Content -->
                <main class="bg-gray-100 dark:bg-neutral-900">
                    {{ $slot }}
                </main>
            </div>
        </div>
        @stack('modals')

        @livewireScripts
    </body>
</html>
