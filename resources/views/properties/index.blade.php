<x-main>

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
                                    <option value="{{ $type->id }}" {{ request('property_type') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
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
                                    <option value="{{ $type->id }}" {{ request('service_type') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
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
                                    <option value="{{ $city->id }}" {{ request('city') == $city->id ? 'selected' : '' }}>{{ $city->name }}</option>
                                @endforeach
                            </select>
                            <i class="ri-arrow-down-s-line text-gray-400 absolute left-4 top-1/2 transform -translate-y-1/2 pointer-events-none"></i>
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">نطاق السعر</label>
                        <div class="flex gap-2">
                            <input type="text" name="price_min" value="{{ request('price_min') }}" placeholder="من" class="flex-1 bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-right text-sm hover:border-primary focus:border-primary focus:outline-none transition-colors">
                            <input type="text" name="price_max" value="{{ request('price_max') }}" placeholder="إلى" class="flex-1 bg-gray-50 border border-gray-200 rounded-lg px-4 py-3 text-right text-sm hover:border-primary focus:border-primary focus:outline-none transition-colors">
                        </div>
                    </div>
                    <div class="lg:col-span-4 flex justify-center">
                        <button type="submit" class="bg-primary text-white px-12 py-3 !rounded-button whitespace-nowrap hover:bg-orange-600 transition-colors flex items-center gap-2">
                            <i class="ri-search-line"></i>
                            <span>البحث</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Properties List -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="mb-8">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">نتائج البحث</h2>
                <p class="text-gray-600">{{ $properties->total() }} عقار متاح</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($properties as $property)
                    <x-property-card :property="$property" />
                @empty
                    <div class="col-span-full text-center py-12">
                        <p class="text-xl text-gray-600">لم يتم العثور على عقارات</p>
                    </div>
                @endforelse
            </div>
            
            <!-- Pagination -->
            <div class="mt-8">
                {{ $properties->links() }}
            </div>
        </div>
    </section>
</x-main>

