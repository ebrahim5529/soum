<header class="bg-primary shadow-md sticky top-0 z-50" style="padding-top: 15px; padding-bottom: 15px;" x-data="{ mobileMenuOpen: false }">
    <div class="container mx-auto px-4">
        <div class="flex items-center justify-between h-20">
            <div class="flex items-center gap-8">
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{ asset('build/assets/logo.svg') }}" alt="سوم العقارية" class="h-16 w-auto object-contain" style="max-width: 200px;">
                </a>
                <nav class="hidden md:flex items-center gap-6">
                    <a href="{{ route('home') }}" class="text-white hover:text-white/80 transition-colors">الرئيسية</a>
                    <a href="{{ route('properties.index') }}" class="text-white hover:text-white/80 transition-colors">العقارات</a>
                    <a href="{{ route('home') }}#services" class="text-white hover:text-white/80 transition-colors">الخدمات</a>
                    <a href="{{ route('blog.index') }}" class="text-white hover:text-white/80 transition-colors">المدونة</a>
                    <a href="{{ route('about') }}" class="text-white hover:text-white/80 transition-colors">من نحن</a>
                    <a href="{{ route('contact') }}" class="text-white hover:text-white/80 transition-colors">اتصل بنا</a>
                </nav>
            </div>
            <div class="flex items-center gap-4">
                @auth
                    <a href="{{ route('dashboard') }}" class="bg-white text-primary px-4 md:px-6 py-2 !rounded-button whitespace-nowrap hover:bg-white/90 transition-colors text-sm md:text-base font-semibold">
                        لوحة التحكم
                    </a>
                @else
                    <button onclick="window.dispatchEvent(new CustomEvent('open-contact-modal'))" class="bg-white text-primary px-4 md:px-6 py-2 !rounded-button whitespace-nowrap hover:bg-white/90 transition-colors text-sm md:text-base font-semibold">
                        نستقبل طلباتكم هنا
                    </button>
                @endauth
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden w-8 h-8 flex items-center justify-center text-white hover:text-white/80 transition-colors">
                    <i x-show="!mobileMenuOpen" class="ri-menu-line text-xl"></i>
                    <i x-show="mobileMenuOpen" class="ri-close-line text-xl"></i>
                </button>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 transform -translate-y-2"
             x-transition:enter-end="opacity-100 transform translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 transform translate-y-0"
             x-transition:leave-end="opacity-0 transform -translate-y-2"
             class="md:hidden border-t border-white/20 mt-4 pt-4 pb-4"
             style="display: none;"
             x-cloak>
            <nav class="flex flex-col gap-4">
                <a href="{{ route('home') }}" 
                   @click="mobileMenuOpen = false"
                   class="text-white hover:text-white/80 transition-colors py-2 flex items-center gap-2">
                    <i class="ri-home-line"></i>
                    <span>الرئيسية</span>
                </a>
                <a href="{{ route('properties.index') }}" 
                   @click="mobileMenuOpen = false"
                   class="text-white hover:text-white/80 transition-colors py-2 flex items-center gap-2">
                    <i class="ri-building-line"></i>
                    <span>العقارات</span>
                </a>
                <a href="{{ route('home') }}#services" 
                   @click="mobileMenuOpen = false"
                   class="text-white hover:text-white/80 transition-colors py-2 flex items-center gap-2">
                    <i class="ri-customer-service-2-line"></i>
                    <span>الخدمات</span>
                </a>
                <a href="{{ route('blog.index') }}" 
                   @click="mobileMenuOpen = false"
                   class="text-white hover:text-white/80 transition-colors py-2 flex items-center gap-2">
                    <i class="ri-article-line"></i>
                    <span>المدونة</span>
                </a>
                <a href="{{ route('about') }}" 
                   @click="mobileMenuOpen = false"
                   class="text-white hover:text-white/80 transition-colors py-2 flex items-center gap-2">
                    <i class="ri-information-line"></i>
                    <span>من نحن</span>
                </a>
                <a href="{{ route('contact') }}" 
                   @click="mobileMenuOpen = false"
                   class="text-white hover:text-white/80 transition-colors py-2 flex items-center gap-2">
                    <i class="ri-phone-line"></i>
                    <span>اتصل بنا</span>
                </a>
                @auth
                    <a href="{{ route('dashboard') }}" 
                       @click="mobileMenuOpen = false"
                       class="bg-white text-primary px-6 py-2 !rounded-button hover:bg-white/90 transition-colors text-center mt-2 font-semibold">
                        لوحة التحكم
                    </a>
                @else
                    <button onclick="window.dispatchEvent(new CustomEvent('open-contact-modal')); mobileMenuOpen = false" 
                            class="bg-white text-primary px-6 py-2 !rounded-button hover:bg-white/90 transition-colors w-full mt-2 font-semibold">
                        نستقبل طلباتكم هنا
                    </button>
                @endauth
            </nav>
        </div>
    </div>
</header>

