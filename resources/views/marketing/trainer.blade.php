<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>About the Trainer - R-Force</title>

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
                        style="background-image: url('{{ asset('img/trainer.jpg') }}')">
                        <h1 class="mb-4 text-3xl font-bold">Meet Your Trainer</h1>
                        <p class="mb-8 text-xl font-bold">Expert guidance tailored to your fitness journey.</p>
                    </div>
                </section>

                <!-- Trainer Profile Section -->
                <section class="rounded-lg bg-blue-200 py-16 dark:bg-gray-800">
                    <h1 class="text-center text-2xl font-bold">About Your Trainer</h1>
                    <div class="grid grid-cols-1 items-center gap-8 p-4 md:grid-cols-2">
                        <div class="overflow-hidden rounded-lg">
                            <img src="{{ asset('img/trainer.jpg') }}" alt="Professional Trainer" class="h-auto w-full">
                        </div>
                        <div>
                            <h2 class="mb-4 text-3xl font-semibold">Roberto Dias, Certified Fitness Expert</h2>
                            <p class="text-lg leading-relaxed">
                                With over 10 years of experience in the fitness industry, John specializes in strength
                                training, rehabilitation, and personalized coaching. His approach combines science-backed
                                methodologies with a deep passion for helping clients achieve their fitness goals.
                            </p>
                            <a href="{{ route('home') }}"
                                class="mt-6 inline-block rounded-lg bg-blue-500 px-6 py-3 text-white transition duration-300 hover:bg-blue-600">Get
                                in Touch</a>
                        </div>
                    </div>
                </section>

                <!-- Trainer Expertise Section -->
                <section class="py-16">
                    <h2 class="mb-12 text-center text-3xl font-semibold">Areas of Expertise</h2>
                    <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                        <div class="rounded-lg border border-gray-300 bg-blue-200 p-6 text-center shadow-sm dark:border-gray-700 dark:bg-gray-800">
                            <h3 class="mb-2 text-xl font-semibold">Strength & Conditioning</h3>
                            <p>Tailored programs to enhance muscle strength and endurance.</p>
                        </div>
                        <div class="rounded-lg border border-gray-300 bg-blue-200 p-6 text-center shadow-sm dark:border-gray-700 dark:bg-gray-800">
                            <h3 class="mb-2 text-xl font-semibold">Rehabilitation & Recovery</h3>
                            <p>Expert guidance for injury prevention and post-recovery fitness.</p>
                        </div>
                        <div class="rounded-lg border border-gray-300 bg-blue-200 p-6 text-center shadow-sm dark:border-gray-700 dark:bg-gray-800">
                            <h3 class="mb-2 text-xl font-semibold">Personalized Coaching</h3>
                            <p>Customized workout and nutrition plans tailored for each client.</p>
                        </div>
                    </div>
                </section>

                <!-- Why Choose This Trainer Section -->
                <section class="rounded-lg bg-blue-200 py-16 dark:bg-gray-800">
                    <div class="mx-auto max-w-3xl px-6">
                        <h2 class="mb-6 text-center text-3xl font-semibold">Why Train with Roberto?</h2>
                        <p class="text-lg leading-relaxed">
                            Roberto's holistic approach to fitness ensures that every session is personalized to fit your
                            unique needs. With certifications in sports science and rehabilitation, he uses proven
                            methodologies to help clients build strength, increase mobility, and enhance overall well-being.
                            Whether you're a beginner or an athlete, Roberto's coaching will empower you to reach your
                            fitness potential with confidence.
                        </p>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>
</html>
