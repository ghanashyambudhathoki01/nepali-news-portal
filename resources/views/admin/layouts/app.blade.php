@extends('layouts.app')

@section('content')
<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-md hidden md:block">
        <div class="p-4">
            <h2 class="text-xl font-semibold text-gray-800 mb-6">Admin Panel</h2>
            <nav class="space-y-2">
                <a href="{{ route('admin.dashboard') }}" class="block px-3 py-2 rounded hover:bg-gray-200">Dashboard</a>
                <a href="{{ route('admin.category.index') }}" class="block px-3 py-2 rounded hover:bg-gray-200">Categories</a>
                <a href="{{ route('admin.article.index') }}" class="block px-3 py-2 rounded hover:bg-gray-200">Articles</a>
                <a href="{{ route('admin.advertise.index') }}" class="block px-3 py-2 rounded hover:bg-gray-200">Advertises</a>
                <a href="{{ route('admin.messages.index') }}" class="block px-3 py-2 rounded hover:bg-gray-200">Messages</a>
            </nav>
        </div>
    </aside>

    <!-- Main content -->
    <main class="flex-1 p-6">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @yield('admin-content')
    </main>
</div>
@endsection
