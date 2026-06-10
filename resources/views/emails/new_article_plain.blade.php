New Article Published: {{ $article->title }}

नमस्ते,

{{ $article->title }} शीर्षकको नयाँ लेख प्रकाशित भएको छ।

{{ strip_tags($article->description) }}

पूरा लेख हेर्नुहोस्: {{ url('/article/' . $article->slug) }}

यदि तपाईं सदस्यता समाप्त गर्न चाहनुहुन्छ भने कृपया हामीलाई सम्पर्क गर्नुहोस्।
