<x-admin-layout title="Canton Pricing">
    <h1 class="text-2xl font-bold text-gray-900">Canton Pricing</h1>
    <p class="mt-1 text-sm text-gray-500">Set hourly rates for each canton. Changes update immediately for new bookings.</p>

    <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
        @foreach($cantons as $canton)
        <form method="POST" action="{{ route('admin.cantons.update', $canton) }}"
              class="flex items-center gap-3 rounded-xl bg-white p-4 shadow-sm transition hover:shadow-md">
            @csrf @method('PATCH')
            <div class="min-w-0 flex-1">
                <p class="truncate text-sm font-semibold text-gray-900">{{ $canton->name }}</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="text-sm text-gray-500">CHF</span>
                <input type="number" name="price_per_hour" value="{{ $canton->price_per_hour }}" step="0.50" min="0"
                       class="w-24 rounded-lg border-gray-300 text-right text-sm shadow-sm focus:border-teal-500 focus:ring-teal-500">
                <button type="submit" class="rounded-lg bg-teal-600 p-2 text-white transition hover:bg-teal-700" title="Save">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                </button>
            </div>
        </form>
        @endforeach
    </div>

    @if($cantons->isEmpty())
    <div class="mt-6 rounded-xl bg-amber-50 p-6 text-center">
        <p class="text-sm text-amber-800">No cantons found. Run <code class="rounded bg-amber-100 px-1.5 py-0.5 font-mono text-xs">php artisan db:seed --class=CantonSeeder</code> to populate.</p>
    </div>
    @endif
</x-admin-layout>
