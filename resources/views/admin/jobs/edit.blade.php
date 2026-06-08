<x-admin-layout title="{{ __('admin.btn_edit') }}">
    <div class="mb-6">
        <a href="{{ route('admin.jobs.index') }}" class="text-blue-600 hover:text-blue-800">&larr; {{ __('admin.back_to_list') }}</a>
    </div>

    <div class="rounded-xl bg-white p-6 shadow-sm">
        <h1 class="text-2xl font-bold text-gray-900">{{ __('admin.edit_job', ['title' => $job->title]) }}</h1>

        <form action="{{ route('admin.jobs.update', $job) }}" method="POST" class="mt-6 space-y-6">
            @csrf
            @method('PATCH')

            {{-- Language Tabs --}}
            <div class="mb-6">
                <div class="flex gap-3">
                    <button type="button" onclick="switchTab('en')" id="tab-en" class="tab-button flex-1 px-6 py-3.5 rounded-xl font-bold text-lg transition-all duration-200 bg-blue-50 text-gray-900 border-2 border-blue-500 shadow-md relative">
                        <span class="mr-2 text-3xl">🇬🇧</span>English
                        <span class="tab-check hidden absolute -top-2 -right-2 bg-green-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm">✓</span>
                    </button>
                    <button type="button" onclick="switchTab('de')" id="tab-de" class="tab-button flex-1 px-6 py-3.5 rounded-xl font-bold text-lg transition-all duration-200 bg-white text-gray-900 border-2 border-gray-300 hover:border-gray-400 relative">
                        <span class="mr-2 text-3xl">🇩🇪</span>Deutsch
                        <span class="tab-check hidden absolute -top-2 -right-2 bg-green-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm">✓</span>
                    </button>
                    <button type="button" onclick="switchTab('sq')" id="tab-sq" class="tab-button flex-1 px-6 py-3.5 rounded-xl font-bold text-lg transition-all duration-200 bg-white text-gray-900 border-2 border-gray-300 hover:border-gray-400 relative">
                        <span class="mr-2 text-3xl">🇦🇱</span>Shqip
                        <span class="tab-check hidden absolute -top-2 -right-2 bg-green-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm">✓</span>
                    </button>
                    <button type="button" onclick="switchTab('fr')" id="tab-fr" class="tab-button flex-1 px-6 py-3.5 rounded-xl font-bold text-lg transition-all duration-200 bg-white text-gray-900 border-2 border-gray-300 hover:border-gray-400 relative">
                        <span class="mr-2 text-3xl">🇫🇷</span>Français
                        <span class="tab-check hidden absolute -top-2 -right-2 bg-green-500 text-white rounded-full w-6 h-6 flex items-center justify-center text-sm">✓</span>
                    </button>
                </div>
            </div>

            {{-- EN Fields --}}
            <div id="fields-en" class="tab-content space-y-5">
                <div>
                    <label for="title_en" class="block text-sm font-medium text-gray-700">Title (English)</label>
                    <input type="text" name="title_en" id="title_en" value="{{ old('title_en', $job->title_en) }}"
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                    @error('title_en')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="description_en" class="block text-sm font-medium text-gray-700">Description (English)</label>
                    <textarea name="description_en" id="description_en" rows="6"
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">{{ old('description_en', $job->description_en) }}</textarea>
                    @error('description_en')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="requirements_en" class="block text-sm font-medium text-gray-700">Requirements (English)</label>
                    <textarea name="requirements_en" id="requirements_en" rows="4"
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">{{ old('requirements_en', $job->requirements_en) }}</textarea>
                    @error('requirements_en')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="we_offer_en" class="block text-sm font-medium text-gray-700">We Offer (English)</label>
                    <textarea name="we_offer_en" id="we_offer_en" rows="4"
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">{{ old('we_offer_en', $job->we_offer_en) }}</textarea>
                    @error('we_offer_en')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- DE Fields --}}
            <div id="fields-de" class="tab-content space-y-5 hidden">
                <div>
                    <label for="title_de" class="block text-sm font-medium text-gray-700">Titel (Deutsch)</label>
                    <input type="text" name="title_de" id="title_de" value="{{ old('title_de', $job->title_de) }}"
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                    @error('title_de')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="description_de" class="block text-sm font-medium text-gray-700">Beschreibung (Deutsch)</label>
                    <textarea name="description_de" id="description_de" rows="6"
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">{{ old('description_de', $job->description_de) }}</textarea>
                    @error('description_de')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="requirements_de" class="block text-sm font-medium text-gray-700">Anforderungen (Deutsch)</label>
                    <textarea name="requirements_de" id="requirements_de" rows="4"
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">{{ old('requirements_de', $job->requirements_de) }}</textarea>
                    @error('requirements_de')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="we_offer_de" class="block text-sm font-medium text-gray-700">Was wir bieten (Deutsch)</label>
                    <textarea name="we_offer_de" id="we_offer_de" rows="4"
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">{{ old('we_offer_de', $job->we_offer_de) }}</textarea>
                    @error('we_offer_de')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Albanian Fields --}}
            <div id="fields-sq" class="tab-content space-y-5 hidden">
                <div>
                    <label for="title_sq" class="block text-sm font-medium text-gray-700">Titulli (Shqip)</label>
                    <input type="text" name="title_sq" id="title_sq" value="{{ old('title_sq', $job->title_sq) }}"
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                    @error('title_sq')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="description_sq" class="block text-sm font-medium text-gray-700">Përshkrimi (Shqip)</label>
                    <textarea name="description_sq" id="description_sq" rows="6"
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">{{ old('description_sq', $job->description_sq) }}</textarea>
                    @error('description_sq')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="requirements_sq" class="block text-sm font-medium text-gray-700">Kërkesat (Shqip)</label>
                    <textarea name="requirements_sq" id="requirements_sq" rows="4"
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">{{ old('requirements_sq', $job->requirements_sq) }}</textarea>
                    @error('requirements_sq')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="we_offer_sq" class="block text-sm font-medium text-gray-700">Ne Ofrojmë (Shqip)</label>
                    <textarea name="we_offer_sq" id="we_offer_sq" rows="4"
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">{{ old('we_offer_sq', $job->we_offer_sq) }}</textarea>
                    @error('we_offer_sq')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- French Fields --}}
            <div id="fields-fr" class="tab-content space-y-5 hidden">
                <div>
                    <label for="title_fr" class="block text-sm font-medium text-gray-700">Titre (Français)</label>
                    <input type="text" name="title_fr" id="title_fr" value="{{ old('title_fr', $job->title_fr) }}"
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                    @error('title_fr')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="description_fr" class="block text-sm font-medium text-gray-700">Description (Français)</label>
                    <textarea name="description_fr" id="description_fr" rows="6"
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">{{ old('description_fr', $job->description_fr) }}</textarea>
                    @error('description_fr')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="requirements_fr" class="block text-sm font-medium text-gray-700">Exigences (Français)</label>
                    <textarea name="requirements_fr" id="requirements_fr" rows="4"
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">{{ old('requirements_fr', $job->requirements_fr) }}</textarea>
                    @error('requirements_fr')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="we_offer_fr" class="block text-sm font-medium text-gray-700">Ce que nous offrons (Français)</label>
                    <textarea name="we_offer_fr" id="we_offer_fr" rows="4"
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">{{ old('we_offer_fr', $job->we_offer_fr) }}</textarea>
                    @error('we_offer_fr')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                <div>
                    <label for="canton_id" class="block text-sm font-medium text-gray-700">{{ __('admin.label_canton') }}</label>
                    <select name="canton_id" id="canton_id"
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="">{{ __('admin.opt_select') }}</option>
                        @foreach($cantons as $canton)
                            <option value="{{ $canton->id }}" {{ old('canton_id', $job->canton_id) == $canton->id ? 'selected' : '' }}>
                                {{ $canton->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('canton_id')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="employment_type" class="block text-sm font-medium text-gray-700">{{ __('admin.label_employment_type') }}</label>
                    <select name="employment_type" id="employment_type"
                        class="mt-1 block w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:border-blue-500 focus:outline-none focus:ring-1 focus:ring-blue-500">
                        <option value="">{{ __('admin.opt_select') }}</option>
                        <option value="Full-time" {{ old('employment_type', $job->employment_type) == 'Full-time' ? 'selected' : '' }}>{{ __('admin.opt_fulltime') }}</option>
                        <option value="Part-time" {{ old('employment_type', $job->employment_type) == 'Part-time' ? 'selected' : '' }}>{{ __('admin.opt_parttime') }}</option>
                        <option value="Contract" {{ old('employment_type', $job->employment_type) == 'Contract' ? 'selected' : '' }}>{{ __('admin.opt_contract') }}</option>
                        <option value="Temporary" {{ old('employment_type', $job->employment_type) == 'Temporary' ? 'selected' : '' }}>{{ __('admin.opt_temporary') }}</option>
                    </select>
                    @error('employment_type')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $job->is_active) ? 'checked' : '' }}
                    class="h-4 w-4 rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                <label for="is_active" class="ml-2 block text-sm text-gray-700">{{ __('admin.label_active') }}</label>
            </div>

            <div class="flex gap-3 border-t pt-6">
                <button type="submit" 
                        class="inline-flex items-center gap-2 rounded-lg bg-blue-600 px-6 py-2.5 text-sm font-medium text-white shadow-sm transition hover:bg-blue-700 disabled:opacity-50 disabled:cursor-not-allowed"
                        style="background-color: #2563eb; color: white;"
                        onclick="this.disabled=true; this.innerHTML='<svg class=\'animate-spin h-5 w-5 text-white\' xmlns=\'http://www.w3.org/2000/svg\' fill=\'none\' viewBox=\'0 0 24 24\'><circle class=\'opacity-25\' cx=\'12\' cy=\'12\' r=\'10\' stroke=\'currentColor\' stroke-width=\'4\'></circle><path class=\'opacity-75\' fill=\'currentColor\' d=\'M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z\'></path></svg> {{ __('admin.updating') }}'; this.form.submit();">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                    </svg>
                    <span>{{ __('admin.btn_update') }}</span>
                </button>
                <a href="{{ route('admin.jobs.index') }}" class="rounded-lg border border-gray-300 bg-white px-6 py-2.5 text-sm font-medium text-gray-700 shadow-sm transition hover:bg-gray-50">
                    {{ __('admin.btn_cancel') }}
                </a>
            </div>
        </form>
    </div>
