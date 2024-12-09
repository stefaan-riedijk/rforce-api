<nav x-data="{ open: false }" class="container z-20 flex flex-row justify-between w-full mx-3">
    <div class="flex items-center justify-start gap-4">
        <a href="/">
            <div class="">
                <img src="{{url('/logo.png')}}" class="w-12 h-12"/>
            </div>
        </a>
        <a href="/">
            <h1 class="text-2xl font-extrabold text-blue-600 dark:text-blue-400">R-Force</h1>
        </a>
    </div>
    <div class="hidden lg:flex items-center justify-end font-bold lg:gap-4">
        <a
            href="{{ url('/') }}"
            class="rounded-md px-3 py-2 text-gray-800 ring-1 ring-transparent transition hover:text-blue-600 focus:outline-none focus-visible:ring-blue-500 dark:text-gray-200 dark:hover:text-blue-400 dark:focus-visible:ring-blue-400"
        >
            Home
        </a>
        <div class="relative">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 text-gray-800 transition hover:text-blue-600 focus:outline-none focus-visible:ring-blue-500 dark:text-gray-200 dark:hover:text-blue-400 dark:focus-visible:ring-blue-400">
                        Blog
                        <div class="ml-1">
                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <div class="focus:bg-blue-100 dark:bg-gray-900">
                        <x-dropdown-link href="{{ route('blog') }}">
                            All
                        </x-dropdown-link>
                        <x-dropdown-link href="{{ url('/blog/latest') }}">
                            Latest
                        </x-dropdown-link>
                    </div>
                </x-slot>
            </x-dropdown>
        </div>
        <a
            href="{{ url('/pricing') }}"
            class="rounded-md px-3 py-2 text-gray-800 ring-1 ring-transparent transition hover:text-blue-600 focus:outline-none focus-visible:ring-blue-500 dark:text-gray-200 dark:hover:text-blue-400 dark:focus-visible:ring-blue-400"
        >
            Pricing
        </a>
        @auth
            <a
                href="{{ url('/dashboard') }}"
                class="rounded-md px-3 text-gray-800 ring-1 ring-transparent transition hover:text-blue-600 focus:outline-none focus-visible:ring-blue-500 dark:text-gray-200 dark:hover:text-blue-400 dark:focus-visible:ring-blue-400"
            >
                <x-wui-button blue rounded="full" class="my-auto bg-blue-500 hover:bg-blue-600 text-white">
                    Dashboard
                </x-wui-button>
            </a>
        @else
            <x-wui-button
                href="{{ route('login') }}"
                outline
                blue
                rounded="full"
                class="px-3 py-2 text-green-600 border-green-600 hover:bg-green-100 dark:text-green-400 dark:border-green-400 dark:hover:bg-green-900"
            >
                Log in
            </x-wui-button>

            @if (Route::has('register'))
                <a
                    href="{{ route('register') }}"
                    class="rounded-md px-3 text-gray-800 ring-1 ring-transparent transition hover:text-blue-600 focus:outline-none focus-visible:ring-blue-500 dark:text-gray-200 dark:hover:text-blue-400 dark:focus-visible:ring-blue-400"
                >
                    <x-wui-button blue rounded="full" class="my-auto bg-blue-500 hover:bg-blue-600 text-white">
                        Register
                    </x-wui-button>
                </a>
            @endif
        @endauth
    </div>
    <div class="lg:hidden flex items-center">
        <button @click="open = !open" class="text-gray-800 hover:text-blue-600 focus:outline-none focus:text-blue-600">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    <div :class="{'block': open, 'hidden': !open}" class="hidden lg:hidden absolute top-16 right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
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
    </div>
</nav>
