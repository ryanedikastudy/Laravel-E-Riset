<x-app-layout>
    <h1 class="mb-2 text-4xl font-bold">{{ __('Upload Riset') }}</h1>
    <p class="text-gray-600 mb-14">
        {{ __('Lorem ipsum dolor sit amet consectetur adipisicing elit. In iure repellendus, illum aliquid ab amet cupiditate nisi odit molestias! Corrupti!') }}
    </p>

    <!-- Session Status -->
    <x-session-message class="mb-4" :status="session('success') || session('error')" />

    <form method="post" action="{{ route('researcher.research.store') }}"
        class="grid gap-8 p-8 bg-white rounded-lg shadow">
        @csrf

        <!-- Breadcrumb -->
        <div class="flex items-center space-x-2 text-sm text-gray-500">
            <span class="text-primary-500">
                {{ __('Lengkapi Data') }}
            </span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                <path d="m9 18 6-6-6-6" />
            </svg>
            <span>
                {{ __('Konfirmasi') }}
            </span>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                <path d="m9 18 6-6-6-6" />
            </svg>
            <span>
                {{ __('Selesai') }}
            </span>
        </div>

        <div class="border border-gray-200 rounded-md shadow-sm">
            <div class="px-8 py-4 border-b border-gray-200">
                <h2 class="font-bold">
                    {{ __('Lengkapi Data') }}
                </h2>
            </div>

            <div class="grid gap-6 p-8 md:grid-cols-2 lg:grid-cols-3">
                <!-- Title -->
                <div class="col-span-full">
                    <x-input-label for="title" :value="__('Judul Penelitian')" />
                    <x-text-input id="title" class="block w-full mt-1" type="text" name="title" required
                        autocomplete="title" :value="old('title')" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <!-- Publish Date -->
                <div>
                    <x-input-label for="published_at" :value="__('Tanggal Publikasi')" />
                    <x-text-input id="published_at" class="block w-full mt-1" type="date" name="published_at"
                        required autocomplete="published_at" :value="old('published_at')" />
                    <x-input-error :messages="$errors->get('published_at')" class="mt-2" />
                </div>

                <!-- Type -->
                <div>
                    <x-input-label for="research_type_id" :value="__('Tipe Penelitian')" />
                    <x-select id="research_type_id" class="block w-full mt-1" name="research_type_id" required
                        autocomplete="research_type_id" :value="old('type')">

                        <option @if (old('research_type_id') == '') selected @endif value="">
                            {{ __('Pilih Tipe Penelitian') }}
                        </option>

                        @foreach ($types as $type)
                            <option @if (old('research_type_id') == $type->id) selected @endif value="{{ $type->id }}">
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </x-select>
                    <x-input-error :messages="$errors->get('research_type_id')" class="mt-2" />
                </div>

                <!-- Field -->
                <div>
                    <x-input-label for="research_field_id" :value="__('Bidang Penelitian')" />
                    <x-select id="research_field_id" class="block w-full mt-1" name="research_field_id" required
                        autocomplete="research_field_id" :value="old('field')">

                        <option @if (old('research_field_id') == '') selected @endif value="">
                            {{ __('Pilih Bidang Penelitian') }}
                        </option>

                        @foreach ($fields as $field)
                            <option @if (old('research_field_id') == $field->id) selected @endif value="{{ $field->id }}">
                                {{ $field->name }}
                            </option>
                        @endforeach
                    </x-select>
                    <x-input-error :messages="$errors->get('research_field_id')" class="mt-2" />
                </div>

                <!-- Location -->
                <div class="col-span-full">
                    <x-input-label for="location" :value="__('Lokasi Penelitian')" />
                    <x-textarea-input id="location" rows="2" class="block w-full mt-1 resize-none"
                        name="location" required autocomplete="location">{{ old('location') }}</x-textarea-input>
                    <x-input-error :messages="$errors->get('location')" class="mt-2" />
                </div>

                <!-- Abstract -->
                <div class="col-span-full">
                    <x-input-label for="abstract" :value="__('Abstract')" />
                    <x-textarea-input id="abstract" rows="5" class="block w-full mt-1 resize-none"
                        name="abstract" required autocomplete="abstract">{{ old('abstract') }}</x-textarea-input>
                    <x-input-error :messages="$errors->get('abstract')" class="mt-2" />
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end space-x-4">
            <x-button variant="primary">{{ __('Simpan') }}</x-button>
            <x-button variant="ghost" type="reset">{{ __('Batal') }}</x-button>
        </div>
    </form>
</x-app-layout>
