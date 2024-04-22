<x-home-layout>
    <section class="py-20 bg-gray-200">
        <div class="compact">
            <div class="flex flex-col space-y-4">
                <div>
                    <h2 class="font-medium text-gray-400">{{ __('Judul Riset') }}</h2>
                    <h3 class="text-3xl font-bold">
                        {{ \Illuminate\Support\Str::headline($research->title) }}
                    </h3>
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
        </div>
    </section>

    <section class="py-20">
        <div class="compact">
            <div class="grid grid-cols-1 gap-10 lg:grid-cols-3">
                <div class="flex flex-col space-y-8 lg:col-span-2">
                    <div>
                        <h2 class="font-medium text-gray-400">{{ __('Abstrak') }}</h2>
                        <p class="text-justify">
                            {{ $research->abstract }}
                        </p>
                    </div>
                </div>

                <div class="flex flex-col space-y-8">
                    <div>
                        <h2 class="font-medium text-gray-400">{{ __('Peneliti') }}</h2>
                        <div class="flex items-center space-x-2">
                            <div
                                class="flex items-center justify-center w-10 h-10 overflow-hidden bg-white border border-gray-300 rounded-full">
                                @if ($research->researcher->user->photo)
                                    <img src="{{ asset($research->researcher->user->photo) }}" alt="Profil"
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
                            <span class="font-medium">
                                {{ $research->researcher->user->name }}
                            </span>
                        </div>
                    </div>

                    <div>
                        <h2 class="font-medium text-gray-400">{{ __('Status Riset') }}</h2>
                        @php
                            $color = $research->status == 'verified' ? 'text-green-500' : 'text-yellow-500';
                        @endphp
                        <span class="font-medium uppercase {{ $color }}">
                            {{ __($research->status) }}
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
    </section>
</x-home-layout>
