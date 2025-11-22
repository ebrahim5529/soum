@php use Illuminate\Support\Str; @endphp
<x-admin>
    <x-slot:title>إدارة إنجازاتنا بالأرقام</x-slot:title>

    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-bold text-gray-800">إدارة إنجازاتنا بالأرقام</h2>
    </div>

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">الأيقونة</th>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">الرقم</th>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">التسمية</th>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">الترتيب</th>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($statistics as $statistic)
                        <tr class="border-b border-gray-100 hover:bg-gray-50">
                            <td class="py-4 px-6">
                                <div class="w-12 h-12 rounded-full bg-primary/20 flex items-center justify-center">
                                    <i class="{{ $statistic->icon }} text-xl text-primary"></i>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-bold text-gray-800 text-xl">{{ $statistic->number }}</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-semibold text-gray-800">{{ $statistic->label }}</div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="text-gray-700">{{ $statistic->order }}</span>
                            </td>
                            <td class="py-4 px-6">
                                <a href="{{ route('admin.statistics.edit', $statistic) }}" class="text-primary hover:text-blue-700">
                                    <i class="ri-edit-line text-xl"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-12 text-center text-gray-500">
                                <i class="ri-inbox-line text-4xl mb-4 block"></i>
                                لا توجد إنجازات
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin>

