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

<body class="font-sans antialiased">
    <div class="bg-blue-100 text-black/80 dark:bg-gray-900 dark:text-white/80">
        <header class="fixed z-20 w-full gap-2 bg-blue-400 px-12 py-5 lg:grid-cols-3">
            <livewire:navigation.guest />
        </header>
        <div
            class="relative flex min-h-screen flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">

                <div class="min-h-screen dark:bg-gray-900">

                    <!-- Page Heading -->
                    @if (isset($header))
                        <header class="bg-info-300 shadow dark:bg-gray-800">
                            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                                {{ $header }}
                            </div>
                        </header>
                    @endif

                    <!-- Page Content -->
                    <main class="mx-auto mb-4 min-h-screen max-w-4xl rounded-xl border border-gray-500 bg-darkGray-100">
                        {{ $slot }}
                    </main>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
