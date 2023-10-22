<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>
    <link rel="shortcut icon" href="/assets/logo-masjid.png" type="image/x-icon">

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @stack('head')
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="min-h-screen font-sans antialiased bg-gray-100">
    <livewire:dashboard.navbar />

    <!-- Page Content -->
    <main class="p-4 sm:ml-64">
        <div class="mt-16">
            {{ $slot }}
        </div>
    </main>
</body>

</html>