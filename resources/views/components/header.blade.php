<header class="bg-white shadow-md sticky top-0 z-50" style="padding-top: 15px; padding-bottom: 15px;">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center gap-8">
                <a href="{{ route('home') }}" class="flex items-center bg-white/80 backdrop-blur-sm rounded-lg px-2 py-1">
                    <img src="{{ asset('build/assets/logo.png') }}" alt="سوم العقارية" class="h-12 w-auto object-contain" style="max-width: 150px;">
                </a>
                <nav class="hidden md:flex items-center gap-6">
                    <a href="{{ route('home') }}" class="text-gray-700 hover:text-primary transition-colors">الرئيسية</a>
                    <a href="{{ route('properties.index') }}" class="text-gray-700 hover:text-primary transition-colors">العقارات</a>
                    <a href="{{ route('home') }}#services" class="text-gray-700 hover:text-primary transition-colors">الخدمات</a>
                    <a href="{{ route('about') }}" class="text-gray-700 hover:text-primary transition-colors">من نحن</a>
                    <a href="{{ route('contact') }}" class="text-gray-700 hover:text-primary transition-colors">اتصل بنا</a>
                </nav>
            </div>
            <div class="flex items-center gap-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="bg-primary text-white px-6 py-2 !rounded-button whitespace-nowrap hover:opacity-90 transition-colors">
                        لوحة التحكم
                    </a>
                @else
                    <a href="{{ route('login') }}" class="bg-primary text-white px-6 py-2 !rounded-button whitespace-nowrap hover:opacity-90 transition-colors">
                        تسجيل الدخول
                    </a>
                @endauth
                <button class="md:hidden w-8 h-8 flex items-center justify-center">
                    <i class="ri-menu-line text-xl"></i>
                </button>
            </div>
        </div>
    </div>
</header>

