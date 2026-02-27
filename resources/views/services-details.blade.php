<x-layout :title="__('services_details.page_title') . ' - Janira Care'">
    <section class="bg-gray-50 pt-24 pb-16">
        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">

            {{-- Hero Section --}}
            <div class="grid items-center gap-8 rounded-2xl border border-brand-blue/10 bg-gradient-to-br from-brand-blue/5 to-brand-pink/10 p-6 md:grid-cols-2 md:p-8">
                <div class="text-center md:text-left">
                    <h1 class="text-3xl font-bold text-brand-blue sm:text-4xl">{{ __('services_details.page_title') }}</h1>
                    <p class="mt-4 leading-relaxed text-gray-600">{{ __('services_details.page_subtitle') }}</p>
                </div>
                <div>
                    <picture>
                        <source srcset="{{ asset('images/service2.webp') }}" type="image/webp">
                        <img src="{{ asset('images/service2.webp') }}" alt="{{ __('services_details.page_title') }}" class="h-56 w-full rounded-xl object-cover shadow-lg shadow-brand-blue/10 sm:h-64">
                    </picture>
                </div>
            </div>

            {{-- Service Categories Grid --}}
            @php
                $categories = __('services_details.categories');
                $icons = [
                    'fa-hands-wash',
                    'fa-syringe',
                    'fa-people-carry-box',
                    'fa-house',
                    'fa-clock',
                    'fa-heart-circle-plus',
                ];
            @endphp
            <div class="mt-10 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($categories as $index => $category)
                <div class="group relative overflow-hidden rounded-2xl border border-gray-100 bg-white p-5 shadow-sm transition-all duration-300 hover:-translate-y-1 hover:shadow-lg hover:shadow-brand-blue/8">
                    {{-- Decorative circle --}}
                    <div class="pointer-events-none absolute -top-8 -right-8 h-20 w-20 rounded-full bg-brand-pink/15"></div>

                    {{-- Icon --}}
                    <div class="mb-3 flex h-12 w-12 items-center justify-center rounded-xl bg-brand-blue/10 text-lg text-brand-blue transition-colors group-hover:bg-brand-blue group-hover:text-white">
                        <i class="fas {{ $icons[$index] ?? 'fa-notes-medical' }}"></i>
                    </div>

                    {{-- Title --}}
                    <h3 class="mb-3 text-lg font-bold text-brand-blue">{{ $category['title'] }}</h3>

                    {{-- Items --}}
                    <ul class="space-y-1.5 pl-4 text-sm leading-relaxed text-gray-600">
                        @foreach($category['items'] as $item)
                        <li class="list-disc">{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>

            {{-- Footer CTA --}}
            <div class="mt-12 text-center">
                <p class="text-gray-600">{{ __('services_details.footer_note') }}</p>
                <div class="mt-5">
                    <a href="{{ route('services') }}" class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-brand-blue to-brand-pink px-8 py-3 text-sm font-bold text-white shadow-lg shadow-brand-blue/25 transition-all duration-300 hover:-translate-y-0.5 hover:shadow-xl hover:shadow-brand-blue/35">
                        <i class="fas fa-calendar-check"></i>
                        {{ __('home.services_cta') }}
                    </a>
                </div>
                <div class="mt-8">
                    <picture>
                        <source srcset="{{ asset('images/service1.webp') }}" type="image/webp">
                        <img src="{{ asset('images/service1.webp') }}" alt="{{ __('services_details.page_title') }}" class="mx-auto w-full max-w-3xl rounded-2xl shadow-lg shadow-brand-blue/10">
                    </picture>
                </div>
            </div>

            {{-- Extra Highlights --}}
            <div class="mt-10 grid gap-4 rounded-2xl border border-gray-100 bg-white p-6 shadow-sm sm:grid-cols-3 sm:p-8">
                @for($i = 1; $i <= 3; $i++)
                <div class="rounded-xl border border-dashed border-brand-blue/15 bg-gradient-to-br from-brand-blue/5 to-brand-pink/8 p-5">
                    <div class="mb-2 flex items-center gap-2 font-bold text-brand-blue">
                        @if($i === 1)
                            <i class="fas fa-check-circle"></i>
                        @elseif($i === 2)
                            <i class="fas fa-heart"></i>
                        @else
                            <i class="fas fa-clock"></i>
                        @endif
                        {{ __("services_details.extra_{$i}_title") }}
                    </div>
                    <p class="text-sm leading-relaxed text-gray-600">{{ __("services_details.extra_{$i}_text") }}</p>
                </div>
                @endfor
            </div>

        </div>
    </section>
</x-layout>
