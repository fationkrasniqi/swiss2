<x-admin-layout title="Dashboard">
    <h1 class="text-2xl font-bold text-gray-900">Dashboard</h1>
    <p class="mt-2 text-gray-600">Welcome, {{ auth()->user()->name }}!</p>

    <div class="mt-8 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
        @if(auth()->user()->canViewClients())
        <a href="{{ route('admin.clients') }}" class="rounded-xl bg-white p-6 shadow-sm transition hover:shadow-md">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-blue-100">
                    <svg class="h-6 w-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Client::count() }}</p>
                    <p class="text-sm text-gray-500">Clients</p>
                </div>
            </div>
        </a>
        @endif

        @if(auth()->user()->canViewMessages())
        <a href="{{ route('admin.messages') }}" class="rounded-xl bg-white p-6 shadow-sm transition hover:shadow-md">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-green-100">
                    <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-900">{{ \App\Models\ContactMessage::count() }}</p>
                    <p class="text-sm text-gray-500">Messages</p>
                </div>
            </div>
        </a>
        @endif

        @if(auth()->user()->isAdmin())
        <a href="{{ route('admin.users') }}" class="rounded-xl bg-white p-6 shadow-sm transition hover:shadow-md">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-purple-100">
                    <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-900">{{ \App\Models\User::count() }}</p>
                    <p class="text-sm text-gray-500">Users</p>
                </div>
            </div>
        </a>

        <a href="{{ route('admin.cantons') }}" class="rounded-xl bg-white p-6 shadow-sm transition hover:shadow-md">
            <div class="flex items-center gap-4">
                <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-amber-100">
                    <svg class="h-6 w-6 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l5.447 2.724A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                </div>
                <div>
                    <p class="text-2xl font-bold text-gray-900">{{ \App\Models\Canton::count() }}</p>
                    <p class="text-sm text-gray-500">Cantons</p>
                </div>
            </div>
        </a>
        @endif
    </div>
</x-admin-layout>
