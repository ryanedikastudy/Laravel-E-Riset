<x-app-layout>
    <h1 class="mb-2 text-4xl font-bold">{{ __('Selamat Datang di Dashboard Peneliti') }}</h1>
    <p class="text-gray-600 mb-14">
        {{ __('Lorem ipsum dolor sit amet consectetur adipisicing elit. In iure repellendus, illum aliquid ab amet cupiditate nisi odit molestias! Corrupti!') }}
    </p>

    <div class="p-8 bg-white rounded-lg shadow">

        <div class="grid grid-cols-1 gap-8 mb-8 md:grid-cols-2 lg:grid-cols-3">
            <a href="{{ route('researcher.research.index') }}"
                class="relative px-6 py-4 bg-white border border-gray-200 rounded-lg">
                <div class="absolute bottom-0 right-0 p-2 m-4 text-white rounded-lg bg-primary-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="w-5 h-5">
                        <path d="M6 18h8" />
                        <path d="M3 22h18" />
                        <path d="M14 22a7 7 0 1 0 0-14h-1" />
                        <path d="M9 14h2" />
                        <path d="M9 12a2 2 0 0 1-2-2V6h6v4a2 2 0 0 1-2 2Z" />
                        <path d="M12 6V3a1 1 0 0 0-1-1H9a1 1 0 0 0-1 1v3" />
                    </svg>
                </div>

                <span class="mb-2 text-5xl font-extrabold">{{ $counts['research'] }}</span>
                <p class="font-medium text-gray-500">{{ __('Riset') }}</p>
            </a>

            <a href="{{ route('researcher.publication.index') }}"
                class="relative px-6 py-4 bg-white border border-gray-200 rounded-lg">
                <div class="absolute bottom-0 right-0 p-2 m-4 text-white rounded-lg bg-primary-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="w-5 h-5">
                        <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20" />
                        <path d="m8 13 4-7 4 7" />
                        <path d="M9.1 11h5.7" />
                    </svg>
                </div>

                <span class="mb-2 text-5xl font-extrabold">{{ $counts['publication'] }}</span>
                <p class="font-medium text-gray-500">{{ __('Publikasi') }}</p>
            </a>

            <a href="{{ route('researcher.patent.index') }}"
                class="relative px-6 py-4 bg-white border border-gray-200 rounded-lg">
                <div class="absolute bottom-0 right-0 p-2 m-4 text-white rounded-lg bg-primary-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="w-5 h-5">
                        <path
                            d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z" />
                        <path d="m3.3 7 8.7 5 8.7-5" />
                        <path d="M12 22V12" />
                    </svg>
                </div>

                <span class="mb-2 text-5xl font-extrabold">{{ $counts['patent'] }}</span>
                <p class="font-medium text-gray-500">{{ __('Paten') }}</p>
            </a>
        </div>

        <div class="grid items-start grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">

            <div class="row-span-2 border border-gray-200 rounded-lg md:col-span-2">
                <div class="flex flex-col divide-y divide-gray-200">
                    @foreach ($researches as $research)
                        <a href="{{ route('researcher.research.show', $research->id) }}"
                            class="flex flex-col p-6 space-y-2">
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
            </div>

            <div class="row-span-2 border border-gray-200 rounded-lg ">
                <div class="flex flex-col divide-y divide-gray-200">
                    @foreach ($publications as $publication)
                        <a href="{{ route('researcher.publication.show', $publication->id) }}"
                            class="flex flex-col p-6 space-y-2">
                            <h3 class="font-medium text-primary-500">
                                {{ \Illuminate\Support\Str::headline($publication->title) }}
                            </h3>

                            <div class="flex flex-col text-sm text-gray-500">
                                <span>
                                    {{ __('Dipublikasi pada') }}
                                    {{ \Carbon\Carbon::parse($publication->published_at)->format('d M Y') }}
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
