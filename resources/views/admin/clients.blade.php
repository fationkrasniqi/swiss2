<x-admin-layout title="Clients">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold text-gray-900">Clients</h1>
    </div>

    <div class="mt-6 overflow-hidden rounded-xl bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Name</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Email</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Phone</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Canton</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Services</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Total</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Date</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($clients as $client)
                    <tr class="hover:bg-gray-50">
                        <td class="whitespace-nowrap px-4 py-3 text-sm font-medium text-gray-900">{{ $client->full_name }}</td>
                        <td class="whitespace-nowrap px-4 py-3 text-sm text-gray-600">{{ $client->email }}</td>
                        <td class="whitespace-nowrap px-4 py-3 text-sm text-gray-600">{{ $client->full_phone }}</td>
                        <td class="whitespace-nowrap px-4 py-3 text-sm text-gray-600">{{ $client->canton }}</td>
                        <td class="max-w-xs truncate px-4 py-3 text-sm text-gray-600" title="{{ $client->services }}">{{ $client->services }}</td>
                        <td class="whitespace-nowrap px-4 py-3 text-sm font-semibold text-teal-700">CHF {{ $client->total_price }}</td>
                        <td class="whitespace-nowrap px-4 py-3 text-sm text-gray-500">{{ $client->created_at->format('d.m.Y') }}</td>
                        <td class="whitespace-nowrap px-4 py-3 text-sm">
                            <div class="flex gap-2">
                                <a href="{{ route('admin.clients.pdf', $client) }}" target="_blank" class="text-blue-600 hover:text-blue-800" title="View PDF">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                                </a>
                                <a href="{{ route('admin.clients.pdf.download', $client) }}" class="text-green-600 hover:text-green-800" title="Download PDF">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="px-4 py-8 text-center text-sm text-gray-500">No clients yet.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="border-t px-4 py-3">
            {{ $clients->links() }}
        </div>
    </div>
</x-admin-layout>
