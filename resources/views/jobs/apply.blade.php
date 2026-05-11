<x-layout :title="'Apliko për ' . $job->title . ' - Janira Care'">
    <section class="min-h-screen bg-gradient-to-br from-gray-50 via-blue-50 to-pink-50 pt-32 pb-20">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8">
            {{-- Back Button --}}
            <div class="mb-8">
                <a href="{{ route('jobs.index') }}" class="group inline-flex items-center gap-3 rounded-xl bg-white px-6 py-3 text-brand-blue font-bold shadow-lg hover:shadow-xl hover:scale-105 transition-all duration-300 border-2 border-transparent hover:border-brand-pink">
                    <svg class="h-5 w-5 transition-transform group-hover:-translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    <span>Kthehu te Lista e Punëve</span>
                </a>
            </div>

            {{-- Job Details Card --}}
            <div class="relative overflow-hidden rounded-3xl bg-white shadow-2xl border-2 border-transparent mb-10 group hover:border-brand-pink transition-all duration-500">
                <div class="absolute inset-0 bg-gradient-to-r from-brand-blue/5 via-brand-pink/5 to-brand-blue/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                
                <div class="relative p-10">
                    <div class="flex items-start gap-8">
                        <div class="flex-shrink-0">
                            <div class="relative">
                                <div class="absolute -inset-3 bg-gradient-to-r from-brand-blue to-brand-pink rounded-2xl blur-2xl opacity-40"></div>
                                <div class="relative flex h-24 w-24 items-center justify-center rounded-2xl bg-gradient-to-br from-brand-blue to-brand-pink text-white shadow-2xl">
                                    <svg class="h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="flex-1">
                            <h1 class="text-4xl font-black text-gray-900 mb-6 bg-gradient-to-r from-brand-blue to-brand-pink bg-clip-text text-transparent">
                                {{ $job->title }}
                            </h1>
                            
                            <div class="flex flex-wrap gap-3 mb-8">
                                @if($job->location)
                                <span class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 px-5 py-3 text-sm font-bold text-blue-700 shadow-sm">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    {{ $job->location }}
                                </span>
                                @endif

                                @if($job->employment_type)
                                <span class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-emerald-50 to-teal-50 border border-emerald-200 px-5 py-3 text-sm font-bold text-emerald-700 shadow-sm">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $job->employment_type }}
                                </span>
                                @endif

                                <span class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-purple-50 to-pink-50 border border-purple-200 px-5 py-3 text-sm font-bold text-purple-700 shadow-sm">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Postuar {{ $job->created_at->diffForHumans() }}
                                </span>
                            </div>

                            <div class="space-y-8">
                                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-2xl p-6 border-l-4 border-brand-blue">
                                    <h3 class="flex items-center gap-3 text-xl font-black text-gray-900 mb-4">
                                        <svg class="h-6 w-6 text-brand-pink" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                        Përshkrimi i Punës
                                    </h3>
                                    <p class="whitespace-pre-line text-gray-700 leading-relaxed text-base">{{ $job->description }}</p>
                                </div>

                                @if($job->requirements)
                                <div class="bg-gradient-to-r from-pink-50 to-purple-50 rounded-2xl p-6 border-l-4 border-brand-pink">
                                    <h3 class="flex items-center gap-3 text-xl font-black text-gray-900 mb-4">
                                        <svg class="h-6 w-6 text-brand-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                                        </svg>
                                        Kërkesat
                                    </h3>
                                    <p class="whitespace-pre-line text-gray-700 leading-relaxed text-base">{{ $job->requirements }}</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Application Form --}}
            <div class="relative overflow-hidden rounded-3xl bg-white shadow-2xl border-2 border-gray-100">
                <div class="absolute top-0 left-0 right-0 h-2 bg-gradient-to-r from-brand-blue via-brand-pink to-brand-blue"></div>
                
                <div class="p-10">
                    <div class="mb-8 text-center">
                        <div class="inline-flex items-center justify-center h-16 w-16 rounded-full bg-gradient-to-br from-brand-blue to-brand-pink text-white shadow-xl mb-4">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <h2 class="text-3xl font-black text-gray-900 mb-3">Apliko për Këtë Pozicion</h2>
                        <p class="text-gray-600 text-base">Plotëso formularin më poshtë dhe do të të kontaktojmë sa më shpejt.</p>
                    </div>

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

                    <form method="POST" action="{{ route('jobs.apply.store', $job) }}" enctype="multipart/form-data" class="space-y-7">
                        @csrf

                        {{-- Name Fields --}}
                        <div class="grid gap-6 sm:grid-cols-2">
                            <div>
                                <label class="mb-3 flex items-center gap-2 text-sm font-black text-gray-900 uppercase tracking-wide">
                                    <svg class="h-4 w-4 text-brand-pink" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                    </svg>
                                    Emri *
                                </label>
                                <input type="text" name="first_name" required 
                                       class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-5 py-4 text-base font-medium focus:border-brand-blue focus:bg-white focus:ring-4 focus:ring-brand-blue/10 focus:outline-none transition" 
                                       value="{{ old('first_name') }}"
                                       placeholder="Shkruaj emrin tënd">
                                @error('first_name') 
                                <p class="mt-2 flex items-center gap-2 text-sm text-red-600 font-semibold">
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </p> 
                                @enderror
                            </div>
                            <div>
                                <label class="mb-3 flex items-center gap-2 text-sm font-black text-gray-900 uppercase tracking-wide">
                                    <svg class="h-4 w-4 text-brand-pink" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                    </svg>
                                    Mbiemri *
                                </label>
                                <input type="text" name="last_name" required 
                                       class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-5 py-4 text-base font-medium focus:border-brand-blue focus:bg-white focus:ring-4 focus:ring-brand-blue/10 focus:outline-none transition" 
                                       value="{{ old('last_name') }}"
                                       placeholder="Shkruaj mbiemrin tënd">
                                @error('last_name') 
                                <p class="mt-2 flex items-center gap-2 text-sm text-red-600 font-semibold">
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </p> 
                                @enderror
                            </div>
                        </div>

                        {{-- Contact Fields --}}
                        <div class="grid gap-6 sm:grid-cols-2">
                            <div>
                                <label class="mb-3 flex items-center gap-2 text-sm font-black text-gray-900 uppercase tracking-wide">
                                    <svg class="h-4 w-4 text-brand-pink" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    Email *
                                </label>
                                <input type="email" name="email" required 
                                       class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-5 py-4 text-base font-medium focus:border-brand-blue focus:bg-white focus:ring-4 focus:ring-brand-blue/10 focus:outline-none transition" 
                                       value="{{ old('email') }}"
                                       placeholder="emri@shembull.com">
                                @error('email') 
                                <p class="mt-2 flex items-center gap-2 text-sm text-red-600 font-semibold">
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </p> 
                                @enderror
                            </div>
                            <div>
                                <label class="mb-3 flex items-center gap-2 text-sm font-black text-gray-900 uppercase tracking-wide">
                                    <svg class="h-4 w-4 text-brand-pink" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    Telefoni *
                                </label>
                                <input type="tel" name="phone" required 
                                       placeholder="+41 79 123 45 67" 
                                       class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-5 py-4 text-base font-medium focus:border-brand-blue focus:bg-white focus:ring-4 focus:ring-brand-blue/10 focus:outline-none transition" 
                                       value="{{ old('phone') }}">
                                @error('phone') 
                                <p class="mt-2 flex items-center gap-2 text-sm text-red-600 font-semibold">
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </p> 
                                @enderror
                            </div>
                        </div>

                        {{-- CV Upload --}}
                        <div>
                            <label class="mb-3 flex items-center gap-2 text-sm font-black text-gray-900 uppercase tracking-wide">
                                <svg class="h-4 w-4 text-brand-pink" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                </svg>
                                Ngarko CV-në Tënde *
                            </label>
                            <div class="relative group">
                                <input type="file" name="cv" required accept=".pdf,.doc,.docx" 
                                       class="w-full rounded-xl border-3 border-dashed border-gray-300 bg-gradient-to-br from-gray-50 to-blue-50 px-6 py-8 text-base font-medium transition hover:border-brand-blue hover:from-blue-50 hover:to-pink-50 focus:border-brand-pink focus:outline-none focus:ring-4 focus:ring-brand-pink/10 file:mr-4 file:rounded-xl file:border-0 file:bg-gradient-to-r file:from-brand-blue file:to-brand-pink file:px-6 file:py-3 file:text-sm file:font-bold file:text-white file:shadow-lg hover:file:shadow-xl file:transition-all hover:file:scale-105">
                            </div>
                            <p class="mt-3 flex items-center gap-2 text-sm text-gray-600">
                                <svg class="h-4 w-4 text-brand-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Formatet e pranuara: PDF, DOC, DOCX (Maksimumi 5MB)
                            </p>
                            @error('cv') 
                            <p class="mt-2 flex items-center gap-2 text-sm text-red-600 font-semibold">
                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p> 
                            @enderror
                        </div>

                        {{-- Cover Letter --}}
                        <div>
                            <label class="mb-3 flex items-center gap-2 text-sm font-black text-gray-900 uppercase tracking-wide">
                                <svg class="h-4 w-4 text-brand-pink" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Letra Shoqëruese (Opsionale)
                            </label>
                            <textarea name="cover_letter" rows="6" 
                                      class="w-full rounded-xl border-2 border-gray-200 bg-gray-50 px-5 py-4 text-base font-medium focus:border-brand-blue focus:bg-white focus:ring-4 focus:ring-brand-blue/10 focus:outline-none transition resize-none"
                                      placeholder="Trego pse je i/e interesuar për këtë pozicion dhe çfarë të bën kandidatin/en ideal...">{{ old('cover_letter') }}</textarea>
                            @error('cover_letter') 
                            <p class="mt-2 flex items-center gap-2 text-sm text-red-600 font-semibold">
                                <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p> 
                            @enderror
                        </div>

                        {{-- Submit Buttons --}}
                        <div class="flex flex-col sm:flex-row gap-5 pt-8 border-t-2 border-gray-100">
                            <button type="submit" 
                                    onclick="this.disabled=true; this.innerHTML='<svg class=\'animate-spin h-6 w-6 text-white inline\' xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\'><circle class=\'opacity-25\' cx=\'12\' cy=\'12\' r=\'10\' stroke=\'currentColor\' stroke-width=\'4\'></circle><path class=\'opacity-75\' fill=\'currentColor\' d=\'M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z\'></path></svg> Po Dërgohet...'; this.form.submit();"
                                    class="group inline-flex items-center justify-center gap-3 rounded-2xl bg-gradient-to-r from-brand-blue via-brand-pink to-brand-blue bg-size-200 bg-pos-0 hover:bg-pos-100 px-10 py-5 text-lg font-black text-white shadow-2xl transition-all duration-500 hover:shadow-brand-pink/50 hover:scale-105 disabled:opacity-50 disabled:cursor-not-allowed">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>Dërgo Aplikimin</span>
                                <svg class="h-6 w-6 transition-transform group-hover:translate-x-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </button>
                            <a href="{{ route('jobs.index') }}" 
                               class="inline-flex items-center justify-center gap-3 rounded-2xl border-3 border-gray-300 bg-white px-10 py-5 text-lg font-black text-gray-700 transition-all duration-300 hover:border-brand-blue hover:bg-gray-50 hover:scale-105">
                                <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                </svg>
                                <span>Anulo</span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout>
