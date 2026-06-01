<x-layout title="{{ __('jobs.page_title') }} - Janira Care">

    {{-- Enhanced Header --}}
    <section class="bg-gradient-to-br from-blue-50 via-white to-teal-50 pt-32 pb-16 border-b border-gray-200">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <span class="inline-flex items-center gap-2 rounded-full bg-blue-100 px-4 py-2 text-sm font-semibold text-brand-blue mb-4 shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-brand-blue animate-pulse"></span>
                    {{ __('jobs.hiring_badge') }}
                </span>
                <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-5 leading-tight">
                    {{ __('jobs.page_title') }}
                </h1>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto mb-8 leading-relaxed">
                    {{ __('jobs.page_subtitle') }}
                </p>
                
                {{-- Key Statistics --}}
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 max-w-3xl mx-auto mb-6">
                    {{-- Open Positions --}}
                    <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-200">
                        <div class="flex items-center justify-center mb-2">
                            <div class="bg-blue-100 rounded-full p-2">
                                <svg class="h-6 w-6 text-brand-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-1">{{ $jobs->total() }}</h3>
                        <p class="text-xs font-medium text-gray-600">{{ __('jobs.open_positions') }}</p>
                    </div>

                    {{-- Locations --}}
                    <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-200">
                        <div class="flex items-center justify-center mb-2">
                            <div class="bg-teal-100 rounded-full p-2">
                                <svg class="h-6 w-6 text-teal-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-1">{{ $jobs->pluck('location')->unique()->count() }}</h3>
                        <p class="text-xs font-medium text-gray-600">@if(app()->getLocale() === 'de') Standorte @else Locations @endif</p>
                    </div>

                    {{-- Team Size --}}
                    <div class="bg-white rounded-xl p-4 shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-200">
                        <div class="flex items-center justify-center mb-2">
                            <div class="bg-pink-100 rounded-full p-2">
                                <svg class="h-6 w-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                            </div>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-1">5+</h3>
                        <p class="text-xs font-medium text-gray-600">@if(app()->getLocale() === 'de') Team-Mitglieder @else Team Members @endif</p>
                    </div>
                </div>

                {{-- Benefits Bar --}}
                <div class="flex flex-wrap items-center justify-center gap-4 text-xs text-gray-600">
                    <div class="flex items-center gap-1.5">
                        <svg class="h-4 w-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-medium">@if(app()->getLocale() === 'de') Wettbewerbsfähiges Gehalt @else Competitive Salary @endif</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <svg class="h-4 w-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-medium">@if(app()->getLocale() === 'de') Flexible Arbeitszeiten @else Flexible Hours @endif</span>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <svg class="h-4 w-4 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-medium">@if(app()->getLocale() === 'de') Karriereentwicklung @else Career Growth @endif</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Jobs List --}}
    <section class="bg-gray-50 py-16 mb-12">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            @if(session('success'))
            <div class="mb-6 flex items-center gap-3 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-800">
                <svg class="h-5 w-5 text-green-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                {{ session('success') }}
            </div>
            @endif

            @if(session('error'))
            <div class="mb-6 flex items-center gap-3 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm font-medium text-red-800">
                <svg class="h-5 w-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                {{ session('error') }}
            </div>
            @endif

            <div class="flex flex-col lg:flex-row gap-8" x-data="jobFilter()" x-init="init()">
                {{-- Sidebar Filter --}}
                <aside class="lg:w-64 flex-shrink-0">
                    <div class="bg-white rounded-xl border border-gray-200 p-5 sticky top-24">
                        <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                            <svg class="h-5 w-5 text-brand-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                            </svg>
                            @if(app()->getLocale() === 'de') Filtern nach Kanton @else Filter by Canton @endif
                        </h3>

                        <div class="space-y-2">
                            {{-- All Jobs --}}
                            <button @click="filterByCanton(null)" type="button"
                               class="block rounded-lg px-4 py-2.5 text-sm font-medium transition w-full text-left"
                               :class="selectedCanton === null ? 'bg-brand-blue text-white' : 'text-gray-700 hover:bg-gray-100'">
                                <div class="flex items-center justify-between">
                                    <span>@if(app()->getLocale() === 'de') Alle Stellen @else All Jobs @endif</span>
                                    <span class="inline-flex items-center justify-center rounded-full px-2 py-0.5 text-xs font-semibold"
                                          :class="selectedCanton === null ? 'bg-white text-brand-blue' : 'bg-gray-200 text-gray-600'">
                                        {{ $jobs->total() }}
                                    </span>
                                </div>
                            </button>

                            {{-- Canton Filters --}}
                            @foreach($cantons as $canton)
                                <button @click="filterByCanton({{ $canton->id }})" type="button"
                                   class="block rounded-lg px-4 py-2.5 text-sm font-medium transition w-full text-left"
                                   :class="selectedCanton === {{ $canton->id }} ? 'bg-brand-blue text-white' : 'text-gray-700 hover:bg-gray-100'">
                                    <div class="flex items-center justify-between">
                                        <span>{{ $canton->name }}</span>
                                        <span class="inline-flex items-center justify-center rounded-full px-2 py-0.5 text-xs font-semibold"
                                              :class="selectedCanton === {{ $canton->id }} ? 'bg-white text-brand-blue' : 'bg-gray-200 text-gray-600'">
                                            {{ $canton->jobs_count }}
                                        </span>
                                    </div>
                                </button>
                            @endforeach
                        </div>

                        <div x-show="selectedCanton !== null" class="mt-4 pt-4 border-t border-gray-200">
                            <button @click="filterByCanton(null)" type="button"
                               class="flex items-center gap-2 text-sm font-medium text-gray-600 hover:text-brand-blue transition">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                @if(app()->getLocale() === 'de') Filter zurücksetzen @else Clear Filter @endif
                            </button>
                        </div>
                    </div>
                </aside>

                {{-- Jobs Grid --}}
                <div class="flex-1">
                    <div x-show="loading" class="flex justify-center items-center py-12">
                        <svg class="animate-spin h-8 w-8 text-brand-blue" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </div>
                    
                    <div x-show="!loading" id="jobs-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        {{-- Jobs will be rendered here by Alpine.js --}}
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
        function jobFilter() {
            return {
                selectedCanton: {{ request('canton') ?? 'null' }},
                loading: false,
                jobs: @json($jobs->items()),
                
                init() {
                    this.renderJobs();
                },
                
                filterByCanton(cantonId) {
                    this.selectedCanton = cantonId;
                    this.loading = true;
                    
                    const url = cantonId 
                        ? '{{ route("jobs.index") }}?canton=' + cantonId
                        : '{{ route("jobs.index") }}';
                    
                    // Update URL without reload
                    window.history.pushState({}, '', url);
                    
                    // Fetch jobs
                    axios.get(url, {
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => {
                        this.jobs = response.data.jobs;
                        this.renderJobs();
                        this.loading = false;
                    })
                    .catch(error => {
                        console.error('Error fetching jobs:', error);
                        this.loading = false;
                    });
                },
                
                renderJobs() {
                    const grid = document.getElementById('jobs-grid');
                    if (!grid) return;
                    
                    if (this.jobs.length === 0) {
                        grid.innerHTML = `
                            <div class="col-span-full rounded-lg border-2 border-dashed border-gray-300 bg-white p-12 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                                <h3 class="text-lg font-semibold text-gray-900 mb-2">{{ __('jobs.no_jobs_title') }}</h3>
                                <p class="text-sm text-gray-500 max-w-sm mx-auto mb-6">{{ __('jobs.no_jobs_description') }}</p>
                                <a href="{{ url('/') }}#contact" class="inline-flex items-center gap-2 rounded-lg bg-brand-blue px-5 py-2.5 text-sm font-semibold text-white hover:bg-blue-700 transition">
                                    {{ __('jobs.contact_for_future') }}
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </a>
                            </div>
                        `;
                        return;
                    }
                    
                    grid.innerHTML = this.jobs.map(job => this.renderJobCard(job)).join('');
                },
                
                renderJobCard(job) {
                    const locale = '{{ app()->getLocale() }}';
                    const title = job['title_' + locale] || job.title_de || job.title || '';
                    const cantonName = job.canton?.name || '';
                    const employmentType = job.employment_type || '';
                    const createdAt = this.formatDate(job.created_at);
                    const applyUrl = '{{ route("jobs.apply", ":id") }}'.replace(':id', job.id);
                    
                    return `
                        <div class="bg-white rounded-xl border border-gray-200 overflow-hidden hover:border-brand-blue hover:shadow-lg transition-all duration-200">
                            <div class="flex flex-col">
                                <div class="h-48 w-full overflow-hidden">
                                    <img src="{{ asset('images/jobs.png') }}" alt="${title}" class="w-full h-full object-cover">
                                </div>
                                <div class="p-6 flex flex-col justify-between flex-1">
                                    <div>
                                        <h2 class="text-xl font-bold text-gray-900 mb-3">${title}</h2>
                                        <div class="flex flex-wrap gap-2 mb-6">
                                            ${cantonName ? `
                                                <span class="inline-flex items-center gap-1.5 rounded-lg bg-gray-100 px-2.5 py-1 text-xs font-medium text-gray-700">
                                                    <svg class="h-3.5 w-3.5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    </svg>
                                                    ${cantonName}
                                                </span>
                                            ` : ''}
                                            ${employmentType ? `
                                                <span class="inline-flex items-center gap-1.5 rounded-lg bg-blue-50 px-2.5 py-1 text-xs font-medium text-blue-700">
                                                    <svg class="h-3.5 w-3.5" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                                    </svg>
                                                    ${employmentType}
                                                </span>
                                            ` : ''}
                                            <span class="inline-flex items-center gap-1.5 rounded-lg bg-gray-50 px-2.5 py-1 text-xs font-medium text-gray-500">
                                                <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                ${createdAt}
                                            </span>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="${applyUrl}" class="inline-flex items-center justify-center gap-2 rounded-lg border-2 border-gray-300 bg-white px-5 py-2.5 text-sm font-semibold text-gray-700 hover:border-brand-blue hover:text-brand-blue transition-colors duration-200 w-full">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                },
                
                formatDate(dateString) {
                    const date = new Date(dateString);
                    const now = new Date();
                    const diffInSeconds = Math.floor((now - date) / 1000);
                    
                    if (diffInSeconds < 60) return 'just now';
                    if (diffInSeconds < 3600) return Math.floor(diffInSeconds / 60) + ' minutes ago';
                    if (diffInSeconds < 86400) return Math.floor(diffInSeconds / 3600) + ' hours ago';
                    if (diffInSeconds < 604800) return Math.floor(diffInSeconds / 86400) + ' days ago';
                    if (diffInSeconds < 2592000) return Math.floor(diffInSeconds / 604800) + ' weeks ago';
                    if (diffInSeconds < 31536000) return Math.floor(diffInSeconds / 2592000) + ' months ago';
                    return Math.floor(diffInSeconds / 31536000) + ' years ago';
                }
            }
        }
    </script>
    @endpush

</x-layout>
