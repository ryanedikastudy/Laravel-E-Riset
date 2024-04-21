<x-app-layout>
    <h1 class="mb-2 text-4xl font-bold">{{ __('Kelola Riset') }}</h1>
    <p class="text-gray-600 mb-14">
        {{ __('Lorem ipsum dolor sit amet consectetur adipisicing elit. In iure repellendus, illum aliquid ab amet cupiditate nisi odit molestias! Corrupti!') }}
    </p>

    <div class="p-8 bg-white rounded-lg shadow">
        <div class="flex items-center justify-between mb-8">
            <h2 class="text-lg font-bold">{{ __('Riset Saya') }}</h2>

            <div class="flex items-center space-x-4">
                <form class="relative w-60" method="post" action="{{ route('researcher.research.search') }}">
                    @csrf
                    <x-text-input class="w-full" placeholder="Search..." name="search" value="{{ $search }}">
                    </x-text-input>
                    <button type="submit"
                        class="absolute flex items-center justify-center w-6 h-6 -translate-y-1/2 rounded-full top-1/2 right-2 text-primary-500">
                        <svg data-slot="icon" aria-hidden="true" fill="none" stroke-width="1.5" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </form>

                <a href ="{{ route('researcher.research.create') }}">
                    <x-button variant="primary">{{ __('Upload Baru') }}</x-button>
                </a>
            </div>
        </div>

        <div class="w-full mb-8 overflow-hidden overflow-x-auto border border-gray-200 rounded">
            <table>
                <thead>
                    <tr class="text-sm [&>th]:px-6 [&>th]:py-4">
                        <th class="w-auto text-start">{{ __('Judul dan Abstrak Riset') }}</th>
                        <th class="w-40 text-start">{{ __('Status') }}</th>
                        <th class="w-40">{{ __('Aksi') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($researches as $research)
                        <tr class="border-t border-gray-200 [&>td]:px-6 [&>td]:py-4">
                            <td>
                                <h5 class="mb-2 font-semibold text-md text-primary-500">
                                    {{ \Illuminate\Support\Str::headline($research->title) }}
                                </h5>
                                <p class="text-sm text-gray-500">
                                    {{ \Illuminate\Support\Str::words($research->abstract, 25) }}
                                </p>
                            </td>
                            <td class="text-sm font-medium text-yellow-500">
                                {{ \Illuminate\Support\Str::upper($research->status) }}
                            </td>
                            <td>
                                <a href="{{ route('research.show', $research->id) }}">
                                    <x-button variant="primary">{{ __('Lihat Detail') }}</x-button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $researches->links() }}
    </div>
</x-app-layout>
