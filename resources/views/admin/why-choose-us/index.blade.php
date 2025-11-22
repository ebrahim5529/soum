@php use Illuminate\Support\Str; @endphp
<x-admin>
    <x-slot:title>إدارة "لماذا نحن؟"</x-slot:title>

    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-bold text-gray-800">إدارة عناصر "لماذا نحن؟"</h2>
        <a href="{{ route('admin.why-choose-us.create') }}" class="bg-primary text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition-colors">
            <i class="ri-add-line ml-2"></i>
            إضافة عنصر جديد
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">الأيقونة</th>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">العنوان</th>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">الوصف</th>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">الترتيب</th>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($items as $item)
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="py-4 px-6">
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
                                <div class="w-12 h-12 rounded-xl flex items-center justify-center bg-gradient-to-br {{ $bgColor }}">
                                    <i class="{{ $item->icon }} text-2xl text-white"></i>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-semibold text-gray-800">{{ $item->title }}</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="text-sm text-gray-600">{{ Str::limit($item->description, 60) }}</div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="text-gray-700">{{ $item->order }}</span>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('admin.why-choose-us.edit', $item) }}" class="text-primary hover:text-blue-700">
                                        <i class="ri-edit-line text-xl"></i>
                                    </a>
                                    <form action="{{ route('admin.why-choose-us.destroy', $item) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
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
                                لا توجد عناصر
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-200">
            {{ $items->links() }}
        </div>
    </div>
</x-admin>

