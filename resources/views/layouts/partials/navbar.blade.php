<nav class="py-6 bg-white">
    <div class="flex items-center justify-between w-full px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <a href="{{ route('welcome') }}">
            <img src="{{ asset('logo.png') }}" alt="Laravel Logo" class="w-auto h-12"></a>

        <div class="items-center hidden space-x-6 lg:flex">
            <ul class="flex items-center space-x-4">
                <li><a href="{{ route('welcome') }}">{{ __('Dashboard') }}</a></li>
                <li><a href="{{ route('research.index') }}">{{ __('Riset') }}</a></li>
                <li><a href="{{ route('researcher.index') }}">{{ __('Peneliti') }}</a></li>
            </ul>

            <div class="w-px h-6 bg-primary-500"></div>

            <div class="flex items-center space-x-4">
                <div class="relative w-60">
                    <x-text-input class="w-full" placeholder="Search..."></x-text-input>
                    <div
                        class="absolute flex items-center justify-center w-6 h-6 -translate-y-1/2 rounded-full top-1/2 right-2 text-primary-500">
                        <svg data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </div>
                </div>

                <a href="{{ route('login') }}">
                    <x-button variant="primary">{{ __('Masuk') }}</x-button>
                </a>
            </div>
        </div>
    </div>
</nav>
