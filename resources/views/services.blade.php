<x-layout :title="__('services.page_title') . ' - Janira Care'">
    <section class="min-h-screen bg-gray-50 pt-24 pb-16">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h1 class="text-3xl font-bold text-gray-900">{{ __('services.page_title') }}</h1>
                <p class="mt-4 text-gray-600">{{ __('services.page_subtitle') }}</p>
            </div>

            @if(session('success'))
                <div class="mt-6 rounded-lg bg-green-50 p-4 text-sm text-green-700">{{ session('success') }}</div>
            @endif

            <div class="mt-8 rounded-xl bg-white p-6 shadow-sm sm:p-8"
                 x-data="{ selectedCanton: '', selectedServices: [] }">
                <h2 class="text-xl font-semibold text-gray-900">{{ __('services.form_title') }}</h2>

                <form method="POST" action="{{ route('services.store') }}" class="mt-6 space-y-5">
                    @csrf
                    {{-- Name --}}
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-700">{{ __('services.first_name') }}</label>
                            <input type="text" name="first_name" required class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 focus:outline-none" value="{{ old('first_name') }}">
                            @error('first_name') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-700">{{ __('services.last_name') }}</label>
                            <input type="text" name="last_name" required class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 focus:outline-none" value="{{ old('last_name') }}">
                            @error('last_name') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Email --}}
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700">{{ __('services.email') }}</label>
                        <input type="email" name="email" required class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 focus:outline-none" value="{{ old('email') }}">
                        @error('email') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    {{-- Phone --}}
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700">{{ __('services.phone') }}</label>
                        <div class="flex gap-2">
                            <select name="phone_prefix" class="w-28 rounded-lg border border-gray-300 px-2 py-2.5 text-sm focus:border-teal-500 focus:outline-none">
                                <option value="+41">🇨🇭 +41</option>
                                <option value="+49">🇩🇪 +49</option>
                                <option value="+33">🇫🇷 +33</option>
                                <option value="+355">🇦🇱 +355</option>
                                <option value="+383">🇽🇰 +383</option>
                            </select>
                            <input type="tel" name="phone_number" required placeholder="{{ __('services.phone_placeholder') }}" class="flex-1 rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 focus:outline-none" value="{{ old('phone_number') }}">
                        </div>
                        @error('phone_number') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    {{-- Canton --}}
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700">{{ __('services.canton') }}</label>
                            <select name="canton" x-model="selectedCanton" required class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-teal-500 focus:outline-none">
                            <option value="">-- {{ __('services.canton') }} --</option>
                            @foreach($cantons as $canton)
                                <option value="{{ $canton->name }}">{{ $canton->name }}</option>
                            @endforeach
                        </select>
                        @error('canton') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    {{-- Services --}}
                    <div>
                        <label class="mb-2 block text-sm font-medium text-gray-700">{{ __('services.services') }}</label>
                        <div class="grid gap-4 md:grid-cols-2">
                            <!-- Vetëm opsionet e reja si checkbox -->
                            <div class="rounded-lg border border-blue-300 p-4 bg-blue-50 flex flex-col gap-2">
                                <div class="mb-2 font-semibold text-blue-900">{{ __('services.bodycare') }}</div>
                                @php $bodycareKeys = ['service_bodycare_shower', 'service_bodycare_mouth', 'service_bodycare_dress']; @endphp
                                @foreach($bodycareKeys as $key)
                                <label class="flex items-start gap-2 cursor-pointer w-full">
                                    <input type="checkbox" value="{{ __('services.' . $key) }}" x-model="selectedServices" class="mt-1 rounded border-gray-300 text-teal-600 focus:ring-teal-500">
                                    <span class="text-gray-700 text-sm">{{ __('services.' . $key) }}</span>
                                </label>
                                @endforeach
                            </div>
                            <div class="rounded-lg border border-blue-300 p-4 bg-blue-50 flex flex-col gap-2">
                                <div class="mb-2 font-semibold text-blue-900">{{ __('services.nutrition') }}</div>
                                @php $nutritionKeys = ['service_nutrition_eating']; @endphp
                                @foreach($nutritionKeys as $key)
                                <label class="flex items-start gap-2 cursor-pointer w-full">
                                    <input type="checkbox" value="{{ __('services.' . $key) }}" x-model="selectedServices" class="mt-1 rounded border-gray-300 text-teal-600 focus:ring-teal-500">
                                    <span class="text-gray-700 text-sm">{{ __('services.' . $key) }}</span>
                                </label>
                                @endforeach
                            </div>
                            <div class="rounded-lg border border-blue-300 p-4 bg-blue-50 flex flex-col gap-2">
                                <div class="mb-2 font-semibold text-blue-900">{{ __('services.excretion') }}</div>
                                @php $excretionKeys = ['service_excretion_toilet']; @endphp
                                @foreach($excretionKeys as $key)
                                <label class="flex items-start gap-2 cursor-pointer w-full">
                                    <input type="checkbox" value="{{ __('services.' . $key) }}" x-model="selectedServices" class="mt-1 rounded border-gray-300 text-teal-600 focus:ring-teal-500">
                                    <span class="text-gray-700 text-sm">{{ __('services.' . $key) }}</span>
                                </label>
                                @endforeach
                            </div>
                            <div class="rounded-lg border border-blue-300 p-4 bg-blue-50 flex flex-col gap-2">
                                <div class="mb-2 font-semibold text-blue-900">{{ __('services.mobility') }}</div>
                                @php $mobilityKeys = ['service_mobility_move', 'service_mobility_position']; @endphp
                                @foreach($mobilityKeys as $key)
                                <label class="flex items-start gap-2 cursor-pointer w-full">
                                    <input type="checkbox" value="{{ __('services.' . $key) }}" x-model="selectedServices" class="mt-1 rounded border-gray-300 text-teal-600 focus:ring-teal-500">
                                    <span class="text-gray-700 text-sm">{{ __('services.' . $key) }}</span>
                                </label>
                                @endforeach
                            </div>
                            <!-- Extra Dienstleistungen të grupuara bukur -->
                            <!-- Checkbox-et ekzistuese të shërbimeve të tjera -->
                        </div>
                        <input type="hidden" name="services" :value="selectedServices.join(', ')">
                        @error('services') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
                    </div>

                    {{-- Service Date --}}
                    <div>
                        <label class="mb-1 block text-sm font-medium text-gray-700">{{ __('services.service_date') }}</label>
                        <input type="date" name="service_date" class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm focus:border-teal-500 focus:ring-2 focus:ring-teal-500/20 focus:outline-none" value="{{ old('service_date') }}">
                    </div>

                    <button type="submit" class="w-full rounded-lg bg-brand-blue px-6 py-3 text-sm font-semibold text-white transition hover:bg-brand-blue-dark disabled:opacity-50 disabled:cursor-not-allowed">
                        {{ __('services.submit') }}
                    </button>
                </form>
            </div>
        </div>
    </section>


</x-layout>
