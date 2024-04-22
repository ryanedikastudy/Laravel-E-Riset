<x-home-layout>
    <section class="text-white bg-primary-500">
        <nav class="compact">
            <ul class="flex items-center py-1 space-x-2">
                <li><a href="{{ route('welcome') }}">{{ __('Beranda') }}</a></li>
                <li>/</li>
                <li><a href="{{ route('research.index') }}">{{ __('Riset') }}</a></li>
            </ul>
        </nav>
    </section>

    <section class="py-20 bg-gray-200">
        <div class="compact">
            <h2 class="mb-2 text-4xl font-semibold ">{{ __('Cari Riset') }}</h2>
            <p class="mb-8 text-gray-600">
                {{ __('Lorem ipsum dolor sit amet consectetur adipisicing elit. In iure repellendus, illum aliquid ab amet cupiditate nisi odit molestias! Corrupti!') }}
            </p>

            <form method="post" action="{{ route('research.search') }}">
                @csrf
                <div class="grid gap-8 mb-8 lg:grid-cols-3">
                    <div>
                        <x-input-label for="field" :value="__('Bidang Riset')" />
                        <x-select id="field" class="block w-full mt-1" name="field" autocomplete="field"
                            :value="old('field')">

                            <option @if (old('field', $query['field']) == '') selected @endif value="">
                                {{ __('Pilih Bidang') }}
                            </option>

                            @foreach ($fields as $field)
                                <option @if (old('field', $query['field']) == $field->id) selected @endif value="{{ $field->id }}">
                                    {{ $field->name }}
                                </option>
                            @endforeach
                        </x-select>
                    </div>

                    <div>
                        <x-input-label for="name" :value="__('Nama Peneliti')" />
                        <x-text-input id="name" class="block w-full mt-1" type="text" name="name"
                            autocomplete="name" :value="old('name', $query['name'])" />
                    </div>

                    <div>
                        <x-input-label for="title" :value="__('Judul Riset')" />
                        <x-text-input id="title" class="block w-full mt-1" type="text" name="title"
                            autocomplete="title" :value="old('title', $query['title'])" />
                    </div>
                </div>

                <div class="flex items-center justify-end space-x-4">
                    <x-button variant="primary">{{ __('Cari Riset') }}</x-button>
                    <a href="{{ route('research.index') }}">
                        <x-button type="button" variant="invert">{{ __('Reset') }}</x-button>
                    </a>
                </div>
            </form>
        </div>
    </section>

    <section id="riset" class="py-20">
        <div class="compact">
            <div class="flex flex-col mb-8 space-y-8">
                @forelse ($researches as $research)
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
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
                @empty
                    <div class="flex flex-col items-center justify-center">
                        <p class="text-sm text-gray-500">
                            {{ __('Belum ada riset') }}
                        </p>
                    </div>
                @endforelse
            </div>

            {{ $researches->links() }}
        </div>
    </section>
</x-home-layout>
