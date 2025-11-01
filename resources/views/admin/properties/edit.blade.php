<x-admin>
    <x-slot:title>تعديل عقار</x-slot:title>

    <div class="bg-white rounded-xl shadow-lg p-8">
        <form action="{{ route('admin.properties.update', $property) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">العنوان *</label>
                    <input type="text" name="title" value="{{ old('title', $property->title) }}" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                    @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">السعر (ريال) *</label>
                    <input type="number" name="price" value="{{ old('price', $property->price) }}" step="0.01" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                    @error('price') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">نوع العقار *</label>
                    <select name="property_type_id" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                        <option value="">اختر النوع</option>
                        @foreach($propertyTypes as $type)
                            <option value="{{ $type->id }}" {{ old('property_type_id', $property->property_type_id) == $type->id ? 'selected' : '' }}>
                                {{ $type->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('property_type_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">نوع الخدمة *</label>
                    <select name="service_type_id" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                        <option value="">اختر الخدمة</option>
                        @foreach($serviceTypes as $type)
                            <option value="{{ $type->id }}" {{ old('service_type_id', $property->service_type_id) == $type->id ? 'selected' : '' }}>
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
                            <option value="{{ $city->id }}" {{ old('city_id', $property->city_id) == $city->id ? 'selected' : '' }}>
                                {{ $city->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('city_id') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">الحي</label>
                    <input type="text" name="district" value="{{ old('district', $property->district) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">المساحة (م²) *</label>
                    <input type="number" name="area" value="{{ old('area', $property->area) }}" step="0.01" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                    @error('area') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">الحالة *</label>
                    <select name="status" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                        <option value="available" {{ old('status', $property->status) == 'available' ? 'selected' : '' }}>متاح</option>
                        <option value="sold" {{ old('status', $property->status) == 'sold' ? 'selected' : '' }}>مباع</option>
                        <option value="rented" {{ old('status', $property->status) == 'rented' ? 'selected' : '' }}>مؤجر</option>
                    </select>
                    @error('status') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">عدد الغرف</label>
                    <input type="number" name="bedrooms" value="{{ old('bedrooms', $property->bedrooms) }}" min="0"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">عدد الحمامات</label>
                    <input type="number" name="bathrooms" value="{{ old('bathrooms', $property->bathrooms) }}" min="0"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">عدد الطوابق</label>
                    <input type="number" name="floors" value="{{ old('floors', $property->floors) }}" min="0"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">رقم الطابق</label>
                    <input type="text" name="floor_number" value="{{ old('floor_number', $property->floor_number) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">حالة مميز</label>
                    <input type="text" name="featured_status" value="{{ old('featured_status', $property->featured_status) }}"
                        placeholder="جديد، مميز، استثمار"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                </div>

                <div>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $property->is_featured) ? 'checked' : '' }}
                            class="w-5 h-5 text-primary rounded">
                        <span class="text-gray-700 font-semibold">عقار مميز</span>
                    </label>
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">الوصف</label>
                <textarea name="description" rows="4"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">{{ old('description', $property->description) }}</textarea>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">الصورة الرئيسية</label>
                @if($property->main_image)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $property->main_image) }}" alt="الصورة الحالية" class="w-32 h-32 object-cover rounded-lg">
                    </div>
                @endif
                <input type="file" name="main_image" accept="image/*"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                <p class="text-gray-500 text-sm mt-1">اتركه فارغاً إذا لم ترد تغيير الصورة</p>
                @error('main_image') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <!-- الصور الإضافية الموجودة -->
            @if($property->images->count() > 0)
                <div class="mb-6">
                    <label class="block text-gray-700 font-semibold mb-2">الصور الإضافية الحالية</label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        @foreach($property->images as $image)
                            <div class="relative">
                                <img src="{{ asset('storage/' . $image->image_path) }}" alt="صورة {{ $image->id }}" class="w-full h-32 object-cover rounded-lg">
                                <label class="absolute top-2 right-2 flex items-center gap-2 bg-red-500 text-white px-2 py-1 rounded text-sm cursor-pointer">
                                    <input type="checkbox" name="delete_images[]" value="{{ $image->id }}" class="w-4 h-4">
                                    <span>حذف</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">إضافة صور جديدة</label>
                <input type="file" name="images[]" accept="image/*" multiple
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                <p class="text-gray-500 text-sm mt-1">يمكن اختيار عدة صور</p>
                @error('images.*') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="bg-primary text-white px-8 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    حفظ التعديلات
                </button>
                <a href="{{ route('admin.properties.index') }}" class="bg-gray-300 text-gray-700 px-8 py-2 rounded-lg hover:bg-gray-400 transition-colors">
                    إلغاء
                </a>
            </div>
        </form>
    </div>
</x-admin>

