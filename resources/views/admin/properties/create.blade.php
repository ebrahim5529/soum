<x-admin>
    <x-slot:title>إضافة عقار جديد</x-slot:title>

    <div class="bg-white rounded-xl shadow-lg p-8">
        <form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">العنوان *</label>
                    <input type="text" name="title" value="{{ old('title') }}" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                    @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">السعر (ريال) *</label>
                    <input type="number" name="price" value="{{ old('price') }}" step="0.01" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                    @error('price') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label class="block text-gray-700 font-semibold">نوع العقار *</label>
                        <a href="{{ route('admin.property-types.index') }}" target="_blank" class="text-primary hover:text-blue-700 text-sm flex items-center gap-1">
                            <i class="ri-add-line"></i>
                            إضافة نوع جديد
                        </a>
                    </div>
                    <select name="property_type_id" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                        <option value="">اختر النوع</option>
                        @foreach($propertyTypes as $type)
                            <option value="{{ $type->id }}" {{ old('property_type_id') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('property_type_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <div class="flex items-center justify-between mb-2">
                        <label class="block text-gray-700 font-semibold">نوع الخدمة *</label>
                        <a href="{{ route('admin.service-types.index') }}" target="_blank" class="text-primary hover:text-blue-700 text-sm flex items-center gap-1">
                            <i class="ri-add-line"></i>
                            إضافة نوع جديد
                        </a>
                    </div>
                    <select name="service_type_id" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                        <option value="">اختر الخدمة</option>
                        @foreach($serviceTypes as $type)
                            <option value="{{ $type->id }}" {{ old('service_type_id') == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('service_type_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">المدينة *</label>
                    <select name="city_id" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                        <option value="">اختر المدينة</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                {{ $city->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('city_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">الحي</label>
                    <input type="text" name="district" value="{{ old('district') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">المساحة (م²) *</label>
                    <input type="number" name="area" value="{{ old('area') }}" step="0.01" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                    @error('area') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">الحالة *</label>
                    <select name="status" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                        <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>متاح</option>
                        <option value="sold" {{ old('status') == 'sold' ? 'selected' : '' }}>مباع</option>
                        <option value="rented" {{ old('status') == 'rented' ? 'selected' : '' }}>مؤجر</option>
                    </select>
                    @error('status') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">عدد الغرف</label>
                    <input type="number" name="bedrooms" value="{{ old('bedrooms') }}" min="0"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">عدد الحمامات</label>
                    <input type="number" name="bathrooms" value="{{ old('bathrooms') }}" min="0"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">عدد الطوابق</label>
                    <input type="number" name="floors" value="{{ old('floors') }}" min="0"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">رقم الطابق</label>
                    <input type="text" name="floor_number" value="{{ old('floor_number') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">حالة مميز</label>
                    <input type="text" name="featured_status" value="{{ old('featured_status') }}"
                        placeholder="جديد، مميز، استثمار"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                            class="w-5 h-5 text-primary rounded">
                        <span class="text-gray-700 font-semibold">عقار مميز</span>
                    </label>
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">الوصف</label>
                <textarea name="description" rows="4"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">{{ old('description') }}</textarea>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">موقع Google Maps</label>
                <textarea name="google_map_url" rows="3" placeholder="أدخل رابط Google Maps أو كود embed"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">{{ old('google_map_url') }}</textarea>
                <p class="text-gray-500 text-sm mt-1">يمكنك إدخال رابط Google Maps أو كود embed</p>
                @error('google_map_url') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">الصورة الرئيسية *</label>
                <input type="file" name="main_image" accept="image/*" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                @error('main_image') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">صور إضافية</label>
                <input type="file" name="images[]" accept="image/*" multiple
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                <p class="text-gray-500 text-sm mt-1">يمكن اختيار عدة صور</p>
                @error('images.*') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="bg-primary text-white px-8 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    حفظ
                </button>
                <a href="{{ route('admin.properties.index') }}" class="bg-gray-300 text-gray-700 px-8 py-2 rounded-lg hover:bg-gray-400 transition-colors">
                    إلغاء
                </a>
            </div>
        </form>
    </div>
</x-admin>

