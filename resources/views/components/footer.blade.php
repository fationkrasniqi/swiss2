{{-- Footer - Brand gradient background --}}
<footer class="bg-gradient-to-br from-brand-blue to-[#1a5ba0] text-white">
    <div class="mx-auto max-w-7xl px-4 py-16 sm:px-6 lg:px-8">
        <div class="grid gap-12 md:grid-cols-3">
            {{-- Company Info --}}
            <div>
                <div class="mb-4 flex items-center gap-3">
                    <picture>
                        <source srcset="{{ asset('images/logo.webp') }}" type="image/webp">
                        <img src="{{ asset('images/logo.webp') }}" alt="Janira Care" class="h-10 w-auto rounded-lg bg-white p-1">
                    </picture>
                    <span class="text-xl font-bold">Janira Care</span>
                </div>
                <p class="text-sm leading-relaxed text-white/80">{{ __('home.hero_subtitle') }}</p>
            </div>

            {{-- Contact Info --}}
            <div>
                <h3 class="mb-4 text-lg font-semibold">{{ __('home.nav_contact') }}</h3>
                <ul class="space-y-3 text-sm text-white/80">
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-phone w-5 text-center text-brand-pink"></i>
                        <a href="tel:+41714227777" class="transition hover:text-brand-pink">+41 71 422 77 77</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-envelope w-5 text-center text-brand-pink"></i>
                        <a href="mailto:info@janiracare.ch" class="transition hover:text-brand-pink">info@janiracare.ch</a>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-location-dot w-5 text-center text-brand-pink"></i>
                        <span>Zürich, Schweiz</span>
                    </li>
                    <li class="flex items-center gap-3">
                        <i class="fa-solid fa-clock w-5 text-center text-brand-pink"></i>
                        <span>{{ __('home.contact_hours_weekdays') }}</span>
                    </li>
                </ul>
            </div>

            {{-- Social Links --}}
            <div>
                <h3 class="mb-4 text-lg font-semibold">{{ __('home.contact_follow_us') }}</h3>
                <div class="flex gap-3">
                    <a href="https://www.facebook.com/profile.php?id=61586744824189&locale=sq_AL" target="_blank" class="flex h-10 w-10 items-center justify-center rounded-full bg-white/10 text-white transition hover:bg-brand-pink hover:scale-110">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/janiracare/" target="_blank" class="flex h-10 w-10 items-center justify-center rounded-full bg-white/10 text-white transition hover:bg-brand-pink hover:scale-110">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/janira-care-3201833a7" target="_blank" class="flex h-10 w-10 items-center justify-center rounded-full bg-white/10 text-white transition hover:bg-brand-pink hover:scale-110">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    <a href="https://wa.me/41714227777" target="_blank" class="flex h-10 w-10 items-center justify-center rounded-full bg-white/10 text-white transition hover:bg-brand-pink hover:scale-110">
                        <i class="fa-brands fa-whatsapp"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- Bottom Bar --}}
    <div class="border-t border-white/10 py-4">
        <div class="mx-auto max-w-7xl px-4 text-center text-xs text-white/50">
            &copy; {{ date('Y') }} Janira Care. {{ __('home.footer_rights') }}
        </div>
    </div>
</footer>
