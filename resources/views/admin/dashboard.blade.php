@extends('admin.layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">ड्यासबोर्ड</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Messages Card -->
        <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-lg transition-shadow">
            <div class="flex justify-center mb-4">
                <i class="fa-solid fa-envelope text-4xl text-[var(--primary-color)]"></i>
            </div>
            <h2 class="text-xl font-semibold text-gray-700 mb-2">सम्पूर्ण सन्देशहरू</h2>
            <p class="text-3xl font-bold text-[var(--primary-color)]">{{ $messageCount }}</p>
        </div>
        <!-- Categories Card -->
        <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-lg transition-shadow">
            <div class="flex justify-center mb-4">
                <i class="fa-solid fa-folder-open text-4xl text-[var(--primary-color)]"></i>
            </div>
            <h2 class="text-xl font-semibold text-gray-700 mb-2">श्रेणीहरू</h2>
            <p class="text-3xl font-bold text-[var(--primary-color)]">{{ $categoryCount }}</p>
        </div>
        <!-- Articles Card -->
        <div class="bg-white rounded-xl shadow-md p-6 text-center hover:shadow-lg transition-shadow">
            <div class="flex justify-center mb-4">
                <i class="fa-solid fa-newspaper text-4xl text-[var(--primary-color)]"></i>
            </div>
            <h2 class="text-xl font-semibold text-gray-700 mb-2">लेखहरू</h2>
            <p class="text-3xl font-bold text-[var(--primary-color)]">{{ $articleCount }}</p>
        </div>
    </div>
</div>
@endsection
