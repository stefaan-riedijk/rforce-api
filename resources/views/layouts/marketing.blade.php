<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <wireui:scripts/>
</head>
<body class="font-sans antialiased">
<div class="bg-blue-200 text-black/50 dark:bg-black dark:text-white/50">
    <div
        class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <header class="items-center gap-2 py-10 lg:grid-cols-3">
                @if (Route::has('login'))
                    <livewire:welcome.navigation/>
                @endif
            </header>
            <div class="min-h-screen dark:bg-gray-900">

                <!-- Page Heading -->
                @if (isset($header))
                    <header class="bg-info-300 dark:bg-gray-800 shadow">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <!-- Page Content -->
                <main class="bg-darkGray-100 border border-gray-500 max-w-4xl mx-auto rounded-xl min-h-screen mb-4">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
</div>
</body>
</html>
