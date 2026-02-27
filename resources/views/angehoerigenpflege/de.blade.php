@php
$steps = [
    ['icon' => 'fa-search',         'key' => 1, 'title' => 'Kontaktaufnahme', 'desc' => 'Sie melden sich bei uns – telefonisch, per E-Mail oder über unser Kontaktformular.'],
    ['icon' => 'fa-calendar-check', 'key' => 2, 'title' => 'Erstgespräch', 'desc' => 'Wir lernen die pflegebedürftige Person und die Angehörigen kennen.'],
    ['icon' => 'fa-bell',           'key' => 3, 'title' => 'Beratung', 'desc' => 'Gemeinsam klären wir Ihre Situation und welche Unterstützung sinnvoll ist.'],
    ['icon' => 'fa-user-doctor',    'key' => 4, 'title' => 'Planung', 'desc' => 'Schritt-für-Schritt-Anleitung und klare nächste Schritte für die Pflege.'],
    ['icon' => 'fa-hands-helping',  'key' => 5, 'title' => 'Begleitung', 'desc' => 'Wir sind regelmäßig vor Ort und begleiten die Pflege.'],
    ['icon' => 'fa-comments',       'key' => 6, 'title' => 'Unterstützung', 'desc' => 'Tipps, Antworten und Unterstützung jederzeit verfügbar.'],
    ['icon' => 'fa-shield-heart',   'key' => 7, 'title' => 'Entlastung', 'desc' => 'Sicherheit und Entlastung im Alltag für Angehörige.'],
    ['icon' => 'fa-sliders',        'key' => 8, 'title' => 'Kontrolle & Anpassung', 'desc' => 'Regelmäßige Kontrolle und Anpassung bei Bedarf.'],
];
@endphp
<x-layout>
    <section class="bg-[#F6F9FC]" style="padding: 68px 28px;">
        <div class="mx-auto max-w-[1200px]">
            <div class="mb-[40px] text-center">
                <h2 class="mb-4 text-[38px] font-semibold text-gray-800">Pflege für Angehörige</h2>
                <p class="mx-auto max-w-[820px] text-[22px] leading-[1.7] text-gray-500">
                    Pflege für Angehörige bedeutet, dass Familienmitglieder ihre Liebsten zu Hause pflegen und dabei nicht allein sind. Wir zeigen Schritt für Schritt, wie die Pflege funktioniert, unterstützen im Alltag und sind da, wenn Fragen oder Unsicherheiten auftauchen.
                </p>
                <span class="block mt-2 text-brand-pink font-semibold">So funktioniert die Angehörigenpflege</span>
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
                <img src="{{ asset('images/familienpflege.jpg') }}" alt="Familienpflege in der Schweiz" class="rounded-2xl shadow-lg max-w-full mb-6" style="max-width: 700px;">
                <div class="text-center">
                    <h3 class="text-brand-blue text-2xl font-bold mb-2">Pflege für Angehörige</h3>
                    <div class="mt-10 flex justify-center">
                        <div class="bg-white rounded-2xl shadow-lg px-8 py-8 max-w-[700px] w-full border border-brand-blue/20">
                            <h3 class="text-[1.35rem] font-bold text-brand-blue text-center mb-7">So funktioniert die Angehörigenpflege</h3>
                            <div class="space-y-5">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-gradient-to-br from-brand-blue to-[#1a5ba0] text-white text-2xl shadow"><i class="fas fa-search"></i></div>
                                    <div>
                                        <span class="font-bold text-brand-blue">Kontakt</span> <span class="text-gray-700">– Sie melden sich bei uns</span>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-brand-pink text-white text-2xl shadow"><i class="fas fa-comments"></i></div>
                                    <div>
                                        <span class="font-bold text-brand-pink">Beratung</span> <span class="text-gray-700">– Wir besprechen Ihre Situation</span>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-gradient-to-br from-brand-blue to-[#1a5ba0] text-white text-2xl shadow"><i class="fas fa-calendar-check"></i></div>
                                    <div>
                                        <span class="font-bold text-brand-blue">Planung</span> <span class="text-gray-700">– Schritt-für-Schritt-Anleitung für die Pflege</span>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-brand-pink text-white text-2xl shadow"><i class="fas fa-hands-helping"></i></div>
                                    <div>
                                        <span class="font-bold text-brand-pink">Begleitung</span> <span class="text-gray-700">– Wir unterstützen und stehen jederzeit bereit</span>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-gradient-to-br from-brand-blue to-[#1a5ba0] text-white text-2xl shadow"><i class="fas fa-shield-heart"></i></div>
                                    <div>
                                        <span class="font-bold text-brand-blue">Entlastung</span> <span class="text-gray-700">– Sicherheit und Unterstützung im Alltag</span>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-brand-pink text-white text-2xl shadow"><i class="fas fa-sliders"></i></div>
                                    <div>
                                        <span class="font-bold text-brand-pink">Anpassung</span> <span class="text-gray-700">– Regelmässige Kontrolle und Optimierung</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-7">
                                <span class="font-semibold text-[1.08rem] text-brand-pink">Kurz gesagt: Sie pflegen – wir begleiten. Einfach, sicher und persönlich.</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-700 max-w-2xl mx-auto mb-2">
                        Pflege für Angehörige bedeutet, dass Familienmitglieder ihre Liebsten zu Hause pflegen und dabei nicht allein sind. Wir zeigen Schritt für Schritt, wie die Pflege funktioniert, unterstützen im Alltag und sind da, wenn Fragen oder Unsicherheiten auftauchen.
                    </p>
                    <span class="text-brand-pink font-semibold">So funktioniert die Angehörigenpflege</span>
                </div>
            </div>
        </div>
    </section>
</x-layout>
