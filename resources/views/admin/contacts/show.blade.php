<x-admin>
    <x-slot:title>عرض الرسالة</x-slot:title>

    <div class="bg-white rounded-xl shadow-lg p-8">
        <div class="mb-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-2xl font-bold text-gray-800">تفاصيل الرسالة</h2>
                <div class="flex items-center gap-3">
                    @if($contact->is_read)
                        <form action="{{ route('admin.contacts.mark-unread', $contact) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded-lg hover:bg-yellow-600 transition-colors">
                                <i class="ri-mail-unread-line ml-2"></i>
                                تحديد كغير مقروءة
                            </button>
                        </form>
                    @else
                        <span class="bg-blue-100 text-blue-800 px-4 py-2 rounded-full font-semibold">رسالة جديدة</span>
                    @endif
                    <form action="{{ route('admin.contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من الحذف؟')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-colors">
                            <i class="ri-delete-bin-line ml-2"></i>
                            حذف
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-gray-50 rounded-lg p-4">
                    <label class="block text-gray-600 text-sm mb-1">الاسم</label>
                    <p class="text-gray-800 font-semibold text-lg">{{ $contact->name }}</p>
                </div>

                <div class="bg-gray-50 rounded-lg p-4">
                    <label class="block text-gray-600 text-sm mb-1">البريد الإلكتروني</label>
                    <p class="text-gray-800 font-semibold text-lg">
                        <a href="mailto:{{ $contact->email }}" class="text-primary hover:underline">{{ $contact->email }}</a>
                    </p>
                </div>

                <div class="bg-gray-50 rounded-lg p-4">
                    <label class="block text-gray-600 text-sm mb-1">رقم الهاتف</label>
                    <p class="text-gray-800 font-semibold text-lg">
                        <a href="tel:{{ $contact->phone }}" class="text-primary hover:underline">{{ $contact->phone }}</a>
                    </p>
                </div>

                <div class="bg-gray-50 rounded-lg p-4">
                    <label class="block text-gray-600 text-sm mb-1">التاريخ</label>
                    <p class="text-gray-800 font-semibold text-lg">{{ $contact->created_at->format('Y-m-d H:i') }}</p>
                </div>
            </div>

            <div class="bg-gray-50 rounded-lg p-4">
                <label class="block text-gray-600 text-sm mb-2">الموضوع</label>
                <p class="text-gray-800 font-semibold text-lg">{{ $contact->subject }}</p>
            </div>

            <div class="bg-gray-50 rounded-lg p-4">
                <label class="block text-gray-600 text-sm mb-2">الرسالة</label>
                <p class="text-gray-800 leading-relaxed whitespace-pre-wrap">{{ $contact->message }}</p>
            </div>
        </div>

        <div class="mt-8 pt-6 border-t border-gray-200">
            <a href="{{ route('admin.contacts.index') }}" class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400 transition-colors inline-block">
                <i class="ri-arrow-right-line ml-2"></i>
                العودة للقائمة
            </a>
        </div>
    </div>
</x-admin>