</x-admin-layout>

<script>
function switchTab(lang) {
    // Hide all tab contents
    document.querySelectorAll('.tab-content').forEach(content => {
        content.classList.add('hidden');
    });
    
    // Reset all tab buttons to inactive state
    document.querySelectorAll('.tab-button').forEach(button => {
        button.classList.remove('bg-blue-50', 'border-blue-500', 'shadow-md');
        button.classList.add('bg-white', 'border-gray-300');
    });
    
    // Show selected tab content
    document.getElementById('fields-' + lang).classList.remove('hidden');
    
    // Highlight selected tab button
    const selectedTab = document.getElementById('tab-' + lang);
    selectedTab.classList.remove('bg-white', 'border-gray-300');
    selectedTab.classList.add('bg-blue-50', 'border-blue-500', 'shadow-md');
}

// Check which languages have content and show tick
function updateLanguageChecks() {
    const languages = ['en', 'de', 'sq', 'fr'];
    
    languages.forEach(lang => {
        const title = document.getElementById('title_' + lang);
        const description = document.getElementById('description_' + lang);
        const requirements = document.getElementById('requirements_' + lang);
        const weOffer = document.getElementById('we_offer_' + lang);
        
        const hasContent = (title && title.value.trim()) || 
                         (description && description.value.trim()) || 
                 (requirements && requirements.value.trim()) ||
                 (weOffer && weOffer.value.trim());
        
        const checkMark = document.querySelector('#tab-' + lang + ' .tab-check');
        if (hasContent && checkMark) {
            checkMark.classList.remove('hidden');
        } else if (checkMark) {
            checkMark.classList.add('hidden');
        }
    });
}

// Add event listeners to all input fields
document.addEventListener('DOMContentLoaded', function() {
    const inputs = document.querySelectorAll('input[type="text"], textarea');
    inputs.forEach(input => {
        input.addEventListener('input', updateLanguageChecks);
        input.addEventListener('change', updateLanguageChecks);
    });
    
    // Initial check (for edit form with existing data)
    updateLanguageChecks();
});
</script>
