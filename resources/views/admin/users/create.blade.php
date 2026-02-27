<x-admin-layout title="Create User">
    <div class="flex items-center gap-4">
        <a href="{{ route('admin.users') }}" class="text-gray-400 transition hover:text-gray-600">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
        </a>
        <h1 class="text-2xl font-bold text-gray-900">Create User</h1>
    </div>

    <form method="POST" action="{{ route('admin.users.store') }}" class="mt-6 max-w-lg rounded-xl bg-white p-6 shadow-sm">
        @csrf

        <div class="space-y-5">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required
                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500">
                @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required
                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500">
                @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required minlength="8"
                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500">
                @error('password') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" required
                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-teal-500 focus:ring-teal-500">
            </div>

            <div class="flex flex-wrap gap-6 pt-2">
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="is_admin" value="1" {{ old('is_admin') ? 'checked' : '' }}
                           class="rounded border-gray-300 text-teal-600 focus:ring-teal-500">
                    <span class="text-sm text-gray-700">Admin</span>
                </label>
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="can_view_clients" value="1" {{ old('can_view_clients') ? 'checked' : '' }}
                           class="rounded border-gray-300 text-teal-600 focus:ring-teal-500">
                    <span class="text-sm text-gray-700">View Clients</span>
                </label>
                <label class="flex items-center gap-2">
                    <input type="checkbox" name="can_view_messages" value="1" {{ old('can_view_messages') ? 'checked' : '' }}
                           class="rounded border-gray-300 text-teal-600 focus:ring-teal-500">
                    <span class="text-sm text-gray-700">View Messages</span>
                </label>
            </div>
        </div>

        <div class="mt-6 flex gap-3">
            <button type="submit" class="rounded-lg bg-teal-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-teal-700">
                Create User
            </button>
            <a href="{{ route('admin.users') }}" class="rounded-lg bg-gray-100 px-5 py-2.5 text-sm font-medium text-gray-700 transition hover:bg-gray-200">
                Cancel
            </a>
        </div>
    </form>
</x-admin-layout>
