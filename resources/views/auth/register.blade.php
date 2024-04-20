<x-guest-layout>
    <x-session-message class="mb-4" :status="session('status')" />

    <div class="mb-8 text-center">
        <h1 class="text-2xl font-bold text-primary-500">{{ __('Daftar') }}</h1>
        <p class="text-sm text-gray-600">
            {{ __('Selamat Datang di Fitur Upload Riset!') }}
            <br />
            Help Desk : 085765456578
        </p>
    </div>

    <form method="POST" action="{{ route('register') }}" class="mb-4">
        @csrf

        <!-- Name -->
        <div class="mb-4">
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')"
                required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Identifier -->
        <div class="mb-4">
            <x-input-label for="identifier" :value="__('Nomor Induk')" />
            <x-text-input id="identifier" class="block w-full mt-1" type="text" name="identifier" :value="old('identifier')"
                autocomplete="identifier" required />
            <x-input-error :messages="$errors->get('identifier')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-6">
            <x-input-label for="password" :value="__('Kata Sandi')" />
            <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <x-button variant="primary" class="justify-center w-full">
            {{ __('Register') }}
        </x-button>
    </form>

    <span class="block text-sm text-center text-primary-500">
        {{ __('Sudah punya akun?') }}
        <a href="{{ route('login') }}">{{ __('Masuk') }}</a>
    </span>
</x-guest-layout>
