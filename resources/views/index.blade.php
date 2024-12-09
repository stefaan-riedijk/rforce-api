<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>R-Force - Exercise tool for health professionals</title>

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
        <div
            class="relative flex min-h-screen flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 py-6 lg:max-w-7xl">

                <!-- Hero Section -->
                <section class="mt-20 w-full py-20 text-center">
                    <div
                        class="flex h-72 flex-col items-center justify-end rounded-lg bg-[url('img/hero.jpg')] bg-cover p-6">
                        <h1 class="mb-4 text-3xl font-bold">Welcome to R-Force</h1>
                        <p class="mb-8 text-xl font-bold">The ultimate exercise tool for health professionals</p>
                        <a href="#"
                            class="w-fit rounded-lg bg-blue-500 px-6 py-3 text-white transition duration-300 hover:bg-blue-600">Get
                            Started</a>
                </section>

                <!-- Features Section -->
                <section class="py-16">
                    <h2 class="mb-12 text-center text-3xl font-semibold">Key Features</h2>
                    <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                        <div
                            class="rounded-lg border border-gray-300 bg-blue-200 p-6 text-center shadow-sm dark:border-gray-700 dark:bg-gray-800">
                            <svg class="mx-auto mb-4 h-12 w-12" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <h3 class="mb-2 text-xl font-semibold">Customizable Workouts</h3>
                            <p>Create personalized exercise plans for your clients</p>
                        </div>
                        <div
                            class="rounded-lg border border-gray-300 bg-blue-200 p-6 text-center shadow-sm dark:border-gray-700 dark:bg-gray-800">
                            <svg class="mx-auto mb-4 h-12 w-12" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                <path fill-rule="evenodd"
                                    d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <h3 class="mb-2 text-xl font-semibold">Progress Tracking</h3>
                            <p>Monitor and analyze client performance over time</p>
                        </div>
                        <div
                            class="rounded-lg border border-gray-300 bg-blue-200 p-6 text-center shadow-sm dark:border-gray-700 dark:bg-gray-800">
                            <svg class="mx-auto mb-4 h-12 w-12" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z">
                                </path>
                            </svg>
                            <h3 class="mb-2 text-xl font-semibold">Client Management</h3>
                            <p>Efficiently manage your client base and appointments</p>
                        </div>
                    </div>
                </section>
                <!-- New Two-Column Section -->
                <section class="my-16 rounded-lg bg-blue-200 py-16 dark:bg-gray-800">
                    <div class="grid grid-cols-1 items-center gap-8 p-4 md:grid-cols-2">
                        <div class="overflow-hidden rounded-lg">
                            <img src="{{ asset('img/physiotherapist.jpg') }}" alt="Health Professional using R-Force"
                                class="h-auto w-full">
                        </div>
                        <div>
                            <h2 class="mb-4 text-3xl font-semibold">Empower Your Practice</h2>
                            <p class="text-lg leading-relaxed">
                                With R-Force, you can take your health and fitness practice to the next level. Our
                                intuitive platform allows you to create custom exercise programs, track client progress
                                in real-time, and manage your entire client base from one centralized dashboard.
                                Experience the power of data-driven decision making and provide your clients with the
                                personalized care they deserve.
                            </p>
                            <a href="#"
                                class="mt-6 inline-block rounded-lg bg-blue-500 px-6 py-3 text-white transition duration-300 hover:bg-blue-600">Learn
                                More</a>
                        </div>
                    </div>
                </section>
                <!-- Explanation Paragraph Section -->
                <section class="rounded-lg bg-blue-200 py-16 dark:bg-gray-800">
                    <div class="mx-auto max-w-3xl px-6">
                        <h2 class="mb-6 text-center text-3xl font-semibold">Why Choose R-Force?</h2>
                        <p class="text-lg leading-relaxed">
                            R-Force is designed specifically for health professionals who want to provide the best care
                            for their clients. Our platform combines cutting-edge technology with evidence-based
                            exercise science to deliver a comprehensive solution for creating, managing, and tracking
                            exercise programs. Whether you're a physical therapist, personal trainer, or rehabilitation
                            specialist, R-Force gives you the tools you need to optimize your clients' health and
                            fitness journeys. With features like real-time progress tracking, customizable workout
                            plans, and seamless client communication, R-Force empowers you to deliver personalized care
                            at scale.
                        </p>
                    </div>
                </section>



            </div>
        </div>
    </div>
</body>

</html>
