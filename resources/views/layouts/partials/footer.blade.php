<footer id="footer" class="py-20 bg-primary-500">
    <div class="grid items-start gap-6 content md:grid-cols-2 xl:grid-cols-4">
        <img src="{{ asset('logo.png') }}" alt="Logo" class="w-auto h-10">

        <div class="flex flex-col space-y-4 text-white">
            <h3 class="mb-2 text-xl font-semibold">{{ __('Hubungi Kami') }}</h3>

            <div class="flex items-start space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    viewBox="0 0 16 16" class="w-4 h-4 mt-1">
                    <path fill-rule="evenodd"
                        d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                </svg>

                <div class="text-start">
                    <h6 class="font-semibold">{{ __('Telepon') }}</h6>
                    <p class="text-sm">085765456578</p>
                </div>
            </div>

            <div class="flex items-start space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="w-4 h-4 mt-1" viewBox="0 0 16 16">
                    <path
                        d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z" />
                </svg>

                <div class="text-start">
                    <h6 class="font-semibold">{{ __('Email') }}</h6>
                    <p class="text-sm">balitbang@sumbarprov.go.id</p>
                </div>
            </div>

            <div class="flex items-start space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="w-4 h-4 mt-1" viewBox="0 0 16 16">
                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                </svg>

                <div class="text-start">
                    <h6 class="font-semibold">{{ __('Alamat') }}</h6>
                    <p class="text-sm">Jl. Jendral Sudirman No.1</p>
                </div>
            </div>

        </div>

        <div class="flex flex-col space-y-4 text-white">
            <h3 class="mb-2 text-xl font-semibold">{{ __('Tentang Kami') }}</h3>

            @php
                $abouts = [
                    [
                        'name' => 'Tentang Kami',
                        'route' => '#',
                    ],
                    [
                        'name' => 'Kontak',
                        'route' => '#',
                    ],
                    [
                        'name' => 'Kebijakan',
                        'route' => '#',
                    ],
                    [
                        'name' => 'Syarat & Ketentuan',
                        'route' => '#',
                    ],
                ];
            @endphp

            @foreach ($abouts as $link)
                <div class="flex items-start space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="w-4 h-4 mt-1" viewBox="0 0 16 16">
                        <path
                            d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                    </svg>

                    <div class="text-start">
                        <a href="{{ $link['route'] }}" class="font-semibold">{{ $link['name'] }}</a>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="flex flex-col space-y-4 text-white">
            <h3 class="mb-2 text-xl font-semibold">{{ __('Link Terkait') }}</h3>

            @php
                $others = [
                    [
                        'name' => 'Sumbarprov',
                        'route' => '#',
                    ],
                    [
                        'name' => 'Simaya Sumbar',
                        'route' => '#',
                    ],
                    [
                        'name' => 'Portal E-Government',
                        'route' => '#',
                    ],
                    [
                        'name' => 'Kominfo',
                        'route' => '#',
                    ],
                ];
            @endphp

            @foreach ($others as $link)
                <div class="flex items-start space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="w-4 h-4 mt-1" viewBox="0 0 16 16">
                        <path
                            d="m12.14 8.753-5.482 4.796c-.646.566-1.658.106-1.658-.753V3.204a1 1 0 0 1 1.659-.753l5.48 4.796a1 1 0 0 1 0 1.506z" />
                    </svg>

                    <div class="text-start">
                        <a href="{{ $link['route'] }}" class="font-semibold">{{ $link['name'] }}</a>
                    </div>
                </div>
            @endforeach
        </div>
</footer>

<section id="copyright" class="py-6 bg-primary-900">
    <div class="content">
        <p class="text-white">
            &copy; {{ date('Y') }}
            {{ __('Dinas Komunikasi dan Informatika Provinsi Sumatera Barat | By Tim E-Government
                                                                                                                                                                                                                                                                                                                                                                                                                                                Sumbar') }}
        </p>
    </div>
</section>
