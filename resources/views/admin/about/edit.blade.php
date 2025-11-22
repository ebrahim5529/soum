<x-admin>
    <x-slot:title>تعديل محتوى "من نحن"</x-slot:title>

    <div class="bg-white rounded-xl shadow-lg p-8">
        <form action="{{ route('admin.about.update') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">المقدمة</label>
                <textarea name="introduction" rows="4"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">{{ old('introduction', $aboutPage->introduction) }}</textarea>
                @error('introduction') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">عنوان الرؤية</label>
                    <input type="text" name="vision_title" value="{{ old('vision_title', $aboutPage->vision_title) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                    @error('vision_title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">عنوان الرسالة</label>
                    <input type="text" name="mission_title" value="{{ old('mission_title', $aboutPage->mission_title) }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">
                    @error('mission_title') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">محتوى الرؤية</label>
                    <textarea name="vision_content" rows="6"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">{{ old('vision_content', $aboutPage->vision_content) }}</textarea>
                    @error('vision_content') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">محتوى الرسالة</label>
                    <textarea name="mission_content" rows="6"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">{{ old('mission_content', $aboutPage->mission_content) }}</textarea>
                    @error('mission_content') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
                </div>
            </div>

            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">وصف فريقنا المتخصص</label>
                <textarea name="team_description" rows="4"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:border-primary focus:outline-none">{{ old('team_description', $aboutPage->team_description) }}</textarea>
                @error('team_description') <p class="text-red-500 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="bg-primary text-white px-8 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                    حفظ التعديلات
                </button>
                <a href="{{ route('admin.about.index') }}" class="bg-gray-300 text-gray-700 px-8 py-2 rounded-lg hover:bg-gray-400 transition-colors">
                    إلغاء
                </a>
            </div>
        </form>
    </div>
</x-admin>

