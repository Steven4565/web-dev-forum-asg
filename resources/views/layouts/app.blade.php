<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    @if (request()->is('/'))
    <div>
        <div class="w-full bg-white border-b border-gray-100" style="margin: 0; padding: 0;">
            <div class="w-5/6 mx-auto">
                <livewire:layout.navigation />
            </div>
        </div>
        <main>
            {{ $slot }}
        </main>
    </div>
    @else
    <!-- Default Layout -->
    <div class="w-5/6 mx-auto">
        <livewire:layout.navigation />
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    @endif
</body>

</html>