<x-frontend-layout title="Home">
@include('components.popup-ad')


    {{-- Latest / Breaking News --}}
    @if ($latest_news)
    <section>
        <div class="container py-4 sm:py-6 lg:pb-8">
            <a href="{{ route('article', $latest_news->slug) }}" class="block group">
                <div class="shadow-lg p-3 sm:p-4 rounded-lg overflow-hidden hover:shadow-xl transition-shadow duration-200">
                    <h1 class="text-base sm:text-xl md:text-2xl lg:text-3xl font-semibold mb-2 group-hover:text-[var(--primary-color)] transition-colors line-clamp-2">
                        {{ $latest_news->title }}
                    </h1>
                    <img class="w-full h-[180px] sm:h-[250px] md:h-[350px] lg:h-[420px] object-cover rounded"
                        src="{{ asset($latest_news->image) }}"
                        alt="{{ $latest_news->title }}">
                </div>
            </a>
        </div>
    </section>
    @endif

    {{-- Featured Articles + Trending --}}
    @if ($articles && $articles->count() > 0)
    <section>
        <div class="container grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6 py-4 sm:py-6 lg:py-8">
            @php
                $first = $articles->first();
                $others = $articles->skip(1);
            @endphp

            {{-- Main + secondary articles --}}
            <div class="md:col-span-2">
                @if ($first)
                <div class="shadow-md rounded-md overflow-hidden hover:shadow-lg transition-shadow duration-200">
                    <a href="{{ route('article', $first->slug) }}" class="block group">
                        <img class="w-full h-[180px] sm:h-[220px] md:h-[300px] object-cover"
                            src="{{ asset($first->image) }}"
                            alt="{{ $first->title }}">
                    </a>
                    <div class="p-3">
                        <a href="{{ route('article', $first->slug) }}" class="group">
                            <h2 class="text-base sm:text-lg md:text-xl lg:text-2xl font-semibold line-clamp-2 group-hover:text-[var(--primary-color)] transition-colors">
                                {{ $first->title }}
                            </h2>
                        </a>
                        <p class="text-xs sm:text-sm line-clamp-2 mt-1 text-gray-600">
                            {{ Str::limit(strip_tags($first->description), 160) }}
                        </p>
                        <small class="text-[10px] sm:text-xs text-gray-500 block mt-1">
                            <i class="fa-regular fa-calendar-days"></i>
                            प्रकाशित मिति: {{ toNepaliDate($first->created_at) }}
                        </small>
                        <a href="{{ route('article', $first->slug) }}"
                           class="inline-flex items-center gap-1 mt-2 text-[var(--primary-color)] text-xs font-semibold hover:underline">
                            <i class="fa-solid fa-hand-point-right"></i>
                            पुरा पढ्नुहोस्
                        </a>
                    </div>
                </div>
                @endif

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 mt-4 sm:mt-6">
                    @foreach ($others as $article)
                        <x-article-card :article="$article" />
                    @endforeach
                </div>
            </div>

            {{-- Trending sidebar --}}
            <div class="space-y-3 sm:space-y-4 mt-4 md:mt-0">
                <h2 class="text-lg sm:text-xl lg:text-2xl py-2 border-l-4 border-[var(--primary-color)] pl-2 font-semibold text-primary bg-[var(--light-primary-color)]">
                    ट्रेन्डिङ
                </h2>
                @foreach ($trending_articles as $trending)
                    <div>
                        <x-article-card :article="$trending" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Category sections --}}
    <section>
        <div class="container py-4 sm:py-6 lg:py-8 space-y-6 sm:space-y-8">

            @foreach ($categories as $category)
                @if ($category->articles && count($category->articles) > 0)
                    <div>
                        <h2 class="text-lg sm:text-xl lg:text-2xl py-2 border-l-4 border-[var(--primary-color)] pl-2 font-semibold text-primary bg-[var(--light-primary-color)]">
                            {{ $category->title }}
                        </h2>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6 mt-4">
                            @php
                                $category_first = $category->articles()->orderBy('id', 'desc')->first();
                                $category_others = $category->articles()->orderBy('id', 'desc')->skip(1)->take(4)->get();
                                $side_articles = $category->articles()->orderBy('id', 'desc')->skip(5)->take(7)->get();
                            @endphp

                            @if ($category_first)
                            <div class="md:col-span-2">
                                <div class="shadow-md rounded-md overflow-hidden hover:shadow-lg transition-shadow duration-200">
                                    <a href="{{ route('article', $category_first->slug) }}" class="block group">
                                        <img class="w-full h-[180px] sm:h-[220px] md:h-[300px] object-cover"
                                            src="{{ asset($category_first->image) }}"
                                            alt="{{ $category_first->title }}">
                                    </a>
                                    <div class="p-3">
                                        <a href="{{ route('article', $category_first->slug) }}" class="group">
                                            <h2 class="text-base sm:text-lg md:text-xl lg:text-2xl font-semibold line-clamp-2 group-hover:text-[var(--primary-color)] transition-colors">
                                                {{ $category_first->title }}
                                            </h2>
                                        </a>
                                        <p class="text-xs sm:text-sm line-clamp-2 mt-1 text-gray-600">
                                            {{ Str::limit(strip_tags($category_first->description), 160) }}
                                        </p>
                                        <small class="text-[10px] sm:text-xs text-gray-500 block mt-1">
                                            <i class="fa-regular fa-calendar-days"></i>
                                            प्रकाशित मिति: {{ toNepaliDate($category_first->created_at) }}
                                        </small>
                                        <a href="{{ route('article', $category_first->slug) }}"
                                           class="inline-flex items-center gap-1 mt-2 text-[var(--primary-color)] text-xs font-semibold hover:underline">
                                            <i class="fa-solid fa-hand-point-right"></i>
                                            पुरा पढ्नुहोस्
                                        </a>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 sm:gap-4 mt-4 sm:mt-6">
                                    @foreach ($category_others as $article)
                                        <x-article-card :article="$article" />
                                    @endforeach
                                </div>
                            </div>

                            <div class="space-y-3 sm:space-y-4 mt-4 md:mt-0">
                                @foreach ($side_articles as $article)
                                    <div>
                                        <x-article-card :article="$article" />
                                    </div>
                                @endforeach
                            </div>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </section>

</x-frontend-layout>