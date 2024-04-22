<x-home-layout>
    <section class="text-white bg-primary-500">
        <nav class="compact">
            <ul class="flex items-center py-1 space-x-2">
                <li><a href="{{ route('welcome') }}">{{ __('Beranda') }}</a></li>
                <li>/</li>
                <li><a href="{{ route('researcher.index') }}">{{ __('Peneliti') }}</a></li>
            </ul>
        </nav>
    </section>

    <section class="py-20 bg-gray-200">
        <div class="compact">
            <h2 class="mb-2 text-4xl font-semibold ">{{ __('Cari Peneliti') }}</h2>
            <p class="mb-8 text-gray-600">
                {{ __('Lorem ipsum dolor sit amet consectetur adipisicing elit. In iure repellendus, illum aliquid ab amet cupiditate nisi odit molestias! Corrupti!') }}
            </p>

            <form method="post" action="{{ route('researcher.search') }}">
                @csrf
                <div class="grid gap-8 mb-8 lg:grid-cols-3">
                    <div>
                        <x-input-label for="name" :value="__('Nama Peneliti')" />
                        <x-text-input id="name" class="block w-full mt-1" type="text" name="name"
                            autocomplete="name" :value="old('name', $query['name'])" />
                    </div>

                    <div>
                        <x-input-label for="nationality" :value="__('Kewarganegaraan')" />
                        <x-text-input id="nationality" class="block w-full mt-1" type="text" name="nationality"
                            autocomplete="nationality" :value="old('nationality', $query['nationality'])" />
                    </div>

                    <div>
                        <x-input-label for="count" :value="__('Jumlah Riset')" />
                        <x-text-input id="count" class="block w-full mt-1" type="number" name="count"
                            autocomplete="count" :value="old('count', $query['count'])" />
                    </div>
                </div>

                <div class="flex items-center justify-end space-x-4">
                    <x-button variant="primary">{{ __('Cari Peneliti') }}</x-button>
                    <a href="{{ route('researcher.index') }}">
                        <x-button type="button" variant="invert">{{ __('Reset') }}</x-button>
                    </a>
                </div>
            </form>
        </div>
    </section>

    <section id="riset" class="py-20">
        <div class="compact">
            <div class="grid gap-8 mb-8 md:grid-cols-3 lg:grid-cols-5">
                @forelse ($researchers as $researcher)
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
                @empty
                    <div class="flex flex-col items-center justify-center col-span-full">
                        <p class="text-sm text-gray-500">
                            {{ __('Belum ada peneliti') }}
                        </p>
                    </div>
                @endforelse
            </div>

            {{ $researchers->links() }}
        </div>
    </section>
</x-home-layout>
