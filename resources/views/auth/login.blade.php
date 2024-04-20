<x-guest-layout>
    <x-session-message class="mb-4" :status="session('status')" />

    <div class="mb-8 text-center">
        <h1 class="text-2xl font-bold text-primary-500">{{ __('Masuk') }}</h1>
        <p class="text-sm text-gray-600">
            {{ __('Selamat Datang di Fitur Upload Riset!') }}
            <br />
            Help Desk : 085765456578
        </p>
    </div>

    <form method="POST" action="{{ route('login') }}" class="mb-4">
        @csrf

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Kata Sandi')" />
            <x-password-input id="password" class="block w-full mt-1" type="password" name="password" required
                autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="flex items-center justify-between mb-6">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="border-gray-300 rounded shadow-sm text-primary-600 focus:ring-primary-500" name="remember">
                <span class="text-sm text-gray-600 ms-2">{{ __('Ingat Saya') }}</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-gray-600">
                    {{ __('Lupa kata sandi?') }}
                </a>
            @endif
        </div>

        <x-button variant="primary" class="justify-center w-full">
            {{ __('Log in') }}
        </x-button>
    </form>

    <span class="block text-sm text-center text-primary-500">
        {{ __('Belum punya akun?') }}
        <a href="{{ route('register') }}">{{ __('Daftar') }}</a>
    </span>
</x-guest-layout>
