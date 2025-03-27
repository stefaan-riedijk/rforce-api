<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Our Methodology - R-Force</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="bg-blue-100 text-black/80 dark:bg-gray-900 dark:text-white/80">
        <header class="fixed z-20 w-full gap-2 bg-blue-400 px-12 py-5 lg:grid-cols-3">
            @if (Route::has('login'))
                <livewire:navigation.guest />
            @endif
        </header>
        <div class="relative flex min-h-screen flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 py-6 lg:max-w-7xl">

                <!-- Hero Section -->
                <section class="w-full py-20 text-center">
                    <div class="flex h-72 flex-col items-center justify-end rounded-lg bg-blue-200 bg-cover p-6 text-white bg-blend-overlay"
                        style="background-image: url('{{ asset('img/hero.jpg') }}')">
                        <h1 class="mb-4 text-3xl font-bold">Our Methodology</h1>
                        <p class="mb-8 text-xl font-bold">Optimize your workouts with structured planning and variety.</p>
                    </div>
                </section>

                <!-- Planning Benefits Section -->
                <section class="rounded-lg bg-blue-200 py-16 dark:bg-gray-800">
                    <h1 class="text-center text-2xl font-bold">Why Plan Your Workouts?</h1>
                    <div class="grid grid-cols-1 items-center gap-8 p-4 md:grid-cols-2">
                        <div class="overflow-hidden rounded-lg">
                            <img src="{{ asset('img/workout-planning.jpg') }}" alt="Workout Planning App" class="h-auto w-full">
                        </div>
                        <div>
                            <h2 class="mb-4 text-3xl font-semibold">Achieve Your Goals Efficiently</h2>
                            <p class="text-lg leading-relaxed">
                                Our app provides a structured approach to fitness by allowing you to plan your own workouts
                                with a vast selection of exercises. This ensures a balanced routine, prevents plateaus,
                                and helps you stay consistent.
                            </p>
                            <a href="{{ route('dashboard') }}"
                                class="mt-6 inline-block rounded-lg bg-blue-500 px-6 py-3 text-white transition duration-300 hover:bg-blue-600">Start Planning</a>
                        </div>
                    </div>
                </section>

                <!-- Key Benefits Section -->
                <section class="py-16">
                    <h2 class="mb-12 text-center text-3xl font-semibold">Key Benefits of Workout Planning</h2>
                    <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                        <div class="rounded-lg border border-gray-300 bg-blue-200 p-6 text-center shadow-sm dark:border-gray-700 dark:bg-gray-800">
                            <h3 class="mb-2 text-xl font-semibold">Structure & Consistency</h3>
                            <p>Stay organized and build a sustainable fitness habit.</p>
                        </div>
                        <div class="rounded-lg border border-gray-300 bg-blue-200 p-6 text-center shadow-sm dark:border-gray-700 dark:bg-gray-800">
                            <h3 class="mb-2 text-xl font-semibold">Variety & Customization</h3>
                            <p>Choose from a large exercise database to keep workouts exciting.</p>
                        </div>
                        <div class="rounded-lg border border-gray-300 bg-blue-200 p-6 text-center shadow-sm dark:border-gray-700 dark:bg-gray-800">
                            <h3 class="mb-2 text-xl font-semibold">Progress Tracking</h3>
                            <p>Monitor improvements and adjust routines for maximum results.</p>
                        </div>
                    </div>
                </section>

                <!-- Closing Statement -->
                <section class="rounded-lg bg-blue-200 py-16 dark:bg-gray-800">
                    <div class="mx-auto max-w-3xl px-6">
                        <h2 class="mb-6 text-center text-3xl font-semibold">Take Control of Your Fitness</h2>
                        <p class="text-lg leading-relaxed">
                            Our workout planning app empowers you to create a fitness routine tailored to your needs.
                            Experience the benefits of structured training, stay motivated, and unlock your full potential.
                            Whether you're a beginner or an advanced athlete, planning your workouts leads to long-term
                            success.
                        </p>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>
</html>