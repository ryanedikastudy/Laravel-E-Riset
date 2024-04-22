<x-home-layout>
    <section id="hero" class="relative py-24">
        <img src="{{ asset('hero.png') }}" alt="Hero Image" class="absolute inset-0 object-cover w-full h-full">
        <div id="overlay" class="absolute inset-0 bg-overlay/60"></div>

        <div class="relative z-10 flex flex-col justify-center  aspect-[5/2] compact">
            <h1 class="mb-4 text-5xl font-bold text-white sm:text-6xl lg:text-7xl">
                {{ __('Temukan dan Upload Riset Penelitian') }}
            </h1>

            <div class="flex flex-col justify-between space-y-4 lg:items-center lg:flex-row lg:space-y-0">
                <h1 class="w-1/2 text-lg text-white lg:text-2xl">
                    {{ __('Telusuri berbagai riset penelitian terverifikasi dan berikan kontribusi dengan mengupload riset penelitianmu.') }}
                </h1>

                <div class="flex space-x-4">
                    <x-button variant="primary">{{ __('Pencarian') }}</x-button>
                    <x-button variant="ghost">{{ __('Upload') }}</x-button>
                </div>
            </div>
        </div>
    </section>

    <section id="photo" class="relative py-24 border-b border-gray-200">
        <img src="{{ asset('ornament.png') }}" alt="Ornament Image" class="absolute inset-0 object-center m-auto">

        <div class="compact">
            <h2 class="mb-2 text-4xl font-semibold text-center">{{ __('Gubernur dan Wakil Gubernur') }}</h2>
            <p class="text-center text-gray-600 mb-14">
                {{ __('Lorem ipsum dolor sit amet consectetur adipisicing elit. In iure repellendus, illum aliquid ab amet cupiditate nisi odit molestias! Corrupti!') }}
            </p>

            <div class="flex items-center justify-center h-full space-x-6">
                <div class="w-[200px] aspect-[3/4] relative">
                    <div id="overlay" class="absolute inset-0 bg-gradient-to-b from-black/0 to-black/100"></div>
                    <img src="{{ asset('gubernur.png') }}" alt={{ __('Gubernur') }} class="object-cover w-full h-full">

                    <div class="absolute w-full bottom-4">
                        <h5 class="font-semibold text-center text-white">MAHYELDI</h5>
                        <p class="text-sm text-center text-white">{{ __('Gubernur') }}</p>
                    </div>
                </div>

                <div class="w-[200px] aspect-[3/4] relative">
                    <div id="overlay" class="absolute inset-0 bg-gradient-to-b from-black/0 to-black/100"></div>
                    <img src="{{ asset('wakil.png') }}" alt={{ __('Wakil Gubernur') }}
                        class="object-cover w-full h-full">

                    <div class="absolute w-full bottom-4">
                        <h5 class="font-semibold text-center text-white">MAHYELDI</h5>
                        <p class="text-sm text-center text-white">{{ __('Wakil Gubernur') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="populer" class="py-24 border-b border-gray-200">
        <h2 class="mb-2 text-4xl font-semibold text-center">{{ __('Riset Populer') }}</h2>
        <p class="text-center text-gray-600 mb-14">
            {{ __('Lorem ipsum dolor sit amet consectetur adipisicing elit. In iure repellendus, illum aliquid ab amet cupiditate nisi odit molestias! Corrupti!') }}
        </p>

        <div class="compact">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 lg:gap-8">
                @foreach ($populars as $research)
                    <div
                        class="overflow-hidden border border-gray-200 rounded-lg bg-gradient-to-b from-white to-gray-100">
                        <div class="w-full h-2 bg-primary-500"></div>
                        <div class="p-6">
                            <span class="text-sm font-medium text-gray-400">{{ __('Berita riset') }}</span>
                            <h3 class="mb-4 font-medium text-primary-500">
                                {{ \Illuminate\Support\Str::headline($research->title) }}
                            </h3>
                            <h4 class="mb-2 text-sm font-medium">
                                {{ $research->researcher->user->name }}
                            </h4>
                            <p class="text-sm text-gray-500">
                                {{ __('Dipublikasi pada') }}
                                {{ \Carbon\Carbon::parse($research->published_at)->format('Y') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



    <section id="riset" class="py-24 border-b border-gray-200">
        <h2 class="mb-2 text-4xl font-semibold text-center">{{ __('Daftar Riset') }}</h2>
        <p class="text-center text-gray-600 mb-14">
            {{ __('Lorem ipsum dolor sit amet consectetur adipisicing elit. In iure repellendus, illum aliquid ab amet cupiditate nisi odit molestias! Corrupti!') }}
        </p>

        <div class="compact">
            <div class="overflow-hidden bg-gray-100 border border-gray-200 rounded-lg">
                <div class="w-full h-2 bg-primary-500"></div>

                <div class="p-8">
                    <div class="flex justify-end mb-8">
                        <x-dropdown align="right" width="48" compactClasses="py-1 bg-white">
                            <x-slot name="trigger">
                                <x-button variant="outline" aria-haspopup="menu" type="button">
                                    {{ __('Urutkan Berdasarkan') }}
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="ms-2" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                                    </svg>
                                </x-button>
                            </x-slot>

                            <x-slot name="content">
                                <div class="flex flex-col">
                                    <a href="{{ route('welcome', ['sort' => 'popular']) }}"
                                        class="font-medium text-primary-500 hover:text-primary-700 hover:bg-gray-100 px-3 py-1.5">
                                        {{ __('Terpopuler') }}
                                    </a>

                                    <a href="{{ route('welcome', ['sort' => 'newest']) }}"
                                        class="font-medium text-primary-500 hover:text-primary-700 hover:bg-gray-100 px-3 py-1.5">
                                        {{ __('Terbaru') }}
                                    </a>
                                </div>
                            </x-slot>
                        </x-dropdown>
                    </div>

                    <div class="flex flex-col mb-8 space-y-8">
                        @foreach ($researches as $research)
                            <a href="{{ route('research.show', $research->id) }}"
                                class="flex flex-col px-6 py-4 space-y-2 bg-white border border-gray-300 rounded-lg">
                                <h3 class="font-medium text-primary-500">
                                    {{ \Illuminate\Support\Str::headline($research->title) }}
                                </h3>
                                <h4 class="text-sm font-medium">
                                    {{ $research->researcher->user->name }}
                                </h4>

                                <div class="flex items-center text-sm text-gray-500">
                                    <span>
                                        {{ __('Dipublikasi pada') }}
                                        {{ \Carbon\Carbon::parse($research->published_at)->format('d M Y') }}
                                    </span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <circle cx="12.1" cy="12.1" r="1" />
                                    </svg>
                                    <span>
                                        {{ __('Dilihat sebanyak') }}
                                        {{ $research->views }}
                                        {{ __('kali') }}
                                    </span>
                                </div>

                                <p class="text-sm text-yellow-500">
                                    {{ __('Bidang Riset') }}: {{ $research->field->name }}
                                </p>
                            </a>
                        @endforeach
                    </div>

                    <a href="{{ route('research.index') }}" class="flex justify-center">
                        <x-button variant="primary">
                            {{ __('Lihat Selengkapnya') }}
                        </x-button>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-primary-500">
        <h2 class="mb-2 text-4xl font-semibold text-center text-white">{{ __('Daftar Peneliti') }}</h2>
        <p class="text-center text-white mb-14">
            {{ __('Lorem ipsum dolor sit amet consectetur adipisicing elit. In iure repellendus, illum aliquid ab amet cupiditate nisi odit molestias! Corrupti!') }}
        </p>

        <div class="compact">
            <div class="grid gap-8 mb-8 md:grid-cols-3 lg:grid-cols-5">
                @foreach ($researchers as $researcher)
                    <div class="flex flex-col items-center p-6 bg-white border border-gray-300 rounded-lg">
                        <div
                            class="flex items-center justify-center w-32 h-32 mb-4 overflow-hidden bg-white border border-gray-300 rounded-full">
                            @if ($researcher->user->photo)
                                <img src="{{ asset($researcher->user->photo) }}" alt="Profil"
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

                        <div class="text-center">
                            <h3 class="font-medium text-primary-500 line-clamp-1">
                                {{ \Illuminate\Support\Str::headline($researcher->user->name) }}
                            </h3>
                            <p class="mb-4 text-sm font-medium">
                                {{ \Illuminate\Support\Str::headline($researcher->nationality) }}
                            </p>
                            <p class="text-sm text-gray-500">
                                {{ __('Jumlah Riset') }}: {{ $researcher->researches_count }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>

            <a href="{{ route('researcher.index') }}" class="flex justify-center">
                <x-button variant="outline" class="text-white border-white">
                    {{ __('Lihat Selengkapnya') }}
                </x-button>
            </a>
        </div>
    </section>

    <section id="visitor" class="py-24 border-b border-gray-200">
        <h2 class="mb-2 text-4xl font-semibold text-center">{{ __('Daftar Pengunjung') }}</h2>
        <p class="text-center text-gray-600 mb-14">
            {{ __('Lorem ipsum dolor sit amet consectetur adipisicing elit. In iure repellendus, illum aliquid ab amet cupiditate nisi odit molestias! Corrupti!') }}
        </p>

        <div class="compact">
            <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 lg:gap-8">
                @php
                    $counters = [
                        'online' => rand(0, 100),
                        'total' => rand(0, 100),
                        'today' => rand(0, 100),
                        'download' => rand(0, 100),
                    ];
                @endphp

                @foreach ($counters as $key => $value)
                    <div class="text-center">
                        <div class="mb-2 text-6xl font-bold">{{ $value }}</div>
                        <div class="font-medium text-gray-400">{{ \Illuminate\Support\Str::headline($key) }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

</x-home-layout>
