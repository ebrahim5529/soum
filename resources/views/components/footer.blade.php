<footer class="bg-gray-800 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div>
                <a href="{{ route('home') }}" class="inline-block mb-4">
                    <img src="{{ asset('build/assets/logo.png') }}" alt="سوم العقارية" class="h-12 w-auto object-contain" style="max-width: 150px; filter: brightness(1.2);">
                </a>
                <p class="text-gray-300 mb-4">مكتبك العقاري الموثوق لجميع احتياجاتك العقارية</p>
                <div class="flex gap-4">
                    <a href="https://snapchat.com/t/P7CPqsOo" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-yellow-500 transition-colors">
                        <i class="ri-snapchat-fill"></i>
                    </a>
                    <a href="https://www.tiktok.com/@soum6050?_r=1&_t=ZS-912b6Vl8Dzz" target="_blank" rel="noopener noreferrer" class="w-10 h-10 bg-gray-700 rounded-full flex items-center justify-center hover:bg-primary transition-colors">
                        <i class="ri-tiktok-fill"></i>
                    </a>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">روابط سريعة</h3>
                <ul class="space-y-2 text-gray-300">
                    <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">الرئيسية</a></li>
                    <li><a href="{{ route('properties.index') }}" class="hover:text-white transition-colors">العقارات</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-white transition-colors">من نحن</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-white transition-colors">اتصل بنا</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">أنواع العقارات</h3>
                <ul class="space-y-2 text-gray-300">
                    <li><a href="{{ route('properties.index', ['property_type' => 1]) }}" class="hover:text-white transition-colors">فلل</a></li>
                    <li><a href="{{ route('properties.index', ['property_type' => 2]) }}" class="hover:text-white transition-colors">شقق</a></li>
                    <li><a href="{{ route('properties.index', ['property_type' => 3]) }}" class="hover:text-white transition-colors">أراضي</a></li>
                    <li><a href="{{ route('properties.index', ['property_type' => 4]) }}" class="hover:text-white transition-colors">محلات تجارية</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">تواصل معنا</h3>
                <div class="space-y-3 text-gray-300">
                    <div class="flex items-center gap-3">
                        <i class="ri-phone-line"></i>
                        <a href="tel:+966500179969" class="hover:text-white transition-colors">+966 50 017 9969</a>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="ri-mail-line"></i>
                        <a href="mailto:Soum6050@hotmail.com" class="hover:text-white transition-colors">Soum6050@hotmail.com</a>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="ri-snapchat-line"></i>
                        <a href="https://snapchat.com/t/P7CPqsOo" target="_blank" rel="noopener noreferrer" class="hover:text-white transition-colors">Snapchat</a>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="ri-tiktok-line"></i>
                        <a href="https://www.tiktok.com/@soum6050?_r=1&_t=ZS-912b6Vl8Dzz" target="_blank" rel="noopener noreferrer" class="hover:text-white transition-colors">TikTok</a>
                    </div>
                    <div class="flex items-center gap-3">
                        <i class="ri-map-pin-line"></i>
                        <span>الرياض، المملكة العربية السعودية</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
            <p>&copy; 2024 مكتب العقار. جميع الحقوق محفوظة.</p>
        </div>
    </div>
</footer>

