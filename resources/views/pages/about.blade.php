<x-main>
            <!-- Hero Banner -->
    <section class="bg-gradient-to-r from-primary to-orange-600 text-white py-20 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 right-10 w-32 h-32 bg-white rounded-full"></div>
            <div class="absolute bottom-10 left-10 w-40 h-40 bg-white rounded-full"></div>
            <div class="absolute top-1/2 left-1/4 w-24 h-24 bg-white rounded-full"></div>
        </div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center max-w-4xl mx-auto">
                <div class="flex justify-center mb-6">
                    <div class="w-24 h-24 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center border-4 border-white/30">
                        <i class="ri-building-line text-5xl text-white"></i>
                    </div>
                </div>
                <h1 class="text-5xl md:text-6xl font-bold mb-6">من نحن</h1>
                <p class="text-xl md:text-2xl opacity-90 leading-relaxed">
                    نحن مكتب عقاري رائد يقدم خدمات شاملة ومتميزة في مجال العقارات
                </p>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <!-- Introduction -->
            <div class="max-w-4xl mx-auto text-center mb-20">
                <div class="inline-flex items-center gap-2 bg-primary/10 rounded-full px-6 py-2 mb-6">
                    <i class="ri-building-line text-primary text-xl"></i>
                    <span class="text-primary font-semibold">مكتب العقار</span>
                </div>
                <div class="flex justify-center mb-6">
                    <div class="w-20 h-20 bg-gradient-to-br from-primary to-orange-600 rounded-full flex items-center justify-center shadow-lg">
                        <i class="ri-home-line text-4xl text-white"></i>
                    </div>
                </div>
                <p class="text-xl text-gray-600 leading-relaxed mb-6">
                    {{ $aboutPage->introduction ?: 'نحن فريق من الخبراء المتخصصين في مجال العقارات، نعمل منذ أكثر من 10 سنوات على تقديم أفضل الخدمات العقارية لعملائنا الكرام. نسعى جاهدين لتوفير حلول متميزة تلبي جميع احتياجاتك العقارية.' }}
                </p>
                <div class="w-24 h-1 bg-primary mx-auto"></div>
            </div>

            <!-- Vision & Mission -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 mb-20">
                <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-8 md:p-10 shadow-lg">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="ri-eye-line text-3xl text-white"></i>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-800">{{ $aboutPage->vision_title ?: 'رؤيتنا' }}</h2>
                    </div>
                    @if($aboutPage->vision_content)
                        <div class="text-gray-700 text-lg leading-relaxed whitespace-pre-line">
                            {{ $aboutPage->vision_content }}
                        </div>
                    @else
                    <p class="text-gray-700 text-lg leading-relaxed mb-4">
                        نسعى لأن نكون الخيار الأول والأمثل للعملاء في مجال العقارات على مستوى المملكة العربية السعودية، من خلال تقديم خدمات متميزة واحترافية تلبي جميع احتياجاتهم العقارية.
                    </p>
                    <p class="text-gray-700 text-lg leading-relaxed">
                        نؤمن بأن كل عميل يستحق أفضل الخدمات وأن كل عقار له قيمته الفريدة، لذلك نعمل بجد وإخلاص لتقديم حلول مخصصة وذات جودة عالية لكل عميل.
                    </p>
                    @endif
                </div>
                
                <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-8 md:p-10 shadow-lg">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center flex-shrink-0">
                            <i class="ri-target-line text-3xl text-white"></i>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-800">{{ $aboutPage->mission_title ?: 'رسالتنا' }}</h2>
                    </div>
                    @if($aboutPage->mission_content)
                        <div class="text-gray-700 text-lg leading-relaxed whitespace-pre-line">
                            {{ $aboutPage->mission_content }}
                        </div>
                    @else
                    <p class="text-gray-700 text-lg leading-relaxed mb-4">
                        رسالتنا هي توفير خدمات عقارية شاملة ومهنية تساعد عملاءنا على تحقيق أهدافهم العقارية بكفاءة وشفافية تامة، مع ضمان أعلى مستويات الرضا والثقة.
                    </p>
                    <p class="text-gray-700 text-lg leading-relaxed">
                        نلتزم بأعلى معايير الجودة والأمانة في جميع معاملاتنا، ونقدم استشارات متخصصة مدروسة لمساعدة عملاءنا في اتخاذ القرارات الصحيحة والاستثمارات المربحة.
                    </p>
                    @endif
                </div>
            </div>

            <!-- Why Choose Us -->
            <div class="mb-20">
                <div class="text-center mb-12">
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">لماذا نحن؟</h2>
                    <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                        نحن نقدم قيمة حقيقية لعملائنا من خلال المزايا والخدمات المتميزة
                    </p>
                    <div class="w-24 h-1 bg-primary mx-auto mt-4"></div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                    @forelse($whyChooseUsItems as $item)
                        @php
                            $iconBgClasses = [
                                'primary' => 'from-primary to-orange-600',
                                'blue' => 'from-blue-500 to-blue-600',
                                'green' => 'from-green-500 to-green-600',
                                'purple' => 'from-purple-500 to-purple-600',
                                'orange' => 'from-orange-500 to-orange-600',
                                'teal' => 'from-teal-500 to-teal-600',
                                'red' => 'from-red-500 to-red-600',
                            ];
                            $bgColor = $iconBgClasses[$item->icon_color] ?? 'from-primary to-orange-600';
                        @endphp
                    <div class="bg-white rounded-xl p-6 shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border border-gray-100">
                            <div class="w-16 h-16 bg-gradient-to-br {{ $bgColor }} rounded-xl flex items-center justify-center mb-4">
                                <i class="{{ $item->icon }} text-3xl text-white"></i>
                        </div>
                            <h3 class="text-xl font-bold text-gray-800 mb-3">{{ $item->title }}</h3>
                            <p class="text-gray-600 leading-relaxed">{{ $item->description }}</p>
                        </div>
                    @empty
                        <div class="col-span-3 text-center text-gray-500 py-8">
                            <i class="ri-inbox-line text-4xl mb-4 block"></i>
                            لا توجد عناصر متاحة
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Statistics -->
            <div class="bg-gradient-to-r from-primary to-orange-600 rounded-2xl p-8 md:p-12 mb-20 text-white relative overflow-hidden">
                <div class="absolute inset-0 opacity-10">
                    <div class="absolute top-5 right-5 w-20 h-20 bg-white rounded-full"></div>
                    <div class="absolute bottom-5 left-5 w-24 h-24 bg-white rounded-full"></div>
                </div>
                <div class="text-center mb-8 relative z-10">
                    <div class="flex justify-center mb-4">
                        <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center border-2 border-white/30">
                            <i class="ri-award-line text-3xl text-white"></i>
                        </div>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold mb-2">إنجازاتنا بالأرقام</h2>
                    <p class="text-xl opacity-90">نفتخر بما حققناه مع عملائنا</p>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8">
                    @forelse($statistics as $statistic)
                    <div class="text-center bg-white/10 rounded-xl p-6 backdrop-blur-sm hover:bg-white/20 transition-all">
                        <div class="w-16 h-16 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="{{ $statistic->icon }} text-3xl text-white"></i>
                        </div>
                            <div class="text-4xl md:text-5xl font-bold mb-2">{{ $statistic->number }}</div>
                            <div class="text-lg opacity-90">{{ $statistic->label }}</div>
                        </div>
                    @empty
                        <div class="col-span-4 text-center text-white/80 py-8">
                            <i class="ri-inbox-line text-4xl mb-4 block"></i>
                            لا توجد إنجازات متاحة
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Team Section -->
            <div class="bg-gray-50 rounded-2xl p-8 md:p-12 text-center">
                <div class="max-w-3xl mx-auto">
                    <div class="flex justify-center mb-6">
                        <div class="w-20 h-20 bg-primary rounded-full flex items-center justify-center shadow-lg">
                            <i class="ri-team-line text-4xl text-white"></i>
                        </div>
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-6">فريقنا المتخصص</h2>
                    <div class="w-24 h-1 bg-primary mx-auto mb-6"></div>
                    <p class="text-xl text-gray-600 leading-relaxed mb-8">
                        {{ $aboutPage->team_description ?: 'فريقنا يتكون من مجموعة من الخبراء والمتخصصين المحترفين في مختلف مجالات العقارات والاستثمار العقاري. نحن مستعدون دومًا لمساعدتك في تحقيق أهدافك العقارية والاستثمارية بأفضل الطرق الممكنة.' }}
                    </p>
                    
                    <!-- Team Features -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                        <div class="bg-white rounded-xl p-6 shadow-md">
                            <div class="w-14 h-14 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="ri-user-line text-2xl text-primary"></i>
                            </div>
                            <h3 class="font-bold text-gray-800 mb-2">خبراء معتمدون</h3>
                            <p class="text-gray-600 text-sm">فريق من الخبراء المعتمدين</p>
                        </div>
                        <div class="bg-white rounded-xl p-6 shadow-md">
                            <div class="w-14 h-14 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="ri-lightbulb-line text-2xl text-green-600"></i>
                            </div>
                            <h3 class="font-bold text-gray-800 mb-2">استشارات مخصصة</h3>
                            <p class="text-gray-600 text-sm">نقدم استشارات مخصصة</p>
                        </div>
                        <div class="bg-white rounded-xl p-6 shadow-md">
                            <div class="w-14 h-14 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                <i class="ri-customer-service-2-line text-2xl text-purple-600"></i>
                            </div>
                            <h3 class="font-bold text-gray-800 mb-2">دعم مستمر</h3>
                            <p class="text-gray-600 text-sm">دعم على مدار الساعة</p>
                        </div>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="{{ route('contact') }}" class="bg-primary text-white px-8 py-3 !rounded-button hover:bg-orange-600 transition-all shadow-lg hover:shadow-xl inline-block font-semibold">
                            <i class="ri-phone-line ml-2"></i>
                            نستقبل طلباتكم هنا
                        </a>
                        <a href="{{ route('properties.index') }}" class="bg-white border-2 border-primary text-primary px-8 py-3 !rounded-button hover:bg-primary hover:text-white transition-all shadow-lg hover:shadow-xl inline-block font-semibold">
                            <i class="ri-home-line ml-2"></i>
                            تصفح العقارات
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-main>

