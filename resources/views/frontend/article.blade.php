<x-frontend-layout :title="$article->title" :keywords="$article->meta_keywords" :description="$article->meta_description" :image="asset($article->image)">

    <section>
        <div class="container grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-6 py-4 sm:py-6">

            {{-- Article content --}}
            <div class="lg:col-span-2 space-y-4">

                {{-- Meta info --}}
                <div class="flex flex-wrap gap-3 sm:gap-4 text-xs sm:text-sm text-gray-500">
                    <small class="flex items-center gap-1">
                        <i class="fa-solid fa-calendar"></i> {{ toNepaliDate($article->created_at) }}
                    </small>
                    <small class="flex items-center gap-1">
                        <i class="fa-solid fa-eye"></i> {{ $article->views }} views
                    </small>
                    <small class="flex items-center gap-1">
                        <i class="fa-solid fa-user"></i> {{ $article->writer_name }}
                    </small>
                </div>

                {{-- Title --}}
                <h1 class="text-lg sm:text-xl md:text-2xl font-semibold leading-snug">
                    {{ $article->title }}
                </h1>

                {{-- Share Buttons --}}
                <div class="flex flex-wrap items-center gap-2 sm:gap-3 p-3 sm:p-4 bg-gray-50 rounded-lg border text-xs sm:text-sm">
                    <span class="font-medium text-gray-700 w-full sm:w-auto mb-1 sm:mb-0">Share:</span>

                    {{-- Facebook --}}
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                        target="_blank"
                        class="inline-flex items-center gap-1.5 px-2.5 py-1.5 sm:px-3 sm:py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        <i class="fab fa-facebook-f"></i>
                        <span class="hidden xs:inline">Facebook</span>
                    </a>

                    {{-- WhatsApp --}}
                    <a href="https://wa.me/?text={{ urlencode($article->title . ' ' . request()->url()) }}"
                        target="_blank"
                        class="inline-flex items-center gap-1.5 px-2.5 py-1.5 sm:px-3 sm:py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                        <i class="fab fa-whatsapp"></i>
                        <span class="hidden xs:inline">WhatsApp</span>
                    </a>

                    {{-- Copy Link --}}
                    <button onclick="copyToClipboard('{{ request()->url() }}')"
                        class="inline-flex items-center gap-1.5 px-2.5 py-1.5 sm:px-3 sm:py-2 bg-gray-700 text-white rounded hover:bg-gray-800 transition copy-link-btn">
                        <i class="fa-solid fa-link"></i>
                        <span class="hidden xs:inline">Copy Link</span>
                    </button>

                    <div id="copy-success" class="hidden text-green-600 font-medium text-xs">
                        <i class="fa-solid fa-check"></i> Link copied!
                    </div>
                </div>

                {{-- Article image --}}
                <img class="w-full h-auto max-h-[250px] sm:max-h-[350px] md:max-h-[450px] object-cover rounded"
                    src="{{ asset($article->image) }}" alt="{{ $article->title }}">

                {{-- Article body --}}
                <div class="prose prose-sm sm:prose-base max-w-none break-words overflow-hidden">
                    {!! $article->description !!}
                </div>

                {{-- Related News --}}
                @if($related_news->count())
                <div class="mt-6 pt-4 border-t-2 border-red-700">
                    <h2 class="text-base sm:text-lg font-bold text-red-700 mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-newspaper"></i> सम्बन्धित समाचार
                    </h2>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        @foreach($related_news as $related)
                        <a href="{{ route('article', $related->slug) }}"
                           class="flex gap-3 items-start group hover:bg-gray-50 p-2 rounded-lg transition">
                            <img src="{{ asset($related->image) }}"
                                 alt="{{ $related->title }}"
                                 class="w-20 h-16 object-cover rounded flex-shrink-0">
                            <div class="flex-1 min-w-0">
                                <p class="text-xs text-gray-400 mb-1">
                                    <i class="fa-solid fa-calendar fa-xs"></i>
                                    {{ toNepaliDate($related->created_at) }}
                                </p>
                                <h3 class="text-sm font-semibold leading-snug text-gray-800 group-hover:text-red-700 transition line-clamp-3">
                                    {{ $related->title }}
                                </h3>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif

                {{-- Facebook Comments --}}
                <div class="fb-comments" data-href="http://127.0.0.1:8000/article/{{ $article->slug }}" data-width="100%"
                    data-numposts="5"></div>
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

    <!-- Add FontAwesome for icons (if not already included) -->
    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @endpush

    @push('scripts')
        <script>
            function copyToClipboard(text) {
                // Create a temporary input element
                const tempInput = document.createElement('input');
                tempInput.value = text;
                document.body.appendChild(tempInput);

                // Select and copy the text
                tempInput.select();
                tempInput.setSelectionRange(0, 99999); // For mobile devices

                try {
                    const successful = document.execCommand('copy');
                    if (successful) {
                        // Show success message
                        const successMessage = document.getElementById('copy-success');
                        successMessage.classList.remove('hidden');

                        // Change button text temporarily
                        const copyBtn = document.querySelector('.copy-link-btn');
                        const originalText = copyBtn.innerHTML;
                        copyBtn.innerHTML = '<i class="fa-solid fa-check"></i> Copied!';
                        copyBtn.classList.add('bg-green-600', 'hover:bg-green-700');

                        // Reset button after 2 seconds
                        setTimeout(() => {
                            successMessage.classList.add('hidden');
                            copyBtn.innerHTML = originalText;
                            copyBtn.classList.remove('bg-green-600', 'hover:bg-green-700');
                        }, 2000);
                    }
                } catch (err) {
                    console.error('Failed to copy: ', err);
                    alert('Failed to copy link. Please copy manually: ' + text);
                }

                // Clean up
                document.body.removeChild(tempInput);
            }

            // Alternative modern approach using Clipboard API
            function copyToClipboardModern(text) {
                if (navigator.clipboard && window.isSecureContext) {
                    // Use the modern Clipboard API if available
                    navigator.clipboard.writeText(text).then(() => {
                        // Show success message
                        const successMessage = document.getElementById('copy-success');
                        successMessage.classList.remove('hidden');

                        // Change button text temporarily
                        const copyBtn = document.querySelector('.copy-link-btn');
                        const originalText = copyBtn.innerHTML;
                        copyBtn.innerHTML = '<i class="fa-solid fa-check"></i> Copied!';
                        copyBtn.classList.add('bg-green-600', 'hover:bg-green-700');

                        // Reset after 2 seconds
                        setTimeout(() => {
                            successMessage.classList.add('hidden');
                            copyBtn.innerHTML = originalText;
                            copyBtn.classList.remove('bg-green-600', 'hover:bg-green-700');
                        }, 2000);
                    }).catch(err => {
                        console.error('Failed to copy: ', err);
                        // Fallback to old method
                        copyToClipboard(text);
                    });
                } else {
                    // Fallback to old method
                    copyToClipboard(text);
                }
            }

            // Update the button to use modern API
            document.querySelector('.copy-link-btn').addEventListener('click', function(e) {
                e.preventDefault();
                copyToClipboardModern('{{ request()->url() }}');
            });
        </script>
    @endpush

</x-frontend-layout>
