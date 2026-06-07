<x-frontend-layout title="सम्पर्क तथा विज्ञापन">

    <section class="py-10 bg-gray-50/50">
        <div class="container">
            
            {{-- Header section --}}
            <div class="text-center max-w-2xl mx-auto mb-10">
                <span class="text-sm font-semibold uppercase tracking-wider text-[var(--primary-color)]">विज्ञापन तथा सम्पर्क फारम</span>
                <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mt-2">हामीसँग जोडिनुहोस्</h1>
                <p class="text-gray-600 mt-3">
                    हाम्रो समाचार पोर्टल Khabar X मा विज्ञापन प्रकाशन गर्न वा कुनै सल्लाह-सुझाव तथा जिज्ञासा भएमा तलको फारम भर्नुहोस्। हाम्रो टिमले तपाईंलाई छिट्टै सम्पर्क गर्नेछ।
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                {{-- Left: Contact Info Info Cards --}}
                <div class="lg:col-span-1 space-y-6">
                    
                    {{-- Contact Card --}}
                    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                        <h3 class="text-lg font-bold text-gray-900 mb-4 border-b border-gray-100 pb-2">सम्पर्क विवरण</h3>
                        
                        <ul class="space-y-4">
                            <li class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-[var(--primary-color)] shrink-0">
                                    <i class="fa-solid fa-user-tie text-base"></i>
                                </div>
                                <div>
                                    <span class="text-xs text-gray-400 block">संस्थापक / सम्पादक</span>
                                    <span class="text-sm font-semibold text-gray-800">सुरज मल्ल</span>
                                </div>
                            </li>

                            <li class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-[var(--primary-color)] shrink-0">
                                    <i class="fa-solid fa-phone text-base"></i>
                                </div>
                                <div>
                                    <span class="text-xs text-gray-400 block">फोन नम्बरहरू</span>
                                    <a href="tel:+9779845278509" class="text-sm font-semibold text-gray-800 hover:text-[var(--primary-color)] block">+977-9845278509</a>
                                    <a href="tel:+9779804708998" class="text-sm font-semibold text-gray-800 hover:text-[var(--primary-color)] block">+977-9804708998</a>
                                </div>
                            </li>

                            <li class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-[var(--primary-color)] shrink-0">
                                    <i class="fa-solid fa-envelope text-base"></i>
                                </div>
                                <div>
                                    <span class="text-xs text-gray-400 block">इमेल ठेगाना</span>
                                    <a href="mailto:khabarx701@gmail.com" class="text-sm font-semibold text-gray-800 hover:text-[var(--primary-color)] block">khabarx701@gmail.com</a>
                                </div>
                            </li>

                            <li class="flex items-start gap-4">
                                <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center text-[var(--primary-color)] shrink-0">
                                    <i class="fa-solid fa-globe text-base"></i>
                                </div>
                                <div>
                                    <span class="text-xs text-gray-400 block">वेबसाइट</span>
                                    <a href="{{ route('home') }}" class="text-sm font-semibold text-gray-800 hover:text-[var(--primary-color)] block">www.khabarx.org</a>
                                </div>
                            </li>
                        </ul>
                    </div>

                    {{-- Advertising Notice Card --}}
                    <div class="bg-gradient-to-br from-blue-900 to-indigo-950 text-white rounded-2xl p-6 shadow-sm">
                        <h3 class="text-lg font-bold text-white mb-2">हामीसँग विज्ञापन किन गर्ने?</h3>
                        <p class="text-xs text-blue-200 leading-relaxed">
                            Khabar X नेपालकै एक लोकप्रिय र तीव्र गतिमा बढिरहेको डिजिटल सञ्चार माध्यम हो। हाम्रो पोर्टल मार्फत तपाईंले आफ्नो उत्पादन र सेवालाई लक्षित ग्राहक वर्गसम्म सहजै पुर्‍याउन सक्नुहुन्छ।
                        </p>
                        <div class="mt-4 pt-4 border-t border-white/10 space-y-2">
                            <div class="flex items-center gap-2 text-xs">
                                <i class="fa-solid fa-circle-check text-green-400"></i>
                                <span>हजारौं दैनिक पाठकहरू</span>
                            </div>
                            <div class="flex items-center gap-2 text-xs">
                                <i class="fa-solid fa-circle-check text-green-400"></i>
                                <span>सस्तो र प्रभावकारी विज्ञापन दर</span>
                            </div>
                            <div class="flex items-center gap-2 text-xs">
                                <i class="fa-solid fa-circle-check text-green-400"></i>
                                <span>तपाईंको व्यवसाय अनुसारको आकर्षक डिजाइन</span>
                            </div>
                        </div>
                    </div>

                </div>

                {{-- Right: Contact Form --}}
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl p-6 md:p-8 shadow-sm border border-gray-100">
                        <h3 class="text-xl font-bold text-gray-900 mb-6 pb-2 border-b border-gray-100">सोधपुछ फारम</h3>

                        {{-- Alert Success Message --}}
                        @if (session('success'))
                            <div class="mb-6 p-4 rounded-xl bg-green-50 border border-green-200 text-green-700 flex items-start gap-3">
                                <i class="fa-solid fa-circle-check text-lg mt-0.5"></i>
                                <div>
                                    <p class="font-semibold">सफलतापूर्वक पठाइयो!</p>
                                    <p class="text-sm text-green-600/90">{{ session('success') }}</p>
                                </div>
                            </div>
                        @endif

                        <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                            @csrf
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                {{-- Name --}}
                                <div>
                                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-1.5">पुरा नाम <span class="text-red-500">*</span></label>
                                    <input type="text" id="name" name="name" required value="{{ old('name') }}"
                                        placeholder="तपाईंको नाम लेख्नुहोस्"
                                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-gray-800 placeholder:text-gray-400 focus:border-[var(--primary-color)] focus:ring-1 focus:ring-[var(--primary-color)] outline-none transition">
                                    @error('name')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Email --}}
                                <div>
                                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-1.5">इमेल ठेगाना <span class="text-red-500">*</span></label>
                                    <input type="email" id="email" name="email" required value="{{ old('email') }}"
                                        placeholder="तपाईंको इमेल लेख्नुहोस्"
                                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-gray-800 placeholder:text-gray-400 focus:border-[var(--primary-color)] focus:ring-1 focus:ring-[var(--primary-color)] outline-none transition">
                                    @error('email')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                {{-- Phone --}}
                                <div>
                                    <label for="phone" class="block text-sm font-semibold text-gray-700 mb-1.5">फोन नम्बर (वैकल्पिक)</label>
                                    <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                                        placeholder="तपाईंको फोन नम्बर लेख्नुहोस्"
                                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-gray-800 placeholder:text-gray-400 focus:border-[var(--primary-color)] focus:ring-1 focus:ring-[var(--primary-color)] outline-none transition">
                                    @error('phone')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>

                                {{-- Subject --}}
                                <div>
                                    <label for="subject" class="block text-sm font-semibold text-gray-700 mb-1.5">विषय (वैकल्पिक)</label>
                                    <input type="text" id="subject" name="subject" value="{{ old('subject') }}"
                                        placeholder="उदाहरण: विज्ञापन विज्ञापन सोधपुछ वा जिज्ञासा"
                                        class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-gray-800 placeholder:text-gray-400 focus:border-[var(--primary-color)] focus:ring-1 focus:ring-[var(--primary-color)] outline-none transition">
                                    @error('subject')
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            {{-- Message --}}
                            <div>
                                <label for="message" class="block text-sm font-semibold text-gray-700 mb-1.5">सन्देश वा सोधपुछ विवरण <span class="text-red-500">*</span></label>
                                <textarea id="message" name="message" rows="5" required
                                    placeholder="आफ्नो सन्देश वा सोधपुछ गर्न चाहनुभएको विज्ञापनको विवरण यहाँ लेख्नुहोस्..."
                                    class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-gray-800 placeholder:text-gray-400 focus:border-[var(--primary-color)] focus:ring-1 focus:ring-[var(--primary-color)] outline-none transition resize-none"></textarea>
                                @error('message')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Submit --}}
                            <div>
                                <button type="submit"
                                    class="w-full md:w-auto inline-flex items-center justify-center gap-2 rounded-lg bg-[var(--primary-color)] hover:bg-[var(--primary-color)]/95 text-white font-semibold py-3 px-8 shadow-sm transition-all focus:ring-2 focus:ring-[var(--primary-color)] focus:ring-offset-2 outline-none cursor-pointer">
                                    <i class="fa-solid fa-paper-plane"></i> सन्देश पठाउनुहोस्
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>

        </div>
    </section>

</x-frontend-layout>
