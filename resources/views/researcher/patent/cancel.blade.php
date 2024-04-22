<x-app-layout>
    <h1 class="mb-2 text-4xl font-bold">{{ __('Upload Paten') }}</h1>
    <p class="text-gray-600 mb-14">
        {{ __('Lorem ipsum dolor sit amet consectetur adipisicing elit. In iure repellendus, illum aliquid ab amet cupiditate nisi odit molestias! Corrupti!') }}
    </p>

    <!-- Session Status -->
    <x-session-message class="mb-4" :status="session('success') ?? session('error')" />

    <div class="grid gap-8 p-8 bg-white rounded-lg shadow">

        <!-- Breadcrumb -->
        <div class="flex items-center space-x-2 text-sm text-gray-500">
            <span>
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
            <span class="text-primary-500">
                {{ __('Cancel') }}
            </span>
        </div>

        <div class="border border-gray-200 rounded-md shadow-sm">
            <div class="px-8 py-4 border-b border-gray-200">
                <h2 class="font-bold">
                    {{ __('Cancel') }}
                </h2>
            </div>

            <div class="p-8">
                <p class="text-sm text-gray-500">
                    {{ __('Patenmu berhasil dibatalkan, untuk membuat publikasi baru kamu dapat melakukan proses upload kembali, periksa informasi yang diinputkan sebelum melakukan konfirmasi. Jika sudah yakin, klik ”Simpan".') }}
                </p>
            </div>
        </div>

        <div class="flex items-center justify-end space-x-2">
            <a href="{{ route('researcher.patent.index') }}">
                <x-button variant="primary">{{ __('Selesai') }}</x-button>
            </a>
        </div>
    </div>
</x-app-layout>
