<x-admin>

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 mb-2">إجمالي العقارات</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $totalProperties }}</p>
                </div>
                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center">
                    <i class="ri-home-line text-3xl text-primary"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 mb-2">عقارات متاحة</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $availableProperties }}</p>
                </div>
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center">
                    <i class="ri-checkbox-circle-line text-3xl text-green-600"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 mb-2">عقارات مميزة</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $featuredProperties }}</p>
                </div>
                <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center">
                    <i class="ri-star-line text-3xl text-yellow-600"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 mb-2">الشرائح النشطة</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $activeSliders }}</p>
                </div>
                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center">
                    <i class="ri-slideshow-line text-3xl text-purple-600"></i>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 mb-2">إجمالي الرسائل</p>
                    <p class="text-3xl font-bold text-gray-800">{{ $totalContacts }}</p>
                    @if($unreadContacts > 0)
                        <p class="text-sm text-blue-600 mt-1">{{ $unreadContacts }} رسالة جديدة</p>
                    @endif
                </div>
                <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center relative">
                    <i class="ri-mail-line text-3xl text-indigo-600"></i>
                    @if($unreadContacts > 0)
                        <span class="absolute -top-1 -left-1 bg-red-500 text-white text-xs font-bold rounded-full w-6 h-6 flex items-center justify-center">{{ $unreadContacts }}</span>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Properties -->
    <div class="bg-white rounded-xl shadow-lg p-6">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-2xl font-bold text-gray-800">أحدث العقارات</h2>
            <a href="{{ route('admin.properties.index') }}" class="text-primary hover:underline">عرض الكل</a>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="text-right py-3 px-4 text-gray-700 font-semibold">العنوان</th>
                        <th class="text-right py-3 px-4 text-gray-700 font-semibold">النوع</th>
                        <th class="text-right py-3 px-4 text-gray-700 font-semibold">السعر</th>
                        <th class="text-right py-3 px-4 text-gray-700 font-semibold">الحالة</th>
                        <th class="text-right py-3 px-4 text-gray-700 font-semibold">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($recentProperties as $property)
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="py-3 px-4">{{ $property->title }}</td>
                            <td class="py-3 px-4">{{ $property->propertyType->name }}</td>
                            <td class="py-3 px-4">{{ number_format($property->price, 0) }} ريال</td>
                            <td class="py-3 px-4">
                                @if($property->status === 'available')
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">متاح</span>
                                @elseif($property->status === 'sold')
                                    <span class="bg-red-100 text-red-800 px-3 py-1 rounded-full text-sm">مباع</span>
                                @else
                                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm">مؤجر</span>
                                @endif
                            </td>
                            <td class="py-3 px-4">
                                <a href="{{ route('admin.properties.edit', $property) }}" class="text-primary hover:underline">
                                    <i class="ri-edit-line"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-8 text-center text-gray-500">لا توجد عقارات</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin>

