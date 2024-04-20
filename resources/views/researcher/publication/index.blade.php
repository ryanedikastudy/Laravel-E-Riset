<x-app-layout>
    <h1 class="mb-2 text-4xl font-bold">{{ __('Daftar Publikasi') }}</h1>
    <p class="text-gray-600 mb-14">
        {{ __('Lorem ipsum dolor sit amet consectetur adipisicing elit. In iure repellendus, illum aliquid ab amet cupiditate nisi odit molestias! Corrupti!') }}
    </p>

    <div class="p-8 bg-white rounded-lg shadow">
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 lg:gap-8">
            @foreach ($publications as $publication)
                <div class="p-6 bg-white border border-gray-300 rounded-lg">
                    <h3 class="mb-2 text-primary-500">
                        {{ $publication['title'] }}
                    </h3>
                    <p class="text-sm text-gray-500">
                        {{ $publication['author'] }} &#x2022; {{ __('Bidang') }} {{ $publication['field'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
