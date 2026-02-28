<x-layout>
    {{-- ==================== HERO SECTION ==================== --}}
    <section id="home" class="relative flex min-h-[100vh] items-center overflow-hidden bg-[#F6F9FC]" style="padding: 50px 0 110px;">
        <div class="mx-auto w-full max-w-[1350px] px-5 md:px-9">
            <div class="flex flex-col-reverse items-center gap-8 lg:flex-row lg:gap-14">
                {{-- Text Side --}}
                <div class="w-full max-w-[600px] text-center lg:flex-1 lg:text-left">
                    <h1 class="mb-5 text-[1.7rem] font-bold leading-tight text-brand-blue sm:text-[2.2rem] md:text-[2.7rem] lg:text-[3.2rem] xl:text-[3.8rem] lg:leading-[1.05]">
                        {!! __('home.hero_title_html') !!}
                    </h1>
                    <p class="mx-auto mb-6 max-w-[600px] text-[1.05rem] leading-[1.55] text-gray-500 lg:mx-0">
                        {{ __('home.hero_subtitle') }}
                    </p>

                    {{-- CTA Buttons --}}
                    <div class="mb-7 flex flex-wrap justify-center gap-4 lg:justify-start">
                        <a href="{{ route('services') }}"
                           class="rounded-full border-2 border-brand-blue bg-brand-blue px-5 py-2 text-[0.98rem] font-semibold text-white transition duration-300 hover:shadow-lg hover:brightness-110 sm:px-8 sm:py-[15px] sm:text-[1.12rem]">
                            {{ __('home.hero_cta_primary') }}
                        </a>
                        <a href="#how-it-works"
                           class="rounded-full border-2 border-brand-blue bg-transparent px-5 py-2 text-[0.98rem] font-semibold text-brand-blue transition duration-300 hover:bg-brand-blue hover:text-white sm:px-8 sm:py-[15px] sm:text-[1.12rem]">
                            {{ __('home.hero_cta_secondary') }}
                        </a>
                    </div>

                    {{-- Stat Cards --}}
                    <div class="mt-[18px] flex flex-wrap justify-center gap-3.5 lg:justify-start">
                        <div class="flex min-h-[86px] min-w-[120px] flex-1 flex-col items-center justify-center rounded-xl bg-white px-[18px] py-4 text-center shadow-[0_6px_18px_rgba(18,72,126,0.06)]">
                            <span class="mb-1.5 text-[26px] font-bold text-brand-blue">15</span>
                            <span class="text-[13px] leading-tight text-gray-500">{{ __('home.stat_doctors') }}</span>
                        </div>
                        <div class="flex min-h-[86px] min-w-[120px] flex-1 flex-col items-center justify-center rounded-xl bg-white px-[18px] py-4 text-center shadow-[0_6px_18px_rgba(18,72,126,0.06)]">
                            <span class="mb-1.5 text-[26px] font-bold text-brand-blue">150</span>
                            <span class="text-[13px] leading-tight text-gray-500">{{ __('home.stat_patients') }}</span>
                        </div>
                        <div class="flex min-h-[86px] min-w-[120px] flex-1 flex-col items-center justify-center rounded-xl bg-white px-[18px] py-4 text-center shadow-[0_6px_18px_rgba(18,72,126,0.06)]">
                            <span class="mb-1.5 text-[26px] font-bold text-brand-blue">24/7</span>
                            <span class="text-[13px] leading-tight text-gray-500">{{ __('home.stat_online') }}</span>
                        </div>
                    </div>
                </div>

                {{-- Image Side --}}
                <div class="w-full text-center lg:flex-1">
                    <img src="{{ asset('images/cover.webp') }}" alt="{{ __('home.hero_image_alt') }}"
                        class="mx-auto block h-auto w-full max-w-[700px] rounded-2xl object-cover shadow-[0_20px_60px_rgba(18,72,126,0.15)] sm:h-[380px] md:h-[480px] lg:h-[580px]"
                        width="700" height="580" loading="eager" fetchpriority="high">
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== HOW IT WORKS ==================== --}}
    <section id="how-it-works" class="bg-white" style="padding: 65px 0;">
        <div class="mx-auto max-w-[1200px] px-6">
            <div class="mb-[45px] text-center">
                <h2 class="mb-3 text-[2.3rem] font-bold text-brand-blue">{{ __('home.how_it_works_title') }}</h2>
                <p class="mx-auto max-w-[680px] text-[1.05rem] leading-[1.65] text-gray-500">{{ __('home.how_it_works_subtitle') }}</p>
            </div>

            <div class="mt-10 grid gap-[25px]" style="grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));">
                @php
                    $steps = [
                        ['icon' => 'fa-search',         'key' => 1],
                        ['icon' => 'fa-calendar-check', 'key' => 2],
                        ['icon' => 'fa-bell',           'key' => 3],
                        ['icon' => 'fa-user-doctor',    'key' => 4],
                    ];
                @endphp

                @foreach($steps as $step)
                    <div class="group rounded-[15px] border-2 border-brand-blue/[.08] bg-transparent p-6 text-center transition-all duration-300 hover:-translate-y-[7px] hover:border-brand-pink hover:shadow-[0_15px_30px_rgba(18,72,126,0.11)]">
                        <div class="mx-auto mb-3.5 flex h-[54px] w-[54px] items-center justify-center rounded-full bg-gradient-to-br from-brand-blue to-[#1a5ba0] text-[1.5rem] font-bold text-white shadow-[0_5px_15px_rgba(18,72,126,0.15)]">
                            {{ $step['key'] }}
                        </div>
                        <div class="mb-3 text-[1.85rem] text-brand-pink">
                            <i class="fas {{ $step['icon'] }}"></i>
                        </div>
                        <h3 class="mb-2.5 text-[1.15rem] font-semibold text-brand-blue">{{ __('home.step_' . $step['key'] . '_title') }}</h3>
                        <p class="text-[0.9rem] leading-normal text-gray-500">{{ __('home.step_' . $step['key'] . '_description') }}</p>
                    </div>
                @endforeach
            </div>
            <div class="flex justify-center mt-8">
                <a href="{{ url('/angehoerigenpflege') }}" class="inline-block rounded-full bg-brand-pink px-8 py-3 text-white font-semibold text-lg shadow hover:bg-brand-pink/90 transition">
                    {{ __('home.view_more') }}
                </a>
            </div>
        </div>
    </section>

    {{-- ==================== OUR STORY ==================== --}}
    <section id="our-story" class="bg-[#F6F9FC]" style="padding: 40px 0;">
        <div class="mx-auto max-w-[1200px] px-5">
            {{-- Header --}}
            <div class="mb-[25px] text-center">
                <h2 class="mb-2 text-[1.7rem] font-bold text-brand-blue">{{ __('home.our_story_title') }}</h2>
                <p class="mx-auto max-w-[600px] text-[0.9rem] leading-[1.55] text-gray-500">{{ __('home.our_story_subtitle') }}</p>
            </div>

            {{-- Story 1 — Text left, Icon right --}}
            <div class="mb-[30px] grid items-center gap-[25px] md:grid-cols-2">
                <div class="order-1">
                    <div class="rounded-xl border-l-[3px] border-brand-blue bg-gradient-to-br from-brand-blue/5 to-brand-pink/5 p-5">
                        <div class="mb-3 flex items-center gap-2">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-brand-blue to-brand-pink text-[1.1rem] font-bold text-white">1</div>
                            <h3 class="text-[1.2rem] font-bold text-brand-blue">{{ __('home.story_1_title') }}</h3>
                        </div>
                        <p class="text-[0.9rem] leading-[1.55] text-gray-600">{{ __('home.story_1_text') }}</p>
                    </div>
                </div>
                <div class="order-2">
                    <div class="flex h-[220px] flex-col items-center justify-center overflow-hidden rounded-xl bg-gradient-to-br from-brand-blue to-brand-pink p-5 text-center text-white">
                        <i class="fas fa-heart mb-2.5 text-[2.2rem] opacity-90"></i>
                        <p class="text-[0.95rem] font-semibold">{{ __('home.story_1_title') }}</p>
                    </div>
                </div>
            </div>

            {{-- Story 2 — Icon left, Text right --}}
            <div class="mb-[30px] grid items-center gap-[25px] md:grid-cols-2">
                <div class="order-2 md:order-1">
                    <div class="flex h-[220px] flex-col items-center justify-center overflow-hidden rounded-xl bg-gradient-to-br from-brand-pink to-brand-blue p-5 text-center text-white">
                        <i class="fas fa-user-nurse mb-2.5 text-[2.2rem] opacity-90"></i>
                        <p class="text-[0.95rem] font-semibold">{{ __('home.story_2_title') }}</p>
                    </div>
                </div>
                <div class="order-1 md:order-2">
                    <div class="rounded-xl border-l-[3px] border-brand-pink bg-gradient-to-br from-brand-blue/5 to-brand-pink/5 p-5">
                        <div class="mb-3 flex items-center gap-2">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-brand-blue to-brand-pink text-[1.1rem] font-bold text-white">2</div>
                            <h3 class="text-[1.2rem] font-bold text-brand-blue">{{ __('home.story_2_title') }}</h3>
                        </div>
                        <p class="text-[0.9rem] leading-[1.55] text-gray-600">{{ __('home.story_2_text') }}</p>
                    </div>
                </div>
            </div>

            {{-- Story 3 — Text left, Icon right --}}
            <div class="mb-[25px] grid items-center gap-[25px] md:grid-cols-2">
                <div class="order-1">
                    <div class="rounded-xl border-l-[3px] border-brand-blue bg-gradient-to-br from-brand-blue/5 to-brand-pink/5 p-5">
                        <div class="mb-3 flex items-center gap-2">
                            <div class="flex h-10 w-10 items-center justify-center rounded-full bg-gradient-to-br from-brand-blue to-brand-pink text-[1.1rem] font-bold text-white">3</div>
                            <h3 class="text-[1.2rem] font-bold text-brand-blue">{{ __('home.story_3_title') }}</h3>
                        </div>
                        <p class="text-[0.9rem] leading-[1.55] text-gray-600">{{ __('home.story_3_text') }}</p>
                    </div>
                </div>
                <div class="order-2">
                    <div class="flex h-[220px] flex-col items-center justify-center overflow-hidden rounded-xl bg-gradient-to-br from-brand-blue to-brand-pink p-5 text-center text-white">
                        <i class="fas fa-hands-holding-circle mb-2.5 text-[2.2rem] opacity-90"></i>
                        <p class="text-[0.95rem] font-semibold">{{ __('home.story_3_title') }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Mobile: single column --}}
        <style>
            @media (max-width: 768px) {
                #our-story .grid { grid-template-columns: 1fr !important; }
                #our-story .grid > div { order: unset !important; }
            }
        </style>
    </section>

    {{-- ==================== SERVICES ==================== --}}
    <section id="services" class="bg-white" style="padding: 50px 0;" x-data="{ filter: 'all' }">
        <div class="mx-auto max-w-[1200px] px-5">
            <div class="mb-2.5 text-center">
                <h2 class="mb-2.5 text-[28px] font-bold text-brand-blue">{{ __('home.services_title') }}</h2>
                <p class="mx-auto max-w-2xl text-[14px] text-gray-500" style="margin-bottom: 25px;">{{ __('home.services_subtitle') }}</p>
            </div>

            {{-- Filter Buttons --}}
            <div class="mb-[25px] flex flex-wrap justify-center gap-2.5">
                @foreach(['all' => __('home.filter_all'), 'care' => __('home.filter_care'), 'health' => __('home.filter_health'), 'activity' => __('home.filter_activity')] as $key => $label)
                    <button @click="filter = '{{ $key }}'"
                            :class="filter === '{{ $key }}'
                                ? 'bg-gradient-to-r from-brand-blue to-brand-pink text-white border-transparent shadow-[0_4px_12px_rgba(18,72,126,0.25)]'
                                : 'bg-white text-brand-blue border-brand-blue/[.14] hover:-translate-y-0.5 hover:shadow-[0_4px_12px_rgba(18,72,126,0.2)]'"
                            class="rounded-full border-2 px-5 py-2 text-sm font-semibold transition-all duration-300">
                        {{ $label }}
                    </button>
                @endforeach
            </div>

            {{-- Service Cards --}}
            @php
                $services = [
                    ['icon' => 'fa-user-nurse',  'title' => __('home.service_elderly_care'),  'desc' => __('home.service_elderly_care_desc'),  'cat' => 'care'],
                    ['icon' => 'fa-bath',        'title' => __('home.service_hygiene'),        'desc' => __('home.service_hygiene_desc'),        'cat' => 'care'],
                    ['icon' => 'fa-scissors',    'title' => __('home.service_hair'),           'desc' => __('home.service_hair_desc'),           'cat' => 'care'],
                    ['icon' => 'fa-utensils',    'title' => __('home.service_eating'),         'desc' => __('home.service_eating_desc'),         'cat' => 'care'],
                    ['icon' => 'fa-pills',       'title' => __('home.service_medication'),     'desc' => __('home.service_medication_desc'),     'cat' => 'health'],
                    ['icon' => 'fa-eye',         'title' => __('home.service_monitoring'),     'desc' => __('home.service_monitoring_desc'),     'cat' => 'health'],
                    ['icon' => 'fa-palette',     'title' => __('home.service_activities'),     'desc' => __('home.service_activities_desc'),     'cat' => 'activity'],
                    ['icon' => 'fa-ambulance',   'title' => __('home.service_transport'),      'desc' => __('home.service_transport_desc'),      'cat' => 'health'],
                ];
            @endphp

            <div class="mt-[30px] grid gap-5" style="grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));">
                @foreach($services as $service)
                    <div x-show="filter === 'all' || filter === '{{ $service['cat'] }}'"
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 scale-95"
                         x-transition:enter-end="opacity-100 scale-100"
                         class="group relative mx-auto w-full max-w-[350px] overflow-hidden rounded-2xl border-2 border-brand-blue/[.08] bg-gradient-to-br from-white to-gray-50 p-6 text-center shadow-[0_2px_8px_rgba(0,0,0,0.06)] transition duration-300 hover:-translate-y-[5px] hover:border-brand-blue/20 hover:bg-white hover:shadow-[0_8px_24px_rgba(18,72,126,0.12)]">
                        {{-- Gradient top bar on hover --}}
                        <div class="absolute left-0 right-0 top-0 h-1 origin-left scale-x-0 bg-gradient-to-r from-brand-blue to-brand-pink transition-transform duration-300 group-hover:scale-x-100"></div>

                        <div class="relative z-[1] mx-auto mb-3 flex h-[70px] w-[70px] items-center justify-center rounded-full bg-gradient-to-br from-brand-blue/10 to-brand-pink/10 text-[36px] text-brand-blue shadow-[0_2px_8px_rgba(18,72,126,0.08)] transition duration-300 group-hover:bg-gradient-to-r group-hover:from-brand-blue group-hover:to-brand-pink group-hover:text-white group-hover:scale-105 group-hover:shadow-[0_4px_12px_rgba(18,72,126,0.15)]">
                            <i class="fas {{ $service['icon'] }}"></i>
                        </div>
                        <h3 class="relative z-[1] mb-2 text-[17px] font-bold text-brand-blue">{{ $service['title'] }}</h3>
                        <p class="relative z-[1] m-0 text-[13px] leading-relaxed text-gray-500">{{ $service['desc'] }}</p>
                    </div>
                @endforeach
            </div>

            {{-- Service CTAs --}}
            <div class="mt-[35px] flex flex-wrap justify-center gap-3">
                <a href="{{ route('services') }}"
                   class="inline-flex items-center gap-2 rounded-full bg-gradient-to-r from-brand-blue to-brand-pink px-8 py-3 text-[14px] font-bold text-white shadow-[0_4px_15px_rgba(18,72,126,0.25)] transition duration-300 hover:-translate-y-0.5 hover:shadow-[0_6px_20px_rgba(18,72,126,0.35)]">
                    <i class="fas fa-calendar-check"></i>
                    {{ __('home.services_cta') }}
                </a>
                <a href="{{ route('services-details') }}"
                   class="inline-flex items-center gap-2 rounded-full border-2 border-brand-blue/25 bg-white px-7 py-3 text-[14px] font-bold text-brand-blue transition duration-300 hover:-translate-y-0.5 hover:shadow-[0_6px_20px_rgba(18,72,126,0.15)]">
                    <i class="fas fa-list-check"></i>
                    {{ __('home.services_details_cta') }}
                </a>
            </div>
        </div>
    </section>

    {{-- ==================== GALLERY ==================== --}}
    <section id="gallery" class="bg-[#f9fafb]" style="padding: 68px 28px;" x-data="{ lightbox: false, current: '' }">
        <div class="mx-auto max-w-[1200px]">
            <div class="mb-[42px] text-center">
                <h2 class="mb-4 text-[38px] font-semibold text-gray-800">{{ __('home.gallery_title') }}</h2>
                <p class="mx-auto max-w-[820px] text-[22px] leading-[1.7] text-gray-500">{{ __('home.gallery_subtitle') }}</p>
            </div>

            <div class="mt-[42px] grid gap-7" style="grid-template-columns: repeat(auto-fit, minmax(340px, 1fr));">
                @foreach(['post1', 'post2', 'post3'] as $img)
                    <div @click="lightbox = true; current = '{{ asset('images/' . $img . '.webp') }}'"
                         class="group cursor-pointer overflow-hidden rounded-3xl border border-brand-blue/10 bg-brand-blue/[.03] shadow-sm transition-all duration-400 hover:-translate-y-1 hover:shadow-lg"
                         style="height: 420px;">
                        <picture>
                            <source srcset="{{ asset('images/' . $img . '.webp') }}" type="image/webp">
                            <img src="{{ asset('images/' . $img . '.webp') }}" alt="Elderly care gallery"
                                 class="h-full w-full object-contain transition-transform duration-600 group-hover:scale-[1.04]"
                                 loading="lazy" width="600" height="400">
                        </picture>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Lightbox --}}
        <div x-show="lightbox" x-transition.opacity @click="lightbox = false" x-cloak
             class="fixed inset-0 z-[9999] flex items-center justify-center bg-gray-800/[.94] p-4 backdrop-blur-lg">
            <img :src="current" class="max-h-[92%] max-w-[92%] rounded-xl object-contain shadow-lg" alt="Gallery">
            <button @click="lightbox = false"
                    class="absolute right-[42px] top-8 flex h-14 w-14 items-center justify-center rounded-full bg-white/10 text-[42px] text-white transition hover:rotate-90 hover:bg-white/20">&times;</button>
        </div>
    </section>

    {{-- ==================== REVIEWS ==================== --}}
    <section class="bg-[#f9fafb]" style="padding: 68px 28px;" x-data="{
        current: 0,
        reviews: [
            { name: 'Maria S.', initials: 'MS', text: `&quot;{{ __('home.review_1_text') }}&quot;` },
            { name: 'Thomas M.', initials: 'TM', text: `&quot;{{ __('home.review_2_text') }}&quot;` },
            { name: 'Sophie D.', initials: 'SD', text: `&quot;{{ __('home.review_3_text') }}&quot;` }
        ],
        init() { setInterval(() => this.current = (this.current + 1) % this.reviews.length, 7000) }
    }">
        <div class="mx-auto max-w-[1200px]">
            <div class="mb-[50px] text-center">
                <h2 class="mb-4 text-[38px] font-semibold text-gray-800">{{ __('home.reviews_title') }}</h2>
                <p class="mx-auto max-w-[820px] text-[22px] leading-[1.7] text-gray-500">{{ __('home.reviews_subtitle') }}</p>
            </div>

            <div class="relative mx-auto max-w-[900px]">
                {{-- Slides --}}
                <div class="relative min-h-[320px] overflow-hidden">
                    <template x-for="(review, i) in reviews" :key="i">
                        <div x-show="current === i"
                             x-transition:enter="transition ease-out duration-700"
                             x-transition:enter-start="opacity-0 translate-x-[60px]"
                             x-transition:enter-end="opacity-100 translate-x-0"
                             class="absolute inset-0 w-full" style="pointer-events: none;"
                             :style="current === i ? 'pointer-events: auto;' : ''">
                            <div class="mx-auto max-w-[680px] rounded-[28px] border border-brand-pink/10 bg-white p-[42px] shadow-md transition-all duration-500 hover:-translate-y-1 hover:shadow-lg hover:border-brand-pink">
                                <div class="mb-5 flex items-center gap-4">
                                    <div class="flex h-[60px] w-[60px] shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-brand-blue to-brand-pink text-[20px] font-bold text-white shadow-[0_4px_12px_rgba(18,72,126,0.15)]" x-text="review.initials"></div>
                                    <div>
                                        <h4 class="mb-1 text-base font-bold text-gray-800" x-text="review.name"></h4>
                                        <div class="text-[18px] text-yellow-400">★★★★★</div>
                                    </div>
                                </div>
                                <p class="text-base italic leading-[1.8] text-gray-500" x-html="review.text"></p>
                            </div>
                        </div>
                    </template>
                </div>

                {{-- Arrows --}}
                <button @click="current = (current - 1 + reviews.length) % reviews.length"
                        class="absolute top-1/2 z-10 hidden -translate-y-1/2 items-center justify-center rounded-full border-2 border-brand-blue bg-white text-brand-blue shadow-md transition hover:bg-brand-blue hover:text-white hover:scale-[1.08] lg:flex" style="left: -72px; width: 54px; height: 54px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg>
                </button>
                <button @click="current = (current + 1) % reviews.length"
                        class="absolute top-1/2 z-10 hidden -translate-y-1/2 items-center justify-center rounded-full border-2 border-brand-blue bg-white text-brand-blue shadow-md transition hover:bg-brand-blue hover:text-white hover:scale-[1.08] lg:flex" style="right: -72px; width: 54px; height: 54px;">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
                </button>

                {{-- Mobile arrows --}}
                <div class="mt-4 flex justify-center gap-4 lg:hidden">
                    <button @click="current = (current - 1 + reviews.length) % reviews.length"
                            class="flex h-12 w-12 items-center justify-center rounded-full border-2 border-brand-blue bg-white text-brand-blue transition hover:bg-brand-blue hover:text-white">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18l-6-6 6-6"/></svg>
                    </button>
                    <button @click="current = (current + 1) % reviews.length"
                            class="flex h-12 w-12 items-center justify-center rounded-full border-2 border-brand-blue bg-white text-brand-blue transition hover:bg-brand-blue hover:text-white">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 18l6-6-6-6"/></svg>
                    </button>
                </div>

                {{-- Dots --}}
                <div class="mt-[42px] flex justify-center gap-3.5">
                    <template x-for="(r, i) in reviews" :key="i">
                        <button @click="current = i"
                                :class="current === i ? 'bg-brand-pink w-9 rounded-lg' : 'bg-brand-blue/25 w-3 rounded-full hover:bg-brand-blue'"
                                class="h-3 transition-all duration-300"></button>
                    </template>
                </div>
            </div>
        </div>
    </section>

    {{-- ==================== TEAM ==================== --}}
    <!-- <section class="bg-[#F6F9FC]" style="padding: 68px 28px;">
        <div class="mx-auto max-w-[1200px]">
            <div class="mb-[60px] text-center">
                <h2 class="mb-4 text-[38px] font-semibold text-gray-800">{{ __('home.team_title') }}</h2>
                <p class="mx-auto max-w-[820px] text-[22px] leading-[1.7] text-gray-500">{{ __('home.team_subtitle') }}</p>
            </div>

            <div class="grid gap-[30px]" style="grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));">
                @php
                    $team = [
                        ['img' => 'doctor2', 'name' => 'Dr. Anna Weber',      'role' => __('home.team_role_1'), 'bio' => __('home.team_bio_1'), 'skills' => [__('home.team_skill_1_1'), __('home.team_skill_1_2'), __('home.team_skill_1_3')]],
                        ['img' => 'doctor1', 'name' => 'Dr. Michael Schmidt', 'role' => __('home.team_role_2'), 'bio' => __('home.team_bio_2'), 'skills' => [__('home.team_skill_2_1'), __('home.team_skill_2_2'), __('home.team_skill_2_3')]],
                        ['img' => 'doctor3', 'name' => 'Sarah Müller',        'role' => __('home.team_role_3'), 'bio' => __('home.team_bio_3'), 'skills' => [__('home.team_skill_3_1'), __('home.team_skill_3_2'), __('home.team_skill_3_3')]],
                    ];
                @endphp

                @foreach($team as $member)
                    <div class="group overflow-hidden rounded-[28px] border border-brand-blue/[.08] bg-white text-center shadow-md transition-all duration-500 hover:-translate-y-1.5 hover:border-brand-blue hover:shadow-xl">
                        <div class="h-[320px] overflow-hidden bg-brand-blue/5">
                            <picture>
                                <source srcset="{{ asset('images/' . $member['img'] . '.webp') }}" type="image/webp">
                                <img src="{{ asset('images/' . $member['img'] . '.webp') }}" alt="{{ $member['name'] }}"
                                     class="h-full w-full object-cover transition-transform duration-600 group-hover:scale-[1.08]"
                                     loading="lazy" width="400" height="320">
                            </picture>
                        </div>
                        <div class="p-7">
                            <h3 class="mb-1 text-[28px] font-semibold text-gray-800">{{ $member['name'] }}</h3>
                            <p class="mb-4 text-base font-semibold text-brand-pink">{{ $member['role'] }}</p>
                            <div class="mb-4 flex flex-wrap justify-center gap-1.5">
                                @foreach($member['skills'] as $skill)
                                    <span class="rounded-2xl bg-brand-pink/10 px-3.5 py-1.5 text-[14px] font-semibold text-brand-pink">{{ $skill }}</span>
                                @endforeach
                            </div>
                            <p class="text-base leading-[1.7] text-gray-500">{{ $member['bio'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section> -->

    {{-- ==================== CONTACT ==================== --}}
    <section id="contact" class="bg-[#f8fafc]" style="padding: 68px 28px;">
        <div class="mx-auto max-w-[1200px]">
            <div class="mb-10 text-center">
                <h2 class="mb-4 text-[38px] font-semibold text-gray-800">{{ __('home.contact_title') }}</h2>
                <p class="mx-auto max-w-[820px] text-[22px] leading-[1.7] text-gray-500">{{ __('home.contact_subtitle') }}</p>
            </div>

            <div class="mt-10 grid gap-[30px] lg:grid-cols-2">
                {{-- Left: Contact Info --}}
                <div>
                    {{-- Contact Cards --}}
                    <div class="mb-5 grid gap-3">
                        {{-- Phone --}}
                        <div class="flex items-center gap-5 rounded-xl bg-white p-4 shadow-[0_3px_12px_rgba(0,0,0,0.06)]">
                            <div class="flex h-[35px] w-[35px] shrink-0 items-center justify-center rounded-full bg-brand-blue text-white shadow-[0_6px_18px_rgba(18,72,126,0.12)] transition hover:-translate-y-1">
                                <i class="fas fa-phone-volume text-[16px]"></i>
                            </div>
                            <div>
                                <h4 class="mb-0.5 text-[14px] font-semibold text-gray-800">{{ __('home.contact_phone') }}</h4>
                                <a href="tel:+41714227777" class="text-[14px] font-semibold text-brand-blue hover:underline">+41 71 422 77 77</a>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="flex items-center gap-5 rounded-xl bg-white p-4 shadow-[0_3px_12px_rgba(0,0,0,0.06)]">
                            <div class="flex h-[35px] w-[35px] shrink-0 items-center justify-center rounded-full bg-brand-blue text-white shadow-[0_6px_18px_rgba(18,72,126,0.12)] transition hover:-translate-y-1">
                                <i class="fas fa-paper-plane text-[16px]"></i>
                            </div>
                            <div>
                                <h4 class="mb-0.5 text-[14px] font-semibold text-gray-800">{{ __('home.contact_email_label') }}</h4>
                                <a href="mailto:info@janiracare.ch" class="text-[14px] font-semibold text-brand-blue hover:underline">info@janiracare.ch</a>
                            </div>
                        </div>

                        {{-- Address --}}
                        <div class="flex items-center gap-5 rounded-xl bg-white p-4 shadow-[0_3px_12px_rgba(0,0,0,0.06)]">
                            <div class="flex h-[35px] w-[35px] shrink-0 items-center justify-center rounded-full bg-brand-blue text-white shadow-[0_6px_18px_rgba(18,72,126,0.12)] transition hover:-translate-y-1">
                                <i class="fas fa-location-dot text-[16px]"></i>
                            </div>
                            <div>
                                <h4 class="mb-0.5 text-[14px] font-semibold text-gray-800">{{ __('home.contact_address') }}</h4>
                                <p class="m-0 text-[13px] leading-[1.5] text-gray-500">Bahnhofstrasse 123<br>8001 Zürich, Schweiz</p>
                            </div>
                        </div>

                        {{-- Hours --}}
                        <div class="flex items-center gap-5 rounded-xl bg-white p-4 shadow-[0_3px_12px_rgba(0,0,0,0.06)]">
                            <div class="flex h-[35px] w-[35px] shrink-0 items-center justify-center rounded-full bg-brand-blue text-white shadow-[0_6px_18px_rgba(18,72,126,0.12)] transition hover:-translate-y-1">
                                <i class="fas fa-clock text-[16px]"></i>
                            </div>
                            <div>
                                <h4 class="mb-0.5 text-[14px] font-semibold text-gray-800">{{ __('home.contact_hours') }}</h4>
                                <p class="m-0 text-[13px] leading-[1.5] text-gray-500">{{ __('home.contact_hours_weekdays') }}<br>{{ __('home.contact_hours_weekend') }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Social Links --}}
                    <div class="rounded-xl bg-white p-5 shadow-[0_3px_12px_rgba(0,0,0,0.06)]">
                        <h4 class="mb-3 text-[15px] font-semibold text-gray-800">{{ __('home.contact_follow_us') }}</h4>
                        <div class="flex gap-4">
                            <a href="https://www.facebook.com/profile.php?id=61586744824189&locale=sq_AL" target="_blank" rel="noopener"
                               class="flex h-[50px] w-[50px] items-center justify-center rounded-full bg-[#1877f2] text-[18px] text-white transition hover:-translate-y-[5px]">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://www.instagram.com/janiracare/" target="_blank" rel="noopener"
                               class="flex h-[50px] w-[50px] items-center justify-center rounded-full text-[18px] text-white transition hover:-translate-y-[5px]"
                               style="background: radial-gradient(circle at 30% 30%, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%)">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="https://www.linkedin.com/in/janira-care-3201833a7" target="_blank" rel="noopener"
                               class="flex h-[50px] w-[50px] items-center justify-center rounded-full bg-[#0077b5] text-[18px] text-white transition hover:-translate-y-[5px]">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Right: Contact Form --}}
                <div class="rounded-xl bg-white p-[25px] shadow-[0_3px_12px_rgba(0,0,0,0.06)]">
                    {{-- Logo --}}
                    <div class="mb-[15px] text-center">
                        <picture>
                            <source srcset="{{ asset('images/logo.webp') }}" type="image/webp">
                            <img src="{{ asset('images/logo.webp') }}" alt="{{ __('home.nav_brand') }}" class="mx-auto" style="max-width: 80px; height: auto;" loading="lazy">
                        </picture>
                    </div>

                    <h3 class="mb-2 text-center text-[18px] font-bold text-brand-blue">{{ __('home.contact_form_title') }}</h3>
                    <p class="mb-5 text-center text-[13px] text-gray-500">{{ __('home.contact_form_subtitle') }}</p>

                    @if(session('success'))
                        <div class="mb-[15px] rounded-lg bg-gradient-to-r from-brand-blue to-brand-pink p-[10px_16px] text-center text-[13px] font-medium text-white">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.store') }}" class="grid gap-[14px]">
                        @csrf
                        {{-- First Name --}}
                        <div>
                            <label class="mb-1.5 flex items-center gap-1.5 text-[13px] font-semibold text-brand-blue">
                                <i class="fas fa-user text-[12px] text-brand-pink"></i>
                                {{ __('home.contact_first_name') }}
                            </label>
                            <input type="text" name="first_name" value="{{ old('first_name') }}" required
                                   class="w-full rounded-lg border-2 border-gray-200 px-3.5 py-2.5 text-[13px] transition focus:border-brand-blue focus:shadow-[0_0_0_3px_rgba(18,72,126,0.08)] focus:ring-0 focus:outline-none">
                            @error('first_name')<p class="mt-1 text-xs text-red-500"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>@enderror
                        </div>

                        {{-- Last Name --}}
                        <div>
                            <label class="mb-1.5 flex items-center gap-1.5 text-[13px] font-semibold text-brand-blue">
                                <i class="fas fa-user text-[12px] text-brand-pink"></i>
                                {{ __('home.contact_last_name') }}
                            </label>
                            <input type="text" name="last_name" value="{{ old('last_name') }}"
                                   class="w-full rounded-lg border-2 border-gray-200 px-3.5 py-2.5 text-[13px] transition focus:border-brand-blue focus:shadow-[0_0_0_3px_rgba(18,72,126,0.08)] focus:ring-0 focus:outline-none">
                            @error('last_name')<p class="mt-1 text-xs text-red-500"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>@enderror
                        </div>

                        {{-- Email --}}
                        <div>
                            <label class="mb-1.5 flex items-center gap-1.5 text-[13px] font-semibold text-brand-blue">
                                <i class="fas fa-envelope text-[12px] text-brand-pink"></i>
                                {{ __('home.contact_email') }}
                            </label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                   class="w-full rounded-lg border-2 border-gray-200 px-3.5 py-2.5 text-[13px] transition focus:border-brand-blue focus:shadow-[0_0_0_3px_rgba(18,72,126,0.08)] focus:ring-0 focus:outline-none">
                            @error('email')<p class="mt-1 text-xs text-red-500"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>@enderror
                        </div>

                        {{-- Message --}}
                        <div>
                            <label class="mb-1.5 flex items-center gap-1.5 text-[13px] font-semibold text-brand-blue">
                                <i class="fas fa-message text-[12px] text-brand-pink"></i>
                                {{ __('home.contact_message') }}
                            </label>
                            <textarea name="message" required rows="4" style="min-height: 100px;"
                                      class="w-full resize-y rounded-lg border-2 border-gray-200 px-3.5 py-2.5 font-[inherit] text-[13px] leading-relaxed transition focus:border-brand-blue focus:shadow-[0_0_0_3px_rgba(18,72,126,0.08)] focus:ring-0 focus:outline-none">{{ old('message') }}</textarea>
                            @error('message')<p class="mt-1 text-xs text-red-500"><i class="fas fa-exclamation-circle"></i> {{ $message }}</p>@enderror
                        </div>

                        <button type="submit"
                                class="flex w-full items-center justify-center gap-2 rounded-full bg-gradient-to-r from-brand-blue to-brand-pink py-3 text-[14px] font-bold text-white shadow-[0_4px_15px_rgba(18,72,126,0.25)] transition hover:-translate-y-0.5 hover:shadow-[0_6px_20px_rgba(18,72,126,0.35)]">
                            <i class="fas fa-paper-plane"></i>
                            {{ __('home.contact_submit') }}
                        </button>
                    </form>
                </div>
            </div>

            <style>
                @media (max-width: 768px) {
                    #contact .lg\:grid-cols-2 { grid-template-columns: 1fr !important; }
                }
            </style>
        </div>
    </section>

    {{-- ==================== BACK TO TOP ==================== --}}
    <div x-data="{ show: false }" @scroll.window="show = window.scrollY > 300">
        <button x-show="show" x-transition @click="window.scrollTo({ top: 0, behavior: 'smooth' })"
                class="fixed bottom-[42px] right-[42px] z-50 flex h-14 w-14 items-center justify-center rounded-full border-2 border-brand-blue/10 bg-white text-brand-blue shadow-lg transition hover:bg-brand-pink hover:text-white hover:border-brand-pink hover:-translate-y-0.5 hover:scale-105">
            <i class="fas fa-chevron-up text-[18px]"></i>
        </button>
    </div>
</x-layout>
