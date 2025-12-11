<x-admin>
    <x-slot:title>إدارة أنواع العقارات</x-slot:title>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
            {{ session('error') }}
        </div>
    @endif

    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-bold text-gray-800">إدارة أنواع العقارات</h2>
        <a href="{{ route('admin.property-types.create') }}" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
            <i class="ri-add-line ml-2"></i>
            إضافة نوع جديد
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">الأيقونة</th>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">الاسم (عربي)</th>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">الاسم (إنجليزي)</th>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">عدد العقارات</th>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($propertyTypes as $type)
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="py-4 px-6">
                                @if($type->icon)
                                    <i class="{{ $type->icon }} text-2xl text-primary"></i>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-semibold text-gray-800">{{ $type->name }}</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="text-sm text-gray-600">{{ $type->name_en ?? '-' }}</div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="text-gray-700">{{ $type->properties()->count() }}</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('admin.property-types.edit', $type) }}" class="text-primary hover:text-blue-700">
                                        <i class="ri-edit-line text-xl"></i>
                                    </a>
                                    <form action="{{ route('admin.property-types.destroy', $type) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">
                                            <i class="ri-delete-bin-line text-xl"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-gray-500">
                                <i class="ri-inbox-line text-4xl mb-4 block"></i>
                                لا توجد أنواع عقارات
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin>

