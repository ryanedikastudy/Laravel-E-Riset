<nav class="py-6 bg-white border-b border-gray-200">
    <div class="flex items-center justify-between expanded">
        <a href="{{ route('welcome') }}">
            <img src="{{ asset('logo.png') }}" alt="Logo Aplikasi" class="w-auto h-12">
        </a>

        <div class="items-center hidden space-x-6 lg:flex">
            <ul class="flex items-center space-x-4">
                <li><a href="{{ route('researcher.dashboard.index') }}">{{ __('Dashboard') }}</a></li>
                <li><a href="{{ route('research.index') }}">{{ __('Riset') }}</a></li>
                <li><a href="{{ route('researcher.index') }}">{{ __('Peneliti') }}</a></li>
            </ul>

            <div class="w-px h-6 bg-primary-500"></div>

            <div class="flex items-center space-x-4">
                <form class="relative w-60" method="post" action="{{ route('researcher.search') }}">
                    @csrf
                    <x-text-input class="w-full" placeholder="Search..." name="title" id="title" />
                    <button type="submit"
                        class="absolute flex items-center justify-center w-6 h-6 -translate-y-1/2 rounded-full top-1/2 right-2 text-primary-500">
                        <svg data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </form>

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <div
                            class="flex items-center justify-center w-10 h-10 overflow-hidden bg-white border border-gray-300 rounded-full cursor-pointer hover:border-primary-500">
                            @if (Auth::user()->photo)
                                <img src="{{ asset(Auth::user()->photo) }}" alt="Profil"
                                    class="object-cover w-full h-full">
                            @else
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5 text-primary-500">
                                    <circle cx="12" cy="8" r="5" />
                                    <path d="M20 21a8 8 0 0 0-16 0" />
                                </svg>
                            @endif
                        </div>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profil') }}
                        </x-dropdown-link>


                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Keluar') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
