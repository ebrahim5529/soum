<x-admin>
    <x-slot:title>إعدادات الاتصال</x-slot:title>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-xl shadow-lg p-8">
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800 mb-2">إعدادات الاتصال</h2>
            <p class="text-gray-600">قم بتحديث معلومات الاتصال وخريطة الموقع</p>
            <div class="w-24 h-1 bg-primary mt-4"></div>
        </div>

        <form action="{{ route('admin.contact-settings.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="space-y-6">
                <!-- العنوان -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">العنوان</label>
                    <textarea name="address" rows="2"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">{{ old('address', $contactSetting->address) }}</textarea>
                    @error('address') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- خريطة Google Maps -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">كود خريطة Google Maps (Embed)</label>
                    <textarea name="google_map_embed" rows="6" placeholder="الصق كود iframe من Google Maps هنا"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none font-mono text-sm">{{ old('google_map_embed', $contactSetting->google_map_embed) }}</textarea>
                    <p class="text-gray-500 text-sm mt-1">
                        للحصول على الكود: افتح Google Maps → ابحث عن موقعك → انقر على "مشاركة" → اختر "تضمين خريطة" → انسخ كود iframe
                    </p>
                    @error('google_map_embed') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- أرقام الهاتف -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">رقم الهاتف 1</label>
                        <input type="text" name="phone_1" value="{{ old('phone_1', $contactSetting->phone_1) }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                        @error('phone_1') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">رقم الهاتف 2</label>
                        <input type="text" name="phone_2" value="{{ old('phone_2', $contactSetting->phone_2) }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                        @error('phone_2') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">رقم الهاتف 3</label>
                        <input type="text" name="phone_3" value="{{ old('phone_3', $contactSetting->phone_3) }}"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                        @error('phone_3') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <!-- البريد الإلكتروني -->
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">البريد الإلكتروني</label>
                    <input type="email" name="email" value="{{ old('email', $contactSetting->email) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                    @error('email') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <!-- ساعات العمل -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">ساعات العمل في المكتب</label>
                        <input type="text" name="working_hours_office" value="{{ old('working_hours_office', $contactSetting->working_hours_office) }}"
                            placeholder="مثال: 4:00 م - 9:00 م"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                        @error('working_hours_office') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label class="block text-gray-700 font-semibold mb-2">ساعات العمل على الأونلاين</label>
                        <input type="text" name="working_hours_online" value="{{ old('working_hours_online', $contactSetting->working_hours_online) }}"
                            placeholder="مثال: 24 ساعة"
                            class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                        @error('working_hours_online') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-4 mt-8">
                <button type="submit" class="bg-primary text-white px-8 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    حفظ التعديلات
                </button>
            </div>
        </form>
    </div>
</x-admin>

