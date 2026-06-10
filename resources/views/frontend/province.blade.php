<x-frontend-layout :title="$provinceName">

    <section class="py-4">
        <div class="container">
            <h1 class="text-2xl sm:text-3xl font-bold py-2 border-l-4 border-[var(--primary-color)] pl-3 text-primary bg-[var(--light-primary-color)] mb-6">
                {{ $provinceName }}
            </h1>
        </div>
        <div class="container grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6 py-2">

            {{-- Articles list --}}
            <div class="lg:col-span-2 space-y-4 sm:space-y-6">
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
                                    {!! Str::limit(strip_tags($article->description), 200) !!}
                                </div>
                                <small class="text-[10px] sm:text-xs text-gray-500 mt-2 block">
                                    <i class="fa-solid fa-calendar"></i> {{ toNepaliDate($article->created_at) }}
                                </small>
                            </div>
                        </div>
                    </a>
                @empty
                    <div class="text-center py-12 text-gray-500 bg-white rounded-md shadow p-6">
                        यस प्रदेशमा कुनै समाचार उपलब्ध छैन।
                    </div>
                @endforelse

                <div class="pt-2">
                    {{ $articles->links() }}
                </div>
            </div>

            {{-- Sidebar ads --}}
            <div class="space-y-4 mt-4 lg:mt-0">
                @forelse ($page_advertises as $ads)
                    <div>
                        <a href="{{ $ads->redirect_link }}" target="_blank" rel="noopener noreferrer">
                            <img class="w-full rounded shadow" src="{{ asset($ads->image) }}" alt="{{ $ads->company_name }}">
                        </a>
                    </div>
                @empty
                    {{-- No ads --}}
                @endforelse
            </div>
        </div>
    </section>

</x-frontend-layout>
