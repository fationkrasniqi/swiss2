<x-layout>
    {{-- HERO SECTION --}}
    <section class="relative bg-gradient-to-b from-white to-[#F8FAFE] py-16 px-4 sm:px-6 lg:px-8 overflow-hidden">
        <!-- Decorative Elements -->
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-80 h-80 bg-brand-blue/5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-80 h-80 bg-brand-pink/5 rounded-full blur-3xl"></div>
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="inline-block px-4 py-2 bg-brand-blue/10 text-brand-blue rounded-full text-sm font-semibold tracking-wider uppercase mb-4">
                    {{ __('angehoerigenpflege.subtitle') }}
                </span>
                <!-- <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-brand-blue mb-6 leading-tight">
                    {{ __('angehoerigenpflege.title') }}
                </h2> -->
                <p class="text-lg md:text-xl text-gray-600 leading-relaxed mb-4">
                    {{ __('angehoerigenpflege.desc') }}
                </p>
                <div class="h-1 w-24 bg-gradient-to-r from-brand-blue to-brand-pink mx-auto rounded-full"></div>
            </div>



            {{-- Main Grid Layout --}}
            <div class="mt-10 grid gap-[25px]" style="grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));">
                @php
                    $steps = [
                        ['icon' => 'fa-search',         'key' => 1],
                        ['icon' => 'fa-calendar-check', 'key' => 2],
                        ['icon' => 'fa-bell',           'key' => 3],
                        ['icon' => 'fa-user-doctor',    'key' => 4],
                        ['icon' => 'fa-hands-helping',  'key' => 5],
                        ['icon' => 'fa-comments',       'key' => 6],
                        ['icon' => 'fa-shield-heart',   'key' => 7],
                        ['icon' => 'fa-sliders',        'key' => 8],
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
                        <h3 class="mb-2.5 text-[1.15rem] font-semibold text-brand-blue">{{ __('angehoerigenpflege.step' . $step['key'] . '_title') }}</h3>
                        <p class="text-[0.9rem] leading-normal text-gray-500">{{ __('angehoerigenpflege.step' . $step['key'] . '_desc') }}</p>
                    </div>
                @endforeach
            </div>

            {{-- Foto midis grid-it të 8 hapave dhe grid-it të dytë --}}
            <div class="flex justify-center mt-10 mb-10">
                <img src="{{ asset('images/final.webp') }}" alt="Pflege illustrative" class="rounded-2xl shadow-lg w-full h-[380px] object-cover">
            </div>

            {{-- Benefits Grid --}}
            <!-- <div class="grid md:grid-cols-2 gap-8 mb-16">
                <div class="bg-gradient-to-br from-brand-blue/5 to-transparent rounded-2xl p-8">
                    <div class="w-14 h-14 bg-brand-blue/10 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-shield-heart text-2xl text-brand-blue"></i>
                    </div>
                    <h4 class="text-xl font-bold text-brand-blue mb-3">{{ __('angehoerigenpflege.step7_title') }}</h4>
                    <p class="text-gray-600 leading-relaxed">{{ __('angehoerigenpflege.step7_desc') }}</p>
                </div>
                <div class="bg-gradient-to-br from-brand-pink/5 to-transparent rounded-2xl p-8">
                    <div class="w-14 h-14 bg-brand-pink/10 rounded-xl flex items-center justify-center mb-6">
                        <i class="fas fa-clock text-2xl text-brand-pink"></i>
                    </div>
                    <h4 class="text-xl font-bold text-brand-blue mb-3">{{ __('angehoerigenpflege.step6_title') }}</h4>
                    <p class="text-gray-600 leading-relaxed">{{ __('angehoerigenpflege.step6_desc') }}</p>
                </div>
            </div> -->

            {{-- Vetëm grid me pikat dhe ikonat në të majtë --}}
            <div class="mt-10 flex flex-col gap-5">
                @php
                    $steps = [
                        ['icon' => 'fa-search',         'key' => 1],
                        ['icon' => 'fa-calendar-check', 'key' => 2],
                        ['icon' => 'fa-bell',           'key' => 3],
                        ['icon' => 'fa-user-doctor',    'key' => 4],
                        ['icon' => 'fa-hands-helping',  'key' => 5],
                        ['icon' => 'fa-sliders',        'key' => 8],
                    ];
                @endphp
                @foreach($steps as $step)
                    <div class="flex items-center gap-4 rounded-[15px] border-2 border-brand-blue/[.08] bg-transparent p-5 transition-all duration-300 hover:border-brand-pink hover:shadow-[0_8px_20px_rgba(255,0,128,0.08)]">
                        <div class="flex h-[48px] w-[48px] items-center justify-center rounded-full bg-brand-pink text-white text-[1.5rem] font-bold shadow-[0_3px_10px_rgba(255,0,128,0.13)]">
                            <i class="fas {{ $step['icon'] }}"></i>
                        </div>
                        <div>
                            <div class="text-[1.08rem] font-semibold text-brand-blue">{{ __('angehoerigenpflege.step' . $step['key'] . '_title') }}</div>
                            <div class="text-[0.95rem] leading-normal text-gray-500">{{ __('angehoerigenpflege.step' . $step['key'] . '_desc') }}</div>
                        </div>
                    </div>
                @endforeach
            </div>

           
        </div>
    </section>
</x-layout>
