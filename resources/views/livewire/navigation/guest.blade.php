<nav x-data="{ open: false }" class="container z-20 mx-3 flex w-full flex-row justify-between">
    {{-- Logo  --}}
    <div class="flex items-center justify-start gap-4">
        <a href="/">
            <div class="">
                <img src="{{ url('/logo.png') }}" class="h-12 w-12" />
            </div>
        </a>
        <a href="/">
            <h1 class="text-2xl font-extrabold text-blue-600 dark:text-blue-400">R-Force</h1>
        </a>
    </div>
    {{-- Right Flexbox --}}
    <div class="lg: flex flex-row items-center justify-end space-x-4">
        {{-- Primary Desktop Navigation --}}
        <div class="hidden items-center justify-end font-bold lg:flex lg:gap-4">
            <a href="{{ url('/') }}"
                class="rounded-md px-3 py-2 text-gray-800 ring-1 ring-transparent transition hover:text-blue-600 focus:outline-none focus-visible:ring-blue-500 dark:text-gray-200 dark:hover:text-blue-400 dark:focus-visible:ring-blue-400">
                Home
            </a>
            <div class="relative">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 text-gray-800 transition hover:text-blue-600 focus:outline-none focus-visible:ring-blue-500 dark:text-gray-200 dark:hover:text-blue-400 dark:focus-visible:ring-blue-400">
                            About
                            <div class="ml-1">
                                <svg class="h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content" class="bg-blue-300">
                        <div class="focus:bg-blue-100 dark:bg-gray-900 bg-blue-100">
                            <x-dropdown-link href="{{ route('trainer') }}">
                                The trainer
                            </x-dropdown-link>
                            <x-dropdown-link href="{{ route('methodology') }}">
                                Our methodology
                            </x-dropdown-link>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>
            <a href="{{ url('/pricing') }}"
                class="rounded-md px-3 py-2 text-gray-800 ring-1 ring-transparent transition hover:text-blue-600 focus:outline-none focus-visible:ring-blue-500 dark:text-gray-200 dark:hover:text-blue-400 dark:focus-visible:ring-blue-400">
                Pricing
            </a>
        </div>
        {{-- Auth Route Links --}}
        <div class="hidden flex-row items-center md:flex">
            @auth
                <a href="{{ url('/dashboard') }}"
                    class="rounded-md px-3 text-gray-800 ring-1 ring-transparent transition hover:text-blue-600 focus:outline-none focus-visible:ring-blue-500 dark:text-gray-200 dark:hover:text-blue-400 dark:focus-visible:ring-blue-400">
                    <x-wui-button blue rounded="full" class="my-auto bg-blue-500 text-white hover:bg-blue-600">
                        Dashboard
                    </x-wui-button>
                </a>
            @else
                <x-wui-button href="{{ route('login') }}" outline blue rounded="full" class="h-fit min-w-fit px-3 py-2">
                    Log in
                </x-wui-button>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="rounded-md px-3 text-gray-800 ring-1 ring-transparent transition hover:text-blue-600 focus:outline-none focus-visible:ring-blue-500 dark:text-gray-200 dark:hover:text-blue-400 dark:focus-visible:ring-blue-400">
                        <x-wui-button blue rounded="full" class="my-auto bg-blue-500 text-white hover:bg-blue-600">
                            Register
                        </x-wui-button>
                    </a>
                @endif
            @endauth
        </div>
        {{-- Mobile navigation --}}
        <div class="drawer lg:hidden">
            <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
            <!-- Navbar -->
            <label for="my-drawer-3" aria-label="open sidebar" class="btn btn-square btn-ghost">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    class="inline-block h-6 w-6 stroke-current">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16">
                    </path>
                </svg>
            </label>
            <div class="drawer-side">
                <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label>
                <div class="menu flex min-h-full w-80 flex-col items-center bg-blue-400 p-4 pt-8 text-lg font-bold">
                    <!-- Sidebar content here -->
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('trainer') }}">Trainer</a></li>
                    <li><a href="{{ route('methodology') }}">Methodology</a></li>
                    <div class="divider divider-primary"></div>
                    <div class="">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="rounded-md px-3 text-gray-800 ring-1 ring-transparent transition hover:text-blue-600 focus:outline-none focus-visible:ring-blue-500 dark:text-gray-200 dark:hover:text-blue-400 dark:focus-visible:ring-blue-400">
                                <x-wui-button blue rounded="full" class="my-auto bg-blue-500 text-white hover:bg-blue-600">
                                    Dashboard
                                </x-wui-button>
                            </a>
                        @else
                            <x-wui-button href="{{ route('login') }}" outline blue rounded="full" class="px-3 py-2">
                                Log in
                            </x-wui-button>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="rounded-md px-3 text-gray-800 ring-1 ring-transparent transition hover:text-blue-600 focus:outline-none focus-visible:ring-blue-500 dark:text-gray-200 dark:hover:text-blue-400 dark:focus-visible:ring-blue-400">
                                    <x-wui-button blue rounded="full"
                                        class="my-auto bg-blue-500 text-white hover:bg-blue-600">
                                        Register
                                    </x-wui-button>
                                </a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="flex items-center lg:hidden">
        <button @click="open = !open" class="text-gray-800 hover:text-blue-600 focus:text-blue-600 focus:outline-none">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    <div :class="{ 'block': open, 'hidden': !open }"
        class="absolute right-0 top-16 z-50 mt-2 hidden w-48 rounded-md bg-white py-1 shadow-lg lg:hidden">
        <x-responsive-nav-link href="{{ url('/') }}" :active="request()->is('/')">
            Home
        </x-responsive-nav-link>
        <x-responsive-nav-link href="{{ route('blog') }}" :active="request()->routeIs('blog')">
            Blog
        </x-responsive-nav-link>
        <x-responsive-nav-link href="{{ url('/pricing') }}" :active="request()->is('pricing')">
            Pricing
        </x-responsive-nav-link>
        @auth
            <x-responsive-nav-link href="{{ url('/dashboard') }}" :active="request()->is('dashboard')">
                Dashboard
            </x-responsive-nav-link>
        @else
            <x-responsive-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                Log in
            </x-responsive-nav-link>
            @if (Route::has('register'))
                <x-responsive-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                    Register
                </x-responsive-nav-link>
            @endif
        @endauth
    </div> --}}
</nav>
