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
                    <label class="block text-gray-700 font-semibold mb-2">السعر (ريال)</label>
                    <input type="number" name="price" value="{{ old('price') }}" step="0.01"
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
                    <label class="block text-gray-700 font-semibold mb-2">رقم الترخيص</label>
                    <input type="text" name="license_number" value="{{ old('license_number') }}"
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
                <textarea id="google_map_url" name="google_map_url" rows="3" placeholder="أدخل رابط Google Maps أو كود embed، مثال: https://www.google.com/maps/place/26.091855,43.980515"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">{{ old('google_map_url') }}</textarea>
                <div class="flex items-center gap-3 mt-2">
                    <button type="button" id="preview-map-btn" class="inline-flex items-center gap-2 text-primary hover:text-primary/80 text-sm font-medium"
                        title="فتح الموقع في نافذة جديدة">
                        <i class="ri-external-link-line"></i>
                        <span>معاينة الموقع</span>
                    </button>
                    <span class="text-gray-500 text-sm">أدخل الرابط أعلاه ثم انقر للمعاينة</span>
                </div>
                @error('google_map_url') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">الصورة الرئيسية *</label>
                <input type="file" name="image" accept="image/*" required
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

            <div class="mb-6">
                <div class="flex items-center justify-between mb-4">
                    <label class="block text-gray-700 font-semibold">الفيديوهات</label>
                    <button type="button" id="add-video" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-600 transition-colors flex items-center gap-2">
                        <i class="ri-add-line"></i>
                        إضافة فيديو
                    </button>
                </div>

                <div id="videos-container">
                    <!-- Video entries will be added here dynamically -->
                </div>

                <p class="text-gray-500 text-sm mt-2">يمكن إضافة فيديوهات محلية أو روابط خارجية من YouTube، Vimeo إلخ</p>
                @error('videos.*') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
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

    <script>
        let videoIndex = 0;

        document.getElementById('preview-map-btn').addEventListener('click', function() {
            const textarea = document.getElementById('google_map_url');
            let input = (textarea.value || '').trim();
            if (!input) {
                alert('أدخل رابط Google Maps أولاً');
                return;
            }
            let url = '';
            const srcMatch = input.match(/src=["']([^"']*google\.com\/maps[^"']*)["']/);
            if (srcMatch) input = srcMatch[1];
            const placeMatch = input.match(/https?:\/\/(?:www\.)?google\.com\/maps\/place\/[\d.,\-]+/);
            if (placeMatch) {
                url = placeMatch[0].replace(/[?&].*$/, '');
            } else {
                const coordsMatch = input.match(/(-?\d+\.\d+),\s*(-?\d+\.\d+)/);
                if (coordsMatch) {
                    url = 'https://www.google.com/maps/place/' + coordsMatch[1] + ',' + coordsMatch[2];
                } else {
                    const mapsMatch = input.match(/(https?:\/\/(?:www\.)?google\.com\/maps[^\s"'<>]+)/);
                    url = mapsMatch ? mapsMatch[1] : '';
                }
            }
            if (url) {
                window.open(url, '_blank', 'noopener,noreferrer');
            } else {
                alert('لم يتم العثور على رابط صالح. استخدم صيغة مثل: https://www.google.com/maps/place/26.091855,43.980515');
            }
        });

        document.getElementById('add-video').addEventListener('click', function() {
            addVideoField();
        });

        function addVideoField() {
            const container = document.getElementById('videos-container');
            const videoDiv = document.createElement('div');
            videoDiv.className = 'video-entry bg-gray-50 p-4 rounded-lg mb-4 border';
            videoDiv.innerHTML = `
                <div class="flex items-center justify-between mb-3">
                    <h4 class="font-semibold text-gray-700">فيديو ${videoIndex + 1}</h4>
                    <button type="button" class="remove-video text-red-500 hover:text-red-700">
                        <i class="ri-delete-bin-line"></i> حذف
                    </button>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-3">
                    <div>
                        <label class="block text-gray-600 font-medium mb-1">عنوان الفيديو (اختياري)</label>
                        <input type="text" name="videos[${videoIndex}][title]" placeholder="مثال: جولة في الغرفة الرئيسية"
                            class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:border-primary focus:outline-none">
                    </div>

                    <div>
                        <label class="block text-gray-600 font-medium mb-1">نوع الفيديو</label>
                        <select name="videos[${videoIndex}][type]" class="video-type w-full border border-gray-300 rounded-lg px-3 py-2 focus:border-primary focus:outline-none">
                            <option value="url">رابط خارجي</option>
                            <option value="file">رفع ملف</option>
                        </select>
                    </div>
                </div>

                <div class="video-url-field">
                    <label class="block text-gray-600 font-medium mb-1">رابط الفيديو</label>
                    <input type="url" name="videos[${videoIndex}][url]" placeholder="https://youtube.com/watch?v=..."
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:border-primary focus:outline-none">
                    <p class="text-gray-500 text-sm mt-1">يمكن إدخال روابط من YouTube، Vimeo، إلخ</p>
                </div>

                <div class="video-file-field hidden">
                    <label class="block text-gray-600 font-medium mb-1">ملف الفيديو</label>
                    <input type="file" name="videos[${videoIndex}][file]" accept="video/*"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:border-primary focus:outline-none">
                    <p class="text-gray-500 text-sm mt-1">الحد الأقصى: 50 ميجابايت، صيغ مدعومة: MP4, MOV, AVI, WMV</p>
                </div>
            `;

            container.appendChild(videoDiv);
            videoIndex++;

            // Add event listeners
            const removeBtn = videoDiv.querySelector('.remove-video');
            const videoTypeSelect = videoDiv.querySelector('.video-type');

            removeBtn.addEventListener('click', function() {
                videoDiv.remove();
            });

            videoTypeSelect.addEventListener('change', function() {
                const urlField = videoDiv.querySelector('.video-url-field');
                const fileField = videoDiv.querySelector('.video-file-field');

                if (this.value === 'url') {
                    urlField.classList.remove('hidden');
                    fileField.classList.add('hidden');
                } else {
                    urlField.classList.add('hidden');
                    fileField.classList.remove('hidden');
                }
            });
        }
    </script>
</x-admin>

