<header class="pt-2 sm:pt-4 bg-white">

    {{-- Top bar: Logo + Ad + Date --}}
    <div class="container pb-4">
        <div class="flex flex-col sm:flex-row items-center gap-3 sm:gap-6 lg:gap-8">
            {{-- Logo --}}
            <a href="{{ route('home') }}" class="shrink-0">
                <img class="h-[50px] sm:h-[60px] md:h-[80px] max-h-[80px] w-auto object-contain" src="{{ asset('images/khabar x .png') }}" alt="Khabar X Logo">
            </a>

            {{-- Header advertisement --}}
            <div class="grow w-full sm:w-auto">
                @foreach ($header_advertises as $advertise)
                    <a href="{{ $advertise->redirect_link }}" target="_blank">
                        <img class="w-full h-[70px] sm:h-[96px] md:h-[116px] object-cover rounded"
                            src="{{ asset($advertise->image) }}"
                            alt="{{ $advertise->company_name }}">
                    </a>
                @endforeach
            </div>

            {{-- Date --}}
            <div class="shrink-0 text-center sm:text-right">
                <p class="text-sm sm:text-base lg:text-lg whitespace-nowrap">
                    {{ toNepaliDate(now()) }}
                </p>
                <img class="h-[10px] sm:h-[14px] mx-auto sm:mx-0" src="https://jawaaf.com/frontend/images/redline.png" alt="">
            </div>
        </div>
    </div>
</header>

    {{-- Navigation --}}
    <nav x-data="{ mobileNav: false }" class="bg-primary py-2 text-white"
        style="position: sticky; top: 0; z-index: 9999; box-shadow: 0 2px 8px rgba(0,0,0,0.2);">
        <div class="container">
            <div class="flex items-center justify-between gap-4">

                {{-- Hamburger button (mobile only) --}}
                <button @click="mobileNav = !mobileNav"
                    class="sm:hidden flex items-center justify-center w-9 h-9 rounded focus:outline-none focus:ring-2 focus:ring-white/40"
                    aria-label="Toggle menu">
                    <svg x-show="!mobileNav" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg x-show="mobileNav" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>

                {{-- Desktop / tablet nav links --}}
                <div class="hidden sm:flex overflow-x-auto gap-4 md:gap-6 lg:gap-10 py-1 text-sm md:text-base whitespace-nowrap scrollbar-hide">
                    <a href="{{ route('home') }}" class="hover:underline underline-offset-4 transition">गृह</a>
                    @foreach ($categories as $category)
                        <a href="{{ route('category', $category->slug) }}" class="hover:underline underline-offset-4 transition">{{ $category->title }}</a>
                    @endforeach
                </div>

                {{-- Search form --}}
                <div class="grow sm:grow-0 sm:w-auto max-w-[220px] sm:max-w-[260px] lg:max-w-xs ml-auto">
                    <form action="{{ route('search') }}" method="GET">
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-2.5 pointer-events-none">
                                <svg class="w-3.5 h-3.5 sm:w-4 sm:h-4 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                                </svg>
                            </div>
                            <input type="search" id="search" name="q"
                                class="block w-full py-2 px-3 ps-8 text-xs sm:text-sm bg-white/10 border border-white/20 text-white rounded-md placeholder:text-white/60 focus:ring-2 focus:ring-white/40 focus:border-transparent"
                                placeholder="खोज्नुहोस्..." required />
                            <button type="submit"
                                class="absolute end-1 top-1/2 -translate-y-1/2 text-white bg-white/20 hover:bg-white/30 rounded text-xs px-2 py-1 sm:px-3 sm:py-1.5 transition focus:outline-none">
                                Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Mobile dropdown nav --}}
            <div x-show="mobileNav"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-2"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 -translate-y-2"
                class="sm:hidden mt-3 pb-2 border-t border-white/20 pt-3 flex flex-col gap-2 text-sm">
                <a href="{{ route('home') }}" class="py-1.5 px-2 rounded hover:bg-white/10 transition">गृह</a>
                @foreach ($categories as $category)
                    <a href="{{ route('category', $category->slug) }}" class="py-1.5 px-2 rounded hover:bg-white/10 transition">{{ $category->title }}</a>
                @endforeach
            </div>
        </div>
    </nav>
