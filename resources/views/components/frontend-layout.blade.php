<!DOCTYPE html>
<html lang="en">
@props(['title', 'image', 'keywords', 'description'])

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Khabar X | {{ $title ?? '' }}</title>

    <link rel="icon" type="image/png" href="{{ asset('images/khabar x .png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/khabar x .png') }}">

    <meta name="keywords" content="{{ $keywords ?? '' }}">
    <meta name="description" content="{{ $description ?? '' }}">

    <meta property="og:title" content="{{ $title ?? '' }}" />
    <meta property="og:image" content="{{ $image ?? '' }}" />
    <meta property="og:description" content="{{ $description ?? '' }}" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('frontend/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">
</head>

<body>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v24.0&appId=APP_ID"></script>

    <x-frontend-header />


    <main>
        {{ $slot }}
    </main>


    {{-- Footer --}}
    <footer class="bg-gray-900 text-gray-300 mt-8">

        {{-- Footer Ad Banner --}}
        <div class="border-b border-gray-800/80">
            <div class="container py-6">
                @if (isset($footer_advertises) && $footer_advertises->count() > 0)
                    @foreach ($footer_advertises as $ad)
                        <a href="{{ $ad->redirect_link }}" target="_blank" class="block w-full hover:opacity-90 transition-opacity duration-200">
                            <img class="w-full h-[70px] sm:h-[96px] md:h-[116px] object-cover rounded shadow"
                                src="{{ asset($ad->image) }}"
                                alt="{{ $ad->company_name }}">
                        </a>
                    @endforeach
                @else
                    <div class="w-full border border-dashed border-gray-800 rounded-xl p-4 text-center bg-gray-950/20 hover:bg-gray-950/40 transition duration-200">
                        <span class="text-[10px] text-gray-500 uppercase tracking-widest font-bold">विज्ञापनका लागि ठाउँ रिक्त छ</span>
                        <p class="text-xs text-gray-400 mt-1">हाम्रो न्युज पोर्टलमा विज्ञापन राख्नको लागि यहाँ सम्पर्क गर्नुहोस्।</p>
                        <div class="mt-2 text-xs text-gray-500 flex flex-wrap items-center justify-center gap-x-4 gap-y-1">
                            <span><i class="fa-solid fa-phone text-[var(--primary-color)] mr-1"></i> +977-9845278509</span>
                            <span><i class="fa-solid fa-envelope text-[var(--primary-color)] mr-1"></i> khabarx701@gmail.com</span>
                            <a href="{{ route('contact') }}" class="text-[var(--primary-color)] hover:underline ml-1 font-semibold">विज्ञापन सोधपुछ फारम भर्नुहोस् &rarr;</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        {{-- Main footer --}}
        <div class="container py-8 sm:py-12">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 lg:gap-10">

                {{-- Column 1: Logo & About --}}
                <div class="sm:col-span-2 lg:col-span-1">
                    <a href="{{ route('home') }}">
                        <img class="h-[60px] w-auto object-contain mb-4 brightness-0 invert"
                            src="{{ asset('images/khabar x .png') }}" alt="Khabar X Logo">
                    </a>
                    <p class="text-sm leading-relaxed text-gray-400">
                        Khabar X :  Extra, Express, Exclusive.
                    जहाँ समाचार केवल जानकारी होइन, विश्वासको आधार बन्छ। छिटो, निष्पक्ष र विशेष सामग्रीमार्फत तपाईंलाई सधैं सूचित राख्ने प्रतिबद्धता।
                    </p>

                    {{-- Social Media --}}
                    <div class="flex gap-3 mt-5">
                        <a href="https://www.facebook.com/profile.php?id=61589640997820" target="_blank"
                            class="w-9 h-9 flex items-center justify-center rounded-full bg-gray-800 hover:bg-[var(--primary-color)] transition-colors duration-200"
                            aria-label="Facebook">
                            <i class="fab fa-facebook-f text-sm"></i>
                        </a>
                       
                    </div>
                </div>

                {{-- Column 2: Quick Links --}}
                <div>
                    <h3 class="text-white font-semibold text-base mb-4 border-b border-gray-700 pb-2">द्रुत लिंक</h3>
                    <ul class="space-y-2 text-sm">
                        <li>
                            <a href="{{ route('home') }}" class="hover:text-white hover:pl-1 transition-all duration-200">
                                <i class="fa-solid fa-angle-right text-xs mr-1 text-[var(--primary-color)]"></i> गृहपृष्ठ
                            </a>
                        </li>
                        @php
                            $footerCategories = \App\Models\Category::take(6)->get();
                        @endphp
                        @foreach ($footerCategories as $cat)
                        <li>
                            <a href="{{ route('category', $cat->slug) }}" class="hover:text-white hover:pl-1 transition-all duration-200">
                                <i class="fa-solid fa-angle-right text-xs mr-1 text-[var(--primary-color)]"></i> {{ $cat->title }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>

                {{-- Column 3: Contact Info --}}
                <div>
                    <h3 class="text-white font-semibold text-base mb-4 border-b border-gray-700 pb-2">सम्पर्क</h3>
                    <ul class="space-y-3 text-sm">
                        <li class="flex items-start gap-2">
                            <i class="fa-solid fa-user-tie text-[var(--primary-color)] mt-0.5"></i>
                            <span><strong class="text-white">संस्थापक :</strong> सुरज मल्ल</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fa-solid fa-pen-nib text-[var(--primary-color)] mt-0.5"></i>
                            <span><strong class="text-white">सम्पादक :</strong> सुरज मल्ल</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fa-solid fa-envelope text-[var(--primary-color)] mt-0.5"></i>
                            <a href="mailto:khabarx701@gmail.com" class="hover:text-white transition-colors">
                                khabarx701@gmail.com
                            </a>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fa-solid fa-phone text-[var(--primary-color)] mt-0.5"></i>
                            <div>
                                <a href="tel:+9779845278509" class="hover:text-white transition-colors">+977-9845278509</a><br>
                                <a href="tel:+9779804708998" class="hover:text-white transition-colors">+977-9804708998</a>
                            </div>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fa-solid fa-globe text-[var(--primary-color)] mt-0.5"></i>
                            <a href="{{ route('home') }}" class="hover:text-white transition-colors">www.khabarx.org</a>
                        </li>
                    </ul>
                </div>

                {{-- Column 4: Advertise Info --}}
                <div>
                    <h3 class="text-white font-semibold text-base mb-4 border-b border-gray-700 pb-2">विज्ञापन</h3>
                    <ul class="space-y-3 text-sm">
                        <li class="text-gray-400 leading-relaxed">
                            हाम्रो समाचार पोर्टल Khabar X मा विज्ञापन गरी आफ्नो व्यवसाय वा ब्रान्डको प्रवर्द्धन गर्नुहोस्।
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fa-solid fa-bullhorn text-[var(--primary-color)] mt-0.5"></i>
                            <span><strong class="text-white">विज्ञापन शाखा:</strong> सुरज मल्ल</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <i class="fa-solid fa-phone text-[var(--primary-color)] mt-0.5"></i>
                            <div>
                                <a href="tel:+9779845278509" class="hover:text-white transition-colors">+977-9845278509</a>
                            </div>
                        </li>
                        <li class="flex items-start gap-2 border-t border-gray-800 pt-2">
                            <a href="{{ route('contact') }}" class="w-full text-center bg-[var(--primary-color)] hover:bg-[var(--primary-color)]/95 text-white font-semibold py-2 px-4 rounded transition-all duration-200 block text-xs">
                                <i class="fa-solid fa-paper-plane mr-1"></i> विज्ञापन सोधपुछ फारम
                            </a>
                        </li>
                    </ul>
                </div>
                </div>

            </div>
        </div>

        {{-- Bottom bar --}}
        <div class="border-t border-gray-800">
            <div class="container py-4 flex flex-col sm:flex-row items-center justify-between gap-2 text-xs text-gray-500">
                <p>&copy; {{ date('Y') }} Khabar X. सर्वाधिकार सुरक्षित।</p>
               <p>
  Developed by
  <a
    href="https://www.linkedin.com/in/ghanashyam-budhathoki-3a7014381/"
    target="_blank"
    rel="noopener noreferrer"
    class="text-white-500 hover:none transition-colors duration-200"
  >
    Ghanashyam Budhathoki
  </a>
</p>
            </div>
        </div>

    </footer>

</body>

</html>
