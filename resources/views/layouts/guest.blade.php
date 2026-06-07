<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Log in</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="h-full bg-gradient-to-br from-slate-50 via-white to-slate-100 dark:from-gray-900 dark:to-gray-800 font-sans antialiased">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">

            <!-- Card -->
            <div
                class="bg-white/90 dark:bg-gray-800/90 backdrop-blur-lg shadow-xl rounded-2xl border border-gray-200/50 dark:border-gray-700/50 p-8">

                {{ $slot }}
            </div>

            <!-- Footer -->
            <div class="text-center text-xs text-gray-500 dark:text-gray-400">
                © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.toggle-password').forEach(button => {
                button.addEventListener('click', function() {
                    const input = this.parentElement.querySelector('input');
                    const iconShow = this.querySelector('.icon-show');
                    const iconHide = this.querySelector('.icon-hide');

                    if (input.type === 'password') {
                        input.type = 'text';
                        iconShow.classList.add('hidden');
                        iconHide.classList.remove('hidden');
                    } else {
                        input.type = 'password';
                        iconShow.classList.remove('hidden');
                        iconHide.classList.add('hidden');
                    }
                });
            });
        });
    </script>
</body>

</html>
