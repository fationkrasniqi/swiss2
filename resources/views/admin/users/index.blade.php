<x-admin-layout title="Users">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-900">Users</h1>
        <a href="{{ route('admin.users.create') }}" class="inline-flex items-center gap-2 rounded-lg bg-teal-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-teal-700">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            New User
        </a>
    </div>

    {{-- Search --}}
    <form method="GET" action="{{ route('admin.users') }}" class="mt-4">
        <div class="flex gap-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by name or email…"
                   class="w-full max-w-sm rounded-lg border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500">
            <button type="submit" class="rounded-lg bg-gray-100 px-4 py-2 text-sm font-medium text-gray-700 transition hover:bg-gray-200">Search</button>
        </div>
    </form>

    <div class="mt-6 overflow-hidden rounded-xl bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Name</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Email</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Admin</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Permissions</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Registered</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($users as $user)
                    <tr class="hover:bg-gray-50">
                        <td class="whitespace-nowrap px-4 py-3 text-sm font-medium text-gray-900">
                            {{ $user->name }}
                            @if($user->isSuperAdmin())
                                <span class="ml-1 inline-flex items-center rounded-full bg-amber-100 px-2 py-0.5 text-xs font-medium text-amber-800">Super</span>
                            @endif
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 text-sm text-gray-600">{{ $user->email }}</td>
                        <td class="whitespace-nowrap px-4 py-3 text-sm">
                            @if($user->isSuperAdmin())
                                <span class="inline-flex items-center rounded-full bg-green-100 px-2.5 py-0.5 text-xs font-medium text-green-800">Yes</span>
                            @else
                                <form method="POST" action="{{ route('admin.users.toggle-admin', $user) }}">
                                    @csrf @method('PATCH')
                                    <button type="submit" class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium transition
                                        {{ $user->is_admin ? 'bg-green-100 text-green-800 hover:bg-red-100 hover:text-red-800' : 'bg-gray-100 text-gray-600 hover:bg-green-100 hover:text-green-800' }}">
                                        {{ $user->is_admin ? 'Yes' : 'No' }}
                                    </button>
                                </form>
                            @endif
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 text-sm">
                            @if(!$user->isSuperAdmin())
                            <form method="POST" action="{{ route('admin.users.permissions', $user) }}" class="flex gap-3">
                                @csrf @method('PATCH')
                                <label class="flex items-center gap-1">
                                    <input type="checkbox" name="can_view_clients" value="1" {{ $user->can_view_clients ? 'checked' : '' }}
                                           class="rounded border-gray-300 text-teal-600 focus:ring-teal-500" onchange="this.form.submit()">
                                    <span class="text-xs text-gray-600">Clients</span>
                                </label>
                                <label class="flex items-center gap-1">
                                    <input type="checkbox" name="can_view_messages" value="1" {{ $user->can_view_messages ? 'checked' : '' }}
                                           class="rounded border-gray-300 text-teal-600 focus:ring-teal-500" onchange="this.form.submit()">
                                    <span class="text-xs text-gray-600">Messages</span>
                                </label>
                            </form>
                            @else
                                <span class="text-xs text-gray-400">All</span>
                            @endif
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 text-sm text-gray-500">{{ $user->created_at->format('d.m.Y') }}</td>
                        <td class="whitespace-nowrap px-4 py-3 text-sm">
                            @unless($user->isSuperAdmin() || $user->id === auth()->id())
                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Delete {{ $user->name }}?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                                </button>
                            </form>
                            @endunless
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-4 py-8 text-center text-sm text-gray-500">No users found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="border-t px-4 py-3">
            {{ $users->links() }}
        </div>
    </div>
</x-admin-layout>
