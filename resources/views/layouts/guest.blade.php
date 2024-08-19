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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <wireui:scripts />
    </head>
    <body class="font-sans antialiased text-gray-900">
        <wire:welcome.navigation/>
        <div class="flex flex-col items-center min-h-screen bg-darkGray-300 sm:justify-center sm:pt-0 dark:bg-gray-900">
            <div>
                <a href="/" wire:navigate>
                    <x-logo class="w-20 h-20 text-gray-500 fill-current" />
                </a>
            </div>
            <div class="w-full px-6 py-4 mt-6 mb-6 overflow-hidden bg-blue-300 border-2 border-gray-400 shadow-md sm:max-w-md dark:bg-gray-800 sm:rounded-lg">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
