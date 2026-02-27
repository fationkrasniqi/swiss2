<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>{{ $title ?? __('home.seo_title') }}</title>
    <meta name="description" content="{{ $metaDescription ?? __('home.seo_description') }}">
    <meta name="keywords" content="{{ $metaKeywords ?? __('home.seo_keywords') }}">
    
    <!-- Preload critical assets -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.0/css/all.min.css">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.webp') }}">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="min-h-screen bg-off-white text-gray-800 antialiased">
    {{-- Navbar --}}
    <x-navbar />

    {{-- Main Content --}}
    <main>
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <x-footer />

    @livewireScripts
    @stack('scripts')
</body>
</html>
