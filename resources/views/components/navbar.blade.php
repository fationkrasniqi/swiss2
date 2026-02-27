{{-- Responsive Navbar --}}
<nav x-data="{ open: false }" class="fixed top-0 left-0 right-0 z-50 bg-white shadow-md backdrop-blur-md" style="padding: 14px 0;">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-5">
        {{-- Logo --}}
        <a href="{{ url('/') }}" class="relative z-[1001] shrink-0">
            <picture>
                <source srcset="{{ asset('images/logo.webp') }}" type="image/webp">
                <img src="{{ asset('images/logo.webp') }}" alt="Janira Care" class="h-10 w-auto" loading="eager">
            </picture>
        </a>

        {{-- Desktop Nav --}}
        <div class="hidden md:flex items-center gap-6">
            <a href="{{ url('/') }}#home" class="text-sm font-medium text-gray-600 hover:text-brand-blue transition">{{ __('home.nav_home') }}</a>
            <a href="{{ route('services') }}" class="text-sm font-medium text-gray-600 hover:text-brand-blue transition">{{ __('home.nav_services') }}</a>
            <a href="{{ route('services-details') }}" class="text-sm font-medium text-gray-600 hover:text-brand-blue transition">{{ __('home.nav_services_details') }}</a>
            <a href="{{ url('/') }}#contact" class="text-sm font-medium text-gray-600 hover:text-brand-blue transition">{{ __('home.nav_contact') }}</a>

            {{-- Language Switcher --}}
            <div class="flex gap-1.5 ml-2">
                @foreach(['de' => '🇩🇪', 'fr' => '🇫🇷', 'sq' => '🇦🇱', 'en' => '🇬🇧'] as $code => $flag)
                    <a href="{{ route('lang.switch', $code) }}"
                       class="rounded-full px-2.5 py-1 text-xs font-semibold transition
                              {{ app()->getLocale() === $code
                                  ? 'bg-brand-blue text-white'
                                  : 'bg-gray-100 text-gray-600 hover:bg-brand-blue hover:text-white' }}">
                        {{ $flag }} {{ strtoupper($code) }}
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Hamburger (mobile) --}}
        <button @click="open = !open" class="md:hidden relative z-[1001] p-2" aria-label="Menu">
            <svg class="h-6 w-6 text-brand-blue" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    {{-- Mobile Menu --}}
    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         @click.outside="open = false"
         x-cloak
         class="md:hidden absolute top-full left-0 right-0 bg-white shadow-lg border-t border-gray-100">
        <div class="flex flex-col px-5 py-4 space-y-3">
            <a href="{{ url('/') }}#home" @click="open = false" class="text-base font-medium text-gray-700 hover:text-brand-blue py-2 transition">{{ __('home.nav_home') }}</a>
            <a href="{{ route('services') }}" @click="open = false" class="text-base font-medium text-gray-700 hover:text-brand-blue py-2 transition">{{ __('home.nav_services') }}</a>
            <a href="{{ route('services-details') }}" @click="open = false" class="text-base font-medium text-gray-700 hover:text-brand-blue py-2 transition">{{ __('home.nav_services_details') }}</a>
            <a href="{{ url('/') }}#contact" @click="open = false" class="text-base font-medium text-gray-700 hover:text-brand-blue py-2 transition">{{ __('home.nav_contact') }}</a>

            <div class="flex gap-2 pt-2 border-t border-gray-100">
                @foreach(['de' => '🇩🇪 DE', 'fr' => '🇫🇷 FR', 'sq' => '🇦🇱 SQ', 'en' => '🇬🇧 EN'] as $code => $label)
                    <a href="{{ route('lang.switch', $code) }}"
                       class="rounded-full px-3 py-1.5 text-xs font-semibold transition
                              {{ app()->getLocale() === $code
                                  ? 'bg-brand-blue text-white'
                                  : 'bg-gray-100 text-gray-600 hover:bg-brand-blue hover:text-white' }}">
                        {{ $label }}
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</nav>

{{-- Navbar spacer --}}
<div class="h-16"></div>
