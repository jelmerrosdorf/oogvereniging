<nav x-data="{ open: false }" class="bg-oogvereniging-creme border-b border-oogvereniging-purple">
    <!-- Primary Navigation Menu -->
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-oogvereniging-blue" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('events.index')" :active="request()->routeIs('events.index')">
                        {{ __('Activiteiten') }}
                    </x-nav-link>
                    <x-nav-link :href="route('events.concepts')" :active="request()->routeIs('events.concepts')">
                        {{ __('Concepten') }}
                    </x-nav-link>
                </div>
            </div>
        </div>
    </div>
</nav>
