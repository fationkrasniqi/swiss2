<x-layout title="{{ __('jobs.page_title') }} - Janira Care">

    {{-- Page Header --}}
    <section class="bg-white pt-28 pb-10 border-b border-gray-100">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-6">
                <div>
                    <span class="inline-flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-brand-pink mb-3">
                        <span class="w-2 h-2 rounded-full bg-brand-pink animate-pulse inline-block"></span>
                        {{ __('jobs.hiring_badge') }}
                    </span>
                    <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">{{ __('jobs.page_title') }}</h1>
                    <p class="mt-2 text-lg text-gray-500 max-w-xl">{{ __('jobs.page_subtitle') }}</p>
                </div>
                <div class="flex-shrink-0 flex flex-col items-end gap-3">
                    <div class="inline-flex items-center gap-4 rounded-2xl bg-gray-50 border border-gray-200 px-6 py-4">
                        <div class="text-center">
                            <div class="text-3xl font-black text-brand-blue">{{ $jobs->total() }}</div>
                            <div class="text-xs font-medium text-gray-500 mt-0.5">{{ __('jobs.open_positions') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Jobs Listing --}}
    <section class="bg-gray-50 py-12 min-h-[50vh]">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">

            @if(session('success'))
            <div class="mb-6 flex items-center gap-3 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-800">
                <svg class="h-5 w-5 flex-shrink-0 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="mb-6 flex items-center gap-3 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm font-medium text-red-800">
                <svg class="h-5 w-5 flex-shrink-0 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                {{ session('error') }}
            </div>
            @endif

            @php
                $cardImages = [
                    'https://images.unsplash.com/photo-1559757148-5c350d0d3c56?w=600&h=160&fit=crop&auto=format',
                    'https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?w=600&h=160&fit=crop&auto=format',
                    'https://images.unsplash.com/photo-1582750433449-648ed127bb54?w=600&h=160&fit=crop&auto=format',
                    'https://images.unsplash.com/photo-1576765608535-5f04d1e3f289?w=600&h=160&fit=crop&auto=format',
                ];
            @endphp

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7">
                @forelse($jobs as $i => $job)
                @php $img = $cardImages[$i % count($cardImages)]; @endphp
                <div class="group bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 flex flex-col">

                    {{-- Card Image --}}
                    <div class="relative h-28 overflow-hidden">
                        <img src="{{ $img }}"
                             alt="{{ $job->getLocalizedTitle() }}"
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                        {{-- Gradient overlay --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent"></div>

                        {{-- Badges on image --}}
                        <div class="absolute bottom-3 left-3 flex flex-wrap gap-1.5">
                            @if($job->employment_type)
                            <span class="inline-flex items-center rounded-full bg-white/90 backdrop-blur px-2.5 py-1 text-xs font-bold text-blue-700">
                                {{ $job->employment_type }}
                            </span>
                            @endif
                            @if($job->location)
                            <span class="inline-flex items-center gap-1 rounded-full bg-white/90 backdrop-blur px-2.5 py-1 text-xs font-semibold text-gray-700">
                                <svg class="h-3 w-3 text-brand-pink" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                                </svg>
                                {{ $job->location }}
                            </span>
                            @endif
                        </div>

                        {{-- Time badge top-right --}}
                        <div class="absolute top-3 right-3">
                            <span class="inline-flex items-center gap-1 rounded-full bg-black/40 backdrop-blur px-2.5 py-1 text-xs font-medium text-white">
                                <svg class="h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                {{ $job->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>

                    {{-- Card Body --}}
                    <div class="flex flex-col flex-1 p-5">
                        <h2 class="text-lg font-bold text-gray-900 group-hover:text-brand-blue transition-colors duration-200 leading-snug mb-3">
                            {{ $job->getLocalizedTitle() }}
                        </h2>

                        <p class="text-sm text-gray-500 leading-relaxed line-clamp-3 flex-1">
                            {{ Str::limit($job->getLocalizedDescription(), 160) }}
                        </p>

                        <div class="mt-5 pt-4 border-t border-gray-100">
                            <a href="{{ route('jobs.apply', $job) }}"
                               class="flex items-center justify-center gap-2 w-full rounded-xl bg-brand-blue py-2.5 text-sm font-bold text-white shadow-sm transition-all duration-200 hover:bg-brand-blue/90 hover:shadow-md">
                                {{ __('jobs.apply_now') }}
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-span-3 rounded-xl border border-dashed border-gray-200 bg-white p-16 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <h3 class="mt-5 text-lg font-semibold text-gray-900">{{ __('jobs.no_jobs_title') }}</h3>
                    <p class="mt-2 text-sm text-gray-500 max-w-sm mx-auto">{{ __('jobs.no_jobs_description') }}</p>
                    <a href="{{ url('/') }}#contact"
                       class="mt-6 inline-flex items-center gap-2 rounded-lg bg-brand-blue px-5 py-2.5 text-sm font-semibold text-white hover:opacity-90 transition">
                        {{ __('jobs.contact_for_future') }}
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                </div>
                @endforelse
            </div>

            @if($jobs->hasPages())
            <div class="mt-8">
                {{ $jobs->links() }}
            </div>
            @endif
        </div>
    </section>

</x-layout>