<x-admin>
    <x-slot:title>تعديل عنصر "لماذا نحن؟"</x-slot:title>

    <div class="bg-white rounded-xl shadow-lg p-8">
        <form action="{{ route('admin.why-choose-us.update', $whyChooseUsItem->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">العنوان *</label>
                    <input type="text" name="title" value="{{ old('title', $whyChooseUsItem->title) }}" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                    @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">الأيقونة *</label>
                    <input type="text" name="icon" value="{{ old('icon', $whyChooseUsItem->icon) }}" required
                        placeholder="ri-home-line"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                    <p class="text-gray-500 text-sm mt-1">استخدم أيقونات Remix Icon (مثال: ri-home-line)</p>
                    @error('icon') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">لون الأيقونة *</label>
                    <select name="icon_color" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                        <option value="primary" {{ old('icon_color', $whyChooseUsItem->icon_color) == 'primary' ? 'selected' : '' }}>أساسي</option>
                        <option value="blue" {{ old('icon_color', $whyChooseUsItem->icon_color) == 'blue' ? 'selected' : '' }}>أزرق</option>
                        <option value="green" {{ old('icon_color', $whyChooseUsItem->icon_color) == 'green' ? 'selected' : '' }}>أخضر</option>
                        <option value="purple" {{ old('icon_color', $whyChooseUsItem->icon_color) == 'purple' ? 'selected' : '' }}>بنفسجي</option>
                        <option value="orange" {{ old('icon_color', $whyChooseUsItem->icon_color) == 'orange' ? 'selected' : '' }}>برتقالي</option>
                        <option value="teal" {{ old('icon_color', $whyChooseUsItem->icon_color) == 'teal' ? 'selected' : '' }}>تركواز</option>
                        <option value="red" {{ old('icon_color', $whyChooseUsItem->icon_color) == 'red' ? 'selected' : '' }}>أحمر</option>
                    </select>
                    @error('icon_color') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">الترتيب</label>
                    <input type="number" name="order" value="{{ old('order', $whyChooseUsItem->order) }}" min="0"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">الوصف *</label>
                <textarea name="description" rows="4" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">{{ old('description', $whyChooseUsItem->description) }}</textarea>
                @error('description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="bg-primary text-white px-8 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    حفظ التعديلات
                </button>
                <a href="{{ route('admin.why-choose-us.index') }}" class="bg-gray-300 text-gray-700 px-8 py-2 rounded-lg hover:bg-gray-400 transition-colors">
                    إلغاء
                </a>
            </div>
        </form>
    </div>
</x-admin>

