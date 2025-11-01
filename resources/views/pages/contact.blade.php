<x-main>
    <!-- Hero Banner -->
    <section class="bg-gradient-to-r from-primary to-blue-700 text-white py-20">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-5xl md:text-6xl font-bold mb-6">اتصل بنا</h1>
                <p class="text-xl md:text-2xl opacity-90 leading-relaxed">
                    نحن هنا لمساعدتك! تواصل معنا لأي استفسار أو طلب خدمة
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
                            class="w-full bg-primary text-white px-8 py-4 !rounded-button hover:bg-blue-700 transition-all text-lg font-semibold shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
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
                            <p class="text-gray-600">تواصل معنا عبر أي من القنوات التالية</p>
                            <div class="w-24 h-1 bg-primary mt-4"></div>
                        </div>
                        
                        <div class="space-y-6">
                            <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-gray-50 transition-colors">
                                <div class="w-14 h-14 bg-gradient-to-br from-primary to-blue-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-md">
                                    <i class="ri-map-pin-line text-white text-2xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800 mb-2 text-lg">العنوان</h3>
                                    <p class="text-gray-600 mb-1">الرياض، المملكة العربية السعودية</p>
                                    <p class="text-gray-600">شارع الملك فهد، حي العليا</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-gray-50 transition-colors">
                                <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-md">
                                    <i class="ri-phone-line text-white text-2xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800 mb-2 text-lg">الهاتف</h3>
                                    <a href="tel:+966501234567" class="text-gray-600 hover:text-primary transition-colors block mb-1">
                                        +966 50 123 4567
                                    </a>
                                    <a href="tel:+966112345678" class="text-gray-600 hover:text-primary transition-colors block">
                                        +966 11 234 5678
                                    </a>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-gray-50 transition-colors">
                                <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-md">
                                    <i class="ri-mail-line text-white text-2xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800 mb-2 text-lg">البريد الإلكتروني</h3>
                                    <a href="mailto:info@realestate.com" class="text-gray-600 hover:text-primary transition-colors block mb-1">
                                        info@realestate.com
                                    </a>
                                    <a href="mailto:support@realestate.com" class="text-gray-600 hover:text-primary transition-colors block">
                                        support@realestate.com
                                    </a>
                                </div>
                            </div>
                            
                            <div class="flex items-start gap-4 p-4 rounded-xl hover:bg-gray-50 transition-colors">
                                <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-md">
                                    <i class="ri-time-line text-white text-2xl"></i>
                                </div>
                                <div>
                                    <h3 class="font-bold text-gray-800 mb-2 text-lg">ساعات العمل</h3>
                                    <p class="text-gray-600 mb-1">السبت - الخميس: 9:00 ص - 6:00 م</p>
                                    <p class="text-gray-600">الجمعة: مغلق</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="bg-gradient-to-br from-primary to-blue-700 rounded-2xl shadow-xl p-6 md:p-10 text-white">
                        <h2 class="text-2xl md:text-3xl font-bold mb-6">تابعنا على</h2>
                        <p class="text-white/90 mb-6">تواصل معنا عبر وسائل التواصل الاجتماعي</p>
                        <div class="flex flex-wrap gap-4">
                            <a href="#" class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center text-white hover:bg-white hover:text-blue-600 transition-all transform hover:scale-110 shadow-lg">
                                <i class="ri-facebook-fill text-2xl"></i>
                            </a>
                            <a href="#" class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center text-white hover:bg-white hover:text-blue-400 transition-all transform hover:scale-110 shadow-lg">
                                <i class="ri-twitter-fill text-2xl"></i>
                            </a>
                            <a href="#" class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center text-white hover:bg-white hover:text-pink-600 transition-all transform hover:scale-110 shadow-lg">
                                <i class="ri-instagram-fill text-2xl"></i>
                            </a>
                            <a href="#" class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center text-white hover:bg-white hover:text-blue-700 transition-all transform hover:scale-110 shadow-lg">
                                <i class="ri-linkedin-fill text-2xl"></i>
                            </a>
                            <a href="#" class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center text-white hover:bg-white hover:text-red-600 transition-all transform hover:scale-110 shadow-lg">
                                <i class="ri-youtube-fill text-2xl"></i>
                            </a>
                            <a href="#" class="w-14 h-14 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center text-white hover:bg-white hover:text-green-500 transition-all transform hover:scale-110 shadow-lg">
                                <i class="ri-whatsapp-fill text-2xl"></i>
                            </a>
                        </div>
                    </div>

                    <!-- Map Placeholder -->
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                        <div class="bg-gradient-to-br from-gray-100 to-gray-200 h-64 flex items-center justify-center relative">
                            <div class="text-center text-gray-500 z-10">
                                <i class="ri-map-pin-line text-5xl mb-3 text-primary"></i>
                                <p class="text-lg font-semibold">خريطة الموقع</p>
                                <p class="text-sm mt-2">الرياض، المملكة العربية السعودية</p>
                            </div>
                            <div class="absolute inset-0 bg-primary/5"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-main>

