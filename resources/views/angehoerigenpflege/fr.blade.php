@php
$steps = [
    ['icon' => 'fa-search',         'key' => 1, 'title' => 'Prise de contact', 'desc' => 'Contactez-nous par téléphone, e-mail ou via notre formulaire.'],
    ['icon' => 'fa-calendar-check', 'key' => 2, 'title' => 'Entretien initial', 'desc' => 'Nous faisons connaissance avec la personne à accompagner et la famille.'],
    ['icon' => 'fa-bell',           'key' => 3, 'title' => 'Conseil', 'desc' => 'Nous clarifions ensemble votre situation et le soutien utile.'],
    ['icon' => 'fa-user-doctor',    'key' => 4, 'title' => 'Planification', 'desc' => 'Plan pas-à-pas et prochaines étapes claires pour les soins.'],
    ['icon' => 'fa-hands-helping',  'key' => 5, 'title' => 'Accompagnement', 'desc' => 'Nous sommes régulièrement sur place et accompagnons les soins.'],
    ['icon' => 'fa-comments',       'key' => 6, 'title' => 'Soutien & réponses', 'desc' => 'Conseils, réponses et soutien à tout moment.'],
    ['icon' => 'fa-shield-heart',   'key' => 7, 'title' => 'Soulagement', 'desc' => 'Sécurité et soulagement au quotidien pour les proches.'],
    ['icon' => 'fa-sliders',        'key' => 8, 'title' => 'Contrôle & ajustement', 'desc' => 'Contrôle régulier et ajustements si nécessaire.'],
];
@endphp
<x-layout>
    <section class="bg-[#F6F9FC]" style="padding: 68px 28px;">
        <div class="mx-auto max-w-[1200px]">
            <div class="mb-[40px] text-center">
                <h2 class="mb-4 text-[38px] font-semibold text-gray-800">Soins aux proches</h2>
                <p class="mx-auto max-w-[820px] text-[22px] leading-[1.7] text-gray-500">
                    Les soins aux proches signifient que les membres de la famille prennent soin de leurs proches à domicile et ne sont pas seuls. Nous expliquons étape par étape comment fonctionne l’accompagnement, soutenons au quotidien et sommes là en cas de questions ou d’incertitudes.
                </p>
                <span class="block mt-2 text-brand-pink font-semibold">Comment fonctionne l'accompagnement des proches</span>
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
                <img src="{{ asset('images/familienpflege.jpg') }}" alt="Soins familiaux en Suisse" class="rounded-2xl shadow-lg max-w-full mb-6" style="max-width: 700px;">
                <div class="text-center">
                    <h3 class="text-brand-blue text-2xl font-bold mb-2">Soins aux proches</h3>
                    <div class="mt-10 flex justify-center">
                        <div class="bg-white rounded-2xl shadow-lg px-8 py-8 max-w-[700px] w-full border border-brand-blue/20">
                            <h3 class="text-[1.35rem] font-bold text-brand-blue text-center mb-7">Comment fonctionne l'accompagnement des proches</h3>
                            <div class="space-y-5">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-gradient-to-br from-brand-blue to-[#1a5ba0] text-white text-2xl shadow"><i class="fas fa-search"></i></div>
                                    <div>
                                        <span class="font-bold text-brand-blue">Contact</span> <span class="text-gray-700">– Vous prenez contact avec nous</span>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-brand-pink text-white text-2xl shadow"><i class="fas fa-comments"></i></div>
                                    <div>
                                        <span class="font-bold text-brand-pink">Conseil</span> <span class="text-gray-700">– Nous discutons de votre situation</span>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-gradient-to-br from-brand-blue to-[#1a5ba0] text-white text-2xl shadow"><i class="fas fa-calendar-check"></i></div>
                                    <div>
                                        <span class="font-bold text-brand-blue">Planification</span> <span class="text-gray-700">– Plan étape par étape pour les soins</span>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-brand-pink text-white text-2xl shadow"><i class="fas fa-hands-helping"></i></div>
                                    <div>
                                        <span class="font-bold text-brand-pink">Accompagnement</span> <span class="text-gray-700">– Nous soutenons et sommes toujours disponibles</span>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-gradient-to-br from-brand-blue to-[#1a5ba0] text-white text-2xl shadow"><i class="fas fa-shield-heart"></i></div>
                                    <div>
                                        <span class="font-bold text-brand-blue">Soulagement</span> <span class="text-gray-700">– Sécurité et soutien au quotidien</span>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-brand-pink text-white text-2xl shadow"><i class="fas fa-sliders"></i></div>
                                    <div>
                                        <span class="font-bold text-brand-pink">Ajustement</span> <span class="text-gray-700">– Contrôle régulier et optimisation</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-7">
                                <span class="font-semibold text-[1.08rem] text-brand-pink">En bref : vous prenez soin – nous accompagnons. Simple, sûr et personnel.</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-700 max-w-2xl mx-auto mb-2">
                        Les soins aux proches signifient que les membres de la famille prennent soin de leurs proches à domicile et ne sont pas seuls. Nous expliquons étape par étape comment fonctionne l’accompagnement, soutenons au quotidien et sommes là en cas de questions ou d’incertitudes.
                    </p>
                    <span class="text-brand-pink font-semibold">Comment fonctionne l'accompagnement des proches</span>
                </div>
            </div>
        </div>
    </section>
</x-layout>
