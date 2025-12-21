<x-main>
    <!-- Hero Banner -->
    <section class="bg-gradient-to-r from-primary to-orange-600 text-white py-20">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">اتصل بنا</h1>
                <p class="text-xl md:text-2xl opacity-90 leading-relaxed">
                    نحن هنا لمساعدتك! نستقبل طلباتكم هنا لأي استفسار أو طلب خدمة
                </p>
            </div>
        </div>
    </section>

    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12">
                <!-- Contact Form -->
                <div class="bg-white rounded-2xl shadow-xl p-6 md:p-10">
                    <div class="mb-8">
                        <div class="inline-block bg-primary/10 rounded-full px-4 py-2 mb-4">
                            <span class="text-primary font-semibold">راسلنا</span>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">أرسل لنا رسالة</h2>
                        <p class="text-gray-600">سنرد عليك في أقرب وقت ممكن</p>
                        <div class="w-24 h-1 bg-primary mt-4"></div>
                    </div>
                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                        @csrf
                        
                        @if(session('success'))
                            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
                                <i class="ri-checkbox-circle-line ml-2"></i>
                                {{ session('success') }}
                            </div>
                        @endif
                        
                        @if($errors->any())
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
                                <ul class="list-disc list-inside">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div>
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="ri-user-line ml-2 text-primary"></i>
                                الاسم الكامل
                            </label>
                            <input type="text" id="name" name="name" required
                                class="w-full bg-gray-50 border-2 border-gray-200 rounded-lg px-4 py-3 text-right hover:border-primary focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all"
                                placeholder="أدخل اسمك الكامل">
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="ri-mail-line ml-2 text-primary"></i>
                                    البريد الإلكتروني
                                </label>
                                <input type="email" id="email" name="email" required
                                    class="w-full bg-gray-50 border-2 border-gray-200 rounded-lg px-4 py-3 text-right hover:border-primary focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all"
                                    placeholder="example@email.com">
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                    <i class="ri-phone-line ml-2 text-primary"></i>
                                    رقم الهاتف
                                </label>
                                <input type="tel" id="phone" name="phone" required
                                    class="w-full bg-gray-50 border-2 border-gray-200 rounded-lg px-4 py-3 text-right hover:border-primary focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all"
                                    placeholder="05xxxxxxxx">
                            </div>
                        </div>
                        
                        <div>
                            <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="ri-file-list-line ml-2 text-primary"></i>
                                الموضوع
                            </label>
                            <div class="relative">
                                <select id="subject" name="subject" required
                                    class="w-full bg-gray-50 border-2 border-gray-200 rounded-lg px-4 py-3 text-right appearance-none hover:border-primary focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all">
                                    <option value="">اختر الموضوع</option>
                                    <option value="buy">شراء عقار</option>
                                    <option value="rent">إيجار عقار</option>
                                    <option value="sell">بيع عقار</option>
                                    <option value="evaluation">تقييم عقار</option>
                                    <option value="consultation">استشارة</option>
                                    <option value="other">أخرى</option>
                                </select>
                                <i class="ri-arrow-down-s-line text-gray-400 absolute left-4 top-1/2 transform -translate-y-1/2 pointer-events-none"></i>
                            </div>
                        </div>
                        
                        <div>
                            <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">
                                <i class="ri-message-line ml-2 text-primary"></i>
                                الرسالة
                            </label>
                            <textarea id="message" name="message" rows="6" required
                                class="w-full bg-gray-50 border-2 border-gray-200 rounded-lg px-4 py-3 text-right hover:border-primary focus:border-primary focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all resize-none"
                                placeholder="اكتب رسالتك هنا..."></textarea>
                        </div>
                        
                        <button type="submit"
                            class="w-full bg-primary text-white px-8 py-4 !rounded-button hover:bg-orange-600 transition-all text-lg font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                            <i class="ri-send-plane-line ml-2"></i>
                            إرسال الرسالة
                        </button>
                    </form>
                </div>

                <!-- Contact Information -->
                <div class="space-y-6 md:space-y-8">
                    <div class="bg-white rounded-2xl shadow-xl p-6 md:p-10">
                        <div class="mb-8">
                            <div class="inline-block bg-primary/10 rounded-full px-4 py-2 mb-4">
                                <span class="text-primary font-semibold">معلوماتنا</span>
                            </div>
                            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">معلومات الاتصال</h2>
                            <p class="text-gray-600">نستقبل طلباتكم هنا عبر أي من القنوات التالية</p>
                            <div class="w-24 h-1 bg-primary mt-4"></div>
                        </div>
                        
                        <div class="space-y-6">
                            <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-gray-50 transition-colors">
                                <div class="w-14 h-14 bg-gradient-to-br from-primary to-orange-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-md">
                                    <i class="ri-map-pin-line text-white text-2xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800 mb-2 text-lg">العنوان</h3>
                                    <a href="https://www.google.com/maps/place/%D8%B3%D9%88%D9%85+%D8%A7%D9%84%D8%B9%D9%82%D8%A7%D8%B1%D9%8A%D9%87%E2%80%AD/@26.0609484,43.9876864,596m/data=!3m2!1e3!4b1!4m6!3m5!1s0x1581ede7e1ad059f:0x7173a7fb45f3cc32!8m2!3d26.0609484!4d43.9876864!16s%2Fg%2F11rn04vxr_?entry=ttu&g_ep=EgoyMDI1MTIwOS4wIKXMDSoKLDEwMDc5MjA2N0gBUAM%3D" target="_blank" rel="noopener noreferrer" class="text-gray-600 hover:text-primary transition-colors block cursor-pointer">
                                        {{ $contactSetting->address ?? 'القصيم - عنيزة - حي الفاخرية - طريق عمربن الخطاب' }}
                                    </a>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-gray-50 transition-colors">
                                <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-md">
                                    <i class="ri-whatsapp-line text-white text-2xl"></i>
                                </div>
                                <div class="flex-1">
                                    <h3 class="font-bold text-gray-800 mb-2 text-lg">أرقام التواصل</h3>
                                    <div class="space-y-1">
                                        <a href="https://wa.me/966547413177" target="_blank" rel="noopener noreferrer" class="text-gray-600 hover:text-primary transition-colors block">
                                            0547413177
                                        </a>
                                        <a href="https://wa.me/966500179969" target="_blank" rel="noopener noreferrer" class="text-gray-600 hover:text-primary transition-colors block">
                                            0500179969
                                        </a>
                                        <a href="https://wa.me/966556308601" target="_blank" rel="noopener noreferrer" class="text-gray-600 hover:text-primary transition-colors block">
                                            0556308601
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-gray-50 transition-colors">
                                <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-md">
                                    <i class="ri-mail-line text-white text-2xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800 mb-2 text-lg">البريد الإلكتروني</h3>
                                    @if($contactSetting && $contactSetting->email)
                                        <a href="mailto:{{ $contactSetting->email }}" class="text-gray-600 hover:text-primary transition-colors block break-all">
                                            {{ $contactSetting->email }}
                                        </a>
                                    @else
                                        <a href="mailto:Soum.unizah@gmail.com" class="text-gray-600 hover:text-primary transition-colors block break-all">
                                            Soum.unizah@gmail.com
                                        </a>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-gray-50 transition-colors">
                                <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-md">
                                    <i class="ri-time-line text-white text-2xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800 mb-2 text-lg">ساعات العمل</h3>
                                    @if($contactSetting && $contactSetting->working_hours_office)
                                        <p class="text-gray-600 mb-1">في المكتب: {{ $contactSetting->working_hours_office }}</p>
                                    @else
                                        <p class="text-gray-600 mb-1">في المكتب: 4:00 م - 9:00 م</p>
                                    @endif
                                    @if($contactSetting && $contactSetting->working_hours_online)
                                        <p class="text-gray-600">على الأونلاين: {{ $contactSetting->working_hours_online }}</p>
                                    @else
                                        <p class="text-gray-600">على الأونلاين: 24 ساعة</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="bg-gradient-to-br from-primary to-orange-600 rounded-2xl shadow-xl p-6 md:p-10 text-white">
                        <h2 class="text-2xl md:text-3xl font-bold mb-6">تابعنا على</h2>
                        <p class="text-white/90 mb-6">نستقبل طلباتكم هنا عبر وسائل التواصل الاجتماعي</p>
                        <div class="flex flex-wrap gap-4">
                            <a href="https://snapchat.com/t/P7CPqsOo" target="_blank" rel="noopener noreferrer" class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center text-white hover:bg-white hover:text-yellow-500 transition-all transform hover:scale-110 shadow-lg" title="Snapchat">
                                <i class="ri-snapchat-fill text-2xl"></i>
                            </a>
                            <a href="https://www.tiktok.com/@soum6050?_r=1&_t=ZS-912b6Vl8Dzz" target="_blank" rel="noopener noreferrer" class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center text-white hover:bg-white hover:text-primary transition-all transform hover:scale-110 shadow-lg" title="TikTok">
                                <i class="ri-tiktok-fill text-2xl"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Map -->
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                        <div class="p-6 border-b border-gray-200">
                            <h3 class="text-xl font-bold text-gray-800 mb-2">خريطة الموقع</h3>
                            <p class="text-gray-600 text-sm">القصيم - عنيزة - حي الفاخرية - طريق عمربن الخطاب</p>
                        </div>
                        <div class="w-full h-96">
                            <iframe 
                                src="https://www.google.com/maps?q=26.0609484,43.9876864&hl=ar&z=15&output=embed"
                                width="100%" 
                                height="100%" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade"
                                class="w-full h-full">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-main>

