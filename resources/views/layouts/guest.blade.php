<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.cdnfonts.com">
    <link href="https://fonts.cdnfonts.com/css/satoshi" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen font-sans antialiased text-gray-900">
    @include('layouts.partials.navbar')

    <section id="hero" class="relative py-32">
        <img src="{{ asset('hero.png') }}" alt="Hero Image" class="absolute inset-0 object-cover w-full h-full">
        <div id="overlay" class="absolute inset-0 bg-overlay/60"></div>

        <div class="relative z-10 flex flex-col justify-center content">
            <div class="w-full max-w-md mx-auto overflow-hidden bg-white rounded-lg">
                <div class="w-full h-2 bg-primary-500"></div>

                <div class="p-8">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </section>

    @include('layouts.partials.footer')
</body>

</html>
