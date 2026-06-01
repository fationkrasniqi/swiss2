<x-admin-layout title="{{ __('admin.page_job_details') }}">
    <div class="mb-6">
        <a href="{{ route('admin.jobs.index') }}" class="text-blue-600 hover:text-blue-800">&larr; {{ __('admin.back_to_list') }}</a>
    </div>

    <div class="rounded-xl bg-white p-6 shadow-sm">
        <div class="mb-6 flex items-center justify-between">
            <h1 class="text-2xl font-bold text-gray-900">{{ $job->title }}</h1>
            <div class="flex gap-2">
                <a href="{{ route('admin.jobs.edit', $job) }}" class="rounded-lg bg-yellow-600 px-4 py-2 text-white hover:bg-yellow-700">
                    {{ __('admin.btn_edit') }}
                </a>
                <a href="{{ route('admin.jobs.applications', $job) }}" class="rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
                    {{ __('admin.view_applications', ['count' => $job->applications->count()]) }}
                </a>
            </div>
        </div>

        <div class="space-y-4">
            <div>
                <h3 class="text-sm font-medium text-gray-500">{{ __('admin.field_status') }}</h3>
                <p class="mt-1">
                    @if($job->is_active)
                        <span class="inline-flex rounded-full bg-green-100 px-3 py-1 text-sm font-semibold text-green-800">{{ __('admin.status_active') }}</span>
                    @else
                        <span class="inline-flex rounded-full bg-gray-100 px-3 py-1 text-sm font-semibold text-gray-800">{{ __('admin.status_inactive') }}</span>
                    @endif
                </p>
            </div>

            <div>
                <h3 class="text-sm font-medium text-gray-500">{{ __('admin.label_canton') }}</h3>
                <p class="mt-1 text-gray-900">{{ $job->canton->name ?? 'N/A' }}</p>
            </div>

            <div>
                <h3 class="text-sm font-medium text-gray-500">{{ __('admin.field_employment_type') }}</h3>
                <p class="mt-1 text-gray-900">{{ $job->employment_type ?? 'N/A' }}</p>
            </div>

            <div>
                <h3 class="text-sm font-medium text-gray-500">{{ __('admin.field_description') }}</h3>
                <p class="mt-1 whitespace-pre-line text-gray-900">{{ $job->description }}</p>
            </div>

            @if($job->requirements)
            <div>
                <h3 class="text-sm font-medium text-gray-500">{{ __('admin.field_requirements') }}</h3>
                <p class="mt-1 whitespace-pre-line text-gray-900">{{ $job->requirements }}</p>
            </div>
            @endif

            <div>
                <h3 class="text-sm font-medium text-gray-500">{{ __('admin.field_created') }}</h3>
                <p class="mt-1 text-gray-900">{{ $job->created_at->format('d.m.Y H:i') }}</p>
            </div>
        </div>
    </div>

    @if($job->applications->count() > 0)
    <div class="mt-6 rounded-xl bg-white p-6 shadow-sm">
        <h2 class="mb-4 text-xl font-bold text-gray-900">{{ __('admin.recent_applications') }}</h2>
        
        <div class="divide-y">
            @foreach($job->applications->take(5) as $application)
            <div class="py-4">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="font-medium text-gray-900">{{ $application->first_name }} {{ $application->last_name }}</p>
                        <p class="text-sm text-gray-600">{{ $application->email }} | {{ $application->phone }}</p>
                        <p class="text-xs text-gray-500">{{ $application->created_at->diffForHumans() }}</p>
                    </div>
                    <div class="flex items-center gap-2">
                        @if(!$application->is_read)
                            <span class="inline-flex rounded-full bg-blue-100 px-2 py-1 text-xs font-semibold text-blue-800">{{ __('admin.badge_new') }}</span>
                        @endif
                        <a href="{{ Storage::url($application->cv_path) }}" target="_blank" class="rounded bg-blue-600 px-3 py-1 text-sm text-white hover:bg-blue-700">
                            {{ __('admin.btn_view_cv') }}
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        @if($job->applications->count() > 5)
        <div class="mt-4 text-center">
            <a href="{{ route('admin.jobs.applications', $job) }}" class="text-blue-600 hover:text-blue-800">
                View all applications &rarr;
            </a>
        </div>
        @endif
    </div>
    @endif
</x-admin-layout>
