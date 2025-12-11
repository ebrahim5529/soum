<x-admin>
    <x-slot:title>إضافة مقال جديد</x-slot:title>

    <div class="bg-white rounded-xl shadow-lg p-8">
        <form action="{{ route('admin.blog.store') }}" method="POST">
            @csrf

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">عنوان المقال *</label>
                <input type="text" name="title" value="{{ old('title') }}" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none"
                    placeholder="أدخل عنوان المقال">
                @error('title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">ملخص المقال</label>
                <textarea name="excerpt" rows="3"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none"
                    placeholder="ملخص قصير عن المقال">{{ old('excerpt') }}</textarea>
                @error('excerpt') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">محتوى المقال *</label>
                <textarea name="content" id="summernote" required
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none"
                    placeholder="اكتب محتوى المقال هنا...">{{ old('content') }}</textarea>
                @error('content') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">رابط الصورة المميزة</label>
                <input type="url" name="featured_image" value="{{ old('featured_image') }}"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none"
                    placeholder="https://example.com/image.jpg">
                <p class="text-gray-500 text-sm mt-1">أدخل رابط الصورة من الإنترنت (مثل Unsplash)</p>
                @error('featured_image') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}
                            class="w-5 h-5 text-primary rounded">
                        <span class="text-gray-700 font-semibold">نشر المقال</span>
                    </label>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">تاريخ النشر</label>
                    <input type="datetime-local" name="published_at" value="{{ old('published_at') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                    <p class="text-gray-500 text-sm mt-1">اتركه فارغاً للنشر فوراً</p>
                    @error('published_at') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="bg-primary text-white px-8 py-2 rounded-lg hover:bg-orange-600 transition-colors">
                    حفظ
                </button>
                <a href="{{ route('admin.blog.index') }}" class="bg-gray-300 text-gray-700 px-8 py-2 rounded-lg hover:bg-gray-400 transition-colors">
                    إلغاء
                </a>
            </div>
        </form>
    </div>

    @push('styles')
    <!-- Summernote CSS -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
    @endpush

    @push('scripts')
    <!-- jQuery (required for Summernote) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
    <!-- Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
    
    <!-- Summernote Arabic Language -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/lang/summernote-ar-AR.min.js"></script>
    
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 400,
                lang: 'ar-AR',
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                placeholder: 'اكتب محتوى المقال هنا...',
                dialogsInBody: true,
                dialogsFade: true,
                callbacks: {
                    onImageUpload: function(files) {
                        // Handle image upload if needed
                        // You can implement image upload to server here
                    }
                }
            });
        });
    </script>
    @endpush
</x-admin>

