<x-app-layout>
    <h1 class="mb-2 text-4xl font-bold">{{ __('Pengaturan Akun') }}</h1>
    <p class="text-gray-600 mb-14">
        {{ __('Lorem ipsum dolor sit amet consectetur adipisicing elit. In iure repellendus, illum aliquid ab amet cupiditate nisi odit molestias! Corrupti!') }}
    </p>

    <!-- Session Status -->
    <x-session-message class="mb-4" :status="session('success') ?? session('error')" />

    <form method="post" action="{{ route('profile.update') }}" class="p-8 bg-white rounded-lg shadow"
        x-data="{
            $preview: null,
            $refs: { photo: null },
            init() {
                this.$refs.photo.addEventListener('change', e => {
                    this.$preview = URL.createObjectURL(e.target.files[0])
                })
            }
        }" x-init="init()" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="flex flex-col items-center justify-center mb-10">
            <input type="file" name="photo" class="hidden" x-ref="photo" accept="image/*">

            <div class="flex items-center justify-center w-32 h-32 mb-4 overflow-hidden border border-gray-300 rounded-full cursor-pointer hover:border-primary-500"
                x-on:click="$refs.photo.click()">

                @if (Auth::user()->photo)
                    <img x-show="!$preview" src="{{ asset(Auth::user()->photo) }}" alt="Profil"
                        class="object-cover w-full h-full">
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="w-5 h-5 text-primary-500" x-show="!$preview">
                        <circle cx="12" cy="8" r="5" />
                        <path d="M20 21a8 8 0 0 0-16 0" />
                    </svg>
                @endif

                <img x-show="$preview" x-bind:src="$preview" alt="Profil" class="object-cover w-full h-full">
            </div>

            <p class="text-sm text-center text-gray-600">
                {{ __('Upload gambar profil') }}
            </p>
            <x-input-error :messages="$errors->get('photo')" class="mt-2" />
        </div>

        <div class="grid gap-6 mb-6 md:grid-cols-2 lg:grid-cols-3">

            <!-- Name -->
            <div class="col-span-full">
                <x-input-label for="name" :value="__('Nama Lengkap')" />
                <x-text-input id="name" class="block w-full mt-1" type="text" name="name" required
                    autocomplete="name" :value="old('name', $user->name)" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="col-span-full">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block w-full mt-1 text-primary-500" type="email" name="email"
                    disabled readonly autocomplete="username" value="{{ $user->email }}" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Identifier -->
            <div class="col-span-full">
                <x-input-label for="identifier" :value="__('Nomor Induk')" />
                <x-text-input id="identifier" class="block w-full mt-1" type="text" name="identifier" required
                    autocomplete="identifier" :value="old('identifier', $researcher->identifier, $researcher->identifier)" />
                <x-input-error :messages="$errors->get('identifier')" class="mt-2" />
            </div>

            <!-- Date of Birth -->
            <div>
                <x-input-label for="dob" :value="__('Tanggal Lahir')" />
                <x-text-input id="dob" class="block w-full mt-1" type="date" name="dob" required
                    autocomplete="dob" :value="old('dob', $researcher->dob, $researcher->dob)" />
                <x-input-error :messages="$errors->get('dob')" class="mt-2" />
            </div>

            <!-- Gender -->
            <div>
                <x-input-label for="gender" :value="__('Jenis Kelamin')" />
                <x-select id="gender" class="block w-full mt-1" name="gender" required autocomplete="gender"
                    :value="old('gender', $researcher->gender)">

                    <option value="" @if (!old('gender', $researcher->gender)) selected @endif>
                        {{ __('Pilih Jenis Kelamin') }}
                    </option>
                    <option @if (old('gender', $researcher->gender) == 'male') selected @endif value="male">
                        {{ __('Laki-Laki') }}
                    </option>
                    <option @if (old('gender', $researcher->gender) == 'female') selected @endif value="female">
                        {{ __('Perempuan') }}
                    </option>

                </x-select>
                <x-input-error :messages="$errors->get('gender')" class="mt-2" />
            </div>

            <!-- Nationality -->
            <div>
                <x-input-label for="nationality" :value="__('Kewarganegaraan')" />
                <x-text-input id="nationality" class="block w-full mt-1" type="text" name="nationality" required
                    autocomplete="nationality" :value="old('nationality', $researcher->nationality)" />
                <x-input-error :messages="$errors->get('nationality')" class="mt-2" />
            </div>

            <!-- Religion -->
            <div>
                <x-input-label for="religion" :value="__('Agama')" />
                <x-select id="religion" class="block w-full mt-1" name="religion" required autocomplete="religion"
                    :value="old('nationality', $researcher->nationality)">

                    <option @if (old('religion', $researcher->religion) == '') selected @endif value="">
                        {{ __('Pilih Agama') }}
                    </option>
                    <option @if (old('religion', $researcher->religion) == 'islam') selected @endif value="islam">
                        {{ __('Islam') }}
                    </option>
                    <option @if (old('religion', $researcher->religion) == 'kristen') selected @endif value="kristen">
                        {{ __('Kristen') }}
                    </option>
                    <option @if (old('religion', $researcher->religion) == 'katolik') selected @endif value="katolik">
                        {{ __('Katolik') }}
                    </option>
                    <option @if (old('religion', $researcher->religion) == 'hindu') selected @endif value="hindu">
                        {{ __('Hindu') }}
                    </option>
                    <option @if (old('religion', $researcher->religion) == 'budha') selected @endif value="budha">
                        {{ __('Budha') }}
                    </option>
                    <option @if (old('religion', $researcher->religion) == 'konghucu') selected @endif value="konghucu">
                        {{ __('Kong Hu Cu') }}
                    </option>

                </x-select>
                <x-input-error :messages="$errors->get('religion')" class="mt-2" />
            </div>

            <!-- Phone -->
            <div>
                <x-input-label for="phone" :value="__('Nomor Telepon')" />
                <x-text-input id="phone" class="block w-full mt-1" type="text" name="phone" required
                    autocomplete="phone" :value="old('phone', $researcher->phone)" />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>

            <!-- Address -->
            <div class="col-span-full">
                <x-input-label for="address" :value="__('Alamat')" />
                <x-textarea-input id="address" rows="2" class="block w-full mt-1 resize-none" name="address"
                    required autocomplete="address">{{ old('address', $researcher->address) }}</x-textarea-input>
                <x-input-error :messages="$errors->get('address')" class="mt-2" />
            </div>
        </div>

        <div class="flex items-center justify-end space-x-4">
            <x-button variant="primary">{{ __('Simpan') }}</x-button>
            <x-button variant="ghost" type="reset">{{ __('Batal') }}</x-button>
        </div>
    </form>
</x-app-layout>
