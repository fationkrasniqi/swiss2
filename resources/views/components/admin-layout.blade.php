<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Admin' }} - Janira Care</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="min-h-screen bg-gray-50 antialiased" x-data="{ sidebarOpen: false }">
    {{-- Top Bar --}}
    <header class="fixed top-0 left-0 right-0 z-40 flex h-16 items-center justify-between border-b bg-white px-4 shadow-sm lg:pl-64">
        <button @click="sidebarOpen = !sidebarOpen" class="rounded-md p-2 text-gray-500 hover:bg-gray-100 lg:hidden">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
        </button>
        <div class="flex items-center gap-4">
            <span class="text-sm text-gray-600">{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="rounded-md px-3 py-1.5 text-sm text-red-600 transition hover:bg-red-50">Logout</button>
            </form>
        </div>
    </header>

    {{-- Sidebar --}}
    <aside 
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
        class="fixed inset-y-0 left-0 z-50 w-64 transform border-r bg-white transition-transform duration-200 lg:translate-x-0"
    >
        <div class="flex h-16 items-center gap-2 border-b px-4">
            <picture>
                <source srcset="{{ asset('images/logo.webp') }}" type="image/webp">
                <img src="{{ asset('images/logo.webp') }}" alt="Janira Care" class="h-8 w-auto">
            </picture>
            <span class="font-bold text-teal-700">Janira Care</span>
        </div>
        <nav class="mt-4 space-y-1 px-3">
            <a href="{{ route('dashboard') }}" class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs('dashboard') ? 'bg-teal-50 text-teal-700' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                Dashboard
            </a>
            
            @if(auth()->user()->canViewClients())
            <a href="{{ route('admin.clients') }}" class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs('admin.clients') ? 'bg-teal-50 text-teal-700' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Clients
            </a>
            @endif

            @if(auth()->user()->canViewMessages())
            <a href="{{ route('admin.messages') }}" class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs('admin.messages') ? 'bg-teal-50 text-teal-700' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                Messages
            </a>
            @endif

            @if(auth()->user()->isAdmin())
            <a href="{{ route('admin.users') }}" class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs('admin.users*') ? 'bg-teal-50 text-teal-700' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                Users
            </a>
            <a href="{{ route('admin.cantons') }}" class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium {{ request()->routeIs('admin.cantons') ? 'bg-teal-50 text-teal-700' : 'text-gray-700 hover:bg-gray-100' }}">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l5.447 2.724A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                Cantons / Prices
            </a>
            @endif

            <div class="my-4 border-t"></div>
            <a href="{{ url('/') }}" class="flex items-center gap-3 rounded-lg px-3 py-2 text-sm font-medium text-gray-700 hover:bg-gray-100" target="_blank">
                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                View Site
            </a>
        </nav>
    </aside>

    {{-- Overlay --}}
    <div x-show="sidebarOpen" @click="sidebarOpen = false" x-cloak class="fixed inset-0 z-40 bg-black/50 lg:hidden"></div>

    {{-- Content --}}
    <main class="pt-16 lg:pl-64">
        <div class="p-4 sm:p-6 lg:p-8">
            @if(session('success'))
                <div class="mb-4 rounded-lg bg-green-50 p-4 text-sm text-green-700">{{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="mb-4 rounded-lg bg-red-50 p-4 text-sm text-red-700">{{ session('error') }}</div>
            @endif
            {{ $slot }}
        </div>
    </main>

    @livewireScripts
    @stack('scripts')
</body>
</html>
