<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="mb-8 text-center">
        <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-2">مرحباً بعودتك</h2>
        <p class="text-gray-600 dark:text-gray-400">سجل دخولك للوصول إلى حسابك</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-5">
            <x-input-label for="email" :value="__('البريد الإلكتروني')" />
            <div class="relative mt-2">
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <i class="ri-mail-line text-gray-400"></i>
                </div>
                <x-text-input id="email" 
                    class="block w-full pr-10 text-right" 
                    type="email" 
                    name="email" 
                    :value="old('email')" 
                    required 
                    autofocus 
                    autocomplete="username"
                    placeholder="أدخل بريدك الإلكتروني" />
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mb-5">
            <x-input-label for="password" :value="__('كلمة المرور')" />
            <div class="relative mt-2">
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <i class="ri-lock-line text-gray-400"></i>
                </div>
                <x-text-input id="password" 
                    class="block w-full pr-10 text-right"
                    type="password"
                    name="password"
                    required 
                    autocomplete="current-password"
                    placeholder="أدخل كلمة المرور" />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center">
                <input id="remember_me" 
                    type="checkbox" 
                    class="rounded border-gray-300 dark:border-gray-700 text-primary focus:ring-primary dark:bg-gray-900 dark:focus:ring-primary" 
                    name="remember">
                <label for="remember_me" class="mr-2 text-sm text-gray-600 dark:text-gray-400">
                    تذكرني
                </label>
            </div>

            @if (Route::has('password.request'))
                <a class="text-sm text-primary hover:text-primary/80 underline underline-offset-4 transition-colors" 
                   href="{{ route('password.request') }}">
                    نسيت كلمة المرور؟
                </a>
            @endif
        </div>

        <!-- Submit Button -->
        <button type="submit" 
                class="w-full bg-primary text-white py-3 px-4 rounded-lg font-semibold hover:bg-primary/90 focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 transition-colors flex items-center justify-center gap-2">
            <i class="ri-login-box-line"></i>
            <span>تسجيل الدخول</span>
        </button>
    </form>
</x-guest-layout>