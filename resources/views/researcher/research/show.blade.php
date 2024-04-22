<x-app-layout>
    <h1 class="mb-2 text-4xl font-bold">{{ __('Detail Riset') }}</h1>
    <p class="text-gray-600 mb-14">
        {{ __('Lorem ipsum dolor sit amet consectetur adipisicing elit. In iure repellendus, illum aliquid ab amet cupiditate nisi odit molestias! Corrupti!') }}
    </p>

    <div class="p-8 bg-white rounded-lg shadow">
        <div class="flex flex-col mb-8 space-y-2">
            <h2 class="font-medium text-gray-400">{{ __('Judul Riset') }}</h2>
            <h3 class="text-3xl font-bold">
                {{ \Illuminate\Support\Str::headline($research->title) }}
            </h3>
            <h4 class="font-medium text-primary-500">{{ $user->name }}</h4>
        </div>

        <div class="grid grid-cols-1 gap-10 lg:grid-cols-3">
            <div class="flex flex-col space-y-8 lg:col-span-2">
                <div>
                    <h2 class="font-medium text-gray-400">{{ __('Abstrak') }}</h2>
                    <p class="text-justify">
                        {{ $research->abstract }}
                    </p>
                </div>

                <div>
                    <h2 class="font-medium text-gray-400">{{ __('Bidang Riset') }}</h2>
                    <span class="font-medium text-primary-500">
                        {{ $research->field->name }}
                    </span>
                </div>

                <div>
                    <h2 class="font-medium text-gray-400">{{ __('Tipe Riset') }}</h2>
                    <span class="font-medium text-primary-500">
                        {{ $research->type->name }}
                    </span>
                </div>
            </div>

            <div class="flex flex-col space-y-8">
                <div>
                    <h2 class="font-medium text-gray-400">{{ __('Status Riset') }}</h2>

                    @php
                        $color = $research->status == 'verified' ? 'text-green-500' : 'text-yellow-500';
                    @endphp
                    <span class="font-medium uppercase {{ $color }}">
                        {{ $research->status }}
                    </span>
                </div>

                <div>
                    <h2 class="font-medium text-gray-400">{{ __('Tanggal Publikasi Riset') }}</h2>
                    <span class="font-medium">
                        {{ \Carbon\Carbon::parse($research->published_at)->format('d M Y') }}
                    </span>
                </div>

                <div>
                    <h2 class="font-medium text-gray-400">{{ __('Lokasi Riset') }}</h2>
                    <span class="font-medium">
                        {{ $research->location }}
                    </span>
                </div>

                <div class="flex flex-col space-y-4">
                    <h2 class="font-medium text-gray-400">{{ __('Metrik Riset') }}</h2>
                    <div>
                        <div class="flex items-center justify-between mb-1 text-sm font-medium">
                            <label>{{ __('Views') }}</label>
                            <span>{{ $research->views }}</span>
                        </div>
                        <div class="w-full h-2 rounded-full bg-primary-500"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
