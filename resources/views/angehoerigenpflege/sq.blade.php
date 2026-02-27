@php
$steps = [
    ['icon' => 'fa-search',         'key' => 1, 'title' => 'Kontaktimi', 'desc' => 'Na kontaktoni me telefon, e-mail ose përmes formularit.'],
    ['icon' => 'fa-calendar-check', 'key' => 2, 'title' => 'Takimi i Parë', 'desc' => 'Njihemi me personin që ka nevojë për kujdes dhe familjarët.'],
    ['icon' => 'fa-bell',           'key' => 3, 'title' => 'Këshillimi', 'desc' => 'Së bashku sqarojmë situatën dhe çfarë mbështetjeje nevojitet.'],
    ['icon' => 'fa-user-doctor',    'key' => 4, 'title' => 'Planifikimi', 'desc' => 'Udhëzim hap-pas-hapi dhe hapat e radhës për kujdesin.'],
    ['icon' => 'fa-hands-helping',  'key' => 5, 'title' => 'Shoqërimi', 'desc' => 'Jemi rregullisht pranë dhe e shoqërojmë kujdesin.'],
    ['icon' => 'fa-comments',       'key' => 6, 'title' => 'Mbështetja', 'desc' => 'Këshilla, përgjigje dhe mbështetje sa herë keni nevojë.'],
    ['icon' => 'fa-shield-heart',   'key' => 7, 'title' => 'Lehtësimi', 'desc' => 'Siguri dhe lehtësim në përditshmëri për familjarët.'],
    ['icon' => 'fa-sliders',        'key' => 8, 'title' => 'Kontrolli & Përshtatja', 'desc' => 'Kontroll i rregullt dhe përshtatje kur është e nevojshme.'],
];
@endphp
<x-layout>
    <section class="bg-[#F6F9FC]" style="padding: 68px 28px;">
        <div class="mx-auto max-w-[1200px]">
            <div class="mb-[40px] text-center">
                <h2 class="mb-4 text-[38px] font-semibold text-gray-800">Kujdesi për të afërmit</h2>
                <p class="mx-auto max-w-[820px] text-[22px] leading-[1.7] text-gray-500">
                    Kujdesi për të afërmit do të thotë që familjarët kujdesen për të dashurit e tyre në shtëpi dhe nuk janë vetëm. Ne tregojmë hap pas hapi si funksionon kujdesi, mbështesim në përditshmëri dhe jemi aty kur ka pyetje ose pasiguri.
                </p>
                <span class="block mt-2 text-brand-pink font-semibold">Si funksionon kujdesi për të afërmit</span>
            </div>
            <div class="mt-10 grid gap-[25px]" style="grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));">
                @foreach($steps as $step)
                    <div class="group rounded-[15px] border-2 border-brand-blue/[.08] bg-transparent p-6 text-center transition-all duration-300 hover:-translate-y-[7px] hover:border-brand-pink hover:shadow-[0_15px_30px_rgba(18,72,126,0.11)]">
                        <div class="mx-auto mb-3.5 flex h-[54px] w-[54px] items-center justify-center rounded-full bg-gradient-to-br from-brand-blue to-[#1a5ba0] text-[1.5rem] font-bold text-white shadow-[0_5px_15px_rgba(18,72,126,0.15)]">
                            {{ $step['key'] }}
                        </div>
                        <div class="mb-3 text-[1.85rem] text-brand-pink">
                            <i class="fas {{ $step['icon'] }}"></i>
                        </div>
                        <h3 class="mb-2.5 text-[1.15rem] font-semibold text-brand-blue">{{ $step['title'] }}</h3>
                        <p class="text-[0.9rem] leading-normal text-gray-500">{{ $step['desc'] }}</p>
                    </div>
                @endforeach
            </div>
            <div class="mt-12 flex flex-col items-center">
                <img src="{{ asset('images/familienpflege.jpg') }}" alt="Kujdesi familjar në Zvicër" class="rounded-2xl shadow-lg max-w-full mb-6" style="max-width: 700px;">
                <div class="text-center">
                    <h3 class="text-brand-blue text-2xl font-bold mb-2">Kujdesi për të afërmit</h3>
                    <div class="mt-10 flex justify-center">
                        <div class="bg-white rounded-2xl shadow-lg px-8 py-8 max-w-[700px] w-full border border-brand-blue/20">
                            <h3 class="text-[1.35rem] font-bold text-brand-blue text-center mb-7">Si funksionon kujdesi për të afërmit</h3>
                            <div class="space-y-5">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-gradient-to-br from-brand-blue to-[#1a5ba0] text-white text-2xl shadow"><i class="fas fa-search"></i></div>
                                    <div>
                                        <span class="font-bold text-brand-blue">Kontakt</span> <span class="text-gray-700">– Ju na kontaktoni</span>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-brand-pink text-white text-2xl shadow"><i class="fas fa-comments"></i></div>
                                    <div>
                                        <span class="font-bold text-brand-pink">Këshillim</span> <span class="text-gray-700">– Diskutojmë situatën tuaj</span>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-gradient-to-br from-brand-blue to-[#1a5ba0] text-white text-2xl shadow"><i class="fas fa-calendar-check"></i></div>
                                    <div>
                                        <span class="font-bold text-brand-blue">Planifikim</span> <span class="text-gray-700">– Udhëzim hap pas hapi për kujdesin</span>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-brand-pink text-white text-2xl shadow"><i class="fas fa-hands-helping"></i></div>
                                    <div>
                                        <span class="font-bold text-brand-pink">Shoqërim</span> <span class="text-gray-700">– Mbështesim dhe jemi gjithmonë pranë</span>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-gradient-to-br from-brand-blue to-[#1a5ba0] text-white text-2xl shadow"><i class="fas fa-shield-heart"></i></div>
                                    <div>
                                        <span class="font-bold text-brand-blue">Lehtësim</span> <span class="text-gray-700">– Siguri dhe mbështetje në përditshmëri</span>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-brand-pink text-white text-2xl shadow"><i class="fas fa-sliders"></i></div>
                                    <div>
                                        <span class="font-bold text-brand-pink">Përshtatje</span> <span class="text-gray-700">– Kontroll i rregullt dhe optimizim</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-7">
                                <span class="font-semibold text-[1.08rem] text-brand-pink">Shkurt: ju kujdeseni – ne ju shoqërojmë. E thjeshtë, e sigurt dhe personale.</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-700 max-w-2xl mx-auto mb-2">
                        Kujdesi për të afërmit do të thotë që familjarët kujdesen për të dashurit e tyre në shtëpi dhe nuk janë vetëm. Ne tregojmë hap pas hapi si funksionon kujdesi, mbështesim në përditshmëri dhe jemi aty kur ka pyetje ose pasiguri.
                    </p>
                    <span class="text-brand-pink font-semibold">Si funksionon kujdesi për të afërmit</span>
                </div>
            </div>
        </div>
    </section>
</x-layout>
