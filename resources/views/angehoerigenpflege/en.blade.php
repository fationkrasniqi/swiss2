@php
$steps = [
    ['icon' => 'fa-search',         'key' => 1, 'title' => 'Contact Us', 'desc' => 'Reach out by phone, email, or our contact form.'],
    ['icon' => 'fa-calendar-check', 'key' => 2, 'title' => 'Initial Meeting', 'desc' => 'We get to know the person needing care and the family.'],
    ['icon' => 'fa-bell',           'key' => 3, 'title' => 'Consultation', 'desc' => 'Together we clarify your situation and the right support.'],
    ['icon' => 'fa-user-doctor',    'key' => 4, 'title' => 'Planning', 'desc' => 'A step-by-step plan and clear next steps for care.'],
    ['icon' => 'fa-hands-helping',  'key' => 5, 'title' => 'Ongoing Support', 'desc' => 'We are regularly on site and accompany the care.'],
    ['icon' => 'fa-comments',       'key' => 6, 'title' => 'Guidance & Answers', 'desc' => 'Tips, answers, and support whenever you need it.'],
    ['icon' => 'fa-shield-heart',   'key' => 7, 'title' => 'Relief for Families', 'desc' => 'Security and relief in everyday life for relatives.'],
    ['icon' => 'fa-sliders',        'key' => 8, 'title' => 'Review & Adjust', 'desc' => 'Regular checks and adjustments when needed.'],
];
@endphp
<x-layout>
    <section class="bg-[#F6F9FC]" style="padding: 68px 28px;">
        <div class="mx-auto max-w-[1200px]">
            <div class="mb-[40px] text-center">
                <h2 class="mb-4 text-[38px] font-semibold text-gray-800">Family Caregiving</h2>
                <p class="mx-auto max-w-[820px] text-[22px] leading-[1.7] text-gray-500">
                    Family caregiving means that relatives care for their loved ones at home and are not alone. We show step by step how care works, support everyday life, and are there when questions or uncertainties arise.
                </p>
                <span class="block mt-2 text-brand-pink font-semibold">How family caregiving works</span>
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
                <img src="{{ asset('images/familienpflege.jpg') }}" alt="Family caregiving in Switzerland" class="rounded-2xl shadow-lg max-w-full mb-6" style="max-width: 700px;">
                <div class="text-center">
                    <h3 class="text-brand-blue text-2xl font-bold mb-2">Family Caregiving</h3>
                    <div class="mt-10 flex justify-center">
                        <div class="bg-white rounded-2xl shadow-lg px-8 py-8 max-w-[700px] w-full border border-brand-blue/20">
                            <h3 class="text-[1.35rem] font-bold text-brand-blue text-center mb-7">How family caregiving works</h3>
                            <div class="space-y-5">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-gradient-to-br from-brand-blue to-[#1a5ba0] text-white text-2xl shadow"><i class="fas fa-search"></i></div>
                                    <div>
                                        <span class="font-bold text-brand-blue">Contact</span> <span class="text-gray-700">– You contact us</span>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-brand-pink text-white text-2xl shadow"><i class="fas fa-comments"></i></div>
                                    <div>
                                        <span class="font-bold text-brand-pink">Consultation</span> <span class="text-gray-700">– We discuss your situation</span>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-gradient-to-br from-brand-blue to-[#1a5ba0] text-white text-2xl shadow"><i class="fas fa-calendar-check"></i></div>
                                    <div>
                                        <span class="font-bold text-brand-blue">Planning</span> <span class="text-gray-700">– Step-by-step guidance for care</span>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-brand-pink text-white text-2xl shadow"><i class="fas fa-hands-helping"></i></div>
                                    <div>
                                        <span class="font-bold text-brand-pink">Support</span> <span class="text-gray-700">– We support and are always there</span>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-gradient-to-br from-brand-blue to-[#1a5ba0] text-white text-2xl shadow"><i class="fas fa-shield-heart"></i></div>
                                    <div>
                                        <span class="font-bold text-brand-blue">Relief</span> <span class="text-gray-700">– Security and support in everyday life</span>
                                    </div>
                                </div>
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-brand-pink text-white text-2xl shadow"><i class="fas fa-sliders"></i></div>
                                    <div>
                                        <span class="font-bold text-brand-pink">Adjustment</span> <span class="text-gray-700">– Regular review and optimization</span>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-7">
                                <span class="font-semibold text-[1.08rem] text-brand-pink">In short: you care – we accompany. Simple, safe, and personal.</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-700 max-w-2xl mx-auto mb-2">
                        Family caregiving means that relatives care for their loved ones at home and are not alone. We show step by step how care works, support everyday life, and are there when questions or uncertainties arise.
                    </p>
                    <span class="text-brand-pink font-semibold">How family caregiving works</span>
                </div>
            </div>
        </div>
    </section>
</x-layout>
