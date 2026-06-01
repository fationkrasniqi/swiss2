<x-admin-layout title="{{ __('admin.applications_for', ['title' => $job->title]) }}">
    <div class="mb-6">
        <a href="{{ route('admin.jobs.show', $job) }}" class="text-blue-600 hover:text-blue-800">&larr; {{ __('admin.back_to_job') }}</a>
    </div>

    <div class="mb-4 rounded-xl bg-white p-6 shadow-sm">
        <h1 class="text-2xl font-bold text-gray-900">{{ __('admin.applications_for', ['title' => $job->title]) }}</h1>
        <p class="mt-2 text-gray-600">{{ __('admin.total_applications', ['count' => $applications->total()]) }}</p>
    </div>

    @if(session('success'))
    <div class="mb-4 rounded-lg bg-green-50 p-4 text-green-800">
        {{ session('success') }}
    </div>
    @endif

    <div class="overflow-hidden rounded-xl bg-white shadow-sm">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">{{ __('admin.col_name') }}</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">{{ __('admin.col_email') }}</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">{{ __('admin.col_phone') }}</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">{{ __('admin.col_cv') }}</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">{{ __('admin.col_cover_letter') }}</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">{{ __('admin.col_date') }}</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">{{ __('admin.col_status') }}</th>
                        <th class="px-4 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">{{ __('admin.col_actions') }}</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($applications as $application)
                    <tr class="hover:bg-gray-50 {{ !$application->is_read ? 'bg-blue-50' : '' }}">
                        <td class="px-4 py-3 text-sm font-medium text-gray-900">
                            {{ $application->first_name }} {{ $application->last_name }}
                        </td>
                        <td class="px-4 py-3 text-sm text-gray-600">{{ $application->email }}</td>
                        <td class="px-4 py-3 text-sm text-gray-600">{{ $application->phone }}</td>
                        <td class="px-4 py-3 text-sm">
                            <a href="{{ Storage::url($application->cv_path) }}" target="_blank" 
                               class="text-blue-600 hover:text-blue-800">
                                <svg class="h-5 w-5 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                {{ __('admin.btn_download') }}
                            </a>
                        </td>
                        <td class="px-4 py-3 text-sm">
                            @if($application->cover_letter)
                            <a href="{{ route('admin.applications.cover-letter-pdf', $application) }}" target="_blank"
                               class="inline-flex items-center gap-1 rounded-md bg-red-50 px-2.5 py-1 text-xs font-medium text-red-700 hover:bg-red-100 transition">
                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                </svg>
                                PDF
                            </a>
                            @else
                            <span class="text-gray-400 text-xs">—</span>
                            @endif
                        </td>
                        <td class="whitespace-nowrap px-4 py-3 text-sm text-gray-500">
                            {{ $application->created_at->format('d.m.Y H:i') }}
                        </td>
                        <td class="px-4 py-3 text-sm">
                            @if($application->is_read)
                                <span class="inline-flex rounded-full bg-gray-100 px-2 py-1 text-xs font-semibold text-gray-800">{{ __('admin.badge_read') }}</span>
                            @else
                                <span class="inline-flex rounded-full bg-blue-100 px-2 py-1 text-xs font-semibold text-blue-800">{{ __('admin.badge_new') }}</span>
                            @endif
                        </td>
                        <td class="px-4 py-3 text-sm">
                            @if(!$application->is_read)
                            <form action="{{ route('admin.applications.mark-read', $application) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-green-600 hover:text-green-800">
                                    {{ __('admin.btn_mark_read') }}
                                </button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="px-4 py-8 text-center text-sm text-gray-500">{{ __('admin.no_applications') }}</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="border-t px-4 py-3">
            {{ $applications->links() }}
        </div>
    </div>

    @if($applications->where('cover_letter', '!=', null)->count() > 0)
    <div class="mt-6 rounded-xl bg-white p-6 shadow-sm">
        <h2 class="mb-4 text-xl font-bold text-gray-900">{{ __('admin.cover_letters') }}</h2>
        <div class="space-y-4">
            @foreach($applications->where('cover_letter', '!=', null) as $application)
            <div class="border-l-4 border-blue-500 bg-gray-50 p-4 flex items-center justify-between">
                <p class="font-medium text-gray-900">{{ $application->first_name }} {{ $application->last_name }}</p>
                <a href="{{ asset('storage/' . $application->cover_letter) }}" target="_blank"
                   class="inline-flex items-center gap-1 text-sm text-blue-600 hover:text-blue-800 font-medium">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    {{ __('admin.btn_download') }}
                </a>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</x-admin-layout>
