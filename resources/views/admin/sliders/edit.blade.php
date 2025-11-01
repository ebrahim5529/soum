<x-admin>
    <x-slot:title>تعديل شريحة</x-slot:title>

    <div class="bg-white rounded-xl shadow-lg p-8">
        <form action="{{ route('admin.sliders.update', $slider) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">العنوان *</label>
                    <input type="text" name="title" value="{{ old('title', $slider->title) }}" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                    @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">السعر</label>
                    <input type="number" name="price" value="{{ old('price', $slider->price) }}" step="0.01"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                    @error('price') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">تسمية السعر</label>
                    <input type="text" name="price_label" value="{{ old('price_label', $slider->price_label) }}"
                        placeholder="مثال: للبيع، للإيجار"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">نوع العقار</label>
                    <input type="text" name="property_type" value="{{ old('property_type', $slider->property_type) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">نوع الخدمة</label>
                    <input type="text" name="service_type" value="{{ old('service_type', $slider->service_type) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">الموقع</label>
                    <input type="text" name="location" value="{{ old('location', $slider->location) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">المساحة</label>
                    <input type="text" name="area" value="{{ old('area', $slider->area) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">الشارة</label>
                    <input type="text" name="badge" value="{{ old('badge', $slider->badge) }}"
                        placeholder="جديد، مميز، استثمار"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">لون الشارة</label>
                    <select name="badge_color"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                        <option value="red" {{ old('badge_color', $slider->badge_color) == 'red' ? 'selected' : '' }}>أحمر</option>
                        <option value="green" {{ old('badge_color', $slider->badge_color) == 'green' ? 'selected' : '' }}>أخضر</option>
                        <option value="blue" {{ old('badge_color', $slider->badge_color) == 'blue' ? 'selected' : '' }}>أزرق</option>
                    </select>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">ربط بعقار</label>
                    <select name="property_id"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                        <option value="">لا يوجد</option>
                        @foreach($properties as $property)
                            <option value="{{ $property->id }}" {{ old('property_id', $slider->property_id) == $property->id ? 'selected' : '' }}>
                                {{ $property->title }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">الترتيب</label>
                    <input type="number" name="order" value="{{ old('order', $slider->order) }}" min="0"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $slider->is_active) ? 'checked' : '' }}
                            class="w-5 h-5 text-primary rounded">
                        <span class="text-gray-700 font-semibold">نشط</span>
                    </label>
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">الوصف</label>
                <textarea name="description" rows="3"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">{{ old('description', $slider->description) }}</textarea>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">صورة الخلفية</label>
                @if($slider->background_image)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $slider->background_image) }}" alt="الصورة الحالية" class="w-64 h-32 object-cover rounded-lg">
                    </div>
                @endif
                <input type="file" name="background_image" accept="image/*"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                <p class="text-gray-500 text-sm mt-1">اتركه فارغاً إذا لم ترد تغيير الصورة</p>
                @error('background_image') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="bg-primary text-white px-8 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    حفظ التعديلات
                </button>
                <a href="{{ route('admin.sliders.index') }}" class="bg-gray-300 text-gray-700 px-8 py-2 rounded-lg hover:bg-gray-400 transition-colors">
                    إلغاء
                </a>
            </div>
        </form>
    </div>
</x-admin>

