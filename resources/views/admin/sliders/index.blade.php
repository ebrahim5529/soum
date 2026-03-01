@php use Illuminate\Support\Str; @endphp
<x-admin>
    <x-slot:title>إدارة الشرائح</x-slot:title>

    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-bold text-gray-800">إدارة الشرائح</h2>
        <a href="{{ route('admin.sliders.create') }}" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
            <i class="ri-add-line ml-2"></i>
            إضافة شريحة جديدة
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">الصورة</th>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">العنوان</th>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">السعر</th>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">الحالة</th>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">الترتيب</th>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($sliders as $slider)
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="py-4 px-6">
                                <img src="{{ $slider->background_image_url }}" 
                                     alt="{{ $slider->title }}" 
                                     class="w-24 h-16 object-cover rounded-lg">
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-semibold text-gray-800">{{ $slider->title }}</div>
                                <div class="text-sm text-gray-500">{{ Str::limit($slider->description, 50) }}</div>
                            </td>
                            <td class="py-4 px-6">
                                @if($slider->price)
                                    <span class="font-semibold text-gray-800">{{ number_format($slider->price, 0) }} ريال</span>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                @if($slider->is_active)
                                    <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">نشط</span>
                                @else
                                    <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm">غير نشط</span>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                <span class="text-gray-700">{{ $slider->order }}</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('admin.sliders.edit', $slider) }}" class="text-primary hover:text-blue-700">
                                        <i class="ri-edit-line text-xl"></i>
                                    </a>
                                    <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
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
                            <td colspan="6" class="py-12 text-center text-gray-500">
                                <i class="ri-inbox-line text-4xl mb-4 block"></i>
                                لا توجد شرائح
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-200">
            {{ $sliders->links() }}
        </div>
    </div>
</x-admin>

