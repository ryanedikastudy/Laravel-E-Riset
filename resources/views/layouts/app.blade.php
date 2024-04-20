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
    @stack('styles')

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen font-sans antialiased leading-relaxed text-gray-900 bg-background">
    @include('layouts.partials.app.navbar')

    <main class="flex">
        @include('layouts.partials.app.sidebar')

        <div class="flex-1 min-h-screen overflow-y-auto">
            <div class="py-20 compact">
                {{ $slot }}
            </div>
        </div>
    </main>

    @include('layouts.partials.app.footer')
    @stack('scripts')
</body>

</html>
