<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-8 text-center">
        <h1 class="text-2xl font-bold text-primary-500">{{ __('Register') }}</h1>
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
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')"
                required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-6">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block w-full mt-1" type="password"
                name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <x-button variant="primary" class="justify-center w-full">
            {{ __('Register') }}
        </x-button>
    </form>

    <span class="block text-sm text-center text-primary-500">
        {{ __('Sudah punya akun?') }}
        <a href="{{ route('login') }}">{{ __('Log in') }}</a>
    </span>
</x-guest-layout>
