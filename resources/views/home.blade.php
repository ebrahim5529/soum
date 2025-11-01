<x-main>

    <!-- Hero Slider -->
    <x-slider :sliders="$sliders" />

    <!-- Search Section -->
    <section class="search-section py-12">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-2xl shadow-lg p-8">
                <h2 class="text-3xl font-bold text-center mb-8 text-gray-800">ابحث عن عقارك المثالي</h2>
                <form action="{{ route('properties.index') }}" method="GET" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">نوع العقار</label>
                        <div class="relative">
                            <select name="property_type" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-right appearance-none hover:border-primary focus:border-primary focus:outline-none transition-colors">
                                <option value="">اختر نوع العقار</option>
                                @foreach($propertyTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                            <i class="ri-arrow-down-s-line text-gray-400 absolute left-4 top-1/2 transform -translate-y-1/2 pointer-events-none"></i>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">نوع الخدمة</label>
                        <div class="relative">
                            <select name="service_type" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-right appearance-none hover:border-primary focus:border-primary focus:outline-none transition-colors">
                                <option value="">اختر نوع الخدمة</option>
                                @foreach($serviceTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                                @endforeach
                            </select>
                            <i class="ri-arrow-down-s-line text-gray-400 absolute left-4 top-1/2 transform -translate-y-1/2 pointer-events-none"></i>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">المدينة</label>
                        <div class="relative">
                            <select name="city" class="w-full bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-right appearance-none hover:border-primary focus:border-primary focus:outline-none transition-colors">
                                <option value="">اختر المدينة</option>
                                @foreach($cities as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                            <i class="ri-arrow-down-s-line text-gray-400 absolute left-4 top-1/2 transform -translate-y-1/2 pointer-events-none"></i>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">نطاق السعر</label>
                        <div class="flex gap-2">
                            <input type="text" name="price_min" placeholder="من" class="flex-1 bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-right text-sm hover:border-primary focus:border-primary focus:outline-none transition-colors">
                            <input type="text" name="price_max" placeholder="إلى" class="flex-1 bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-right text-sm hover:border-primary focus:border-primary focus:outline-none transition-colors">
                        </div>
                    </div>
                    <div class="lg:col-span-4 flex justify-center">
                        <button type="submit" class="bg-primary text-white px-12 py-3 !rounded-button whitespace-nowrap hover:bg-blue-700 transition-colors flex items-center gap-2">
                            <i class="ri-search-line"></i>
                            <span>البحث</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">خدماتنا العقارية</h2>
                <p class="text-xl text-gray-600">نقدم مجموعة شاملة من الخدمات العقارية المتخصصة</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $service)
                    @php
                        $colors = [
                            'blue' => 'from-blue-50 to-blue-100',
                            'green' => 'from-green-50 to-green-100',
                            'purple' => 'from-purple-50 to-purple-100',
                            'orange' => 'from-orange-50 to-orange-100',
                            'teal' => 'from-teal-50 to-teal-100',
                            'red' => 'from-red-50 to-red-100',
                        ];
                        $iconBgClasses = [
                            'blue' => 'bg-blue-500',
                            'green' => 'bg-green-500',
                            'purple' => 'bg-purple-500',
                            'orange' => 'bg-orange-500',
                            'teal' => 'bg-teal-500',
                            'red' => 'bg-red-500',
                        ];
                        $bgColor = $colors[$service->icon_color] ?? 'from-blue-50 to-blue-100';
                        $iconBg = $iconBgClasses[$service->icon_color] ?? 'bg-blue-500';
                    @endphp
                    <div class="feature-card bg-gradient-to-br {{ $bgColor }} rounded-2xl p-8 text-center">
                        <div class="w-16 h-16 {{ $iconBg }} rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="{{ $service->icon }} text-2xl text-white"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-800 mb-4">{{ $service->title }}</h3>
                        <p class="text-gray-600">{{ $service->description }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Featured Properties -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">العقارات المميزة</h2>
                <p class="text-xl text-gray-600">اكتشف أفضل العقارات المتاحة حالياً</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($featuredProperties as $property)
                    <x-property-card :property="$property" />
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-primary text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-4xl font-bold mb-4">هل تريد بيع أو تأجير عقارك؟</h2>
            <p class="text-xl mb-8 opacity-90">انضم إلى آلاف العملاء الذين وثقوا بخدماتنا</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                @auth
                    <a href="{{ route('dashboard') }}" class="bg-white text-primary px-8 py-3 !rounded-button whitespace-nowrap hover:bg-gray-100 transition-colors font-semibold">
                        إضافة عقار للبيع
                    </a>
                @else
                    <a href="{{ route('register') }}" class="bg-white text-primary px-8 py-3 !rounded-button whitespace-nowrap hover:bg-gray-100 transition-colors font-semibold">
                        إضافة عقار للبيع
                    </a>
                @endauth
                <a href="{{ route('contact') }}" class="bg-transparent border-2 border-white text-white px-8 py-3 !rounded-button whitespace-nowrap hover:bg-white hover:text-primary transition-colors font-semibold">
                    طلب تقييم مجاني
                </a>
            </div>
        </div>
    </section>
</x-main>

