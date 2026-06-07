<x-guest-layout>
    <div class="space-y-8">
        <!-- Header -->
        <div class="text-center">
            <h2 class="text-3xl font-bold text-gray-900 dark:text-white">
                Create your account
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                Join us — it only takes a minute
            </p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('register') }}" class="space-y-6">
            @csrf

            <!-- Name -->
            <div class="relative">
                <x-text-input id="name"
                    class="peer block w-full px-4 py-3 border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-xl focus:ring-indigo-500 focus:border-indigo-500 shadow-sm transition"
                    type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                    placeholder=" " />
                <label for="name"
                    class="absolute left-4 top-3 text-gray-500 dark:text-gray-400 text-sm transition-all
                    peer-placeholder-shown:top-3 peer-placeholder-shown:text-base
                    peer-focus:-top-2.5 peer-focus:text-xs peer-focus:bg-white dark:peer-focus:bg-gray-800
                    peer-focus:px-1 peer-focus:text-indigo-600">
                    Full Name
                </label>
                <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600" />
            </div>

            <!-- Email Address -->
            <div class="relative">
                <x-text-input id="email"
                    class="peer block w-full px-4 py-3 border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-xl focus:ring-indigo-500 focus:border-indigo-500 shadow-sm transition"
                    type="email" name="email" :value="old('email')" required autocomplete="username" placeholder=" " />
                <label for="email"
                    class="absolute left-4 top-3 text-gray-500 dark:text-gray-400 text-sm transition-all
                    peer-placeholder-shown:top-3 peer-placeholder-shown:text-base
                    peer-focus:-top-2.5 peer-focus:text-xs peer-focus:bg-white dark:peer-focus:bg-gray-800
                    peer-focus:px-1 peer-focus:text-indigo-600">
                    Email Address
                </label>
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
            </div>

            <!-- Password -->
            <div class="relative">
                <x-text-input id="password"
                    class="peer block w-full px-4 py-3 pr-12 border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-xl focus:ring-indigo-500 focus:border-indigo-500 shadow-sm transition"
                    type="password" name="password" required placeholder=" " />
                <label for="password"
                    class="absolute left-4 top-3 text-gray-500 dark:text-gray-400 text-sm transition-all
        peer-placeholder-shown:top-3 peer-placeholder-shown:text-base
        peer-focus:-top-2.5 peer-focus:text-xs peer-focus:bg-white dark:peer-focus:bg-gray-800
        peer-focus:px-1 peer-focus:text-indigo-600">
                    Password
                </label>

                <!-- Eye Toggle Button -->
                <button type="button"
                    class="toggle-password absolute inset-y-0 right-0 flex items-center pr-4 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                    <!-- Eye Open (Show) -->
                    <span class="icon-show">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </span>
                    <!-- Eye Closed (Hide) -->
                    <span class="icon-hide hidden">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </span>
                </button>

                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />

            </div>


            <div class="relative">
                <x-text-input id="password_confirmation"
                    class="peer block w-full px-4 py-3 pr-12 border-gray-300 dark:border-gray-600 dark:bg-gray-700 rounded-xl focus:ring-indigo-500 focus:border-indigo-500 shadow-sm transition"
                    type="password" name="password_confirmation" required placeholder=" " />
                <label for="password_confirmation"
                    class="absolute left-4 top-3 text-gray-500 dark:text-gray-400 text-sm transition-all
        peer-placeholder-shown:top-3 peer-placeholder-shown:text-base
        peer-focus:-top-2.5 peer-focus:text-xs peer-focus:bg-white dark:peer-focus:bg-gray-800
        peer-focus:px-1 peer-focus:text-indigo-600">
                    Password
                </label>

                <!-- Eye Toggle Button -->
                <button type="button"
                    class="toggle-password absolute inset-y-0 right-0 flex items-center pr-4 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200">
                    <!-- Eye Open (Show) -->
                    <span class="icon-show">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </span>
                    <!-- Eye Closed (Hide) -->
                    <span class="icon-hide hidden">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                        </svg>
                    </span>
                </button>

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600" />

            </div>

            
            <!-- Submit Button -->
            <div>
                <x-primary-button
                    class="w-full justify-center py-3.5 text-sm font-semibold rounded-xl shadow-lg bg-indigo-600 hover:bg-indigo-700 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition transform hover:-translate-y-0.5">
                    Create Account
                </x-primary-button>
            </div>

            <!-- Login Link -->
            <p class="text-center text-sm text-gray-600 dark:text-gray-400">
                Already have an account?
                <a href="{{ route('login') }}" class="font-medium text-indigo-600 hover:text-indigo-500 transition">
                    Sign in here
                </a>
            </p>
        </form>
    </div>
</x-guest-layout>
