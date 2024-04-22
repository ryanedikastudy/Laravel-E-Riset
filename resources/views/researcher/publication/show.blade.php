<x-app-layout>
    <h1 class="mb-2 text-4xl font-bold">{{ __('Detail Publikasi') }}</h1>
    <p class="text-gray-600 mb-14">
        {{ __('Lorem ipsum dolor sit amet consectetur adipisicing elit. In iure repellendus, illum aliquid ab amet cupiditate nisi odit molestias! Corrupti!') }}
    </p>

    <div class="p-8 bg-white rounded-lg shadow">
        <div class="flex flex-col mb-8 space-y-2">
            <h2 class="font-medium text-gray-400">{{ __('Judul Publikasi') }}</h2>
            <h3 class="text-3xl font-bold">
                {{ \Illuminate\Support\Str::headline($publication->title) }}
            </h3>
            <h4 class="font-medium text-primary-500">{{ $user->name }}</h4>
        </div>

        <div class="grid grid-cols-1 gap-10 lg:grid-cols-3">
            <div class="flex flex-col space-y-8 lg:col-span-2">
                <div>
                    <h2 class="font-medium text-gray-400">{{ __('Judul Riset') }}</h2>
                    <p class="font-medium text-primary-500">
                        {{ $publication->research->title }}
                    </p>
                </div>

                <div>
                    <h2 class="font-medium text-gray-400">{{ __('Abstrak Riset') }}</h2>
                    <p>
                        {{ \Illuminate\Support\Str::words($publication->research->abstract, 25) }}
                    </p>
                </div>

                <div class="overflow-hidden border border-gray-200 rounded-md shadow-sm">
                    <iframe src="{{ asset($publication->document) }}" width="100%" height="500px" frameborder="0"
                        allowfullscreen>
                    </iframe>
                </div>
            </div>

            <div class="flex flex-col space-y-8">
                <div>
                    <h2 class="font-medium text-gray-400">{{ __('Status Publikasi') }}</h2>
                    <span class="font-medium text-yellow-500 uppercase">
                        {{ $publication->status }}
                    </span>
                </div>

                <div>
                    <h2 class="font-medium text-gray-400">{{ __('Tanggal Publikasi') }}</h2>
                    <span class="font-medium">
                        {{ \Carbon\Carbon::parse($publication->published_at)->format('d M Y') }}
                    </span>
                </div>

                <div>
                    <h2 class="font-medium text-gray-400">{{ __('Jumlah Halaman') }}</h2>
                    <span class="font-medium">
                        {{ $publication->pages }}
                    </span>
                </div>

                <div class="flex flex-col space-y-4">
                    <h2 class="font-medium text-gray-400">{{ __('Metrik Publikasi') }}</h2>
                    <div>
                        <div class="flex items-center justify-between mb-1 text-sm font-medium">
                            <label>{{ __('Views') }}</label>
                            <span>{{ $publication->views }}</span>
                        </div>
                        <div class="w-full h-2 rounded-full bg-primary-500"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
