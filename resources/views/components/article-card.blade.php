@props(['article'])
<div class="shadow-md rounded-md overflow-hidden hover:shadow-lg transition-shadow duration-200">
    <div class="grid grid-cols-3 items-start gap-2 sm:gap-3">
        <a href="{{ route('article', $article->slug) }}" class="block">
            <img class="w-full h-[80px] sm:h-[90px] md:h-[100px] object-cover"
                src="{{ asset($article->image) }}"
                alt="{{ $article->title }}">
        </a>
        <div class="col-span-2 py-1.5 pr-2 sm:py-2 sm:pr-3">
            <a href="{{ route('article', $article->slug) }}" class="group">
                <h3 class="text-xs sm:text-sm md:text-base font-semibold line-clamp-2 group-hover:text-[var(--primary-color)] transition-colors leading-snug">
                    {{ $article->title }}
                </h3>
            </a>

            {{-- Description preview --}}
            <p class="text-[11px] sm:text-xs text-gray-600 line-clamp-2 mt-1 leading-relaxed">
                {{ Str::limit(strip_tags($article->description), 100) }}
            </p>

            {{-- Date in Nepali --}}
            <small class="text-[10px] sm:text-xs text-gray-500 block mt-1">
                <i class="fa-regular fa-calendar-days"></i>
                प्रकाशित मिति: {{ toNepaliDate($article->created_at) }}
            </small>

            {{-- Read More link styled like screenshot --}}
            <a href="{{ route('article', $article->slug) }}"
               class="inline-flex items-center gap-1 mt-1 text-[var(--primary-color)] text-xs font-semibold hover:underline">
                <i class="fa-solid fa-hand-point-right"></i>
                पुरा पढ्नुहोस्
            </a>
        </div>
    </div>
</div>
