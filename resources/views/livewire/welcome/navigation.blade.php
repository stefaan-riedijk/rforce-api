<nav class="container z-20 flex flex-row justify-between w-full mx-3">
    <div class="flex items-center justify-start gap-4">
        <a href="/">
            <div class="">
                <img src="{{url('/logo.png')}}" class="w-12 h-12"/>
            </div>
        </a>
          <a href="/">
            <h1 class="text-2xl font-extrabold">R-Force</h1>
          </a>
    </div>
    <div class="flex items-center justify-end font-bold lg:gap-4">
        <a
            href="{{ url('/') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            Home
        </a>
        <a
            href="{{ url('/blog') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            Blog
        </a>
        <a
            href="{{ url('/pricing') }}"
            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
        >
            Pricing
        </a>
        @auth
            <a
                href="{{ url('/dashboard') }}"
                class="rounded-md px-3 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
                <x-wui-button blue rounded="full" class="my-auto">
                    Dashboard
                </x-wui-button>
            </a>
        @else
            <a
                href="{{ route('login') }}"
                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
                Log in
            </a>

            @if (Route::has('register'))
                <a
                    href="{{ route('register') }}"
                    class="rounded-md px-3 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                >
                    <x-wui-button blue rounded="full" class="my-auto">
                        Register
                    </x-wui-button>
                </a>
            @endif
        @endauth
    </div>
</nav>
