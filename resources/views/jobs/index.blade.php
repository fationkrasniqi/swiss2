<x-layout title="{{ __('jobs.page_title') }} - Janira Care">
    {{-- Hero Section --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-brand-blue via-brand-pink to-brand-blue pt-32 pb-20">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'0.4\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');"></div>
        </div>
        
        <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="inline-flex items-center gap-2.5 rounded-full bg-white/25 px-6 py-3 text-base font-bold text-white backdrop-blur-md shadow-lg mb-6 animate-bounce">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/>
                    </svg>
                    <span>Po Punësojmë!</span>
                </div>
                
                <h1 class="text-5xl font-extrabold leading-tight text-white sm:text-6xl lg:text-7xl drop-shadow-2xl">
                    {{ __('jobs.page_title') }}
                </h1>
                <p class="mt-6 text-xl text-white/95 sm:text-2xl max-w-3xl mx-auto font-medium">
                    {{ __('jobs.page_subtitle') }}
                </p>
                
                <div class="mt-10 inline-flex items-center justify-center gap-4 bg-white/20 backdrop-blur-lg rounded-2xl px-8 py-5 shadow-2xl">
                    <div class="text-center px-6">
                        <div class="text-5xl font-black text-white">{{ $jobs->total() }}</div>
                        <div class="text-sm font-semibold text-white/90 mt-2">Pozicione të Hapura</div>
                    </div>
                    <div class="h-16 w-px bg-white/40"></div>
                    <div class="text-center px-6">
                        <div class="text-5xl font-black text-white">24/7</div>
                        <div class="text-sm font-semibold text-white/90 mt-2">Mbështetje</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Jobs Listing Section --}}
    <section class="bg-gradient-to-b from-gray-50 to-white py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-8 rounded-2xl bg-gradient-to-r from-green-500 to-emerald-500 p-5 text-white shadow-xl">
                    <div class="flex items-center gap-3">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-semibold">{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="mb-8 rounded-2xl bg-gradient-to-r from-red-500 to-pink-500 p-5 text-white shadow-xl">
                    <div class="flex items-center gap-3">
                        <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <span class="font-semibold">{{ session('error') }}</span>
                    </div>
                </div>
            @endif

            <div class="space-y-8">
                @forelse($jobs as $job)
                <div class="group relative overflow-hidden rounded-3xl bg-white shadow-xl border-2 border-transparent transition-all duration-500 hover:border-brand-pink hover:shadow-2xl hover:-translate-y-2">
                    {{-- Gradient Border Effect --}}
                    <div class="absolute inset-0 bg-gradient-to-r from-brand-blue via-brand-pink to-brand-blue opacity-0 group-hover:opacity-10 transition-opacity duration-500 pointer-events-none"></div>
                    
                    <div class="relative p-8 lg:p-10">
                        <div class="flex flex-col lg:flex-row gap-8">
                            {{-- Left: Icon & Info --}}
                            <div class="flex gap-6 flex-1">
                                <div class="flex-shrink-0">
                                    <div class="relative">
                                        <div class="absolute -inset-2 bg-gradient-to-r from-brand-blue to-brand-pink rounded-2xl blur-xl opacity-30 group-hover:opacity-50 transition duration-500"></div>
                                        <div class="relative flex h-20 w-20 items-center justify-center rounded-2xl bg-gradient-to-br from-brand-blue to-brand-pink text-white shadow-2xl transform group-hover:scale-110 group-hover:rotate-6 transition duration-500">
                                            <svg class="h-10 w-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                {{-- Job Details --}}
                                <div class="flex-1">
                                    <h2 class="text-3xl font-black text-gray-900 mb-4 group-hover:text-brand-pink transition-colors duration-300">
                                        {{ $job->title }}
                                    </h2>
                                    
                                    <div class="flex flex-wrap gap-3 mb-5">
                                        @if($job->location)
                                        <span class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 px-4 py-2.5 text-sm font-bold text-blue-700 shadow-sm">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            {{ $job->location }}
                                        </span>
                                        @endif

                                        @if($job->employment_type)
                                        <span class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-emerald-50 to-teal-50 border border-emerald-200 px-4 py-2.5 text-sm font-bold text-emerald-700 shadow-sm">
                                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                            </svg>
                                            {{ $job->employment_type }}
                                        </span>
                                        @endif

                                        <span class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-purple-50 to-pink-50 border border-purple-200 px-4 py-2.5 text-sm font-bold text-purple-700 shadow-sm">
                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                            </svg>
                                            {{ $job->created_at->diffForHumans() }}
                                        </span>
                                    </div>

                                    <p class="text-base text-gray-700 leading-relaxed mb-5">
                                        {{ Str::limit($job->description, 280) }}
                                    </p>

                                    @if($job->requirements)
                                    <div class="bg-gradient-to-r from-gray-50 to-blue-50 rounded-xl p-5 border-l-4 border-brand-blue">
                                        <h4 class="flex items-center gap-2 text-sm font-black text-gray-900 mb-3 uppercase tracking-wide">
                                            <svg class="h-4 w-4 text-brand-pink" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            Kërkesat Kryesore
                                        </h4>
                                        <div class="text-sm text-gray-700 leading-relaxed">
                                            {{ Str::limit($job->requirements, 180) }}
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            {{-- Right: Apply Button --}}
                            <div class="flex-shrink-0 flex items-center">
                                <a href="{{ route('jobs.apply', $job) }}" 
                                   class="group/btn relative inline-flex items-center gap-3 rounded-2xl bg-gradient-to-r from-brand-blue via-brand-pink to-brand-blue bg-size-200 bg-pos-0 hover:bg-pos-100 px-8 py-5 text-lg font-black text-white shadow-2xl transition-all duration-500 hover:shadow-brand-pink/50 hover:scale-110 hover:rotate-2">
                                    <span>{{ __('jobs.apply_now') }}</span>
                                    <svg class="h-6 w-6 transition-transform group-hover/btn:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="rounded-3xl bg-white p-20 text-center shadow-2xl border-2 border-dashed border-gray-300">
                    <div class="mx-auto flex h-32 w-32 items-center justify-center rounded-full bg-gradient-to-br from-gray-100 to-gray-200 shadow-inner">
                        <svg class="h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="mt-8 text-3xl font-black text-gray-900">{{ __('jobs.no_jobs_title') }}</h3>
                    <p class="mt-4 text-lg text-gray-600 max-w-md mx-auto">{{ __('jobs.no_jobs_description') }}</p>
                    <a href="{{ url('/') }}#contact" class="mt-8 inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-brand-blue to-brand-pink px-8 py-4 font-bold text-white shadow-xl hover:shadow-2xl hover:scale-105 transition-all duration-300">
                        Na Kontaktoni për Mundësi të Ardhshme
                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                </div>
                @endforelse
            </div>

            @if($jobs->hasPages())
            <div class="mt-16">
                {{ $jobs->links() }}
            </div>
            @endif
        </div>
    </section>

    <style>
        .bg-size-200 { background-size: 200% auto; }
        .bg-pos-0 { background-position: 0% center; }
        .bg-pos-100 { background-position: 100% center; }
    </style>

    {{-- Call to Action Section --}}
    <section class="relative overflow-hidden bg-gradient-to-br from-brand-blue via-brand-pink to-brand-blue py-24">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width=\'100\' height=\'100\' viewBox=\'0 0 100 100\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cpath d=\'M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z\' fill=\'%23ffffff\' fill-opacity=\'0.3\' fill-rule=\'evenodd\'/%3E%3C/svg%3E');"></div>
        </div>
        
        <div class="relative mx-auto max-w-5xl px-4 sm:px-6 lg:px-8 text-center">
            <div class="mb-6">
                <div class="inline-flex items-center justify-center h-20 w-20 rounded-full bg-white/20 backdrop-blur-lg shadow-2xl mb-4">
                    <svg class="h-10 w-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                </div>
            </div>
            
            <h2 class="text-4xl font-black text-white sm:text-5xl lg:text-6xl mb-6 drop-shadow-2xl">
                Nuk e Gjen Rolin Tënd?
            </h2>
            <p class="text-xl text-white/95 max-w-2xl mx-auto font-medium leading-relaxed mb-10">
                Jemi gjithmonë në kërkim të profesionistëve të talentuar. Dërgona CV-në tënde dhe do të të mbajmë në mend për mundësi të ardhshme.
            </p>
            
            <div class="flex flex-wrap gap-5 justify-center">
                <a href="{{ url('/') }}#contact" 
                   class="group inline-flex items-center gap-3 rounded-2xl bg-white px-10 py-5 text-lg font-black text-brand-blue shadow-2xl transition-all duration-300 hover:scale-110 hover:shadow-white/50">
                    <svg class="h-6 w-6 transition-transform group-hover:rotate-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    <span>Na Kontaktoni</span>
                    <svg class="h-6 w-6 transition-transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>
                </a>
                
                <a href="{{ url('/') }}" 
                   class="group inline-flex items-center gap-3 rounded-2xl border-3 border-white bg-transparent px-10 py-5 text-lg font-black text-white shadow-2xl transition-all duration-300 hover:bg-white hover:text-brand-blue hover:scale-110">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                    <span>Kthehu në Ballina</span>
                </a>
            </div>
        </div>
    </section>
</x-layout>
