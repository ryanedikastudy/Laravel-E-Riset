<x-app-layout>
    <h1 class="mb-2 text-4xl font-bold">{{ __('Upload Publikasi') }}</h1>
    <p class="text-gray-600 mb-14">
        {{ __('Lorem ipsum dolor sit amet consectetur adipisicing elit. In iure repellendus, illum aliquid ab amet cupiditate nisi odit molestias! Corrupti!') }}
    </p>

    <!-- Session Status -->
    <x-session-message class="mb-4" :status="session('success') || session('error')" />

    <form method="post" action="{{ route('researcher.publication.store') }}"
        class="grid gap-8 p-8 bg-white rounded-lg shadow" x-data="{
            $show: false,
            $refs: { document: null, preview: null },
            init() {
                this.$refs.document.addEventListener('change', e => {
                    this.$show = true;
                    $url = URL.createObjectURL(e.target.files[0]);
                    PDFObject.embed($url, $refs.preview, {
                        download: false,
                        page: 1,
                        height: '100%',
                        width: '100%',
                        view: 'Fit',
                        scroll: 'auto',
                        enableAnnotations: false,
                        enableHistory: false,
                        enableSearch: false,
                        enableZoom: false,
                        onPageRender: function(pageNumber, page) {
                            page.getTextContent().then(function(textContent) {
                                console.log(textContent);
                            });
                        }
                    });
                })
            }
        }" x-init="init()"
        enctype="multipart/form-data">
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

                <!-- Research -->
                <div class="col-span-full">
                    <x-input-label for="research_id" :value="__('Judul Riset Terkait')" />
                    <x-select id="research_id" class="block w-full mt-1" name="research_id" required
                        autocomplete="research_id" :value="old('research_id')">

                        <option @if (old('research_id') == '') selected @endif value="">
                            {{ __('Pilih Judul Penelitian') }}
                        </option>

                        @foreach ($researches as $research)
                            <option @if (old('research_id') == $research->id) selected @endif value="{{ $research->id }}">
                                {{ \Illuminate\Support\Str::headline($research->title) }}
                            </option>
                        @endforeach
                    </x-select>
                    <x-input-error :messages="$errors->get('research_id')" class="mt-2" />
                </div>

                <!-- Title -->
                <div class="col-span-full">
                    <x-input-label for="title" :value="__('Judul Publikasi')" />
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

                <!-- Document Pages -->
                <div>
                    <x-input-label for="pages" :value="__('Halaman')" />
                    <x-text-input id="pages" class="block w-full mt-1" type="number" name="pages" required
                        autocomplete="pages" :value="old('pages')" />
                    <x-input-error :messages="$errors->get('pages')" class="mt-2" />
                </div>

                <!-- Document -->
                <div class="flex items-center justify-center border border-gray-200 rounded-md cursor-pointer h-80 col-span-full"
                    x-on:click="$refs.document.click()">
                    <x-text-input id="document" class="hidden" name="document" accept="application/pdf"
                        x-ref="document" type="file" />

                    <span class="flex items-center text-sm text-gray-500" x-show="$show == false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="w-4 h-4 mr-2">
                            <path d="M4 19.5v-15A2.5 2.5 0 0 1 6.5 2H20v20H6.5a2.5 2.5 0 0 1 0-5H20" />
                            <path d="m9 9.5 2 2 4-4" />
                        </svg>
                        {{ __('Upload dokumen') }}
                    </span>

                    <div x-ref="preview" class="w-full h-full" x-show="$show == true"> </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end space-x-4">
            <x-button variant="primary">{{ __('Simpan') }}</x-button>
            <x-button variant="outline" type="button" x-on:click="$refs.document.click()">
                {{ __('Change') }}
            </x-button>
            <x-button variant="ghost" type="reset">{{ __('Batal') }}</x-button>
        </div>
    </form>

    @push('scripts')
        <script src="https://unpkg.com/pdfobject"></script>
    @endpush
</x-app-layout>
