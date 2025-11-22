<x-admin>
    <x-slot:title>تعديل إنجاز</x-slot:title>

    <div class="bg-white rounded-xl shadow-lg p-8">
        <form action="{{ route('admin.statistics.update', $statistic) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">الرقم *</label>
                    <input type="text" name="number" value="{{ old('number', $statistic->number) }}" required
                        placeholder="+1000"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                    <p class="text-gray-500 text-sm mt-1">مثال: +1000, +500, +10</p>
                    @error('number') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">التسمية *</label>
                    <input type="text" name="label" value="{{ old('label', $statistic->label) }}" required
                        placeholder="عقار متاح"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                    @error('label') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">الأيقونة *</label>
                    <input type="text" name="icon" value="{{ old('icon', $statistic->icon) }}" required
                        placeholder="ri-home-line"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                    <p class="text-gray-500 text-sm mt-1">استخدم أيقونات Remix Icon (مثال: ri-home-line)</p>
                    @error('icon') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">الترتيب</label>
                    <input type="number" name="order" value="{{ old('order', $statistic->order) }}" min="0"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                </div>
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="bg-primary text-white px-8 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    حفظ التعديلات
                </button>
                <a href="{{ route('admin.statistics.index') }}" class="bg-gray-300 text-gray-700 px-8 py-2 rounded-lg hover:bg-gray-400 transition-colors">
                    إلغاء
                </a>
            </div>
        </form>
    </div>
</x-admin>

