<x-layout :title="__('jobs.apply_title') . ' - ' . $job->getLocalizedTitle() . ' - Janira Care'">
    <section class="bg-gray-50 pt-28 pb-16 min-h-screen">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            {{-- Back Button + Language Switcher --}}
            <div class="mb-6 flex items-center justify-between">
                <a href="{{ route('jobs.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-gray-500 hover:text-brand-blue transition-colors duration-200">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    <span>{{ __('jobs.back_to_jobs') }}</span>
                </a>
                {{-- EN / DE Language Switcher --}}
                <div class="inline-flex items-center gap-1 rounded-xl border border-gray-200 bg-gray-50 p-1">
                    <a href="{{ route('lang.switch', 'en') }}"
                       class="inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-sm font-semibold transition-all
                              {{ app()->getLocale() === 'de' ? 'text-gray-500 hover:text-gray-800' : 'bg-white shadow text-gray-900' }}">
                        <span class="text-base leading-none">🇬🇧</span> EN
                    </a>
                    <a href="{{ route('lang.switch', 'de') }}"
                       class="inline-flex items-center gap-1.5 rounded-lg px-3 py-1.5 text-sm font-semibold transition-all
                              {{ app()->getLocale() === 'de' ? 'bg-white shadow text-gray-900' : 'text-gray-500 hover:text-gray-800' }}">
                        <span class="text-base leading-none">🇩🇪</span> DE
                    </a>
                </div>
            </div>

            {{-- Job Details Card --}}
            <div class="bg-white rounded-xl border border-gray-200 p-6 mb-6">
                <div class="flex items-start gap-4">
                        <div class="flex-shrink-0 flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-brand-blue">
                                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                        </div>
                        <div class="flex-1">
                            <h1 class="text-2xl font-bold text-gray-900 mb-3">
                                {{ $job->getLocalizedTitle() }}
                            </h1>
                            
                            <div class="flex flex-wrap gap-3 mb-8">
                                @if($job->canton)
                                <span class="inline-flex items-center gap-1 rounded-md bg-gray-100 px-2.5 py-1 text-xs font-medium text-gray-600">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    {{ $job->canton->name }}
                                </span>
                                @endif

                                @if($job->employment_type)
                                <span class="inline-flex items-center gap-1 rounded-md bg-blue-50 px-2.5 py-1 text-xs font-medium text-blue-700">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $job->employment_type }}
                                </span>
                                @endif

                                <span class="inline-flex items-center gap-1 rounded-md bg-gray-50 px-2.5 py-1 text-xs font-medium text-gray-400">
                                    <svg class="h-3.5 w-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    {{ __('jobs.posted_ago') }} {{ $job->created_at->diffForHumans() }}
                                </span>
                            </div>

                            <div class="mt-4 space-y-5">
                                <div class="rounded-xl bg-gray-50 border border-gray-200 p-6">
                                    <div class="flex items-center gap-2 mb-4">
                                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-100 text-blue-600">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                            </svg>
                                        </div>
                                        <h3 class="text-sm font-bold text-gray-800 uppercase tracking-widest">{{ __('jobs.job_description') }}</h3>
                                    </div>
                                    <p class="text-base text-gray-700 leading-8">{!! nl2br(e(str_replace('. ', ".
", $job->getLocalizedDescription()))) !!}</p>
                                </div>

                                @if($job->getLocalizedRequirements())
                                <div class="rounded-xl border-l-4 border-blue-500 bg-blue-50 border border-blue-100 p-6">
                                    <div class="flex items-center gap-2 mb-4">
                                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-200 text-blue-700">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                                            </svg>
                                        </div>
                                        <h3 class="text-sm font-bold text-gray-800 uppercase tracking-widest">{{ __('jobs.job_requirements') }}</h3>
                                    </div>
                                    <p class="text-base text-gray-700 leading-8">{!! nl2br(e(str_replace('. ', ".
", $job->getLocalizedRequirements()))) !!}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
            </div>

            {{-- Application Form --}}
            <div class="bg-white rounded-xl border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-100">
                    <h2 class="text-xl font-bold text-gray-900">{{ __('jobs.apply_title') }}</h2>
                    <p class="text-sm text-gray-500 mt-1">{{ __('jobs.apply_subtitle') }}</p>
                </div>

                <div class="p-6 space-y-6">
                    @if(session('success'))
                        <div class="flex items-center gap-3 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm font-medium text-green-800">
                            <svg class="h-5 w-5 flex-shrink-0 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="flex items-center gap-3 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm font-medium text-red-800">
                            <svg class="h-5 w-5 flex-shrink-0 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                            {{ session('error') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('jobs.apply.store', $job) }}" enctype="multipart/form-data" class="space-y-5">
                        @csrf

                        {{-- Name Fields --}}
                        <div class="grid gap-4 sm:grid-cols-2">
                            <div>
                                <label class="block mb-1.5 text-sm font-semibold text-gray-700">
                                    {{ __('jobs.form_first_name') }} *
                                </label>
                                <input type="text" name="first_name" required 
                                       class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-brand-blue focus:ring-2 focus:ring-brand-blue/10 focus:outline-none transition" 
                                       value="{{ old('first_name') }}"
                                       placeholder="{{ __('jobs.form_first_name_placeholder') }}">
                                @error('first_name') 
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p> 
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-1.5 text-sm font-semibold text-gray-700">
                                    {{ __('jobs.form_last_name') }} *
                                </label>
                                <input type="text" name="last_name" required 
                                       class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-brand-blue focus:ring-2 focus:ring-brand-blue/10 focus:outline-none transition" 
                                       value="{{ old('last_name') }}"
                                       placeholder="{{ __('jobs.form_last_name_placeholder') }}">
                                @error('last_name') 
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p> 
                                @enderror
                            </div>
                        </div>
                        {{-- Contact Fields --}}
                        <div class="grid gap-4 sm:grid-cols-2">
                            <div>
                                <label class="block mb-1.5 text-sm font-semibold text-gray-700">
                                    {{ __('jobs.form_email') }} *
                                </label>
                                <input type="email" name="email" required 
                                       class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-brand-blue focus:ring-2 focus:ring-brand-blue/10 focus:outline-none transition" 
                                       value="{{ old('email') }}"
                                       placeholder="email@example.com">
                                @error('email') 
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p> 
                                @enderror
                            </div>
                            <div>
                                <label class="block mb-1.5 text-sm font-semibold text-gray-700">
                                    {{ __('jobs.form_phone') }} *
                                </label>
                                <input type="tel" name="phone" required 
                                       placeholder="+41 79 123 45 67" 
                                       class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-brand-blue focus:ring-2 focus:ring-brand-blue/10 focus:outline-none transition" 
                                       value="{{ old('phone') }}">
                                @error('phone') 
                                <p class="mt-1 text-xs text-red-600">{{ $message }}</p> 
                                @enderror
                            </div>
                        </div>

                        {{-- CV Upload --}}
                        <div>
                            <label class="block mb-1.5 text-sm font-semibold text-gray-700">
                                {{ __('jobs.form_cv') }} *
                            </label>
                            <input type="file" name="cv" required accept=".pdf,.doc,.docx"
                                   class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm file:mr-3 file:rounded-lg file:border-0 file:bg-brand-blue file:px-4 file:py-1.5 file:text-xs file:font-semibold file:text-white cursor-pointer focus:outline-none">
                            <p class="mt-1.5 text-xs text-gray-500">{{ __('jobs.form_cv_hint') }}</p>
                            @error('cv') 
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p> 
                            @enderror
                        </div>

                        {{-- Cover Letter --}}
                        <div>
                            <label class="block mb-1.5 text-sm font-semibold text-gray-700">
                                {{ __('jobs.form_cover_letter') }}
                            </label>
                            <input type="file" name="cover_letter" accept=".pdf,.doc,.docx"
                                   class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm file:mr-3 file:rounded-lg file:border-0 file:bg-brand-blue file:px-4 file:py-1.5 file:text-xs file:font-semibold file:text-white cursor-pointer focus:outline-none">
                            <p class="mt-1.5 text-xs text-gray-500">{{ __('jobs.form_cv_hint') }}</p>
                            @error('cover_letter') 
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p> 
                            @enderror
                        </div>

                        {{-- Submit Buttons --}}
                        <div class="flex flex-col sm:flex-row gap-3 pt-5 border-t border-gray-100">
                            <button type="submit"
                                    class="inline-flex items-center justify-center gap-2 rounded-lg bg-brand-blue px-6 py-2.5 text-sm font-semibold text-white hover:bg-brand-blue/90 focus:outline-none focus:ring-2 focus:ring-brand-blue/30 transition disabled:opacity-50 disabled:cursor-not-allowed">
                                {{ __('jobs.form_submit') }}
                            </button>
                            <a href="{{ route('jobs.index') }}" 
                               class="inline-flex items-center justify-center gap-2 rounded-lg border border-gray-300 bg-white px-6 py-2.5 text-sm font-semibold text-gray-700 hover:bg-gray-50 transition">
                                {{ __('jobs.form_cancel') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>
