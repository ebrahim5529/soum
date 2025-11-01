<x-admin>
    <x-slot:title>إدارة الرسائل</x-slot:title>

    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">الاسم</th>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">البريد الإلكتروني</th>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">الهاتف</th>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">الموضوع</th>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">التاريخ</th>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">الحالة</th>
                        <th class="text-right py-4 px-6 text-gray-700 font-semibold">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $contact)
                        <tr class="border-b border-gray-100 hover:bg-gray-50 {{ !$contact->is_read ? 'bg-blue-50' : '' }}">
                            <td class="py-4 px-6">
                                <div class="font-semibold text-gray-800">{{ $contact->name }}</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="text-gray-600">{{ $contact->email }}</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="text-gray-600">{{ $contact->phone }}</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="text-gray-700">{{ $contact->subject }}</div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="text-sm text-gray-500">{{ $contact->created_at->format('Y-m-d H:i') }}</div>
                            </td>
                            <td class="py-4 px-6">
                                @if($contact->is_read)
                                    <span class="bg-gray-100 text-gray-800 px-3 py-1 rounded-full text-sm">مقروءة</span>
                                @else
                                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-semibold">جديدة</span>
                                @endif
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-3">
                                    <a href="{{ route('admin.contacts.show', $contact) }}" class="text-primary hover:text-blue-700" title="عرض">
                                        <i class="ri-eye-line text-xl"></i>
                                    </a>
                                    @if($contact->is_read)
                                        <form action="{{ route('admin.contacts.mark-unread', $contact) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="text-yellow-500 hover:text-yellow-700" title="تحديد كغير مقروءة">
                                                <i class="ri-mail-unread-line text-xl"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.contacts.mark-read', $contact) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="text-green-500 hover:text-green-700" title="تحديد كمقروءة">
                                                <i class="ri-mail-check-line text-xl"></i>
                                            </button>
                                        </form>
                                    @endif
                                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700" title="حذف">
                                            <i class="ri-delete-bin-line text-xl"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="py-12 text-center text-gray-500">
                                <i class="ri-inbox-line text-4xl mb-4 block"></i>
                                لا توجد رسائل
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-200">
            {{ $contacts->links() }}
        </div>
    </div>
</x-admin>

