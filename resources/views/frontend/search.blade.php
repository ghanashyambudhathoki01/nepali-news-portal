<x-frontend-layout>

    <section>
        <div class="container grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6 py-4 sm:py-6">

            {{-- Search results --}}
            <div class="lg:col-span-2 space-y-4 sm:space-y-6">
                <h1 class="text-base sm:text-lg md:text-xl font-bold">
                    Search Result for "{{ $q }}"
                </h1>

                @forelse ($articles as $article)
                    <a href="{{ route('article', $article->slug) }}" class="block group">
                        <div class="grid grid-cols-1 sm:grid-cols-3 gap-0 sm:gap-3 items-center shadow-md rounded-md overflow-hidden hover:shadow-lg transition-shadow duration-200">
                            <img class="w-full h-[180px] sm:h-[200px] md:h-[270px] object-cover"
                                src="{{ asset($article->image) }}"
                                alt="{{ $article->title }}">
                            <div class="sm:col-span-2 p-3 sm:p-4">
                                <h2 class="text-base sm:text-lg md:text-xl lg:text-2xl font-semibold line-clamp-2 group-hover:text-[var(--primary-color)] transition-colors">
                                    {{ $article->title }}
                                </h2>
                                <div class="line-clamp-3 sm:line-clamp-4 text-xs sm:text-sm text-gray-600 mt-1">
                                    {!! $article->description !!}
                                </div>
                                <small class="text-[10px] sm:text-xs text-gray-500 mt-2 block">
                                    <i class="fa-solid fa-calendar"></i> {{ toNepaliDate($article->created_at) }}
                                </small>
                            </div>
                        </div>
                    </a>
                @empty
                    <p class="text-gray-500 text-sm sm:text-base py-8 text-center">कुनै परिणाम फेला परेन।</p>
                @endforelse
            </div>

            {{-- Sidebar ads --}}
            <div class="space-y-4 mt-4 lg:mt-0">
                @foreach ($page_advertises as $ads)
                    <a href="{{ $ads->redirect_link }}" target="_blank">
                        <img class="w-full rounded" src="{{ asset($ads->link) }}" alt="{{ $ads->company_name }}">
                    </a>
                @endforeach
            </div>
        </div>
    </section>

</x-frontend-layout>
